<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\hash;

class usuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $useradmin=User::create([
            'name' => 'admin Jorge',
            'email' => 'admin@gmail.com',
            'password' => hash::make('adminLeonardo'),
        ]);
    }
}
