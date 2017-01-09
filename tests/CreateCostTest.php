<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateCostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateCost()
    {
        $cost = factory(App\Cost::class)->make();
    
	    $this->post('/api/costs', [
	      'price' => $cost->price,
	      ])->seeApiSuccess()
	      ->seeJsonObject('cost')
	      ->seeJson([
	        'price' => $cost->price
	      ]);
	    
	    $this->seeInDatabase('costs', [
	      'price' => $cost->price
	    ]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetCost()
    {
	    $this->get('/api/costs')
	      ->seeApiSuccess()
	      ->seeJsonObject('cost');
    }
}
