<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Token;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Token::factory()->count(5)->create();
        Token::factory()->count(10)->has(Tag::factory()->count(5))->create();
        Token::factory()->count(10)->has(Tag::factory()->count(2))->create();
        Token::factory()->count(10)->has(Tag::factory()->count(3))->create();
    }
}
