<?php

use Faker\Factory as Faker;
use App\Models\Usuario;
use App\Repositories\UsuarioRepository;

trait MakeUsuarioTrait
{
    /**
     * Create fake instance of Usuario and save it in database
     *
     * @param array $usuarioFields
     * @return Usuario
     */
    public function makeUsuario($usuarioFields = [])
    {
        /** @var UsuarioRepository $usuarioRepo */
        $usuarioRepo = App::make(UsuarioRepository::class);
        $theme = $this->fakeUsuarioData($usuarioFields);
        return $usuarioRepo->create($theme);
    }

    /**
     * Get fake instance of Usuario
     *
     * @param array $usuarioFields
     * @return Usuario
     */
    public function fakeUsuario($usuarioFields = [])
    {
        return new Usuario($this->fakeUsuarioData($usuarioFields));
    }

    /**
     * Get fake data of Usuario
     *
     * @param array $postFields
     * @return array
     */
    public function fakeUsuarioData($usuarioFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'codigo' => $fake->word,
            'carrera' => $fake->word,
            'semestre' => $fake->word,
            'correo' => $fake->word,
            'contrasena' => $fake->word,
            'tipo_usuario_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $usuarioFields);
    }
}
