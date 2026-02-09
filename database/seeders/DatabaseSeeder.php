<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::factory()->create([
            'first_name'=>'Shine',
            'last_name'=>'Nyein',
            'email'=>'shine@gmail.com',
            'password'=>Hash::make('123456'),
            'phone_no'=>'09123456789',
            'location'=>'Yangon'
        ]);
    }
}
