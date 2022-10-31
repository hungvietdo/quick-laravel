<?php
 
namespace Tests\Feature;
 
use Tests\TestCase;
 
class DealerStatsTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_asserting_an_exact_json_match()
    {

        // Act
        $response = $this->get('/api/dealer-stats');

        //Assert
        $response->assertStatus(200);

            
    }
}