<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

class DealerStats extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res1 = [
            "classCounts" => [
                [
                    "className" => "CLASS 1 (GVW 0 - 6000)",
                    "classId" => "1",
                    "totalCount" => "10"
                ],
                [
                    "className" => "CLASS 1 (GVW 0 - 6000)",
                    "classId" => "2",
                    "totalCount" => "11"
                ],
            ],
            "makeCounts" => [
                [
                    "makeName" => "1954 MFG",
                    "makeId" => "765341026",
                    "totalCount" => "3"
                ]
            ]
        ];

        $res2 = [
            "classCounts" => [
                [
                    "className" => "CLASS 1 (GVW 0 - 6000)",
                    "classId" => "1",
                    "totalCount" => "40"
                ],
                [
                    "className" => "CLASS 1 (GVW 0 - 6000)",
                    "classId" => "3",
                    "totalCount" => "90"
                ]
            ]
        ];

        $res3 = [
            "modelCounts" => [
                [
                    "modelName" => "108 SD",
                    "modelId" => "764939214",
                    "totalCount" => "1"
                ],
            ]
        ];

        $responses = [
            $res1,
            $res2,
            $res3
        ];

        $filters = [
            "classCounts" => "classId",
            "makeCounts" => "makeId",
            "modelCounts" => "modelId"
        ];

        $result = [];

        foreach ($responses as $response) {
            foreach ($filters as $countName => $filterName) {
                $elements = $response[$countName] ?? [];
                foreach ($elements as $element) {
                    $result[$countName] = $this->_addElement($result[$countName] ?? [], $element, $filterName);
                }
            }
        }

        return response()->json($result);
    }

    private function _addElement(array $array, array $elementToAdd, string $filterName)
    {
        if (empty($array)) {
            return [$elementToAdd];
        }

        $result = $array;
        $key = array_search($elementToAdd[$filterName], array_column($result, $filterName), true);

        if ($key !== false) {
            $result[$key]['totalCount'] += $elementToAdd['totalCount'];
        } else {
            $result[] = $elementToAdd;
        }

        return $result;
    }
}
