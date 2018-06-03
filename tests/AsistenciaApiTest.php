<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsistenciaApiTest extends TestCase
{
    use MakeAsistenciaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAsistencia()
    {
        $asistencia = $this->fakeAsistenciaData();
        $this->json('POST', '/api/v1/asistencias', $asistencia);

        $this->assertApiResponse($asistencia);
    }

    /**
     * @test
     */
    public function testReadAsistencia()
    {
        $asistencia = $this->makeAsistencia();
        $this->json('GET', '/api/v1/asistencias/'.$asistencia->id);

        $this->assertApiResponse($asistencia->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAsistencia()
    {
        $asistencia = $this->makeAsistencia();
        $editedAsistencia = $this->fakeAsistenciaData();

        $this->json('PUT', '/api/v1/asistencias/'.$asistencia->id, $editedAsistencia);

        $this->assertApiResponse($editedAsistencia);
    }

    /**
     * @test
     */
    public function testDeleteAsistencia()
    {
        $asistencia = $this->makeAsistencia();
        $this->json('DELETE', '/api/v1/asistencias/'.$asistencia->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/asistencias/'.$asistencia->id);

        $this->assertResponseStatus(404);
    }
}
