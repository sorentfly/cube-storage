<?php

namespace App\Repositories;

use App\Contracts\CubeRepositoryInterface;

class CubeAbstractStorageRepository implements CubeRepositoryInterface
{
    public function getAllCubes()
    {
        return [
            [
                'id' => 1,
                'box_id' => 1,
                'color_id' => 1
            ],
            [
                'id' => 2,
                'box_id' => 2,
                'color_id' => 2
            ],
            [
                'id' => 3,
                'box_id' => 3,
                'color_id' => 3
            ],
        ];
    }

    public function countCubesByColor($color_id)
    {
        return rand(100);
    }

    public function addCube($box_id, $color_id)
    {
        return 4;
    }

    public function removeCube($cube_id)
    {
        return [true, false][rand(0,1)];
    }
}
