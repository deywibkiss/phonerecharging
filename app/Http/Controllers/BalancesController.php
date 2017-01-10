<?php

namespace App\Http\Controllers;

use App\PhoneLine;
use App\Cost;
use DB;
use Illuminate\Http\Request;

class BalancesController extends Controller
{
    // Get all the recharges
    public function getAll(){

    	$cost = Cost::find(1);

    	if( $cost == null )
    		return response()->error('Costo no configurado. No se puede obtener el saldo en segundos.', 404);

    	$cost = $cost->first();
        $phone_lines = DB::table('phone_lines')
        				->select(DB::raw('phone_lines.*, (phone_lines.balance DIV 35) AS balance_secs, SUM(intakes.secs) AS intakes_secs, SUM(intakes.total) AS total'))
                        ->join('intakes', 'phone_lines.phone_number', '=', 'intakes.phone_number')
                        ->groupBy('intakes.phone_number')
        				->get();

        if( ! $phone_lines )
            return response()->error('Historial de consumos vacío', 404);

        return response()->success($phone_lines);
    }
}
