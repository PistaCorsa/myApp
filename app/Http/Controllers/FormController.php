<?php

namespace App\Http\Controllers;

class FormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        return view('views/form-view');
    }

}