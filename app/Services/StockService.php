<?php

namespace App\Services;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StockService
{
    public function adjustStock(
        Product $product,
        string $type,
        int $qtyChange,
        ?string $note = null,
        ?Model $reference = null,
        ?int $userId = null
    ): void {
        DB::transaction(function () use ($product, $type, $qtyChange, $note, $reference, $userId) {
            $stockBefore = $product->stock;
            $stockAfter = $stockBefore + $qtyChange;

            $product->update([
                'stock' => $stockAfter
            ]);

            StockMovement::create([
                'outlet_id' => $product->outlet_id,
                'product_id' => $product->id,
                'type' => $type,
                'qty_change' => $qtyChange,
                'stock_before' => $stockBefore,
                'stock_after' => $stockAfter,
                'note' => $note,
                'reference_type' => $reference ? get_class($reference) : null,
                'reference_id' => $reference ? $reference->id : null,
                'created_by' => $userId,
            ]);
        });
    }
}
