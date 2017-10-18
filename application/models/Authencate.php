<?php defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

/**
 * Class Authencate
 */
class Authencate extends Model
{
    /**
     * The database table for the model.
     *
     * @return string
     */
    protected $table = 'users';

    /**
     * Mass-assign fields for the database table.
     *
     * @return array
     */
    protected $fillable = ['name', 'password', 'email', 'ban_id', 'username'];

    /**
     * Get the permissions for the user.
     *
     * @return belongsToMany instance
     */
    public function permissions()
    {
        return $this->belongsToMany(Permissions::class, 'login_permissions', 'login_id', 'permissions_id')->withTimestamps();
    }

    /**
     * Get the abilities for the user.
     *
     * @return belongsToMany instance
     */
    public function abilities()
    {
        return $this->belongsToMany(Abilities::class, 'login_abilities', 'login_id', 'ability_id')->withTimestamps();
    }

    /**
     * Show information when the user is banned.
     *
     * @return belongsTo Instance.
     */
    public function ban()
    {
        return $this->belongsTo(Ban::class, 'ban_id');
    }
}
