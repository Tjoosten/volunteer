<?php defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

/**
 * Class Groups
 */
class Groups extends Model
{
	/**
	 * The database table for the model.
	 *
	 * @var string
	 */
	protected $table = 'volunteer_groups';

	/**
	 * Mass-assign fields for the database table.
	 *
	 * @var array
	 */
	protected $fillable = ['author_id', 'image', 'title', 'description'];
}
