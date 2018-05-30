<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $date = Carbon::now();

      DB::table('users')->insert(['name' => 'Bayu Bimantara', 'email' => 'bayubimantarar@gmail.com', 'password' => bcrypt('123'), 'created_at' => $date]);
    }
}
