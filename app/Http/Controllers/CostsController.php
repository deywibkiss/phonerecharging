<?php

namespace App\Http\Controllers;

use App\Cost;
use Illuminate\Http\Request;
use Log;

class CostsController extends Controller
{
    // Create a new cost
    public function create(Request $request){

    	$this->validate($request, [
    		'price' => 'required|integer'
    	]);

    	$cost = (Cost::find(1) == null) ? new Cost : Cost::find(1)->first();
    	$cost->price = $request->input('price');

    	$cost->save();

    	return response()->success(compact('cost'));
    }


    // Get the cost
    public function get(){

        $cost = Cost::find(1);

        if( $cost == null )
            return response()->error('Costo no configurado actualmente', 404);

        $cost = $cost->first();

        return response()->success(compact('cost'));
    }
}
