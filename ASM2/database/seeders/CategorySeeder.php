<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Cham soc da',
                'description' => 'Serum, toner va kem duong cho chu trinh duong da sang nhe.',
            ],
            [
                'name' => 'Chong nang',
                'description' => 'Cac dong kem chong nang de dung moi ngay va nhin dep duoi nen makeup.',
            ],
            [
                'name' => 'Trang diem',
                'description' => 'Son moi, cushion va makeup essentials cho giao dien trong treo.',
            ],
            [
                'name' => 'Cham soc co the',
                'description' => 'Sua tam, body lotion va nhung mon giup lan da mem min hon.',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['name' => $category['name']],
                ['description' => $category['description']]
            );
        }
    }
}
