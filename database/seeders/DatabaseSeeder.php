<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Character;
use App\Models\Manga;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::create(['name' => 'Shôjo']);
        $shonen = Category::create(['name' => 'Shônen']);
        $seinen = Category::create(['name' => 'Seinen']);

        $attackOnTitan = Manga::create([
            'name' => 'Attack on titan',
            'slug' => 'attack_on_titan',
            'category_id' => $seinen->id
        ]);

        $onePiece = Manga::create([
            'name' => 'One Piece',
            'slug' => 'one_piece',
            'category_id' => $shonen->id
        ]);

        Character::create([
            'name' => 'Eren Jäger',
            'slug' => 'eren_jager',
            'super_power' => true,
            'manga_id' => $attackOnTitan->id
        ]);

        Character::create([
            'name' => 'Monkey D Luffy',
            'slug' => 'monkey_d_luffy',
            'super_power' => true,
            'manga_id' => $onePiece->id
        ]);

        Character::create([
            'name' => 'Roronoa Zoro',
            'slug' => 'roronoa_zoro',
            'super_power' => false,
            'manga_id' => $onePiece->id
        ]);
    }
}
