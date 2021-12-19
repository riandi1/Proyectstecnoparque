<?php

namespace App\Repositories;

use App\Models\Autor;
use App\Repositories\BaseRepository;

/**
 * Class AutorRepository
 * @package App\Repositories
 * @version July 15, 2021, 5:21 pm UTC
*/

class AutorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'obs',
        'image'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Autor::class;
    }
}
