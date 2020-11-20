<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Engine;
use App\Models\Type;
use App\Models\Value;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showData()
    {
        $data = DB::table('engineTable')
                ->join('valueTable','engineTable.id_value','=' ,'valueTable.id_value')
                ->join('typeTable','engineTable.id_type','=','typeTable.id_type')
                ->select('engineTable.id','engineTable.vehicle_name', 'typeTable.type_name','engineTable.engine_displacement_value' , 'valueTable.value_name', 'engineTable.price')
                ->get();

        return response()->json($data);
    }

    public function insertData(Request $request)
    {
        $return = (object) array(
            "statusCode"    => '',
            "message"       => '',
            "data"          => ''
          );

        $messages = [
            'required' => ':attribute must not empty.',
        ];

        $validateFields = array(
            'vehicle_name'  => 'required',
            'id_type'       => 'required',
            'id_value'      => 'required',
            'engine_displacement_value' => 'required',
            'engine_power'  => 'required',
            'price'         => 'required',
            'location'      => 'required',
        );

        $this->validate($request, $validateFields, $messages);

        $vName      = $request->vehicle_name;
        $vType      = $request->id_type;
        $vValue     = $request->id_value;
        $enPower    = $request->engine_power;
        $price      = $request->engine_power;
        $location   = $request->location;
        $enDisVal   = $request->engine_displacement_value;

        
        $checkType = Type::where('status', 1)
                    ->where('id_type', $vType)
                    ->exists();

        if($checkType)
        {
            $checkVal = Value::where('status', 1)
                    ->where('id_value', $vValue)
                    ->exists();

            if($checkVal)
            {
                $arrIn = array(
                    'vehicle_name'  => $vName,
                    'id_type'       => $vType,
                    'id_value'      => $vValue,
                    'engine_power'  => $enPower,
                    'price'         => $price,
                    'location'      => $location,
                    'engine_displacement_value'  => $enDisVal,
                    'created_at'    => date('Y-m-d H:i:s')
                );

                $insert = Engine::insertGetId($arrIn);

                $return->statusCode = '0';
                $return->message = 'Input data Success';
                $return->data = array('EngineId' => $insert);

            } else {
                $return->statusCode = '10';
                $return->message = 'Engine Value not valid.';
                unset($return->data);
            }
        } else {
            $return->statusCode = '10';
            $return->message = 'Vehicle Type not valid.';
            unset($return->data);
        }

        return response()->json($return);
    }

    //
}
