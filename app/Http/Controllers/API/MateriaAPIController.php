<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMateriaAPIRequest;
use App\Http\Requests\API\UpdateMateriaAPIRequest;
use App\Models\Materia;
use App\Repositories\MateriaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MateriaController
 * @package App\Http\Controllers\API
 */

class MateriaAPIController extends AppBaseController
{
    /** @var  MateriaRepository */
    private $materiaRepository;

    public function __construct(MateriaRepository $materiaRepo)
    {
        $this->materiaRepository = $materiaRepo;
    }

    /**
     * Display a listing of the Materia.
     * GET|HEAD /materias
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->materiaRepository->pushCriteria(new RequestCriteria($request));
        $this->materiaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $materias = $this->materiaRepository->all();

        return $this->sendResponse($materias->toArray(), 'Materias retrieved successfully');
    }

    /**
     * Store a newly created Materia in storage.
     * POST /materias
     *
     * @param CreateMateriaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMateriaAPIRequest $request)
    {
        $input = $request->all();

        $materias = $this->materiaRepository->create($input);

        return $this->sendResponse($materias->toArray(), 'Materia saved successfully');
    }

    /**
     * Display the specified Materia.
     * GET|HEAD /materias/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Materia $materia */
        $materia = $this->materiaRepository->findWithoutFail($id);

        if (empty($materia)) {
            return $this->sendError('Materia not found');
        }

        return $this->sendResponse($materia->toArray(), 'Materia retrieved successfully');
    }

    /**
     * Update the specified Materia in storage.
     * PUT/PATCH /materias/{id}
     *
     * @param  int $id
     * @param UpdateMateriaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMateriaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Materia $materia */
        $materia = $this->materiaRepository->findWithoutFail($id);

        if (empty($materia)) {
            return $this->sendError('Materia not found');
        }

        $materia = $this->materiaRepository->update($input, $id);

        return $this->sendResponse($materia->toArray(), 'Materia updated successfully');
    }

    /**
     * Remove the specified Materia from storage.
     * DELETE /materias/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Materia $materia */
        $materia = $this->materiaRepository->findWithoutFail($id);

        if (empty($materia)) {
            return $this->sendError('Materia not found');
        }

        $materia->delete();

        return $this->sendResponse($id, 'Materia deleted successfully');
    }
}
