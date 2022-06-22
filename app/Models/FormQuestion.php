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
        return $this->hasMany(FormAnswer::class, 'question_id')->where('status_id', 1);
    }

    public function answers_user()
    {
        return $this->hasMany(FormSubmittedAnswer::class, 'question_id')->select('id', 'question_id', 'answer', 'user_id');
    }
}
