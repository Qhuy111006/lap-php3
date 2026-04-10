<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $skinCare = Category::where('name', 'Cham soc da')->first();
        $sunCare = Category::where('name', 'Chong nang')->first();
        $makeup = Category::where('name', 'Trang diem')->first();
        $bodyCare = Category::where('name', 'Cham soc co the')->first();

        $products = [
            [
                'name' => 'Serum Phuc Hoi Peptide Glow',
                'category_id' => optional($skinCare)->id,
                'price' => 485000,
                'quantity' => 24,
                'description' => 'Serum ket cau mong nhe, tap trung cap am va giup lan da nhin cang bong hon sau mot dem.',
            ],
            [
                'name' => 'Toner Hoa Hong Velvet Calm',
                'category_id' => optional($skinCare)->id,
                'price' => 315000,
                'quantity' => 18,
                'description' => 'Toner diu da voi cam giac mat nhe, hop cho routine can su mem mai va can bang.',
            ],
            [
                'name' => 'Kem Chong Nang Dew Shield SPF50',
                'category_id' => optional($sunCare)->id,
                'price' => 365000,
                'quantity' => 31,
                'description' => 'Kem chong nang finish am dep, de tan va de layer duoi cushion hoac makeup nhe.',
            ],
            [
                'name' => 'Son Kem Soft Cloud Tint',
                'category_id' => optional($makeup)->id,
                'price' => 259000,
                'quantity' => 42,
                'description' => 'Chat son xop min, len moi mem va cho tong mau rose nude de dung moi ngay.',
            ],
            [
                'name' => 'Cushion Radiant Skin Veil',
                'category_id' => optional($makeup)->id,
                'price' => 529000,
                'quantity' => 15,
                'description' => 'Nen cushion do bong vua du, che phu nhe va giu tong da trong veo suot buoi.',
            ],
            [
                'name' => 'Body Lotion Almond Silk',
                'category_id' => optional($bodyCare)->id,
                'price' => 295000,
                'quantity' => 20,
                'description' => 'Sua duong the body co mui hanh nhan mem, thoa len de tham nhanh va de lai be mat min.',
            ],
        ];

        foreach ($products as $product) {
            if (! $product['category_id']) {
                continue;
            }

            Product::updateOrCreate(
                ['name' => $product['name']],
                [
                    'category_id' => $product['category_id'],
                    'price' => $product['price'],
                    'quantity' => $product['quantity'],
                    'description' => $product['description'],
                ]
            );
        }
    }
}
