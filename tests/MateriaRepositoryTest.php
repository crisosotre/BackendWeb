<?php

use App\Models\Materia;
use App\Repositories\MateriaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MateriaRepositoryTest extends TestCase
{
    use MakeMateriaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MateriaRepository
     */
    protected $materiaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->materiaRepo = App::make(MateriaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMateria()
    {
        $materia = $this->fakeMateriaData();
        $createdMateria = $this->materiaRepo->create($materia);
        $createdMateria = $createdMateria->toArray();
        $this->assertArrayHasKey('id', $createdMateria);
        $this->assertNotNull($createdMateria['id'], 'Created Materia must have id specified');
        $this->assertNotNull(Materia::find($createdMateria['id']), 'Materia with given id must be in DB');
        $this->assertModelData($materia, $createdMateria);
    }

    /**
     * @test read
     */
    public function testReadMateria()
    {
        $materia = $this->makeMateria();
        $dbMateria = $this->materiaRepo->find($materia->id);
        $dbMateria = $dbMateria->toArray();
        $this->assertModelData($materia->toArray(), $dbMateria);
    }

    /**
     * @test update
     */
    public function testUpdateMateria()
    {
        $materia = $this->makeMateria();
        $fakeMateria = $this->fakeMateriaData();
        $updatedMateria = $this->materiaRepo->update($fakeMateria, $materia->id);
        $this->assertModelData($fakeMateria, $updatedMateria->toArray());
        $dbMateria = $this->materiaRepo->find($materia->id);
        $this->assertModelData($fakeMateria, $dbMateria->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMateria()
    {
        $materia = $this->makeMateria();
        $resp = $this->materiaRepo->delete($materia->id);
        $this->assertTrue($resp);
        $this->assertNull(Materia::find($materia->id), 'Materia should not exist in DB');
    }
}
