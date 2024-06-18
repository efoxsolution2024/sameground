<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ([
        'title',
        'description',
        'status',
        'assign',
        'priority',
        'user_id',
    ]);
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function histories()
    {
        return $this->hasMany(TaskHistory::class);
    }


    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('m-d-y\ \ \-\ g:i a'.' |');
    }
}
