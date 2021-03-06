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
     * Middleware protected for the class.
     *
     * @return array
     */
    protected function middleware()
    {
        // TODO: Build up the admin middleware.
        // TODO: Implement auth middleware.

        return [];
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
     * The backend management view for the volunteer groups.
     *
     * @see:url('GET|HEAD', 'http://www.vrijwillgers.activisme.be/backend')
     * @return Blade view
     */
    public function backend()
    {
        $data['title']  = $this->lang->line('title-backend');
        $data['groups'] = new Groups;

        return $this->blade->render('groups/backend', $data);
    }

    /**
     * Create view for a new volunteers group.
     *
     * @see:url('GET|HEAD', 'http://www.vrijwilligers.activisme.be/group/create')
     * @return Blade view
     */
    public function create()
    {
<<<<<<< HEAD
        $data['title'] = $this->lang->line('title-create');
        return $this->blade->render('groups/create', $data);
=======

>>>>>>> be5561fe936f8a86df951b8c73ba973642b36eeb
    }

    /**
     * Store a new volunteer group in the system.
     *
     * @see:url('POST', 'http://www.vrijwilligers.activisme.be/group/store')
     * @return Response|Blade view
     */
    public function store()
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Beschrijving', 'trim|required');

        if ($this->form_validation->run() === false) { // Form validation fails.
            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', $this->lang->line('flash-error-create'));

            $data['title'] = $this->lang->line('title-create');
            return $this->blade->render('groups/create', $data);
        }

        // No validation errors.
        $input['author_id']   = $this->user['id'];
        $input['title']       = $this->input->post('title', true);
        $input['description'] = $this->input->post('description', true);

        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2000';
        $this->upload->initialize($config);

        if ($this->upload->do_upload('image') && $new = Groups::create($input)) {
            Groups::find($new->id)->update(['image' => $this->upload->data('file_name')]);

<<<<<<< HEAD
            $this->session->set_flashdata('class', '');
=======
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', '');
        } else {
            $this->session->set_flashdata('class', 'alert alert-danger');
>>>>>>> be5561fe936f8a86df951b8c73ba973642b36eeb
            $this->session->set_flashdata('message', '');
        }

        $this->session->set_flashdata('class', '');
        $this->session->set_flashdata('message', '');

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * Update view for the bvolunteers group.
     *
     * @see:url('GET|HEAD', 'http://www.vrijwilligers.activisme.be/group/edit/{groupId}')
     * @return Response|Blade view.
     */
    public function edit()
    {
        try {
            $data['group'] = Groups::findOrFail($this->uri->segment(3));
            $data['title'] = "{$this->lang->line('title-group-edit')} {$data['group']->title}";

            return $this->blade->render('groups/edit', $data);
        } catch (\Exception $exception) {
            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', $this->lang->line('flash-error-edit'));

            return redirect($_SERVER['HTTP_REFERER']);
        }
    }

    /**
     * Update the volunteers group information in the database.
     *
     * @see:url('POST', 'http://www.vrijwilligers.activisme.be/group/update/{groupId}')
     * @return Reditect | Blade view
     */
    public function update()
    {
        $this->form_validation->set_rules('title', 'Titel', 'trim|required');
        $this->form_validation->set_rules('description', 'Beschrijving', 'trim|required');

        if ($this->form_validation->run() === false) { // Form validation fails.
            $data['group'] = Groups::findOrFail($this->uri->segment(3));
            $data['title'] = "{$this->lang->line('title-group-edit')} {$data['group']->title}";

            return $this->blade->render('groups/edit', $data);
        }

        // No validation errors found.

        try {
            $group = Groups::findOrFail($this->uri->segment(3));

            $input['title']       = $this->input->post('title', true);
            $input['description'] = $this->input->post('description', true);

            if ($group->update($input)) { // Record has been updated.
                $this->session->set_flashdata('class', 'alert alert-danger');
                $this->session->set_flashdata('message', $this->lang->line('flash-update-group'));
            }

        } catch (\Exception $exception) {
            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', $this->lang->line('flash-error-not-found'));
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
<<<<<<< HEAD
     * Delete a volunteer group form the database.
     *
     * @see:url('GET|HEAD', 'http://www.vrijwilligers.activisme.be/delete/{groupId}')
     * @return Response
     */
    public function delete()
    {
        try {
            if ($group = Groups::findOrFail($this->uri->segment(3)) && $group->delete()) {
                $this->session->set_flashdata('class', 'alert alert-danger');
                $this->session->set_flashdata('message', $this->lang->line('flash-error-not-found'));
            }
        } catch(\Exception $exception) {
            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', $this->lang->line('flash-error-delete'));
        }

        return redirect($_SERVER['HTTP_REFERER']);
=======
     * Delete a volunteers group.
     *
     * @see:url()
     * @return
     */
    public function delete()
    {
        try { // to find the group.
			$user = Authencated::findOrFail($this->security->xss_clean($this->uri->segment(3)));

			if ($user->delete()) { // The group is deleted
				$this->session->set_flashdata('class', 'alert-success');
				$this->session->set_flashdata('message', 'De vrijwilligers groep is verwijderd.');
			}
		} catch (\Exception $notFoundException) { // Group is not found.
			return redirect($_SERVER['HTTP_REFERER']);
		}
>>>>>>> be5561fe936f8a86df951b8c73ba973642b36eeb
    }
}
