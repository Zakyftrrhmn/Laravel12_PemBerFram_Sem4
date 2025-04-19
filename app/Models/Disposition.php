<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disposition extends Model
{
    protected $guarded = ['id'];

    public function inbox()
    {
        return $this->belongsTo("App\Models\Inbox", 'inbox_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo("App\Models\User", 'user_id', 'id');
    }
}
