<?php

use App\Models\Usuario;
use App\Repositories\UsuarioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsuarioRepositoryTest extends TestCase
{
    use MakeUsuarioTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var UsuarioRepository
     */
    protected $usuarioRepo;

    public function setUp()
    {
        parent::setUp();
        $this->usuarioRepo = App::make(UsuarioRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateUsuario()
    {
        $usuario = $this->fakeUsuarioData();
        $createdUsuario = $this->usuarioRepo->create($usuario);
        $createdUsuario = $createdUsuario->toArray();
        $this->assertArrayHasKey('id', $createdUsuario);
        $this->assertNotNull($createdUsuario['id'], 'Created Usuario must have id specified');
        $this->assertNotNull(Usuario::find($createdUsuario['id']), 'Usuario with given id must be in DB');
        $this->assertModelData($usuario, $createdUsuario);
    }

    /**
     * @test read
     */
    public function testReadUsuario()
    {
        $usuario = $this->makeUsuario();
        $dbUsuario = $this->usuarioRepo->find($usuario->id);
        $dbUsuario = $dbUsuario->toArray();
        $this->assertModelData($usuario->toArray(), $dbUsuario);
    }

    /**
     * @test update
     */
    public function testUpdateUsuario()
    {
        $usuario = $this->makeUsuario();
        $fakeUsuario = $this->fakeUsuarioData();
        $updatedUsuario = $this->usuarioRepo->update($fakeUsuario, $usuario->id);
        $this->assertModelData($fakeUsuario, $updatedUsuario->toArray());
        $dbUsuario = $this->usuarioRepo->find($usuario->id);
        $this->assertModelData($fakeUsuario, $dbUsuario->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteUsuario()
    {
        $usuario = $this->makeUsuario();
        $resp = $this->usuarioRepo->delete($usuario->id);
        $this->assertTrue($resp);
        $this->assertNull(Usuario::find($usuario->id), 'Usuario should not exist in DB');
    }
}
