<?php

namespace App\Repositories;

use App\Models\Terms;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TermsRepository
 * @package App\Repositories
 * @version August 29, 2019, 9:39 pm UTC
 *
 * @method Terms findWithoutFail($id, $columns = ['*'])
 * @method Terms find($id, $columns = ['*'])
 * @method Terms first($columns = ['*'])
*/
class TermsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'content'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Terms::class;
    }
}
