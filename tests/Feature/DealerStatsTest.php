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
        $result = json_decode($response->getContent(), true);

        //Expect
        $expect = [
            "classCounts" => [
                [
                    "className" => "CLASS 1 (GVW 0 - 6000)",
                    "classId" => "1",
                    "totalCount" => "50"
                ],
                [
                    "className" => "CLASS 1 (GVW 0 - 6000)",
                    "classId" => "2",
                    "totalCount" => "11"
                ],
                [
                    "className" => "CLASS 1 (GVW 0 - 6000)",
                    "classId" => "3",
                    "totalCount" => "90"
                ],
            ],
            "makeCounts" => [
                [
                    "makeName" => "1954 MFG",
                    "makeId" => "765341026",
                    "totalCount" => "3"
                ]
                ],
            "modelCounts" => [
                [
                    "modelName" => "108 SD",
                    "modelId" => "764939214",
                    "totalCount" => "1"
                ],
            ]
        ];

        //Assert
        // $response->assertStatus(200);
        $this->assertEquals($result, $expect);

    }
}