<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' =>'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'created_at' => Carbon::now(),
        ];
        DB::table('users')->insert($data);
    }
}
