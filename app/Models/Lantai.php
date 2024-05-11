<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lantai extends Model
{
  use HasFactory;

  protected $table = 'lantai';

  protected $fillable = ['lantai'];

  public $timestamps = false;

  public function menus()
  {
    return $this->hasMany(Menu::class);
  }
}
