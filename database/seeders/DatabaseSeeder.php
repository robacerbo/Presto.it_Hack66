<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
    * Seed the application's database.
    */
    public function run(): void
    {
        $categories = [
            ["Motori","Motors","Motores"],
            ["Informatica","Computer Science","Informática"],
            ["Console e videogiochi","Consoles and Video Games","Consolas y videojuegos"],
            ["Fotografia","Photography","Fotografía"],
            ["Telefonia","Telephony","Telefonía"],
            ["Elettrodomestici","Household Appliances","Electrodomésticos"],
            ["Abbigliamento e accessori","Clothing and Accessories","Ropa y accesorios"],
            ["Musica e Film","Music and Movies","Música y Películas"],
            ["Sports","Sports","Deportes"],
            ["Giardino e Fai da te","Garden and DIY","Jardín y bricolaje"],
        ];

        // $existingCategories = Category::all();
        
        foreach ($categories as $category){
            DB::table('categories')->insert([
                "type" => $category[0],
                "eng" => $category[1],
                "esp" => $category[2],
            ]);
        }

        // SEED PER USER REVISOR 

        // User::create([
        //     'name' => 'revisor',
        //     'is_revisor' => 1,
        //     'email' => 'revisor@revisor.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('12345678'),
        //     'remember_token' => Str::random(10),
        // ]);
    }
      
}
