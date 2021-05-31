<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User();
        $user->first_name='Nipuna';
        $user->last_name='Theekshana';
        $user->mobile ='94765328974';
        $user->email='nipunatheekshana8@gmail.com';
        $user->gender='male';
        $user->camp_id ='1';
        $user->role='student';
        $user->password='1';
        $user->save();
    }
}
