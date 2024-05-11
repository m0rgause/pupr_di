<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';

    protected $fillable = ['web_profile_id', 'nama', 'username', 'password', 'created_at', 'updated_at'];

    public function webProfile()
    {
        return $this->belongsTo(WebProfile::class);
    }
}
