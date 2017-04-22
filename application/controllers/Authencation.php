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
		$this->load->library(['form_validation', 'session', 'blade', 'email']);
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

    /**
     * Validate the form request.
     *
     * @url:see('GET|HEAD', 'http://www.vrijwilligers.activisme.be/authencation/verify')
     * @return Redirect|Blade view
     */
	public function verify()
	{
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|callback_check_database');

        if ($this->form_validation->run() === false) { // Form validation fails.
            $data['title'] = $this->lang->line('title-index-login');

            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', $this->lang->line('login-validation-error'));

            return $this->blade->render('auth/login', $data);
        }

        return redirect(base_url('backend'));
	}

	/**
	 * [INTERNAL]: Check the given user credentails against the database.
	 *
	 * @param  string  $password   The user given password.
	 * @return mixed
	 */
	public function check_database($password)
	{
        $input['email'] = $this->security->xss_clean($this->input->post('email'));

        $db['user'] = Authencate::with(['permissions', 'abilities'])
            ->where('email', $input['email'])
            ->where('blocked', 'N')
            ->where('password', md5($password));

        if ((int) $db['user']->count() === 1) {
            $authencation = []; // Empty userdata array.
            $permissions  = []; // Empty permissions array.
            $abilities    = []; // Empty abilities array.

            foreach ($db['user']->get() as $user) {
                foreach ($user->permissions as $permission) {
                    array_push($permissions, $permission->name);
                }

                foreach ($user->abilities as $ability) {
                    array_push($abilities, $ability->name);
                }

                if (in_array('Admin', $permissions) || in_array('Developer', $permissions) || in_array('Volunteer', $permissions)) {
                    $authencation['id']         = $user->id;
                    $authencation['name']       = $user->name;
                    $authencation['email']      = $user->email;
                    $authencation['username']   = $user->username;

                    $this->session->set_userdata('user', $authencation);
                    $this->session->set_userdata('permissions', $permissions);
                    $this->session->set_userdata('abilities', $abilities);

                    return true;
                } else {
                    $this->form_validation->set_message('check_database', $this->lang->line('login-no-permissions'));

                    $this->session->set_flashdata('class', 'alert alert-danger');
                    $this->session->set_flashdata('message', $this->lang->line('login-no-permissions'));

                    return false;
                }
            }
        } else {
            $this->form_validation->set_message('check_database', $this->lang->line('login-validation-error'));

            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', $this->lang->line('login-validation-error'));

            return false;
        }
	}


	/**
	 * Store the lost password reset in the database.
	 *
     * @url:see('POST', '')
     * @return Blade View|Response
	 */
	public function lost()
	{
        $this->form_validation->set_rules('email', 'email', 'trim|required');

        if ($this->form_validation->run() === false) { // Form validation fails.
            $data['title'] = $this->lang->line('title-index-login');
    		return $this->blade->render('auth/login', $data);
        }

        $input['email'] = $this->security->xss_clean($this->input->post('email'));
        $db['user']     = Authencate::where('email', $input['email']);

        // No validation errors. Move on.
        if ((int) $db['user']->count() === 1) {
            if (PasswordReset::create($input)) {
                $user = $db['user']->first()->get();

                // Email config
                $emailConf['protocol']     = 'smtp';
                $emailConf['smtp_host']    = 'mailout.one.com';
                $emailConf['smtp_user']    = 'noreply@activisme.be';
                $emailConf['smtp_pass']    = 'ikbeneenwachtwoord';
                $emailConf['smtp_port']    = 587;
                $emailConf['smtp_crypto']  = 'tls';
                $emailConf['authencation'] = true;

                $this->email->initialize($emailConf); // Init config

                $this->email->from('noreply@activisme.be');
                $this->email->to($user->email);
                $this->email->subject('Activisme_BE | Wachtwoord reset');
                $this->email->message($this->blade->render('auth/email/lost-password'));
                $this->email->set_mailtype('html');

                // Build up the email.

                if ($this->email->send()) {
                    $this->session->set_flashdata('class', 'alert alert-success');
                    $this->session->set_flashdata('message', 'De reset email is verzonden.');
                } else {
                    $this->session->set_flashdata('class', 'alert alert-danger');
                    $this->session->set_flashdata('message', 'Wij konden geen email verzenden door een interne fout.');
                }

                $this->email->clear();
                return redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('alert alert-danger');
                $this->session->set_flashdata('Wij hebben geen gebruiker gevonden met het gegeven email adres.');
            }
        }
	}

    /**
     *
     *
     */
	public function reset()
	{

	}

    /**
     *
     *
     */
	public function logout()
	{
        //
	}
}
