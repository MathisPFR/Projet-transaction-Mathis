<?php

namespace Database\Seeders;

use App\Models\transaction;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        transaction::create([
            'user_id' => 1,  // Exemple d'utilisateur
            'amount' => 100.50,
            'type' => 'revenue',  // 'revenue' ou 'expense'
            'date' => now(),
            'name' => 'mcdo',
        ]);
    }
}
