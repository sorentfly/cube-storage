<?php

namespace App\Repositories;

use App\Contracts\CubeRepositoryInterface;
use Illuminate\Pagination\Paginator;

class CubeAbstractStorageRepository implements CubeRepositoryInterface
{
    public function getAllCubes(): Paginator
    {
        return new Paginator([
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
        ], 10);
    }

    public function countCubesByColor(int $color_id): int
    {
        return rand(0, 100);
    }

    public function addCube(int $box_id, int $color_id): int
    {
        return 4;
    }

    public function removeCube(int $cube_id): bool
    {
        return [true, false][rand(0,1)];
    }
}
