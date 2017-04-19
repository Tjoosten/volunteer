<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Welcome
 */
class Welcome extends CI_Controller
{
	public $user 		= []; /** */
	public $language    = []; /** */
	public $abilities 	= []; /** */
	public $permissions = []; /** */

	/**
	 * Welcome constructor
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library(['session', 'blade']);
		$this->load->helper(['blade']);

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
		$data['groups'] = Group::all();

		return $this->blade->render('home', $data); // TODO: Create view.
	}
}
