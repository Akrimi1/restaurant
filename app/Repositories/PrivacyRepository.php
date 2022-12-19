<?php

namespace App\Repositories;

use App\Models\Privacy;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FaqRepository
 * @package App\Repositories
 * @version August 29, 2019, 9:39 pm UTC
 *
 * @method Faq findWithoutFail($id, $columns = ['*'])
 * @method Faq find($id, $columns = ['*'])
 * @method Faq first($columns = ['*'])
*/
class PrivacyRepository extends BaseRepository
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
        return Privacy::class;
    }
}
