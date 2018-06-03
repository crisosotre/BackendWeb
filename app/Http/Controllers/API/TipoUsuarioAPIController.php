<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTipoUsuarioAPIRequest;
use App\Http\Requests\API\UpdateTipoUsuarioAPIRequest;
use App\Models\TipoUsuario;
use App\Repositories\TipoUsuarioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TipoUsuarioController
 * @package App\Http\Controllers\API
 */

class TipoUsuarioAPIController extends AppBaseController
{
    /** @var  TipoUsuarioRepository */
    private $tipoUsuarioRepository;

    public function __construct(TipoUsuarioRepository $tipoUsuarioRepo)
    {
        $this->tipoUsuarioRepository = $tipoUsuarioRepo;
    }

    /**
     * Display a listing of the TipoUsuario.
     * GET|HEAD /tipoUsuarios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipoUsuarioRepository->pushCriteria(new RequestCriteria($request));
        $this->tipoUsuarioRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tipoUsuarios = $this->tipoUsuarioRepository->all();

        return $this->sendResponse($tipoUsuarios->toArray(), 'Tipo Usuarios retrieved successfully');
    }

    /**
     * Store a newly created TipoUsuario in storage.
     * POST /tipoUsuarios
     *
     * @param CreateTipoUsuarioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoUsuarioAPIRequest $request)
    {
        $input = $request->all();

        $tipoUsuarios = $this->tipoUsuarioRepository->create($input);

        return $this->sendResponse($tipoUsuarios->toArray(), 'Tipo Usuario saved successfully');
    }

    /**
     * Display the specified TipoUsuario.
     * GET|HEAD /tipoUsuarios/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TipoUsuario $tipoUsuario */
        $tipoUsuario = $this->tipoUsuarioRepository->findWithoutFail($id);

        if (empty($tipoUsuario)) {
            return $this->sendError('Tipo Usuario not found');
        }

        return $this->sendResponse($tipoUsuario->toArray(), 'Tipo Usuario retrieved successfully');
    }

    /**
     * Update the specified TipoUsuario in storage.
     * PUT/PATCH /tipoUsuarios/{id}
     *
     * @param  int $id
     * @param UpdateTipoUsuarioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoUsuarioAPIRequest $request)
    {
        $input = $request->all();

        /** @var TipoUsuario $tipoUsuario */
        $tipoUsuario = $this->tipoUsuarioRepository->findWithoutFail($id);

        if (empty($tipoUsuario)) {
            return $this->sendError('Tipo Usuario not found');
        }

        $tipoUsuario = $this->tipoUsuarioRepository->update($input, $id);

        return $this->sendResponse($tipoUsuario->toArray(), 'TipoUsuario updated successfully');
    }

    /**
     * Remove the specified TipoUsuario from storage.
     * DELETE /tipoUsuarios/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TipoUsuario $tipoUsuario */
        $tipoUsuario = $this->tipoUsuarioRepository->findWithoutFail($id);

        if (empty($tipoUsuario)) {
            return $this->sendError('Tipo Usuario not found');
        }

        $tipoUsuario->delete();

        return $this->sendResponse($id, 'Tipo Usuario deleted successfully');
    }
}
