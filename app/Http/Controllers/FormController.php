<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Engine;
use App\Models\Type;
use App\Models\Value;
use Illuminate\Support\Facades\DB;

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