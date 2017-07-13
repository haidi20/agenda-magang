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
          'tanggal'     => Carbon::now()->format('Y-m-d'),
          'jam_mulai'   => Carbon::now()->toTimeString(),
          'jam_selesai' => Carbon::now()->toTimeString(),
          'keterangan'  => 'mampu'
        ],
        [
          'user_id'     => 2,
          'nm_proyek'  => '-',
          'kegiatan'    => 'cuti',
          'tanggal'     => Carbon::now()->format('Y-m-d'),
          'jam_mulai'   => Carbon::now()->toTimeString(),
          'jam_selesai' => Carbon::now()->toTimeString(),
          'keterangan'  => 'mampu'
        ],
        [
          'user_id'     => 3,
          'nm_proyek'  => '-',
          'kegiatan'    => 'ke rumah sakit',
          'tanggal'     => Carbon::now()->format('Y-m-d'),
          'jam_mulai'   => Carbon::now()->toTimeString(),
          'jam_selesai' => Carbon::now()->toTimeString(),
          'keterangan'  => 'boleh'
        ]
      ]);
    }
}
