<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipoUsuarioRequest;
use App\Http\Requests\UpdateTipoUsuarioRequest;
use App\Repositories\TipoUsuarioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TipoUsuarioController extends AppBaseController
{
    /** @var  TipoUsuarioRepository */
    private $tipoUsuarioRepository;

    public function __construct(TipoUsuarioRepository $tipoUsuarioRepo)
    {
        $this->tipoUsuarioRepository = $tipoUsuarioRepo;
    }

    /**
     * Display a listing of the TipoUsuario.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipoUsuarioRepository->pushCriteria(new RequestCriteria($request));
        $tipoUsuarios = $this->tipoUsuarioRepository->all();

        return view('tipo_usuarios.index')
            ->with('tipoUsuarios', $tipoUsuarios);
    }

    /**
     * Show the form for creating a new TipoUsuario.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_usuarios.create');
    }

    /**
     * Store a newly created TipoUsuario in storage.
     *
     * @param CreateTipoUsuarioRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoUsuarioRequest $request)
    {
        $input = $request->all();

        $tipoUsuario = $this->tipoUsuarioRepository->create($input);

        Flash::success('Tipo Usuario saved successfully.');

        return redirect(route('tipoUsuarios.index'));
    }

    /**
     * Display the specified TipoUsuario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoUsuario = $this->tipoUsuarioRepository->findWithoutFail($id);

        if (empty($tipoUsuario)) {
            Flash::error('Tipo Usuario not found');

            return redirect(route('tipoUsuarios.index'));
        }

        return view('tipo_usuarios.show')->with('tipoUsuario', $tipoUsuario);
    }

    /**
     * Show the form for editing the specified TipoUsuario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoUsuario = $this->tipoUsuarioRepository->findWithoutFail($id);

        if (empty($tipoUsuario)) {
            Flash::error('Tipo Usuario not found');

            return redirect(route('tipoUsuarios.index'));
        }

        return view('tipo_usuarios.edit')->with('tipoUsuario', $tipoUsuario);
    }

    /**
     * Update the specified TipoUsuario in storage.
     *
     * @param  int              $id
     * @param UpdateTipoUsuarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoUsuarioRequest $request)
    {
        $tipoUsuario = $this->tipoUsuarioRepository->findWithoutFail($id);

        if (empty($tipoUsuario)) {
            Flash::error('Tipo Usuario not found');

            return redirect(route('tipoUsuarios.index'));
        }

        $tipoUsuario = $this->tipoUsuarioRepository->update($request->all(), $id);

        Flash::success('Tipo Usuario updated successfully.');

        return redirect(route('tipoUsuarios.index'));
    }

    /**
     * Remove the specified TipoUsuario from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoUsuario = $this->tipoUsuarioRepository->findWithoutFail($id);

        if (empty($tipoUsuario)) {
            Flash::error('Tipo Usuario not found');

            return redirect(route('tipoUsuarios.index'));
        }

        $this->tipoUsuarioRepository->delete($id);

        Flash::success('Tipo Usuario deleted successfully.');

        return redirect(route('tipoUsuarios.index'));
    }
}
