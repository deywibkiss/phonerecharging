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

    	$cost = new Cost;
    	$cost->price = $request->input('price');

    	$cost->save();

    	return response()->success(compact('cost'));
    }


    // Get the cost
    public function get(){

        $cost = Cost::find(1)->first();

        if( ! $cost )
            return $response->error('No encontrado', 404);

        return response()->success(compact('cost'));
    }
}
