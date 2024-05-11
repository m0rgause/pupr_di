<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalAsesmen extends Model
{
  use HasFactory;

  protected $table = 'jadwal_asesmen';

  protected $fillable = ['ruang_asesmen_id', 'asesor', 'peserta', 'created_at', 'updated_at'];

  public function ruangAsesmen()
  {
    return $this->belongsTo(RuangAsesmen::class);
  }
}
