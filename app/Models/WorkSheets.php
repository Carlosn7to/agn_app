<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkSheets extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['status_id', 'name', 'form_id', 'user_id'];
    protected $table = 'worksheets';

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id')->select('id', 'email', 'first_name', 'last_name')->where('status_id', 1);
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id')->select('id', 'name');
    }
}
