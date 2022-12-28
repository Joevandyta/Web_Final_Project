<?php

namespace App\Http\Controllers;

use App\Models\poinMahasiswa;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function data(){
        // return view('home')
        $user_id = auth()->user()->id; 
        $portofolio = poinMahasiswa::where('user_id', $user_id)->get();

        
        return view('frontPage.data',compact('portofolio'));
    }
}