<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    public function run(): void
    {
        $tags = config('materials', []);

        foreach ($tags as $tag) {
            Material::updateOrCreate(
                ['name' => $tag['name']],
                ['description' => $tag['description']]
            );
        }
    }
}
