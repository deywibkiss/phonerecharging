<?php

namespace App\Http\Controllers;

use App\Recharge;
use Illuminate\Http\Request;

class RechargesController extends Controller
{
    // Create a new recharge
    public function create(Request $request){

    	$this->validate($request, [
    		'phone_number' => 'required|string',
    		'value' => 'required|integer'
    	]);

    	$recharge = new Recharge;
    	$recharge->phone_number = $request->input('phone_number');
    	$recharge->value = $request->input('value');

    	$recharge->save();

    	return response()->success(compact('recharge'));
    }


    // Get all the recharges
    public function getAll(){

        $recharges = Recharge::get();

        if( ! $recharges )
            return $response->error('Historial de recargas vacío', 404);

        return response()->success($recharges);
    }
}
