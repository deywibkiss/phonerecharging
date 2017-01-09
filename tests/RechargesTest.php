<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RechargesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateRecharge()
    {
        $recharge = factory(App\Recharge::class)->make();

        $this->post('/api/recharges', [
        	'phone_number' => $recharge->phone_number,
        	'value' => $recharge->value
        ])
        ->seeApiSuccess()
        ->seeJsonObject('recharge')
        ->seeJson([
            'phone_number' => $recharge->phone_number,
            'value' => $recharge->value
        ]);

        $this->seeInDatabase('recharges', [
        	'phone_number' => $recharge->phone_number,
        	'value' => $recharge->value
        ]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAllRecharges()
    {

        $this->get('/api/recharges')
        ->seeApiSuccess();

    }
}
