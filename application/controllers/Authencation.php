<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Authencation
 */
class Authencation extends CI_Controller
{
	public $user 		= []; /** @var array|mixed $user			The authencated user information. 			*/
	public $language    = []; /** @var array|mixed $language 		The language for the front-end.   			*/
	public $abilities 	= []; /** @var array|mixed $abilities		The abilities for the authencated abilities */
	public $permissions = []; /** @var array|mixed $permissions		The permissions for the authencated user	*/

	/**
	 * Authencation constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library(['form_validation', 'session', 'blade']);
		$this->load->helper(['url']);

		// User sessions.
		$this->user 		= $this->session->userdata('user');
		$this->permissions 	= $this->session->userdata('permissions');
		$this->abilities 	= $this->session->userdata('abilities');
		$this->language     = $this->session->userdata('language');

		// Language files.
		$this->lang->load('layouts', $this->language['prefix']);
		$this->lang->load('auth', $this->language['prefix']);
	}

	/**
	 * The login form.
	 *
	 * @url:see('GET|HEAD', 'http://www.vrijwilligers.activisme.be/authencation')
	 * @return string
	 */
	public function index()
	{
		$data['title'] = $this->lang->line('title-index-login');
		return $this->blade->render('auth/login', $data);
	}
}
