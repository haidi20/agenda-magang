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

      // DB::statement('SET FOREIGN_KEY_CHECKS=0');
      // DB::table('users')->truncate();
      Schema::disableForeignKeyConstraints();
      DB::table('users')->truncate();
      Schema::enableForeignKeyConstraints();
      // DB::statement("TRUNCATE TABLE agenda");
      // DB::statement("TRUNCATE TABLE users CASCADE");
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
          'level'     => 'user',
          'jabatan'   => 'anggota',
        ],
        [
          'name'      => 'keren',
          'email'     => 'keren@keren.com',
          'password'  => bcrypt('keren'),
          'level'     => 'keren',
          'jabatan'   => 'anggota',
        ]
      ]);
    }
}
