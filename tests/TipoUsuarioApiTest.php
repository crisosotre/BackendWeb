<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TipoUsuarioApiTest extends TestCase
{
    use MakeTipoUsuarioTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTipoUsuario()
    {
        $tipoUsuario = $this->fakeTipoUsuarioData();
        $this->json('POST', '/api/v1/tipoUsuarios', $tipoUsuario);

        $this->assertApiResponse($tipoUsuario);
    }

    /**
     * @test
     */
    public function testReadTipoUsuario()
    {
        $tipoUsuario = $this->makeTipoUsuario();
        $this->json('GET', '/api/v1/tipoUsuarios/'.$tipoUsuario->id);

        $this->assertApiResponse($tipoUsuario->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTipoUsuario()
    {
        $tipoUsuario = $this->makeTipoUsuario();
        $editedTipoUsuario = $this->fakeTipoUsuarioData();

        $this->json('PUT', '/api/v1/tipoUsuarios/'.$tipoUsuario->id, $editedTipoUsuario);

        $this->assertApiResponse($editedTipoUsuario);
    }

    /**
     * @test
     */
    public function testDeleteTipoUsuario()
    {
        $tipoUsuario = $this->makeTipoUsuario();
        $this->json('DELETE', '/api/v1/tipoUsuarios/'.$tipoUsuario->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tipoUsuarios/'.$tipoUsuario->id);

        $this->assertResponseStatus(404);
    }
}
