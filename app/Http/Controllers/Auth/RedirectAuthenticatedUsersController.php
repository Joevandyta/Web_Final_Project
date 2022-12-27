<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        if (auth()->user()->role == 'student') {
            return redirect('/');
        }
        elseif(auth()->user()->role == 'pa'){
            return redirect('/PADashboard');
        }
        else{
            return auth()->logout();
        }
    }
}