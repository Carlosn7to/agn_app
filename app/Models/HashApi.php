<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HashApi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'hash_apis';
    protected $fillable = ['status_id', 'hash'];
}
