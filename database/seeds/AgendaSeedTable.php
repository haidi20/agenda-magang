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

      // DB::statement('SET FOREIGN_KEY_CHECKS=0');
      // DB::table('agenda')->truncate();
      $agenda = [] ;
      $kegiatan = ['ke rumah sakit','ke puskesmas','ke luar kota'];
      for($i = 1; $i <= 10; $i++){
        $tahun = rand(0,1) ? 2016 : 2017 ;
        $bulan = rand(0,1) ? rand(01,03) : rand(04,05) ;
        $date = date('Y-m-d',strtotime("{$tahun}-{$bulan}-01 + {$i} days")) ;
        $agenda[] = [
          'user_id'     => rand(2,3) ,
          'nm_proyek'   => '-',
          'kegiatan'    => $kegiatan[rand(0,2)],
          'tanggal'     => $date,
          'jam_mulai'   => Carbon::now()->toTimeString(),
          'jam_selesai' => Carbon::now()->toTimeString(),
          'keterangan'  => 'boleh'
        ];
      }

      DB::table('agenda')->insert($agenda);

      // DB::table('agenda')->insert([
      //   [
      //     'user_id'     => 2,
      //     'nm_proyek'  => '-',
      //     'kegiatan'    => 'cuti',
      //     'tanggal'     => Carbon::now()->format('Y-m-d'),
      //     'jam_mulai'   => Carbon::now()->toTimeString(),
      //     'jam_selesai' => Carbon::now()->toTimeString(),
      //     'keterangan'  => 'mampu'
      //   ],
      //   [
      //     'user_id'     => 2,
      //     'nm_proyek'  => '-',
      //     'kegiatan'    => 'cuti',
      //     'tanggal'     => Carbon::now()->format('Y-m-d'),
      //     'jam_mulai'   => Carbon::now()->toTimeString(),
      //     'jam_selesai' => Carbon::now()->toTimeString(),
      //     'keterangan'  => 'mampu'
      //   ],
      //   [
      //     'user_id'     => 3,
      //     'nm_proyek'  => '-',
      //     'kegiatan'    => 'ke rumah sakit',
      //     'tanggal'     => Carbon::now()->format('Y-m-d'),
      //     'jam_mulai'   => Carbon::now()->toTimeString(),
      //     'jam_selesai' => Carbon::now()->toTimeString(),
      //     'keterangan'  => 'boleh'
      //   ]
      // ]);
    }
}
