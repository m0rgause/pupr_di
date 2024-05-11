<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangAsesmen extends Model
{
  use HasFactory;

  protected $table = 'ruang_asesmen';

  protected $fillable = ['nama'];

  public $timestamps = false;

  public function jadwalAsesmen()
  {
    return $this->hasMany(JadwalAsesmen::class);
  }
}
