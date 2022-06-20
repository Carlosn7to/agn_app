<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormAnswer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'forms_answers';
    protected $fillable = ['status_id', 'answer', 'form_id', 'question_id', 'user_id', 'created_at', 'updated_at'];

    public function questions()
    {
        return $this->belongsTo(FormQuestion::class, 'id');
    }
}
