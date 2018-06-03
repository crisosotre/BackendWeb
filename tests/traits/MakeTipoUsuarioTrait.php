<?php

use Faker\Factory as Faker;
use App\Models\TipoUsuario;
use App\Repositories\TipoUsuarioRepository;

trait MakeTipoUsuarioTrait
{
    /**
     * Create fake instance of TipoUsuario and save it in database
     *
     * @param array $tipoUsuarioFields
     * @return TipoUsuario
     */
    public function makeTipoUsuario($tipoUsuarioFields = [])
    {
        /** @var TipoUsuarioRepository $tipoUsuarioRepo */
        $tipoUsuarioRepo = App::make(TipoUsuarioRepository::class);
        $theme = $this->fakeTipoUsuarioData($tipoUsuarioFields);
        return $tipoUsuarioRepo->create($theme);
    }

    /**
     * Get fake instance of TipoUsuario
     *
     * @param array $tipoUsuarioFields
     * @return TipoUsuario
     */
    public function fakeTipoUsuario($tipoUsuarioFields = [])
    {
        return new TipoUsuario($this->fakeTipoUsuarioData($tipoUsuarioFields));
    }

    /**
     * Get fake data of TipoUsuario
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTipoUsuarioData($tipoUsuarioFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $tipoUsuarioFields);
    }
}
