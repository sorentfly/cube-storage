<?php

namespace App\Http\Controllers;

use App\Services\CubeService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class CubeController extends Controller
{
    private $cubeService;

    public function __construct(CubeService $cubeService)
    {
        $this->cubeService = $cubeService;
    }

    public function index()
    {
        $cubes = $this->cubeService->getAllCubes();

        return response()->json($cubes, Response::HTTP_OK);
    }

    public function store(Request $request)
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

    public function show($id)
    {
        $cube = $this->cubeService->getCubeById($id);

        if (!$cube) {
            return response()->json(['message' => 'Кубик не найден'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($cube, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $result = $this->cubeService->removeCube($id);

        if (!$result) {
            return response()->json(['message' => 'Кубик не найден'], Response::HTTP_NOT_FOUND);
        }

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function countCubesByColor($color_id)
    {
        $count = $this->cubeService->countCubesByColor($color_id);

        return response()->json(['count' => $count], Response::HTTP_OK);
    }
}
