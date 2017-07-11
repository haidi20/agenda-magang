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

      DB::table('users')->insert([
        [
          'name'      => 'admin',
          'email'     => 'admin@admin.com',
          'password'  => bcrypt('admin'),
          'level'     => 'admin',
          'jabatan'   => 'ketua',
        ],
        [
          'name'      => 'user',
          'email'     => 'user@user.com',
          'password'  => bcrypt('user'),
          'level'     => 'admin',
          'jabatan'   => 'anggota',
        ]
      ]);
    }
}
