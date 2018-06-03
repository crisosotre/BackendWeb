<?php

use App\Models\TipoUsuario;
use App\Repositories\TipoUsuarioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TipoUsuarioRepositoryTest extends TestCase
{
    use MakeTipoUsuarioTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TipoUsuarioRepository
     */
    protected $tipoUsuarioRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tipoUsuarioRepo = App::make(TipoUsuarioRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTipoUsuario()
    {
        $tipoUsuario = $this->fakeTipoUsuarioData();
        $createdTipoUsuario = $this->tipoUsuarioRepo->create($tipoUsuario);
        $createdTipoUsuario = $createdTipoUsuario->toArray();
        $this->assertArrayHasKey('id', $createdTipoUsuario);
        $this->assertNotNull($createdTipoUsuario['id'], 'Created TipoUsuario must have id specified');
        $this->assertNotNull(TipoUsuario::find($createdTipoUsuario['id']), 'TipoUsuario with given id must be in DB');
        $this->assertModelData($tipoUsuario, $createdTipoUsuario);
    }

    /**
     * @test read
     */
    public function testReadTipoUsuario()
    {
        $tipoUsuario = $this->makeTipoUsuario();
        $dbTipoUsuario = $this->tipoUsuarioRepo->find($tipoUsuario->id);
        $dbTipoUsuario = $dbTipoUsuario->toArray();
        $this->assertModelData($tipoUsuario->toArray(), $dbTipoUsuario);
    }

    /**
     * @test update
     */
    public function testUpdateTipoUsuario()
    {
        $tipoUsuario = $this->makeTipoUsuario();
        $fakeTipoUsuario = $this->fakeTipoUsuarioData();
        $updatedTipoUsuario = $this->tipoUsuarioRepo->update($fakeTipoUsuario, $tipoUsuario->id);
        $this->assertModelData($fakeTipoUsuario, $updatedTipoUsuario->toArray());
        $dbTipoUsuario = $this->tipoUsuarioRepo->find($tipoUsuario->id);
        $this->assertModelData($fakeTipoUsuario, $dbTipoUsuario->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTipoUsuario()
    {
        $tipoUsuario = $this->makeTipoUsuario();
        $resp = $this->tipoUsuarioRepo->delete($tipoUsuario->id);
        $this->assertTrue($resp);
        $this->assertNull(TipoUsuario::find($tipoUsuario->id), 'TipoUsuario should not exist in DB');
    }
}
