<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class: disclaimer
 */
class Disclaimer extends CI_Controller
{
    public $user        = []; /** @var array|mixed */
    public $permissions = []; /** @var array|mixed */
    public $abilities   = []; /** @var array|mixed */
    public $language    = []; /** @var array|mixed */

    /**
     * Disclaimer constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['blade', 'session']);
        $this->load->helper(['url']);

        $this->user        = $this->session->set_flashdata('user');
        $this->permissions = $this->session->set_flashdata('permissions');
        $this->abilities   = $this->session->set_flashdata('abilities');
        $this->language    = $this->session->set_flashdata('language');
    }

    /**
     * Show the disclaimer for the platform.
     *
     * @see:url('GET|HEAD', 'http://www.vrijwilligers.activisme.be/disclaimer')
     * @return Blade view
     */
    public function index()
    {
        return $this->blade->render('disclaimer', ['title' => 'Disclaimer']);
    }
}
