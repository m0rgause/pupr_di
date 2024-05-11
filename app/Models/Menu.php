<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  use HasFactory;

  protected $table = 'menu';

  protected $fillable = ['lantai_id', 'menu', 'menu_slug', 'video', 'is_desc', 'title_desc', 'body_desc'];

  public $timestamps = false;

  public function lantai()
  {
    return $this->belongsTo(Lantai::class);
  }
}
