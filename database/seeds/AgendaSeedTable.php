<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon ;
class AgendaSeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('agenda')->insert([
        [
          'user_id'     => 2,
          'nm_project'  => '-',
          'kegiatan'    => 'cuti',
          'tanggal'     => Carbon::now()->format('Y-M-d'),
          'jam_start'   => Carbon::now()->toTimeString(),
          'jam_end'     => Carbon::now()->toTimeString(),
          'keterangan'  => 'mampu' ,
        ]
      ]);
    }
}
