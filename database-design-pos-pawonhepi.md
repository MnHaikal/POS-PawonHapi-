# Desain Database — Sistem POS Pawon Hepi

Dokumen ini berisi (1) rancangan skema database lengkap berdasarkan fitur di UI contoh, dan (2) prompt siap-pakai untuk kamu paste ke Agent Antigravity secara bertahap. Kerjakan stage 1 → 6 berurutan, jangan loncat, karena stage berikutnya bergantung pada tabel yang dibuat stage sebelumnya.

Asumsi dasar:
- Framework: Laravel (sudah ada project-nya di screenshot kamu)
- 1 outlet aktif ("Pawon Hepi"), tapi tabel dirancang siap multi-outlet untuk masa depan
- 2 role: `super_admin` dan `staff_pos_senior`
- Uang dalam Rupiah, disimpan sebagai integer (satuan rupiah, bukan sen) untuk menghindari masalah floating point

---

## 1. Daftar Tabel & Struktur Kolom

### 1.1 `outlets`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| name | string | "Pawon Hepi" |
| address | text nullable | |
| phone | string nullable | |
| email | string nullable | |
| npwp | string nullable | Nomor Pajak |
| logo_path | string nullable | |
| is_active | boolean default true | |
| timestamps | | |

### 1.2 `users` (modifikasi migration bawaan Laravel)
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| outlet_id | FK → outlets, nullable | null untuk super_admin lintas outlet jika perlu |
| name | string | |
| email | string unique | |
| password | string | |
| role | enum('super_admin','staff_pos_senior') | |
| phone | string nullable | |
| avatar_path | string nullable | |
| is_active | boolean default true | |
| last_login_at | timestamp nullable | |
| timestamps, softDeletes | |

### 1.3 `categories`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| outlet_id | FK → outlets | |
| parent_id | FK → categories, nullable, self-reference | untuk sub-kategori |
| name | string | |
| slug | string | |
| description | text nullable | |
| image_path | string nullable | |
| kitchen_print_type | enum('dapur','bar','none') default 'none' | untuk routing struk dapur |
| is_active | boolean default true | |
| sort_order | integer default 0 | |
| timestamps | |

### 1.4 `products`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| outlet_id | FK → outlets | |
| category_id | FK → categories, nullable | |
| name | string | |
| slug | string | |
| sku | string nullable unique | |
| barcode | string nullable | |
| description | text nullable | |
| main_image_path | string nullable | |
| cost_price | integer default 0 | Harga Beli |
| sell_price | integer | Harga Jual |
| track_stock | boolean default true | Lacak stok |
| stock | integer default 0 | stok berjalan |
| min_stock | integer default 0 | Stok Minimum, untuk alert |
| loyalty_points_per_unit | integer default 0 | |
| is_active | boolean default true | Produk aktif |
| show_in_pos | boolean default true | Tampil di POS |
| is_new | boolean default false | Rilis Terbaru |
| is_popular | boolean default false | Populer |
| is_on_sale | boolean default false | Sale/Diskon |
| sale_price | integer nullable | harga saat diskon aktif |
| is_preorder | boolean default false | |
| created_by | FK → users, nullable | |
| updated_by | FK → users, nullable | |
| timestamps, softDeletes | soft delete → sumber laporan "Produk Dihapus" |

> Catatan: "Habis Stok" TIDAK perlu kolom sendiri — cukup query `stock <= 0` (atau `<= min_stock` untuk "Peringatan Sisa Stok").

### 1.5 `product_images`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| product_id | FK → products | |
| path | string | |
| sort_order | integer default 0 | maks 5 gambar tambahan divalidasi di layer aplikasi |
| timestamps | |

### 1.6 `product_bundles`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| outlet_id | FK → outlets | |
| name | string | |
| sku | string nullable | |
| cost_price | integer default 0 | |
| sell_price | integer | |
| is_active | boolean default true | |
| timestamps, softDeletes | |

