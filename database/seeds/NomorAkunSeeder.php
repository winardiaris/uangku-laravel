<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;
class NomorAkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $file = public_path().'/datas/data_nomor_akun.csv';
      $csv = Reader::createFromPath($file);
      $nbInsert = $csv->each(function ($row){
              if(empty($row)) return false;

              return  \DB::table('nomor_akun')->insert(
                array(
                  'nomor_akun' => $row[0],
                  'sub' => $row[1],
                  'nama_akun' => $row[2],
                )
              );
      });
    }
}
