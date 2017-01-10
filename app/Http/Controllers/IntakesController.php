<?php

namespace App\Http\Controllers;

use App\Intake;
use App\Cost;
use Illuminate\Http\Request;

class IntakesController extends Controller
{
    // Create a new intake
    public function create(Request $request){

    	$this->validate($request, [
    		'phone_number' => 'required|string',
    		'secs' => 'required|integer'
    	]);

    	$intake = new Intake;
    	$intake->phone_number = $request->input('phone_number');
    	$intake->secs = $request->input('secs');

    	// Get the cost per sec
    	$cost = Cost::find(1)->first();

    	if( ! $cost )
    	    return response()->error('Costo no encontrado. Configure un costo por segundo primero.', 404);

    	// Save cost per second and total
    	$intake->cost_per_sec = $cost->price;
    	$intake->total = $cost->price * $intake->secs;

    	if(! $intake->save())
            return response()->error('Error. La línea no existe o no tiene suficiente saldo para hacer el consumo.', 403);

    	return response()->success(compact('intake'));
    }


    // Get all the recharges
    public function getAll(){

        $intakes = Intake::get();

        if( ! $intakes )
            return $response->error('Historial de consumos vacío', 404);

        return response()->success($intakes);
    }
}