### 1.7 `product_bundle_items`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| product_bundle_id | FK → product_bundles | |
| product_id | FK → products | |
| qty | integer default 1 | |
| timestamps | |

### 1.8 `addon_groups`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| outlet_id | FK → outlets | |
| name | string | contoh: "Pilihan Rasa", "Level Pedas" |
| is_required | boolean default false | Wajib Dipilih |
| is_multiple | boolean default false | Multi-pilih |
| sort_order | integer default 0 | |
| timestamps | |

### 1.9 `addon_options`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| addon_group_id | FK → addon_groups | |
| name | string | |
| extra_price | integer default 0 | |
| is_active | boolean default true | |
| sort_order | integer default 0 | |
| timestamps | |

### 1.10 `product_addon_group` (pivot)
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| product_id | FK → products | |
| addon_group_id | FK → addon_groups | |

### 1.11 `tables` (Meja & Kamar Kost)
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| outlet_id | FK → outlets | |
| name | string | "Meja 1", "Kamar 1" |
| type | enum('meja','kamar_kost') | |
| qr_token | string unique | dipakai di URL `/order/{outlet}/{qr_token}` |
| is_active | boolean default true | |
| timestamps | |

### 1.12 `coupons`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| outlet_id | FK → outlets | |
| code | string unique | |
| discount_type | enum('percentage','fixed') | |
| discount_value | integer | |
| min_purchase | integer default 0 | |
| max_discount | integer nullable | cap untuk tipe percentage |
| valid_from | date nullable | |
| valid_until | date nullable | |
| usage_limit | integer nullable | |
| used_count | integer default 0 | |
| is_active | boolean default true | |
| timestamps | |

### 1.13 `payment_methods`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| outlet_id | FK → outlets | |
| name | string | "Cash", "QRIS", "BCA" |
| type | enum('tunai','qris','debit','ewallet','transfer') | |
| account_number | string nullable | |
| is_active | boolean default true | |
| sort_order | integer default 0 | |
| timestamps | |

### 1.14 `orders`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| outlet_id | FK → outlets | |
| order_number | string unique | format ORD-YYYYMMDD-XXXX |
| order_type | enum('dine_in','take_away','qr_table','qr_room') | |
| source | enum('pos','self_order') | Point of Sale vs QR self-order |
| table_id | FK → tables, nullable | |
| customer_name | string nullable | |
| customer_phone | string nullable | |
| cashier_id | FK → users, nullable | null selama masih self-order belum dikonfirmasi kasir |
| status | enum('pending_confirmation','processing','completed','cancelled') | |
| payment_status | enum('unpaid','partial','paid') | |
| subtotal | integer default 0 | |
| discount_amount | integer default 0 | |
| coupon_id | FK → coupons, nullable | |
| tax_amount | integer default 0 | |
| service_fee_amount | integer default 0 | |
| packaging_fee_amount | integer default 0 | biaya kemasan take away |
| total_amount | integer default 0 | |
| down_payment_amount | integer default 0 | uang muka |
| paid_amount | integer default 0 | akumulasi dari tabel payments, di-cache di sini |
| due_date | date nullable | jatuh tempo piutang |
| cogs_amount | integer default 0 | estimasi HPP, snapshot untuk laporan laba kotor |
| notes | text nullable | |
| confirmed_at | timestamp nullable | |
| completed_at | timestamp nullable | |
| cancelled_at | timestamp nullable | |
| timestamps | |

### 1.15 `order_items`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| order_id | FK → orders | |
| item_type | enum('product','bundle') | |
| product_id | FK → products, nullable | |
| product_bundle_id | FK → product_bundles, nullable | |
| item_name | string | snapshot nama saat transaksi |
| unit_price | integer | snapshot harga saat transaksi |
| qty | integer | |
| addon_total | integer default 0 | |
| note | string nullable | contoh: "Polosan Tanpa Bumbu" |
| subtotal | integer | (unit_price + addon_total) * qty |
| timestamps | |

