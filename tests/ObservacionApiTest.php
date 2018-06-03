<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ObservacionApiTest extends TestCase
{
    use MakeObservacionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateObservacion()
    {
        $observacion = $this->fakeObservacionData();
        $this->json('POST', '/api/v1/observacions', $observacion);

        $this->assertApiResponse($observacion);
    }

    /**
     * @test
     */
    public function testReadObservacion()
    {
        $observacion = $this->makeObservacion();
        $this->json('GET', '/api/v1/observacions/'.$observacion->id);

        $this->assertApiResponse($observacion->toArray());
    }

    /**
     * @test
     */
    public function testUpdateObservacion()
    {
        $observacion = $this->makeObservacion();
        $editedObservacion = $this->fakeObservacionData();

        $this->json('PUT', '/api/v1/observacions/'.$observacion->id, $editedObservacion);

        $this->assertApiResponse($editedObservacion);
    }

    /**
     * @test
     */
    public function testDeleteObservacion()
    {
        $observacion = $this->makeObservacion();
        $this->json('DELETE', '/api/v1/observacions/'.$observacion->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/observacions/'.$observacion->id);

        $this->assertResponseStatus(404);
    }
}
