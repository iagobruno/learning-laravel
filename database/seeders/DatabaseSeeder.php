<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('products')->truncate();
        // DB::table('users')->truncate();

        $user1 = User::factory()->create();

        Product::factory()->draft()->create([
            'created_by' => $user1->id,
        ]);
        Product::factory()->count(5)->create([
            'created_by' => $user1->id,
        ]);
        Product::factory()->private()->create([
            'created_by' => $user1->id,
        ]);
    }
}
