<?php

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ( $i=0; $i<10; $i++) {
            $producto = Producto::Create([
                'descripcion' => $faker->company,
                'precio' => $faker->randomDigitNotNull
            ]);
        }
    }
}
