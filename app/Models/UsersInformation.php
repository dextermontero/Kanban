<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UsersInformation extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'uid',
        'profile_img',
        'firstname',
        'lastname',
        'email',
        'position',
        'status'
    ];
}