### 1.16 `order_item_addons`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| order_item_id | FK → order_items | |
| addon_option_id | FK → addon_options, nullable | |
| addon_name | string | snapshot |
| addon_price | integer | snapshot |
| timestamps | |

### 1.17 `payments`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| order_id | FK → orders | |
| payment_method_id | FK → payment_methods | |
| amount | integer | |
| reference_no | string nullable | no. referensi QRIS/transfer |
| received_by | FK → users, nullable | |
| paid_at | timestamp | |
| timestamps | |

> Mendukung split bill / cicilan piutang: satu order bisa punya banyak baris payment.

### 1.18 `returns`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| order_id | FK → orders | |
| return_number | string unique | RET-YYYYMMDD-XXXX |
| reason | string nullable | |
| refund_amount | integer | |
| processed_by | FK → users, nullable | |
| timestamps | |

### 1.19 `return_items`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| return_id | FK → returns | |
| order_item_id | FK → order_items | |
| qty | integer | |
| amount | integer | |
| timestamps | |

### 1.20 `stock_movements`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| outlet_id | FK → outlets | |
| product_id | FK → products | |
| type | enum('stok_masuk','stok_keluar','koreksi','penjualan','pengembalian','opname_adjustment') | |
| qty_change | integer | bisa negatif |
| stock_before | integer | |
| stock_after | integer | |
| note | text nullable | |
| reference_type | string nullable | morph: Order, ProductReturn, StockOpname |
| reference_id | bigint nullable | |
| created_by | FK → users, nullable | |
| timestamps | |

### 1.21 `stock_opnames`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| outlet_id | FK → outlets | |
| opname_date | date | |
| note | text nullable | |
| status | enum('draft','completed') default 'draft' | |
| created_by | FK → users, nullable | |
| timestamps | |

### 1.22 `stock_opname_items`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| stock_opname_id | FK → stock_opnames | |
| product_id | FK → products | |
| system_qty | integer | stok menurut sistem |
| physical_qty | integer nullable | stok fisik hasil hitung |
| difference | integer nullable | physical - system |
| note | string nullable | |
| timestamps | |

### 1.23 `price_histories`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| product_id | FK → products | |
| old_cost_price | integer | |
| new_cost_price | integer | |
| old_sell_price | integer | |
| new_sell_price | integer | |
| changed_by | FK → users, nullable | |
| timestamps | |

### 1.24 `pos_notes`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| user_id | FK → users | privat per kasir |
| outlet_id | FK → outlets | |
| title | string | |
| content | text | |
| color | string default 'yellow' | warna sticky note |
| timestamps | |

### 1.25 `outlet_settings`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint PK | |
| outlet_id | FK → outlets unique | 1 baris per outlet |
| packaging_fee_per_item | integer default 0 | |
| hide_bundle_detail_on_receipt | boolean default false | |
| combine_qty_on_receipt | boolean default true | |
| block_price_below_cost | boolean default false | |
| hide_split_bill | boolean default false | |
| queue_number_enabled | boolean default false | |
| notification_sound | boolean default true | |
| notification_browser_popup | boolean default true | |
| notification_tab_counter | boolean default true | |
| notification_toast | boolean default true | |
| timestamps | |

---

## 2. Ringkasan Relasi

```
outlets 1—M users
outlets 1—M categories, products, tables, coupons, payment_methods, orders, stock_opnames
outlets 1—1 outlet_settings

categories 1—M categories (self, parent_id)
categories 1—M products

products 1—M product_images
products M—M addon_groups (via product_addon_group)
products M—M product_bundles (via product_bundle_items, dengan qty)
products 1—M stock_movements, price_histories

addon_groups 1—M addon_options

orders M—1 tables (nullable)
orders M—1 users (cashier_id, nullable)
orders M—1 coupons (nullable)
orders 1—M order_items 1—M order_item_addons
orders 1—M payments M—1 payment_methods
orders 1—M returns 1—M return_items → order_items

stock_opnames 1—M stock_opname_items → products

users 1—M pos_notes
```

