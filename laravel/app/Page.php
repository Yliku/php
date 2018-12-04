<?php
namespace App;

use Franzose\ClosureTable\Models\Entity;

class page extends Entity implements pageInterface
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * ClosureTable model instance.
     *
     * @var pageClosure
     */
    protected $closure = 'App\pageClosure';
}
