<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormQuestion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'forms_questions';
    protected $fillable = ['status_id', 'question', 'force', 'type', 'form_id', 'user_id', 'created_at', 'updated_at'];

    public function form()
    {
        return $this->belongsTo(Form::class, 'id');
    }

    public function answers()
    {
        return $this->hasMany(FormAnswer::class, 'question_id');
    }
}