---

## 3. Prompt Bertahap untuk Agent Antigravity

Paste satu per satu ke chat Agent, tunggu sampai selesai (migration jalan tanpa error) sebelum lanjut ke stage berikutnya. Ganti nama project/namespace jika berbeda dari asumsi (Laravel default `App\Models`).

### STAGE 1 — Outlet, User & Role

```
Saya sedang membangun backend Laravel untuk sistem POS bernama "Pawon Hepi".
Tolong buatkan migration, model, dan seeder untuk bagian dasar berikut:

1. Migration `outlets`:
   - id, name (string), address (text nullable), phone (string nullable),
     email (string nullable), npwp (string nullable), logo_path (string nullable),
     is_active (boolean default true), timestamps

2. Modifikasi migration `users` yang sudah ada (jangan buat tabel baru, tambahkan kolom):
   - outlet_id (foreignId nullable, constrained ke outlets, nullOnDelete)
   - role (enum: 'super_admin', 'staff_pos_senior')
   - phone (string nullable)
   - avatar_path (string nullable)
   - is_active (boolean default true)
   - last_login_at (timestamp nullable)
   - tambahkan soft deletes

3. Buatkan Model Outlet dan update Model User dengan relasi:
   - Outlet hasMany User
   - User belongsTo Outlet
   - tambahkan scope/helper isSuperAdmin() dan isStaffPosSenior() di Model User

4. Buatkan seeder OutletSeeder yang membuat 1 outlet "Pawon Hepi" dengan alamat
   "Jl. Kaliurang KM 14 Gg Banteng Tegalsari Umbulmartani, Sleman, Yogyakarta".

5. Buatkan seeder UserSeeder yang membuat 2 user:
   - Super Admin: nama "Superadmin Pawon Hepi", email superadmin@pawonhepi.com,
     password "password", role super_admin, outlet_id ke outlet Pawon Hepi
   - Staff POS Senior: nama "Kasir Pawon Hepi", email pos.senior@pawonhepi.com,
     password "password", role staff_pos_senior, outlet_id ke outlet Pawon Hepi

Jalankan migration dan seeder setelah selesai, lalu tunjukkan hasil php artisan migrate:fresh --seed nya.
```

### STAGE 2 — Katalog Produk (Kategori, Produk, Bundle, Addon)

