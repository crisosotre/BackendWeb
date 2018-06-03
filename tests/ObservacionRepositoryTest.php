<?php

use App\Models\Observacion;
use App\Repositories\ObservacionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ObservacionRepositoryTest extends TestCase
{
    use MakeObservacionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ObservacionRepository
     */
    protected $observacionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->observacionRepo = App::make(ObservacionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateObservacion()
    {
        $observacion = $this->fakeObservacionData();
        $createdObservacion = $this->observacionRepo->create($observacion);
        $createdObservacion = $createdObservacion->toArray();
        $this->assertArrayHasKey('id', $createdObservacion);
        $this->assertNotNull($createdObservacion['id'], 'Created Observacion must have id specified');
        $this->assertNotNull(Observacion::find($createdObservacion['id']), 'Observacion with given id must be in DB');
        $this->assertModelData($observacion, $createdObservacion);
    }

    /**
     * @test read
     */
    public function testReadObservacion()
    {
        $observacion = $this->makeObservacion();
        $dbObservacion = $this->observacionRepo->find($observacion->id);
        $dbObservacion = $dbObservacion->toArray();
        $this->assertModelData($observacion->toArray(), $dbObservacion);
    }

    /**
     * @test update
     */
    public function testUpdateObservacion()
    {
        $observacion = $this->makeObservacion();
        $fakeObservacion = $this->fakeObservacionData();
        $updatedObservacion = $this->observacionRepo->update($fakeObservacion, $observacion->id);
        $this->assertModelData($fakeObservacion, $updatedObservacion->toArray());
        $dbObservacion = $this->observacionRepo->find($observacion->id);
        $this->assertModelData($fakeObservacion, $dbObservacion->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteObservacion()
    {
        $observacion = $this->makeObservacion();
        $resp = $this->observacionRepo->delete($observacion->id);
        $this->assertTrue($resp);
        $this->assertNull(Observacion::find($observacion->id), 'Observacion should not exist in DB');
    }
}
