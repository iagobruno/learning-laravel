<?php

namespace Database\Seeders;

use App\Models\Product;
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
        DB::table('products')->truncate();

        Product::factory()->draft()->create();
        Product::factory()->count(5)->create();
        Product::factory()->private()->create();
    }
}
