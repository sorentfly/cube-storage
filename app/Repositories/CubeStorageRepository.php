<?php

namespace App\Repositories;

use App\Contracts\CubeRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use App\Models\Cube;

class CubeStorageRepository implements CubeRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function getAllCubes(): LengthAwarePaginator
    {
        return Cube::paginate();
    }

    /**
     * @inheritDoc
     */
    public function countCubesByColor(int $color_id): int
    {
        return Cube::select(DB::raw('COUNT(color_id) as count'))
                ->where('color_id', $color_id)
                ->first()
                ->count ?? 0;
    }

    /**
     * @inheritDoc
     */
    public function addCube(int $box_id, int $color_id): int
    {
        return Cube::create(compact('box_id', 'color_id'))?->id;
    }

    /**
     * @inheritDoc
     */
    public function removeCube(int $cube_id): bool
    {
        return Cube::find($cube_id)?->delete();
    }
}
