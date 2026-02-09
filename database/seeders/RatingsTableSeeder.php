<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ratingRecords = [
            ['id'=>1,'user_id'=>1,'room_id'=>1,'review'=>'Very good product','rating'=>4,'status'=>0],
            ['id'=>1,'user_id'=>2,'room_id'=>2,'review'=>'excellent product','rating'=>5,'status'=>0],
            ['id'=>1,'user_id'=>2,'room_id'=>1,'review'=>'Product is not good at all','rating'=>1,'status'=>0],
        ];
        Rating::insert($ratingRecords);
    }
}
