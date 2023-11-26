<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Colleagues extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'member_id',
    ];
}
