<?php

use App\Models\Asistencia;
use App\Repositories\AsistenciaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsistenciaRepositoryTest extends TestCase
{
    use MakeAsistenciaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AsistenciaRepository
     */
    protected $asistenciaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->asistenciaRepo = App::make(AsistenciaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAsistencia()
    {
        $asistencia = $this->fakeAsistenciaData();
        $createdAsistencia = $this->asistenciaRepo->create($asistencia);
        $createdAsistencia = $createdAsistencia->toArray();
        $this->assertArrayHasKey('id', $createdAsistencia);
        $this->assertNotNull($createdAsistencia['id'], 'Created Asistencia must have id specified');
        $this->assertNotNull(Asistencia::find($createdAsistencia['id']), 'Asistencia with given id must be in DB');
        $this->assertModelData($asistencia, $createdAsistencia);
    }

    /**
     * @test read
     */
    public function testReadAsistencia()
    {
        $asistencia = $this->makeAsistencia();
        $dbAsistencia = $this->asistenciaRepo->find($asistencia->id);
        $dbAsistencia = $dbAsistencia->toArray();
        $this->assertModelData($asistencia->toArray(), $dbAsistencia);
    }

    /**
     * @test update
     */
    public function testUpdateAsistencia()
    {
        $asistencia = $this->makeAsistencia();
        $fakeAsistencia = $this->fakeAsistenciaData();
        $updatedAsistencia = $this->asistenciaRepo->update($fakeAsistencia, $asistencia->id);
        $this->assertModelData($fakeAsistencia, $updatedAsistencia->toArray());
        $dbAsistencia = $this->asistenciaRepo->find($asistencia->id);
        $this->assertModelData($fakeAsistencia, $dbAsistencia->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAsistencia()
    {
        $asistencia = $this->makeAsistencia();
        $resp = $this->asistenciaRepo->delete($asistencia->id);
        $this->assertTrue($resp);
        $this->assertNull(Asistencia::find($asistencia->id), 'Asistencia should not exist in DB');
    }
}
