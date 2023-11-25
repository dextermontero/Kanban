<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Projects extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'project_img',
        'project_name',
        'description',
        'start_date',
        'end_date',
        'status'
    ];
}
