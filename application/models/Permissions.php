<?php defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

/**
 * Class: permissions
 */
class Permissions extends Model
{
    /**
     * The database table name.
     *
     * @return string
     */
    protected $table = 'permissions';

    /**
     * Mass-assign fields for the database table.
     *
     * @return array
     */
    protected $fillable = ['name', 'description'];
}
