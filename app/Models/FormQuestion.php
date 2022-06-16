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

    public function form()
    {
        return $this->belongsTo(Form::class, 'id');
    }

    public function answers()
    {
        return $this->hasMany(FormAnswer::class, 'question_id');
    }
}
