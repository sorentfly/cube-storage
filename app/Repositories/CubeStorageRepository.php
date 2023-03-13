<?php

namespace App\Repositories;

use App\Contracts\CubeRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Cube;

class CubeStorageRepository implements CubeRepositoryInterface
{
    public function getAllCubes()
    {
        return Cube::all();
    }

    public function countCubesByColor($color_id)
    {
        return Cube::select(DB::raw('COUNT(color_id) as count'))
                ->where('color_id', $color_id)
                ->first()
                ->count ?? 0;
    }

    public function addCube($box_id, $color_id)
    {
        return DB::table('cubes')
                ->insertGetId(compact('box_id', 'color_id'));
    }

    public function removeCube($cube_id)
    {
        return DB::table('cubes')
                ->where('id', $cube_id)
                ->delete();
    }
}
