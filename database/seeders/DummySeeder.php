<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\AddonGroup;
use App\Models\AddonOption;
use App\Models\Category;
use App\Models\Outlet;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\ProductBundle;
use App\Models\ProductBundleItem;
use App\Models\ProductImage;
use App\Models\Table;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $outlet = Outlet::first();
        if (!$outlet) return;

        // 1. Tables
        Table::create(['outlet_id' => $outlet->id, 'name' => 'Meja 1', 'type' => 'meja', 'qr_token' => uniqid('qr_')]);
        Table::create(['outlet_id' => $outlet->id, 'name' => 'Meja 2', 'type' => 'meja', 'qr_token' => uniqid('qr_')]);
        Table::create(['outlet_id' => $outlet->id, 'name' => 'Kamar 101', 'type' => 'kamar_kost', 'qr_token' => uniqid('qr_')]);

        // 2. Categories
        $catMakanan = Category::create(['outlet_id' => $outlet->id, 'name' => 'Makanan', 'slug' => 'makanan']);
        $catMinuman = Category::create(['outlet_id' => $outlet->id, 'name' => 'Minuman', 'slug' => 'minuman']);

        // 3. Addons
        $addonPedas = AddonGroup::create([
            'outlet_id' => $outlet->id,
            'name' => 'Level Pedas',
            'is_required' => true,
            'is_multiple' => false,
        ]);
        AddonOption::create(['addon_group_id' => $addonPedas->id, 'name' => 'Tidak Pedas', 'extra_price' => 0]);
        AddonOption::create(['addon_group_id' => $addonPedas->id, 'name' => 'Sedang', 'extra_price' => 0]);
        AddonOption::create(['addon_group_id' => $addonPedas->id, 'name' => 'Ekstra Pedas', 'extra_price' => 2000]);

        $addonTopping = AddonGroup::create([
            'outlet_id' => $outlet->id,
            'name' => 'Topping Tambahan',
            'is_required' => false,
            'is_multiple' => true,
        ]);
        AddonOption::create(['addon_group_id' => $addonTopping->id, 'name' => 'Keju', 'extra_price' => 3000]);
        AddonOption::create(['addon_group_id' => $addonTopping->id, 'name' => 'Sosis', 'extra_price' => 4000]);

        // 4. Products
        $nasiGoreng = Product::create([
            'outlet_id' => $outlet->id,
            'category_id' => $catMakanan->id,
            'name' => 'Nasi Goreng Spesial',
            'slug' => 'nasi-goreng-spesial',
            'description' => 'Nasi goreng dengan telur dan ayam suwir',
            'sku' => 'FOOD-001',
            'barcode' => '111222333',
            'sell_price' => 15000,
            'cost_price' => 10000,
            'stock' => 50,
            'is_active' => true,
            'track_stock' => true,
        ]);
        ProductImage::create(['product_id' => $nasiGoreng->id, 'path' => 'https://via.placeholder.com/150', 'sort_order' => 1]);
        // Attach addons to Nasi Goreng
        $nasiGoreng->addonGroups()->attach([$addonPedas->id, $addonTopping->id]);

        $mieGoreng = Product::create([
            'outlet_id' => $outlet->id,
            'category_id' => $catMakanan->id,
            'name' => 'Mie Goreng Jawa',
            'slug' => 'mie-goreng-jawa',
            'sell_price' => 12000,
            'cost_price' => 8000,
            'stock' => 30,
            'is_active' => true,
            'track_stock' => true,
        ]);

        $esTeh = Product::create([
            'outlet_id' => $outlet->id,
            'category_id' => $catMinuman->id,
            'name' => 'Es Teh Manis',
            'slug' => 'es-teh-manis',
            'sell_price' => 4000,
            'cost_price' => 2000,
            'stock' => 100,
            'is_active' => true,
            'track_stock' => true,
        ]);

        $esJeruk = Product::create([
            'outlet_id' => $outlet->id,
            'category_id' => $catMinuman->id,
            'name' => 'Es Jeruk',
            'slug' => 'es-jeruk',
            'sell_price' => 5000,
            'cost_price' => 3000,
            'stock' => 50,
            'is_active' => true,
            'track_stock' => true,
        ]);

        // 5. Product Bundles
        $paketHemat = ProductBundle::create([
            'outlet_id' => $outlet->id,
            'name' => 'Paket Hemat 1',
            'sell_price' => 17000, // Diskon 2000 dari total 19000
            'is_active' => true,
        ]);
        ProductBundleItem::create(['product_bundle_id' => $paketHemat->id, 'product_id' => $nasiGoreng->id, 'qty' => 1]);
        ProductBundleItem::create(['product_bundle_id' => $paketHemat->id, 'product_id' => $esTeh->id, 'qty' => 1]);

        // 6. Payment Methods
        PaymentMethod::create(['outlet_id' => $outlet->id, 'name' => 'Tunai', 'type' => 'tunai']);
        PaymentMethod::create(['outlet_id' => $outlet->id, 'name' => 'BCA QRIS', 'type' => 'qris']);
        PaymentMethod::create(['outlet_id' => $outlet->id, 'name' => 'Transfer Bank BCA', 'type' => 'transfer', 'account_number' => '1234567890']);
    }
}
