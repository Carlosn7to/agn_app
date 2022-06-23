<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormSubmittedAnswer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'forms_submitted_answers';
    protected $fillable = ['status_id', 'worksheet_id', 'form_id','form_submitted_id', 'question_id', 'user_id', 'answer'];


    public function users()
    {
        return $this->belongsTo(User::class, 'user_id')->select('id', 'first_name', 'last_name');
    }
}
