<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @todo docblock
 */
class Account extends CI_Controller
{
    public $user        = []; /** TODO: docblock */
    public $permissions = []; /** TODO: docblock */
    public $abilities   = []; /** TODO: docblock */
    public $language    = []; /** TODO: docblock */

    /**
     * Account constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['blade', 'form_validation', 'session']);
        $this->load->helper(['url']);

        $this->user        = $this->session->userdata('user');
        $this->permissions = $this->session->userdata('permissions');
        $this->abilities   = $this->session->userdata('abilities');
        $this->language    = $this->session->userdata('language');
    }

    /**
     * Get the profile settings page.
     *
     * @see:url('GET|HEAD', 'http://www.vrijwilligers.activisme.be/account')
     * @return Blade View
     */
    public function index()
    {
        $data['title'] = $this->lang->line('title-account');
        return $this->blade->render('auth/profile', $data);
    }

    /**
     * Update the account information in the database.s
     *
     * @see:url('POST', 'http://www.vrijwilligers.activisme.be/account/updateSettings')
     * @return Blade view | Response
     */
    public function updateSettings()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|is_unique[users.email]');

        if ($this->form_validation->run() === false) { // Form validation fails.
            $data['user']  = Authencate::find($this->user['id']);
            $data['title'] = $this->lang->line('title-account');

            return $this->blade->render('auth/profile');
        }

        // Inputs
        $input['name']     = $this->input->post('name');
        $input['username'] = $this->input->post('username');
        $input['email']    = $this->input->post('email');

        if ($user = Authencate::find($this->user['id'])->update($this->security->xss_clean($input))) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', $this->lang->line('flash-update-account'));
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * Update the user his password.
     *
     * @see:url('POST', 'http://www.vrijwilligers.activisme.be/account/updatePassword')
     * @return Blade view | Response
     */
    public function updatePassword()
    {
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password_conformation]');
        $this->form_validation->set_rules('password_conformation', 'Password confirmation', 'trim|required');

        if ($this->form_validation->run() === false) { // Form validation fails.
            $data['user']  = Authencate::find($this->user['id']);
            $data['title'] = $this->lang->line('title-account');

            return $this->blade->render('auth/profile');
        }

        $input['password'] = $this->input->post('paassword');

        if ($user = Authencation::find($this->user['id'])->update($this->security->xss_clean($input))) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', $this->lang->line('flash-update-password'));
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }
}
