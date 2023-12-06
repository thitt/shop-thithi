<?php

namespace App\Repositories;

use App\Models\Size;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class SizeRepository.
 */
class SizeRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Size::class;
    }
}
