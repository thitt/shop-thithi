<?php

namespace App\Repositories;

use App\Models\Color;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class ColorRepository.
 */
class ColorRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Color::class;
    }
}