```
Lanjutkan project Laravel POS Pawon Hepi yang sebelumnya sudah punya tabel outlets & users.
Sekarang buatkan migration + model untuk katalog produk berikut, lengkap dengan foreign key ke outlets:

1. categories: id, outlet_id (FK), parent_id (FK nullable, self-reference ke categories,
   nullOnDelete), name, slug, description (text nullable), image_path (string nullable),
   kitchen_print_type (enum: 'dapur','bar','none' default 'none'), is_active (boolean default true),
   sort_order (integer default 0), timestamps

2. products: id, outlet_id (FK), category_id (FK nullable), name, slug, sku (string nullable unique),
   barcode (string nullable), description (text nullable), main_image_path (string nullable),
   cost_price (integer default 0), sell_price (integer), track_stock (boolean default true),
   stock (integer default 0), min_stock (integer default 0), loyalty_points_per_unit (integer default 0),
   is_active (boolean default true), show_in_pos (boolean default true),
   is_new (boolean default false), is_popular (boolean default false),
   is_on_sale (boolean default false), sale_price (integer nullable),
   is_preorder (boolean default false),
   created_by (FK ke users nullable), updated_by (FK ke users nullable),
   timestamps, soft deletes

3. product_images: id, product_id (FK), path (string), sort_order (integer default 0), timestamps

4. product_bundles: id, outlet_id (FK), name, sku (string nullable), cost_price (integer default 0),
   sell_price (integer), is_active (boolean default true), timestamps, soft deletes

5. product_bundle_items: id, product_bundle_id (FK), product_id (FK), qty (integer default 1), timestamps

6. addon_groups: id, outlet_id (FK), name, is_required (boolean default false),
   is_multiple (boolean default false), sort_order (integer default 0), timestamps

7. addon_options: id, addon_group_id (FK), name, extra_price (integer default 0),
   is_active (boolean default true), sort_order (integer default 0), timestamps

8. product_addon_group (pivot): id, product_id (FK), addon_group_id (FK)

Buatkan juga semua Model Eloquent-nya dengan relasi lengkap:
- Category: belongsTo parent (self), hasMany children (self), hasMany products
- Product: belongsTo category, hasMany productImages, belongsToMany addonGroups
  (via product_addon_group), belongsToMany productBundles (via product_bundle_items)
  dengan withPivot('qty'), hasMany stockMovements (siapkan relasi meski tabelnya
  dibuat di stage berikutnya)
- ProductBundle: belongsToMany products (via product_bundle_items) dengan withPivot('qty')
- AddonGroup: hasMany addonOptions, belongsToMany products
- AddonOption: belongsTo addonGroup

Tambahkan accessor is_out_of_stock pada Model Product (true jika stock <= 0) dan
scope lowStock() (stock <= min_stock) untuk laporan "Peringatan Sisa Stok" nanti.

Jalankan migration setelah selesai.
```

### STAGE 3 — Meja/Kamar, Kupon, Metode Bayar, Order & Pembayaran

```
Lanjutkan project Laravel POS Pawon Hepi (sudah ada outlets, users, categories, products,
product_bundles, addon_groups). Sekarang buatkan migration + model untuk transaksi:

1. tables: id, outlet_id (FK), name (string), type (enum: 'meja','kamar_kost'),
   qr_token (string unique), is_active (boolean default true), timestamps

2. coupons: id, outlet_id (FK), code (string unique), discount_type (enum: 'percentage','fixed'),
   discount_value (integer), min_purchase (integer default 0), max_discount (integer nullable),
   valid_from (date nullable), valid_until (date nullable), usage_limit (integer nullable),
   used_count (integer default 0), is_active (boolean default true), timestamps

3. payment_methods: id, outlet_id (FK), name (string), type (enum: 'tunai','qris','debit',
   'ewallet','transfer'), account_number (string nullable), is_active (boolean default true),
   sort_order (integer default 0), timestamps

4. orders: id, outlet_id (FK), order_number (string unique), order_type
   (enum: 'dine_in','take_away','qr_table','qr_room'), source (enum: 'pos','self_order'),
   table_id (FK nullable ke tables), customer_name (string nullable),
   customer_phone (string nullable), cashier_id (FK nullable ke users),
   status (enum: 'pending_confirmation','processing','completed','cancelled'
   default 'pending_confirmation'),
   payment_status (enum: 'unpaid','partial','paid' default 'unpaid'),
   subtotal (integer default 0), discount_amount (integer default 0),
   coupon_id (FK nullable ke coupons), tax_amount (integer default 0),
   service_fee_amount (integer default 0), packaging_fee_amount (integer default 0),
   total_amount (integer default 0), down_payment_amount (integer default 0),
   paid_amount (integer default 0), due_date (date nullable), cogs_amount (integer default 0),
   notes (text nullable), confirmed_at, completed_at, cancelled_at (timestamp nullable semua),
   timestamps

5. order_items: id, order_id (FK), item_type (enum: 'product','bundle'),
   product_id (FK nullable), product_bundle_id (FK nullable), item_name (string),
   unit_price (integer), qty (integer), addon_total (integer default 0),
   note (string nullable), subtotal (integer), timestamps

6. order_item_addons: id, order_item_id (FK), addon_option_id (FK nullable),
   addon_name (string), addon_price (integer), timestamps

7. payments: id, order_id (FK), payment_method_id (FK), amount (integer),
   reference_no (string nullable), received_by (FK nullable ke users),
   paid_at (timestamp), timestamps

8. returns: id, order_id (FK), return_number (string unique), reason (string nullable),
   refund_amount (integer), processed_by (FK nullable ke users), timestamps

9. return_items: id, return_id (FK), order_item_id (FK), qty (integer), amount (integer), timestamps

Buatkan Model Eloquent lengkap dengan relasi:
- Table: belongsTo outlet, hasMany orders
- Coupon: hasMany orders
- PaymentMethod: hasMany payments
- Order: belongsTo outlet, table, cashier (User), coupon; hasMany orderItems, payments, returns
- OrderItem: belongsTo order, product, productBundle; hasMany orderItemAddons
- OrderItemAddon: belongsTo orderItem, addonOption
- Payment: belongsTo order, paymentMethod, receivedBy (User)
- ProductReturn (nama model untuk tabel returns, karena "Return" reserved-ish):
  belongsTo order, processedBy (User); hasMany returnItems
- ReturnItem: belongsTo return (ProductReturn), orderItem

Tambahkan:
- accessor remaining_amount di Model Order = total_amount - paid_amount (untuk kolom "Sisa Bayar")
- static method generateOrderNumber() di Model Order yang menghasilkan format
  ORD-YYYYMMDD-XXXX (XXXX = urutan reset harian, 4 digit, dimulai 0001)
- static method generateReturnNumber() di Model ProductReturn dengan format
  RET-YYYYMMDD-XXXX dengan pola sama

Jalankan migration setelah selesai.
```

