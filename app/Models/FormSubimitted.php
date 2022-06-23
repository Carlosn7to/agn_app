<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormSubimitted extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'forms_submitted';
    protected $fillable = ['status_id', 'worksheet_id', 'form_id', 'user_id'];

    public function answers()
    {
        return $this->hasMany(FormSubmittedAnswer::class, 'form_submitted_id')->where('status_id', 1)->select('id', 'form_submitted_id', 'question_id', 'answer')->orderBy('question_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id')->select('id', 'first_name', 'last_name');
    }

}
