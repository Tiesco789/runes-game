<?php

namespace Database\Seeders;

use App\Models\Rune;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $runes = [
            ['name' => 'Fehu', 'meaning' => 'Riqueza'],
            ['name' => 'Uruz', 'meaning' => 'Força'],
            ['name' => 'Thurisaz', 'meaning' => 'Proteção'],
            ['name' => 'Ansuz', 'meaning' => 'Sabedoria'],
            ['name' => 'Raidho', 'meaning' => 'Viagem'],
            ['name' => 'Kenaz', 'meaning' => 'Fogo'],
            ['name' => 'Gebo', 'meaning' => 'Presente'],
            ['name' => 'Wunjo', 'meaning' => 'Alegria'],
        ];

        foreach ($runes as $rune){
            Rune::create($rune);
        };
    }
}
