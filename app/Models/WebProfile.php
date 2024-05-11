<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebProfile extends Model
{
  use HasFactory;

  protected $table = 'web_profile';

  protected $fillable = ['title', 'instagram', 'facebook', 'youtube', 'whatsapp', 'twitter', 'web', 'logo', 'banner', 'maskot', 'teks'];

  public $timestamps = false;

  public function users()
  {
    return $this->hasMany(User::class);
  }
}
