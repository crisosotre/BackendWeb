<?php

use Faker\Factory as Faker;
use App\Models\Materia;
use App\Repositories\MateriaRepository;

trait MakeMateriaTrait
{
    /**
     * Create fake instance of Materia and save it in database
     *
     * @param array $materiaFields
     * @return Materia
     */
    public function makeMateria($materiaFields = [])
    {
        /** @var MateriaRepository $materiaRepo */
        $materiaRepo = App::make(MateriaRepository::class);
        $theme = $this->fakeMateriaData($materiaFields);
        return $materiaRepo->create($theme);
    }

    /**
     * Get fake instance of Materia
     *
     * @param array $materiaFields
     * @return Materia
     */
    public function fakeMateria($materiaFields = [])
    {
        return new Materia($this->fakeMateriaData($materiaFields));
    }

    /**
     * Get fake data of Materia
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMateriaData($materiaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'profesor' => $fake->word,
            'tipoCurso' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $materiaFields);
    }
}
