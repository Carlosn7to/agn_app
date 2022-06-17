<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Occupation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "occupations";

    public function users()
    {
        return $this->belongsTo(User::class, 'occupation_id');
    }
}
