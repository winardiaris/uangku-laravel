<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';
    protected $fillable = [
      'tipe',
      'voucher',
      'tanggal',
      'jumlah',
      'orang',
      'bukti',
      'bukti_gambar',
      'keterangan',
      'sumber_dana_id',
      'nomor_akun_id',
      'program_id',
      'users_id',

    ];
}
