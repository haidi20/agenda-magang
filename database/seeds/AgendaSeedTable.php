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
      for($i = 1; $i <= 15; $i++){
        $tahun = rand(0,1) ? 2016 : 2017 ;
        $bulan = rand(0,1) ? rand(01,03) : rand(04,05) ;
        $date = date('Y-m-d',strtotime("{$tahun}-{$bulan}-01 + {$i} days")) ;
        $agenda[] = [
          'user_id'     => rand(2,4),
          'proyek_id'   => rand(1,4),
          'kegiatan'    => $kegiatan[rand(0,2)],
          'jam_mulai'   => $date .' '. Carbon::now()->format('h:i:s'),
          'jam_selesai' => $date .' '. Carbon::now()->format('h:i:s'),
          'keterangan'  => 'boleh'
        ];
      }
      DB::table('agenda')->insert($agenda);
    }
}
