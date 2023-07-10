<?php

namespace Database\Seeders;

use App\Models\Player\PlayerPosition;
use Illuminate\Database\Seeder;

class PlayerPositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Goalkeeper'],
            ['name' => 'Midfielder'],
            ['name' => 'Striker'],
        ];

       PlayerPosition::insert($data);
    }
}
