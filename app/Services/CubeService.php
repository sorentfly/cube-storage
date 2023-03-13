<?php

namespace App\Services;

use App\Contracts\CubeRepositoryInterface;

class CubeService
{
    protected $cubeRepository;

    public function __construct(CubeRepositoryInterface $cubeRepository)
    {
        $this->cubeRepository = $cubeRepository;
    }

    public function getAllCubes()
    {
        return $this->cubeRepository->getAllCubes();
    }

    public function countCubesByColor($color_id)
    {
        return $this->cubeRepository->countCubesByColor($color_id);
    }

    public function addCube($box_id, $color_id)
    {
        return $this->cubeRepository->addCube($box_id, $color_id);
    }

    public function removeCube($cube_id)
    {
        return $this->cubeRepository->removeCube($cube_id);
    }
}
