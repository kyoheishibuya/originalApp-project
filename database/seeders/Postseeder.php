<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Postseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      \App\Models\Post::create([
          'title'=>'テスト',
          'body'=>'テストです',
          'user_id'=>2,
      ]);
    }
}
