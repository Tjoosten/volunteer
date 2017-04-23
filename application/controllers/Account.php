<?php defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{
    /**
     * Account constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = '';
        return $this->blade->render('', $data);
    }

    /**
     *
     * @see:url('POST', 'http://www.vrijwilligers.activisme.be/account/updateSettings')
     * @return Blade view | Response
     */
    public function updateSettings()
    {

    }

    /**
     * Update the user his password.
     *
     * @see:url('POST', '')
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

        $input['password'] = $this->input->post('paassword', true);

        if ($user = Authencation::find($user['id'])) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', $this->lang->line('flash-update-password'));
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }
}
