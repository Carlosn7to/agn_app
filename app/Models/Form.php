<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'forms';
    protected $fillable = ['active', 'name', 'icon_id', 'user_id', 'created_at', 'updated_at', 'deleted_at'];

    public function questions()
    {
        return $this->hasMany(FormQuestion::class, 'form_id');
    }

    public function icons()
    {
        return $this->hasOne(Icon::class, 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
