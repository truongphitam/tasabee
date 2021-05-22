<?php

use Illuminate\Database\Seeder;
use App\Models\Admins;

class AdminsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admins = [
            [
                'name' => 'Trương Phi Tâm',
                'email' => 'tamphitruong@gmail.com',
                'password' => bcrypt("#2017#"),
                'first_name' => 'Trương',
                'last_name' => 'Tâm',
                'website' => '#',
                'phone' => '0979322855',
                'address' => '0979322855',
                'role' => 'administrator',
                'image' => '/assets/admin/1200x630.png',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt("#2017#"),
                'first_name' => 'Admin',
                'last_name' => '',
                'website' => '#',
                'phone' => '0979322855',
                'address' => '0979322855',
                'role' => 'editor',
                'image' => '/assets/admin/1200x630.png',
            ],
        ];
        foreach ($admins as $key => $value) {
            Admins::create($value);
        }
    }
}
