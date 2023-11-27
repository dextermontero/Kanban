<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function verified($id){
        $checkID = User::where('remember_token', $id)->exists();

        if($checkID){
            User::where('remember_token', $id)->update(['email_verified_at' => now()]);
        }
        
        return redirect()->route('home');
    }
}
