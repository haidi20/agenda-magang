<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon ;

class ProyekSeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('proyek')->truncate();
        $namaProyek = ['tidak ada','aplikasi rumah sakit','aplikasi kependudukan','aplikasi apoteker','aplikasi kepegawaian'];
        $proyek = [] ;
        for ($i=1; $i<=5 ; $i++){
          $proyek[]=[
            'kode_proyek'  => 'PR'.$i,
            'nm_proyek'    => $namaProyek[$i-1],
            'created_at'   => new DateTime(),
            'updated_at'   => new DateTime(),
          ];
        }
        DB::table('proyek')->insert($proyek);

    }
}
