<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use App\Models\Type;
use App\Models\Value;


class FormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {   
        // GET LIST DATA
        // $data->list = $this->getApi(url().'/showData'); // NOT WORKING

        // $client = new Client();
        // $res = $client->request('GET', 'localhost:8003/showData');
        // $data = $res->getStatusCode(); // DIDNT WORK AS WELL

        $value = Value::all();

        $type = Type::all();

        return view('views/form-view')
                ->with('value', $value)
                ->with('type', $type);
    }

}