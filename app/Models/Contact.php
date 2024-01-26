<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'email',
        'message',
        // 'user_id'

    ];

    // public function user_id(){
    //     return $this->belongsTo(User::class);
    // }

    public function user()
{
    return $this->belongsTo(User::class);
}
}
