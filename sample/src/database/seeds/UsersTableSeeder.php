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

    #管理者
    \App\User::create([
      'name' => 'admin',
      'email' => 'admin@example.com',
      'password' => bcrypt('1111aaaa'),
      'role' => 1
    ]);


    // user
    \App\User::create([
      'name' => 'user',
      'email' => 'user@example.com',
      'password' => bcrypt('2222bbbb'),
      'role' => 0
    ]);
  }
}
