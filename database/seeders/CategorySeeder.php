<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'     => 'Rak',
            'slug'    => 'rak',
            'image'    => 'rak.jpg',
        ]);
        Category::create([
            'name'     => 'Sofa',
            'slug'    => 'sofa',
            'image'    => 'sofa.jpg',
        ]);
        Category::create([
            'name'     => 'Meja TV',
            'slug'    => 'meja-tv',
            'image'    => 'mejatv.jpg',
        ]);
        Category::create([
            'name'     => 'Bedside',
            'slug'    => 'bedside',
            'image'    => 'bedside.jpg',
        ]);
        Category::create([
            'name'     => 'Kursi',
            'slug'    => 'kursi',
            'image'    => 'kursi.jpg',
        ]);
        Category::create([
            'name'     => 'Kasur',
            'slug'    => 'kasur',
            'image'    => 'kasur.jpg',
        ]);
        Category::create([
            'name'     => 'Cermin',
            'slug'    => 'cermin',
            'image'    => 'cermin.jpg',
        ]);
        Category::create([
            'name'     => 'Meja Tamu',
            'slug'    => 'meja-tamu',
            'image'    => 'mejatamu.jpg',
        ]);
        Category::create([
            'name'     => 'Sofa Bed',
            'slug'    => 'sofa-bed',
            'image'    => 'sofabed.jpg',
        ]);
/*        Category::create([
            'name'     => 'Kursi Bar',
            'slug'    => 'kursi-bar',
            'image'    => 'kursibar.jpg',
        ]);*/
        Category::create([
            'name'     => 'Vas',
            'slug'    => 'vas',
            'image'    => 'vas.jpg',
        ]);
        Category::create([
            'name'     => 'Lampu Hias',
            'slug'    => 'lampu-hias',
            'image'    => 'lampuhias.jpg',
        ]);
    }
}
