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
    public $fillable = ['title','excerpt','content'];
    // fillable的第一种用法，在类里面直接添加
    /**
     * ClosureTable model instance.
     *
     * @var pageClosure
     */
    protected $closure = 'App\pageClosure';
}
