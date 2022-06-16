<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Icon extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'icons';

    public function forms()
    {
        return $this->hasOne(Form::class, 'icon_id');
    }
}
