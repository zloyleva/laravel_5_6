<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        factory(User::class)->create(['name'=>'admin', 'email'=>'admin@test.com','password' => bcrypt('123456')]);
        factory(User::class,10)->create();

        factory(User::class)->create([
            'email' => 'admin@test.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
