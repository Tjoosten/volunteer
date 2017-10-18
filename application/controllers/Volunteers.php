<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @todo: docblock
 */
class Volunteers extends MY_Controller
{
	public $user 		= []; /** @todo: docblock */
	public $abilities 	= []; /** @todo: docblock */
	public $permissions = []; /** @todo: docblock */
	public $language 	= []; /** @todo: docblock */

    /**
     * Volunteers constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->user         = $this->session->userdata('user');
        $this->language     = $this->session->userdata('language')
        $this->abilities    = $this->session->userdata('abilities');
        $this->permissions  = $this->session->userdata('permissions');
    }

    /**
     * Get the volunteers index controllers.
     *
     * @see:url('GET|HEAD', 'http://www.vrijwilligers.activisme.be/volunteers')
     * @return blade view
     */
    public function index()
    {
        $data['title']       = 'Vrijwilligers ploegen';
        $data['volunteers']  = Volunteer::with(['admin.group'])->get();

        return $this->blade('render');
    }

    /**
     * Show the volunteers for a speciic group.
     *
     * @see:url('GET|HEAD', 'http://www.vrijwilligers.activisme.be/volunteers/show/{groupId}')
     * @return blade view
     */
    public function show()
    {
        $param['groupId'] = $this->security->xss_clean($this->uri->segment(3));

        $data['group'] = Groups::find($param['groupId']);
        $data['title'] = $data['group']->title;

        return $this->blade->render('', $data);
    }
}