### STAGE 4 — Inventori (Stok, Opname, Riwayat Harga)

```
Lanjutkan project Laravel POS Pawon Hepi (sudah ada products, orders, returns).
Buatkan migration + model untuk manajemen inventori:

1. stock_movements: id, outlet_id (FK), product_id (FK), type (enum: 'stok_masuk',
   'stok_keluar','koreksi','penjualan','pengembalian','opname_adjustment'),
   qty_change (integer, bisa negatif), stock_before (integer), stock_after (integer),
   note (text nullable), reference_type (string nullable), reference_id (unsignedBigInteger nullable),
   created_by (FK nullable ke users), timestamps

2. stock_opnames: id, outlet_id (FK), opname_date (date), note (text nullable),
   status (enum: 'draft','completed' default 'draft'), created_by (FK nullable ke users), timestamps

3. stock_opname_items: id, stock_opname_id (FK), product_id (FK), system_qty (integer),
   physical_qty (integer nullable), difference (integer nullable), note (string nullable), timestamps

4. price_histories: id, product_id (FK), old_cost_price (integer), new_cost_price (integer),
   old_sell_price (integer), new_sell_price (integer), changed_by (FK nullable ke users), timestamps

Buatkan Model Eloquent lengkap:
- StockMovement: belongsTo outlet, product, createdBy (User); tambahkan relasi
  morphTo() bernama reference untuk reference_type/reference_id
- StockOpname: belongsTo outlet, createdBy (User); hasMany stockOpnameItems
- StockOpnameItem: belongsTo stockOpname, product
- PriceHistory: belongsTo product, changedBy (User)

Tambahkan juga sebuah Service class app/Services/StockService.php dengan method:
- adjustStock(Product $product, string $type, int $qtyChange, ?string $note = null,
  ?Model $reference = null, ?int $userId = null): void
  → method ini mengupdate stock di tabel products DAN mencatat baris baru di
  stock_movements (stock_before diambil dari stock produk sebelum diubah,
  stock_after sesudah diubah). Gunakan DB transaction supaya konsisten.

Jalankan migration setelah selesai.
```

### STAGE 5 — Operasional (Catatan Kasir & Pengaturan Outlet)

