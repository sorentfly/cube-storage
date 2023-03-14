<?php

namespace App\Repositories;

use App\Contracts\CubeRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use App\Models\Cube;

class CubeStorageRepository implements CubeRepositoryInterface
{
    /**
     * Получение пагинированного списка Кубиков
     *
     * @return LengthAwarePaginator Пагинированный список Кубиков
     */
    public function getAllCubes(): LengthAwarePaginator
    {
        return Cube::paginate();
    }

    /**
     * Метод для подсчёта количества Кубиков определённого цвета
     *
     * @param int $color_id Идентификатор Цвета
     * @return int Количество Кубиков по переданному идентификатору Цвета
     */
    public function countCubesByColor(int $color_id): int
    {
        return Cube::select(DB::raw('COUNT(color_id) as count'))
                ->where('color_id', $color_id)
                ->first()
                ->count ?? 0;
    }

    /**
     * Метод для добавления Кубика в конкретную Коробку
     *
     * @param int $box_id Идентификатор Коробки
     * @param int $color_id Идентификатор Цвета
     * @return int Идентификатор Кубика
     */
    public function addCube(int $box_id, int $color_id): int
    {
        return Cube::create(compact('box_id', 'color_id'))?->id;
    }

    /**
     * Метод для извлечения Кубика из Коробки
     *
     * @param int $cube_id Идентификатор Кубика
     * @return bool Результат операции
     */
    public function removeCube(int $cube_id): bool
    {
        return Cube::find($cube_id)?->delete();
    }
}
