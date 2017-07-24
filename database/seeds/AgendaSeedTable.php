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
      $agenda   = [] ;
      $kegiatan = ['ke luar kota' , 'meeting bersama client' , 'pergi ke lapangan untuk menganalisa' ];
      $proyek   = ['aplikasi rumah sakit' , 'aplikasi kependudukan' , 'aplikasi apoteker' , 'aplikasi kepegawaian'];
      for($i = 1; $i <= 15; $i++){
        $tahun = rand(0,1) ? 2016 : 2017 ;
        $bulan = rand(0,1) ? rand(01,03) : rand(04,05) ;
        $date = date('Y-m-d',strtotime("{$tahun}-{$bulan}-01 + {$i} days")) ;
        $agenda[] = [
          'user_id'     => rand(1,3),
          'nm_proyek'   => $proyek[rand(0,2)],
          'kegiatan'    => $kegiatan[rand(0,2)],
          'tanggal'     => $date,
          'jam_mulai'   => Carbon::now()->toTimeString(),
          'jam_selesai' => Carbon::now()->toTimeString(),
          'keterangan'  => 'boleh'
        ];
      }
      DB::table('agenda')->insert($agenda);
    }
}
