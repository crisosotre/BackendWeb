<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MateriaApiTest extends TestCase
{
    use MakeMateriaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMateria()
    {
        $materia = $this->fakeMateriaData();
        $this->json('POST', '/api/v1/materias', $materia);

        $this->assertApiResponse($materia);
    }

    /**
     * @test
     */
    public function testReadMateria()
    {
        $materia = $this->makeMateria();
        $this->json('GET', '/api/v1/materias/'.$materia->id);

        $this->assertApiResponse($materia->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMateria()
    {
        $materia = $this->makeMateria();
        $editedMateria = $this->fakeMateriaData();

        $this->json('PUT', '/api/v1/materias/'.$materia->id, $editedMateria);

        $this->assertApiResponse($editedMateria);
    }

    /**
     * @test
     */
    public function testDeleteMateria()
    {
        $materia = $this->makeMateria();
        $this->json('DELETE', '/api/v1/materias/'.$materia->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/materias/'.$materia->id);

        $this->assertResponseStatus(404);
    }
}
