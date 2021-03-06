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
    protected $fillable = ['status_id', 'name','description', 'icon_id', 'user_id','worksheet_id', 'created_at', 'updated_at', 'deleted_at'];

    public function questions()
    {
        return $this->hasMany(FormQuestion::class, 'form_id')->where('status_id', 2);
    }

    public function questions_answers()
    {
        return $this->hasMany(FormQuestion::class, 'form_id')->where('status_id', 1)->with('answers');
    }

    public function questions_worksheet()
    {
        return $this->hasMany(FormQuestion::class, 'form_id')->select('id', 'question', 'form_id')->with('answers_user');
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
        return $this->belongsTo(User::class, 'user_id')->select('id', 'email', 'first_name', 'last_name')->where('status_id', 1);
    }


}
