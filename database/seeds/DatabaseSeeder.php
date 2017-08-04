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
        $this->call(UsersSeedTable::class);
        $this->call(ProyekSeedTable::class);
        $this->call(AgendaSeedTable::class);
    }
}
