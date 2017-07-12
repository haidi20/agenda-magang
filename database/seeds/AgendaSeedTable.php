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
          'nm_proyek'  => '-',
          'kegiatan'    => 'cuti',
          'tanggal'     => Carbon::now()->format('Y-M-d'),
          'jam_mulai'   => Carbon::now()->toTimeString(),
          'jam_selesai' => Carbon::now()->toTimeString(),
          'keterangan'  => 'mampu' ,
        ],
        [
          'user_id'     => 2,
          'nm_proyek'  => '-',
          'kegiatan'    => 'istirahat',
          'tanggal'     => Carbon::now()->format('Y-M-d'),
          'jam_mulai'   => Carbon::now()->toTimeString(),
          'jam_selesai' => Carbon::now()->toTimeString(),
          'keterangan'  => 'boleh' ,
        ]
      ]);
    }
}
