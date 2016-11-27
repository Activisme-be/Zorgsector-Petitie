<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Logins
 */
class Logins extends Eloquent
{
    /**
     * Specify the database connection.
     * @var string
     */
    // protected $connection = 'auth';

    /**
     * Database table.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Mass-assign fields.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password', 'blocked'];

    /**
     * Disable timestamps.
     *
     * @var bool
     */
    public $timestamps = false;
}