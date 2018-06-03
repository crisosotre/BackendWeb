<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsistenciaRequest;
use App\Http\Requests\UpdateAsistenciaRequest;
use App\Repositories\AsistenciaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AsistenciaController extends AppBaseController
{
    /** @var  AsistenciaRepository */
    private $asistenciaRepository;

    public function __construct(AsistenciaRepository $asistenciaRepo)
    {
        $this->asistenciaRepository = $asistenciaRepo;
    }

    /**
     * Display a listing of the Asistencia.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asistenciaRepository->pushCriteria(new RequestCriteria($request));
        $asistencias = $this->asistenciaRepository->all();

        return view('asistencias.index')
            ->with('asistencias', $asistencias);
    }

    /**
     * Show the form for creating a new Asistencia.
     *
     * @return Response
     */
    public function create()
    {
        return view('asistencias.create');
    }

    /**
     * Store a newly created Asistencia in storage.
     *
     * @param CreateAsistenciaRequest $request
     *
     * @return Response
     */
    public function store(CreateAsistenciaRequest $request)
    {
        $input = $request->all();

        $asistencia = $this->asistenciaRepository->create($input);

        Flash::success('Asistencia saved successfully.');

        return redirect(route('asistencias.index'));
    }

    /**
     * Display the specified Asistencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asistencia = $this->asistenciaRepository->findWithoutFail($id);

        if (empty($asistencia)) {
            Flash::error('Asistencia not found');

            return redirect(route('asistencias.index'));
        }

        return view('asistencias.show')->with('asistencia', $asistencia);
    }

    /**
     * Show the form for editing the specified Asistencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asistencia = $this->asistenciaRepository->findWithoutFail($id);

        if (empty($asistencia)) {
            Flash::error('Asistencia not found');

            return redirect(route('asistencias.index'));
        }

        return view('asistencias.edit')->with('asistencia', $asistencia);
    }

    /**
     * Update the specified Asistencia in storage.
     *
     * @param  int              $id
     * @param UpdateAsistenciaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsistenciaRequest $request)
    {
        $asistencia = $this->asistenciaRepository->findWithoutFail($id);

        if (empty($asistencia)) {
            Flash::error('Asistencia not found');

            return redirect(route('asistencias.index'));
        }

        $asistencia = $this->asistenciaRepository->update($request->all(), $id);

        Flash::success('Asistencia updated successfully.');

        return redirect(route('asistencias.index'));
    }

    /**
     * Remove the specified Asistencia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $asistencia = $this->asistenciaRepository->findWithoutFail($id);

        if (empty($asistencia)) {
            Flash::error('Asistencia not found');

            return redirect(route('asistencias.index'));
        }

        $this->asistenciaRepository->delete($id);

        Flash::success('Asistencia deleted successfully.');

        return redirect(route('asistencias.index'));
    }
}
