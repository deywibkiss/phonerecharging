<?php

namespace App;

use App\Events\IntakeDone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;

class Intake extends Model
{
    /**
     * Call increase balance event when model inserts
     * 
     * */

    public static function boot(){
    	parent::boot();

        static::creating(function($intake){
            // Get if the phone line exists and prevent to the intake insertion
            $phone_line = PhoneLine::where('phone_number', $intake->phone_number)->first();

            // Phone line not exists
            if( $phone_line == null )
                return false;

            // Phone line doesn't have balance
            if( $phone_line->balance <= 0 )
                return false;

            // Phone line has balance, but it's not enough
            if( $phone_line->balance < $intake->total )
                return false;

            return true;
        });

    	static::created(function($intake){
    		Event::fire(new IntakeDone($intake));
    	});
    }
}
