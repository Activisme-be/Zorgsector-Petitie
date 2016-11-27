<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Applications
 */
Class Applications extends Eloquent
{
    /**
     * Set the database connection;
     *
     * @var string
     */
    public $connection = 'auth';

    /**
     * The database table.
     *
     * @var string
     */
    protected $table = 'Platforms';

    /**
     * Mass-assign fields
     *
     * @var array
     */
    protected $fillable = [];
}
