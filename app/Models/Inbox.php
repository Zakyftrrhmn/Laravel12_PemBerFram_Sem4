<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    use HasFactory;


    protected $guarded = ['id'];

    public function disposition()
    {
        return $this->hasOne("App\Models\Disposition", 'inbox_id');
    }

    public function user()
    {
        return $this->belongsTo("App\Models\User", 'user_id', 'id');
    }
}
