<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsuarioApiTest extends TestCase
{
    use MakeUsuarioTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateUsuario()
    {
        $usuario = $this->fakeUsuarioData();
        $this->json('POST', '/api/v1/usuarios', $usuario);

        $this->assertApiResponse($usuario);
    }

    /**
     * @test
     */
    public function testReadUsuario()
    {
        $usuario = $this->makeUsuario();
        $this->json('GET', '/api/v1/usuarios/'.$usuario->id);

        $this->assertApiResponse($usuario->toArray());
    }

    /**
     * @test
     */
    public function testUpdateUsuario()
    {
        $usuario = $this->makeUsuario();
        $editedUsuario = $this->fakeUsuarioData();

        $this->json('PUT', '/api/v1/usuarios/'.$usuario->id, $editedUsuario);

        $this->assertApiResponse($editedUsuario);
    }

    /**
     * @test
     */
    public function testDeleteUsuario()
    {
        $usuario = $this->makeUsuario();
        $this->json('DELETE', '/api/v1/usuarios/'.$usuario->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/usuarios/'.$usuario->id);

        $this->assertResponseStatus(404);
    }
}
