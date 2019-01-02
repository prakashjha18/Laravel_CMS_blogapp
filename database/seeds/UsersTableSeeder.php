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
        $user = App\User::create([
            'name' => 'prakash jha',
            'email'=> 'pjha@gmail.com',
            'password' => bcrypt('qwerty'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar'  => 'uploads/avatars/1.png',
            'about'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam fugiat modi corrupti, omnis impedit esse possimus dolorum consectetur facere accusamus consequatur nesciunt ea odit libero doloremque repudiandae optio nam? Facere.',
            'facebook'=> 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
