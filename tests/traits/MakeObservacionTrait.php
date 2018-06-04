<?php

use Faker\Factory as Faker;
use App\Models\Observacion;
use App\Repositories\ObservacionRepository;

trait MakeObservacionTrait
{
    /**
     * Create fake instance of Observacion and save it in database
     *
     * @param array $observacionFields
     * @return Observacion
     */
    public function makeObservacion($observacionFields = [])
    {
        /** @var ObservacionRepository $observacionRepo */
        $observacionRepo = App::make(ObservacionRepository::class);
        $theme = $this->fakeObservacionData($observacionFields);
        return $observacionRepo->create($theme);
    }

    /**
     * Get fake instance of Observacion
     *
     * @param array $observacionFields
     * @return Observacion
     */
    public function fakeObservacion($observacionFields = [])
    {
        return new Observacion($this->fakeObservacionData($observacionFields));
    }

    /**
     * Get fake data of Observacion
     *
     * @param array $postFields
     * @return array
     */
    public function fakeObservacionData($observacionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'tipoTutoria' => $fake->word,
            'inquietudesSolucionadas' => $fake->word,
            'tratoDelTutor' => $fake->randomDigitNotNull,
            'tiempoSuficiente' => $fake->word,
            'tutoriaDaHerramientas' => $fake->word,
            'comentarios' => $fake->word,
            'tutor_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $observacionFields);
    }
}
