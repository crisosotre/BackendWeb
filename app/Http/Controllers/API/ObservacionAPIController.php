<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateObservacionAPIRequest;
use App\Http\Requests\API\UpdateObservacionAPIRequest;
use App\Models\Observacion;
use App\Repositories\ObservacionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ObservacionController
 * @package App\Http\Controllers\API
 */

class ObservacionAPIController extends AppBaseController
{
    /** @var  ObservacionRepository */
    private $observacionRepository;

    public function __construct(ObservacionRepository $observacionRepo)
    {
        $this->observacionRepository = $observacionRepo;
    }

    /**
     * Display a listing of the Observacion.
     * GET|HEAD /observacions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->observacionRepository->pushCriteria(new RequestCriteria($request));
        $this->observacionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $observacions = $this->observacionRepository->all();

        return $this->sendResponse($observacions->toArray(), 'Observacions retrieved successfully');
    }

    /**
     * Store a newly created Observacion in storage.
     * POST /observacions
     *
     * @param CreateObservacionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateObservacionAPIRequest $request)
    {
        $input = $request->all();

        $observacions = $this->observacionRepository->create($input);

        return $this->sendResponse($observacions->toArray(), 'Observacion saved successfully');
    }

    /**
     * Display the specified Observacion.
     * GET|HEAD /observacions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Observacion $observacion */
        $observacion = $this->observacionRepository->findWithoutFail($id);

        if (empty($observacion)) {
            return $this->sendError('Observacion not found');
        }

        return $this->sendResponse($observacion->toArray(), 'Observacion retrieved successfully');
    }

    /**
     * Update the specified Observacion in storage.
     * PUT/PATCH /observacions/{id}
     *
     * @param  int $id
     * @param UpdateObservacionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateObservacionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Observacion $observacion */
        $observacion = $this->observacionRepository->findWithoutFail($id);

        if (empty($observacion)) {
            return $this->sendError('Observacion not found');
        }

        $observacion = $this->observacionRepository->update($input, $id);

        return $this->sendResponse($observacion->toArray(), 'Observacion updated successfully');
    }

    /**
     * Remove the specified Observacion from storage.
     * DELETE /observacions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Observacion $observacion */
        $observacion = $this->observacionRepository->findWithoutFail($id);

        if (empty($observacion)) {
            return $this->sendError('Observacion not found');
        }

        $observacion->delete();

        return $this->sendResponse($id, 'Observacion deleted successfully');
    }
}
