<?php
/** @noinspection PhpClassConstantAccessedViaChildClassInspection */

namespace App\Http\Controllers;

use App\Services\CubeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class CubeController extends Controller
{
    /**
     * @var CubeService $cubeService
     */
    private CubeService $cubeService;

    /**
     * Конструктор конктроллера
     *
     * @param CubeService $cubeService
     */
    public function __construct(CubeService $cubeService)
    {
        $this->cubeService = $cubeService;
    }

    /**
     * Список всех Кубиков
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $cubes = $this->cubeService->getAllCubes();

        return response()->json($cubes, Response::HTTP_OK);
    }

    /**
     * Создание нового Кубика
     *
     * @param Request $request Необходимые параметры box_id и color_id
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $this->validate($request, [
            'box_id' => 'required|exists:boxes,id',
            'color_id' => 'required|exists:colors,id',
        ], [
            'box_id.required' => 'ID коробки является обязательным параметром',
            'box_id.exists' => 'Коробка с таким ID отсутствует в системе',

            'color_id.required' => 'ID цвета является обязательным параметром',
            'color_id.exists' => 'Цвет с таким ID отсутствует в системе',
        ]);

        $cube = $this->cubeService->addCube(...$validatedData);

        return response()->json($cube, Response::HTTP_CREATED);
    }

    /**
     * @param int $id Идентификатор Кубика
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $result = $this->cubeService->removeCube($id);

        if (!$result) {
            return response()->json(['message' => 'Кубик не найден'], Response::HTTP_NOT_FOUND);
        }

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @param int $color_id Идентификатор Цвета
     * @return JsonResponse
     */
    public function countCubesByColor(int $color_id): JsonResponse
    {
        $count = $this->cubeService->countCubesByColor($color_id);

        return response()->json(['count' => $count], Response::HTTP_OK);
    }
}
