<?php defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

/**
 * Class PasswordReset
 */
class PasswordReset extends Model
{
	/**
	 * The database table for the model.
	 *
	 * @var string
	 */
	protected $table = 'auth_reset';

	/**
	 * Mass-assign fields for the database table.
	 *
	 * @var array
	 */
	protected $fillable = ['token_uuid', 'email'];
}
