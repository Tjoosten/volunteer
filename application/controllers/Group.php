<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Group
 */
class Group extends CI_Controller
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
		$this->load->library(['form_validation', 'session', 'blade', 'upload']);
		$this->load->helper(['url']);

		// User sessions.
		$this->user 		= $this->session->userdata('user');
		$this->permissions 	= $this->session->userdata('permissions');
		$this->abilities 	= $this->session->userdata('abilities');
		$this->language     = $this->session->userdata('language');

		// Language files.
		$this->lang->load('layouts', $this->language['prefix']);
		$this->lang->load('groups', $this->language['prefix']);
	}

    /**
     * Get the front-end group index page.
     *
     * @see:url()
     * @return Blade view
      */
	public function index()
	{
		$data['title'] = $this->lang->line('title-index');
		return $this->blade->render('groups/show', $data);
	}

    /**
     * Store a new volunteer group in the system.
     *
     * @see:url('POST', 'http://www.vrijwilligers.activisme.be/group/store')
     * @return
     */
    public function store()
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Beschrijving', 'trim|required');

        if ($this->form_validation->run() === false) { // Form validation fails.
            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', $this->lang->load('flash-error-create'));

            return redirect(base_url('group/create'));
        }

        // No validation errors.
        $input['author_id']   = $this->user['id'];
        $input['title']       = $this->input->post('title', true);
        $input['description'] = $this->input->post('description', true);

        if ($this->upload->do_upload('image') && $new = Groups::create($input)) {
            Groups::find($new->id)->update(['image' => $this->upload->data('file_path')]);

            $this->session->set_flashdata();
            $this->session->set_flashdata();
        } else {
            $this->session->set_flashdata();
            $this->session->set_flashdata();
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     *
     *
     * @see:url()
     * @return
     */
    public function edit()
    {
        //
    }

    /**
     *
     *
     * @see:url()
     * @return
     */
    public function update()
    {
        //
    }

    /**
     *
     *
     * @see:url()
     * @return
     */
    public function delete()
    {
        //
    }
}
