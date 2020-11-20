<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


class FormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {   
        $data = array();
        // GET LIST DATA
        // $data->list = $this->getApi(url().'/showData');

        return view('views/form-view')->with($data);
    }

}