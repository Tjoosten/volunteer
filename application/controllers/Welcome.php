<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Welcome
 */
class Welcome extends CI_Controller
{
	public $user 		= []; /** @var array|mixed $user			The authencated user information. 			*/
	public $language    = []; /** @var array|mixed $language 		The language for the front-end.   			*/
	public $abilities 	= []; /** @var array|mixed $abilities		The abilities for the authencated abilities */
	public $permissions = []; /** @var array|mixed $permissions		The permissions for the authencated user	*/

	/**
	 * Welcome constructor
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library(['session', 'blade']);
		$this->load->helper(['url']);

		// User sessions.
		$this->user 		= $this->session->userdata('user');
		$this->permissions 	= $this->session->userdata('permissions');
		$this->abilities 	= $this->session->userdata('abilities');
		$this->language     = $this->session->userdata('language');

		// Language files.
		$this->lang->load('layouts', $this->language['prefix']);
		$this->lang->load('index', $this->language['prefix']);
	}

	/**
	 * Get the front page for the application.
	 *
	 * @see:url('GET|HEAD', 'http://www.vrijwilligers.activisme.be')
	 * @return string
	 */
	public function index()
	{
		$data['title']  = $this->lang->line('title-index');
		$data['groups'] = Groups::orderByRaw("RAND()")->take(6)->get();

		return $this->blade->render('home', $data); // TODO: Create view.
	}
}
