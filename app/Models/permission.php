<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    use HasFactory;

    protected $fillable =  ["name","description"];

    public function profiles() {
        return $this->belongsToMany(profile::class);
    }
}
