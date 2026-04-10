<?php

namespace Database\Seeders;

use App\Models\Tin;
use Illuminate\Database\Seeder;

class TinSeeder extends Seeder
{
    public function run(): void
    {
        Tin::firstOrCreate(
            ['TieuDe' => 'Tin mẫu cho Lab 5'],
            [
                'TomTat' => 'Bản ghi mẫu để kiểm tra chức năng thêm, sửa, xóa bằng Eloquent ORM.',
                'Content' => 'Bản ghi mẫu.',
                'urlHinh' => 'https://images.unsplash.com/photo-1495020689067-958852a7765e?auto=format&fit=crop&w=800&q=80',
                'Ngay' => now(),
                'idLT' => 1,
                'idTL' => 1,
                'SoLanXem' => 0,
                'TinNoiBat' => false,
                'AnHien' => true,
            ]
        );
    }
}
