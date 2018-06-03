<?php

use Faker\Factory as Faker;
use App\Models\Asistencia;
use App\Repositories\AsistenciaRepository;

trait MakeAsistenciaTrait
{
    /**
     * Create fake instance of Asistencia and save it in database
     *
     * @param array $asistenciaFields
     * @return Asistencia
     */
    public function makeAsistencia($asistenciaFields = [])
    {
        /** @var AsistenciaRepository $asistenciaRepo */
        $asistenciaRepo = App::make(AsistenciaRepository::class);
        $theme = $this->fakeAsistenciaData($asistenciaFields);
        return $asistenciaRepo->create($theme);
    }

    /**
     * Get fake instance of Asistencia
     *
     * @param array $asistenciaFields
     * @return Asistencia
     */
    public function fakeAsistencia($asistenciaFields = [])
    {
        return new Asistencia($this->fakeAsistenciaData($asistenciaFields));
    }

    /**
     * Get fake data of Asistencia
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAsistenciaData($asistenciaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'fecha' => $fake->word,
            'numEstudiantes' => $fake->randomDigitNotNull,
            'tipoTutoria' => $fake->word,
            'tipoTexto' => $fake->word,
            'generoDiscursivo' => $fake->word,
            'programaAcademico' => $fake->word,
            'tutor_id' => $fake->randomDigitNotNull,
            'estudiante_id' => $fake->randomDigitNotNull,
            'materia_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $asistenciaFields);
    }
}
