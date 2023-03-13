<?php

namespace App\Contracts;

interface CubeRepositoryInterface
{
    public function getAllCubes();

    public function countCubesByColor($color_id);

    public function addCube($box_id, $color_id);

    public function removeCube($cube_id);
}
