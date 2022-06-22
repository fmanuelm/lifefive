<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Felix Manuel',
            'email' => 'fmanuelm@hotmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $user->assignRole('admin_room_911');
        $user->givePermissionTo('access room 911');
    }
}
