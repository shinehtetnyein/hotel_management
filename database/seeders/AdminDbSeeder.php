<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminDbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::factory()->create([
            'first_name'=>'Shine',
            'last_name'=>'Htet',
            'email'=>'shine@gmail.com',
            'password'=>Hash::make('123456')
        ]);
    }
}
