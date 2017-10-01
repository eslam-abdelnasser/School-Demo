<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    //

    public function index(){

        return view('front.about-us');


    }


    public function media(){

        return view('front.media');
    }


    public function educationLevel(){

        return view('front.education-level');

    }


    public function   supervisor(){

        return view('front.supervisor');

    }


    public function admissionRoles(){

        return view('front.admission-roles');
    }
}
