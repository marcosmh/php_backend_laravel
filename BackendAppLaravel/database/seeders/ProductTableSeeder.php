<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryIds = DB::table("category")->pluck("id")->toArray();

        if(empty($categoryIds)) {
            $this->command->warn("No hay categorias en la tabla category.");
            return;
        }

        $products = [];

        for($i=1; $i<= 50; $i++) {
            $products[] = [
                'name' => 'Producto ' . $i,
                'description' => 'Descripcion del Producto ' . $i,
                'price' => rand(100,1000),
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'created_at' => now(),
                'updated_at' => now()

            ];

        }

        DB::table('product')->insert($products);


    }
}
