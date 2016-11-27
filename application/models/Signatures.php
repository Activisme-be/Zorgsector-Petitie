<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Signatures
 */
class Signatures extends Eloquent
{
    /**
     * The database table.
     *
     * @var string
     */
    protected $table = 'signatures';

    /**
     * Mass-assign fields
     *
     * @var array
     */
    protected $fillable = ['name', 'city', 'birth_date', 'email'];

    /**
     * Disable timestamps.
     *
     * @var bool
     */
    public $timestamps = false;
}