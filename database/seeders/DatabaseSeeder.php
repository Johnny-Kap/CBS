<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Johnny',
            'email' => 'admincbs@admin.com',
            'password' => Hash::make('cbs@admin!'),
            'profession' => 'Dev', 
            'tel' => '667654455', 
            'adresse' => 'Odza', 
            'numero_cni' => '00034332', 
            'date_delivrance_cni' => '17/04/2017', 
            'role' => 'admin',
            'created_at' => Carbon::now()->format('Y-m-d H:i'),
        ]);
    }
}
