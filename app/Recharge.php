<?php

namespace App;

use App\Events\RechargeDone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;

class Recharge extends Model
{
    /**
     * Call increase balance event when model inserts
     * 
     * */

    public static function boot(){
    	parent::boot();

    	static::created(function($recharge){
    		Event::fire(new RechargeDone($recharge));
    	});
    }

}
