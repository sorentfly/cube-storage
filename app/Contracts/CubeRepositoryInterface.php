<?php

namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

interface CubeRepositoryInterface
{
    /**
     * Получение пагинированного списка Кубиков
     *
     * @return LengthAwarePaginator|Paginator Пагинированный список Кубиков
     */
    public function getAllCubes(): LengthAwarePaginator|Paginator;

    /**
     * Метод для подсчёта количества Кубиков определённого цвета
     *
     * @param int $color_id Идентификатор Цвета
     * @return int Количество Кубиков по переданному идентификатору Цвета
     */
    public function countCubesByColor(int $color_id): int;

    /**
     * Метод для добавления Кубика в конкретную Коробку
     *
     * @param int $box_id Идентификатор Коробки
     * @param int $color_id Идентификатор Цвета
     * @return int Идентификатор Кубика
     */
    public function addCube(int $box_id, int $color_id): int;

    /**
     * Метод для извлечения Кубика из Коробки
     *
     * @param int $cube_id Идентификатор Кубика
     * @return bool Результат операции
     */
    public function removeCube(int $cube_id): bool;
}
