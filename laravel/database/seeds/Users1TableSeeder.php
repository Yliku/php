<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => str_random(3),	//随机生成3个字符串
        //     'email' => str_random(3).'@gmail.com',
        //     'password' => bcrypt('secret'),
        // ]);
        factory(App\User1::class, 2)->create()->each(function ($user) {
            $user->posts()->save(factory(App\Post::class)->make());
        });       
    }
}
