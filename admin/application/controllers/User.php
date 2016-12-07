<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Controller class for User
 * 
 */
class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->database();
		$this->load->model('User_model');
        $this->load->model('Menu_model');
		$this->load->model('admin_model');
	}

	public function index()
	{
		$this->register();
	}

	public function register()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Confirm Password', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			if(isset($this->session->userdata['logged_in']))
			{
				redirect('/');
			}
		}
		else
		{
			$data = array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => hash('sha512', $this->input->post('password'))
			);

			if ($this->User_model->insertUser($data))
			{
				if ($this->User_model->sendVerifyMail($this->input->post('email')))
				{
					$this->session->set_flashdata('msg','<div class="alert alert-success text-center">U bent succesvol geregistreerd! Verifieer uw email adres om door te gaan.</div>');
					redirect('user/register');
				}
				else
				{
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Er ging is mis.  Probeer het later nog eens!</div>');
					redirect('user/register');
				}
			}
			else
			{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Er ging is mis.  Probeer het later nog eens!</div>');
				redirect('user/register');
			}
		}

		$this->layout->setLayout('reglogin');
		$this->layout->render();
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');

		if ($this->form_validation->run() == FALSE)
		{
			if(isset($this->session->userdata['logged_in']))
			{
				redirect('/');
			}
		} 
		else
		{
			$data = array(
			'username' => $this->input->post('username'),
			'password' => hash('sha512', $this->input->post('password'))
			);

			$result = $this->User_model->login($data);
			if ($result === true)
			{
				if( $this->User_model->checkVerifyStatus($data['username']) )
				{
					$session_data = array(
						'username' => $data['username'],
					);

					$this->session->set_userdata('logged_in', $session_data);
					redirect('/');
				}
				else
				{
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Uw email adres is nog niet geverifieerd.</div>');
					redirect('/user/login');
				}
			}
			else
			{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Niet bekende Gebruikersnaam of Wachtwoord</div>');
				redirect('/user/login');
			}
		}
		$this->layout->setLayout('reglogin');
		$this->layout->render();
	}

	public function logout()
	{
		$sess = array(
		'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess);
		$this->session->set_flashdata('msg-logout','<div class="alert alert-success text-center">Succesvol uitgelogd!</div>');
		redirect('/');
	}

	public function verify($hash=NULL)
	{
		if ($this->User_model->verifyEmailID($hash))
		{
			$this->session->set_flashdata('verify_msg','<div class="alert alert-success text-center">Uw Email Adres is succesvol geverifieerd! U kunt nu inloggen!</div>');
			redirect('user/login');
		}
		else
		{
			$this->session->set_flashdata('verify_msg','<div class="alert alert-danger text-center">Sorry! Er ging iets mis met het verifieren van uw Email Adres!</div>');
			redirect('user/register');
		}
	}

	public function profile()
	{
		if(isset($this->session->userdata['logged_in']))
		{
			$this->layout->data['userstats'] = $this->admin_model->getUserStats($this->session->userdata['logged_in']['username']);
		}
		
		$this->layout->render();
	}

	public function changePassword($hash = Null)
	{
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Confirm Password', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			if(isset($this->session->userdata['logged_in']))
			{
				redirect('/');
			}
		}
		else
        {
            $password = hash('sha512', $this->input->post('password'));

             if ($this->User_model->updatePassword($password, $hash))
             {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Uw wachtwoord is succesvol veranderd. U kunt nu inloggen.</div>');
             }
             else
             {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Er ging is mis. Probeer het later nog eens!</div>');
             }
		}

		$this->layout->setLayout('reglogin');
		$this->layout->render();
	}
	public function requestPassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			if(isset($this->session->userdata['logged_in']))
			{
				redirect('/');
			}
		}
		else
		{
		    $email = $this->input->post('email');

		    $result = $this->User_model->sendPasswordRequest($email);

            if ($result)
            {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Email is succesvol verstuurd! Bekijk uw inbox om verder te gaan.</div>');
            }
            else
            {
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Er ging is mis. Probeer het later nog eens!</div>');
            }
		}

		$this->layout->setLayout('reglogin');
		$this->layout->render();
	}

    public function manage()
    {
        if(isset($this->session->userdata['logged_in']))
        {
            $this->layout->data['userstats'] = $this->Menu_model->getUserStats($this->session->userdata['logged_in']['username']);
            $this->layout->data['records'] = $this->User_model->getAllUsers();
        }

        $this->layout->setLayout('usermanage');
        $this->layout->render();
    }

    public function editUser($id)
    {

        if(isset($this->session->userdata['logged_in'])) {
            $this->layout->data['userstats'] = $this->Menu_model->getUserStats($this->session->userdata['logged_in']['username']);
            $this->layout->data['records'] = $this->User_model->getUser($id);

            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('auth', 'Auth', 'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');

            if($this->form_validation->run() == FALSE)
            {
            }
            else
            {
                $id = $this->input->post('id');

                $data = array(
                    'username' => $this->input->post('username'),
                    'auth' => $this->input->post('auth'),
                    'status' => $this->input->post('status')
                );

                if($this->User_model->editUser($id, $data))
                {
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">De gebruiker is succesvol aangepast.</div>');
                    redirect("/user/manage");
                }
                else
                {
                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Er ging is mis. Probeer het later nog eens!</div>');
                }
            }
        }

        $this->layout->setLayout('usermanage');
        $this->layout->render();
    }

    public function deleteUser($id)
    {
        if(isset($this->session->userdata['logged_in'])) {
            if($this->User_model->deleteUser($id)) {
                return true;
            } else {
                return false;
            }
        }

        $this->layout->setLayout('usermanage');
        $this->layout->render();
    }
}