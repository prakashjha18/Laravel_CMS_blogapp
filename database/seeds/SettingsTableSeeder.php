<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name' => "laravels's blog",
            'address'   => 'India, Mumbai',
            'Contact_number' => '90225 30541',
            'contact_email'  => 'prkjha25@gmail.com'
        ]);
    }
}