```
Lanjutkan project Laravel POS Pawon Hepi. Buatkan migration + model terakhir:

1. pos_notes: id, user_id (FK ke users), outlet_id (FK ke outlets), title (string),
   content (text), color (string default 'yellow'), timestamps

2. outlet_settings: id, outlet_id (FK unique ke outlets), packaging_fee_per_item (integer default 0),
   hide_bundle_detail_on_receipt (boolean default false), combine_qty_on_receipt (boolean default true),
   block_price_below_cost (boolean default false), hide_split_bill (boolean default false),
   queue_number_enabled (boolean default false), notification_sound (boolean default true),
   notification_browser_popup (boolean default true), notification_tab_counter (boolean default true),
   notification_toast (boolean default true), timestamps

Buatkan Model:
- PosNote: belongsTo user, outlet
- OutletSetting: belongsTo outlet

Tambahkan relasi hasOne outletSetting dan hasMany posNotes di Model Outlet.
Tambahkan di OutletSeeder (yang sudah dibuat di Stage 1): setelah outlet dibuat,
otomatis buatkan 1 baris outlet_settings default untuk outlet tersebut.

Jalankan migration setelah selesai.
```

### STAGE 6 — Seeder Data Dummy untuk Testing Frontend

```
Lanjutkan project Laravel POS Pawon Hepi yang sekarang sudah lengkap semua tabelnya
(outlets, users, categories, products, product_bundles, addon_groups, addon_options,
tables, coupons, payment_methods, orders, order_items, payments, dst).

Buatkan seeder tambahan berikut agar frontend punya data realistis untuk ditest:

1. CategorySeeder: buat kategori "Makanan Utama", "Makanan Pendamping", "Minuman",
   "Sefood", "Cemilan" untuk outlet Pawon Hepi.

2. PaymentMethodSeeder: buat 3 metode bayar untuk outlet Pawon Hepi:
   Cash (tunai), QRIS (qris), BCA (debit).

3. TableSeeder: buat 10 "Meja" (Meja 1 - Meja 10) dan 5 "Kamar Kost" (Kamar 1 - Kamar 5)
   untuk outlet Pawon Hepi, masing-masing dengan qr_token unik (pakai Str::random(12)).

4. ProductSeeder: buat minimal 15 produk contoh tersebar di kategori-kategori di atas,
   dengan variasi harga beli/jual, stok, dan beberapa produk ditandai is_new/is_popular/is_on_sale.

5. Pastikan semua seeder di atas dipanggil dari DatabaseSeeder dalam urutan yang benar
   (outlets & users dulu, baru categories, payment_methods, tables, products).

Jalankan php artisan migrate:fresh --seed di akhir dan tunjukkan hasilnya, pastikan
tidak ada error foreign key.
```

---

## 4. Catatan Penting Sebelum Mulai

- **Semua nominal uang** disimpan sebagai `integer` (rupiah bulat), bukan `decimal`, supaya tidak ada masalah pembulatan floating point saat kalkulasi total.
- **Role hanya 2** sesuai kebutuhanmu (`super_admin`, `staff_pos_senior`). Kalau nanti perlu role tambahan (misalnya "Supervisor" yang terlihat di dropdown salah satu screenshot), tinggal tambah value di enum `role` — tidak perlu redesain tabel.
- **Soft delete** dipakai di `products`, `product_bundles`, `users` supaya laporan "Produk Dihapus" bisa jalan tanpa kehilangan riwayat transaksi lama yang mereferensikan produk tersebut.
- **Snapshot data** di `order_items` dan `order_item_addons` (nama & harga disalin saat transaksi) itu penting — supaya kalau harga produk berubah di kemudian hari, laporan transaksi lama tidak ikut berubah.
- Setelah Stage 1–6 selesai dan migration berhasil, baru mulai bangun frontend supaya struktur data sudah pasti dan tidak berubah-ubah di tengah jalan.
