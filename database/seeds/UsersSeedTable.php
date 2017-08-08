<?php

use Illuminate\Database\Seeder;


class UsersSeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::statement('SET FOREIGN_KEY_CHECKS=0');
      DB::table('users')->truncate();
      DB::table('users')->insert([
        [
          'name'            => 'admin',
          'email'           => 'admin@admin.com',
          'password'        => bcrypt('admin'),
          'level'           => 'admin',
          'jabatan'         => 'ketua',
          'remember_token'  => str_random(20),
          'created_at'      => new DateTime(),
        ],
        [
          'name'            => 'user',
          'email'           => 'user@user.com',
          'password'        => bcrypt('user'),
          'level'           => 'user',
          'jabatan'         => 'anggota',
          'remember_token'  => str_random(20),
          'created_at'      => new DateTime(),
        ],
        [
          'name'            => 'keren',
          'email'           => 'keren@keren.com',
          'password'        => bcrypt('keren'),
          'level'           => 'user',
          'jabatan'         => 'anggota',
          'remember_token'  => str_random(20),
          'created_at'      => new DateTime(),
        ],
        [
          'name'            => 'mantab',
          'email'           => 'mantab@mantab.com',
          'password'        => bcrypt('mantab'),
          'level'           => 'user',
          'jabatan'         => 'anggota',
          'remember_token'  => str_random(20),
          'created_at'      => new DateTime(),
        ]
      ]);
    }
}
