<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Info extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'city',
        'telNumber',
        'birthDate',
        'motto',
        'sex',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}