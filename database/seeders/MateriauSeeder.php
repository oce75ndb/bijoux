<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Materiau;
class MateriauSeeder extends Seeder
{
    public function run()
    {
        Materiau::create(['materiau' => 'Or']);
        Materiau::create(['materiau' => 'Argent']);
        Materiau::create(['materiau' => 'Pierre']);
        Materiau::create(['materiau' => 'Acier']);

    }
}

