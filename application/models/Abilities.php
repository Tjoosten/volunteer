<?php defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

/**
 * class Abilities
 */
Class Abilities extends Model
{
    /**
     * The database table name.
     *
     * @return city
     */
    protected $table = 'abilities';

    /**
     * The mass-assign fields for the database table name.
     *
     * @return array
     */
    protected $fillable = ['name', 'description'];
}
