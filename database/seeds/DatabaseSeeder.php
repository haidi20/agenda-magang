<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->command->info('Unguarding models');
      Model::unguard();

      $tables = [
          'users',
          'agenda',
      ];

      $this->command->info('Truncating existing tables');
      DB::statement('TRUNCATE TABLE ' . implode(',', $tables). ';');
        $this->call(UsersSeedTable::class);
        $this->call(AgendaSeedTable::class);
    }
}
