<?php

namespace App\Services;

use App\Contracts\CubeRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class CubeService
{
    /**
     * @var CubeRepositoryInterface
     */
    protected CubeRepositoryInterface $cubeRepository;

    /**
     * @param CubeRepositoryInterface $cubeRepository
     */
    public function __construct(CubeRepositoryInterface $cubeRepository)
    {
        $this->cubeRepository = $cubeRepository;
    }

    /**
     * Получение пагинированного списка Кубиков
     *
     * @return Paginator|LengthAwarePaginator Пагинированный список Кубиков
     */
    public function getAllCubes(): Paginator|LengthAwarePaginator
    {
        return $this->cubeRepository->getAllCubes();
    }

    /**
     * Метод для подсчёта количества Кубиков определённого цвета
     *
     * @param int $color_id Идентификатор Цвета
     * @return int Количество Кубиков по переданному идентификатору Цвета
     */
    public function countCubesByColor(int $color_id): int
    {
        return $this->cubeRepository->countCubesByColor($color_id);
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
        return $this->cubeRepository->addCube($box_id, $color_id);
    }

    /**
     * Метод для извлечения Кубика из Коробки
     *
     * @param int $cube_id Идентификатор Кубика
     * @return bool|null Результат операции
     */
    public function removeCube(int $cube_id): bool|null
    {
        return $this->cubeRepository->removeCube($cube_id);
    }
}
