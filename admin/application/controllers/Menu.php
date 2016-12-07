<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Controller class for the Menu
 */
class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('menu_model');
		$this->load->model('user_model');
	}

	public function index()
	{
		if(isset($this->session->userdata['logged_in']))
		{
			$this->layout->data['userstats'] = $this->menu_model->getUserStats($this->session->userdata['logged_in']['username']);
		}
		$this->layout->setLayout('menu');
		$this->layout->render();
	}

	public function manage()
	{
		if(isset($this->session->userdata['logged_in']))
		{
			$this->layout->data['userstats'] = $this->menu_model->getUserStats($this->session->userdata['logged_in']['username']);
		}
		$this->layout->setLayout('menu');
		$this->layout->render();
	}

	public function getMenuItem()
	{
	    if( isset( $_POST['id'] ) )
        {
            $id = $_POST['id'];
        }
        else
        {
            $id = '1';
        }

		$data['selected'] = $this->load->view('menu.views/page'. $id, '', true);

		echo json_encode($data);
	}

	public function returnHome()
	{
		return $this->load->view('menu.views/manage');
	}

	public function createTraining()
	{
		if (!$this->input->is_ajax_request()) { exit('invalid request'); }
		$form_rules = array(
			array(
				'field' => 'name',
				'label' => 'Training name',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'date',
				'label' => 'Training datum',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'description',
				'label' => 'Training beschrijving',
				'rules' => 'max_length[3000]'
			),
		);

		$this->form_validation->set_rules($form_rules);

		if ($this->form_validation->run() == FALSE)
		{
			echo '<div class="errors">'.validation_errors().'</div>';
		}
		else
		{
			$data = array(
				'name' => $this->input->post('name'),
				'date' => $this->input->post('date'),
				'description' => $this->input->post('description'),
			);

			echo $this->menu_model->insertTraining($data);
		}
	}

	public function createMeeting()
	{
		if (!$this->input->is_ajax_request()) { exit('invalid request'); }
		$form_rules = array(
			array(
				'field' => 'name',
				'label' => 'themabijeenkomst naam',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'date',
				'label' => 'themabijeenkomst datum',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'description',
				'label' => 'themabijeenkomst beschrijving',
				'rules' => 'max_length[5000]'
			),
		);

		$this->form_validation->set_rules($form_rules);

		if ($this->form_validation->run() == FALSE)
		{
			echo '<div class="errors">'.validation_errors().'</div>';
		}
		else
		{
			$data = array(
				'name' => $this->input->post('name'),
				'date' => $this->input->post('date'),
				'description' => $this->input->post('description'),
			);

			echo $this->menu_model->insertMeeting($data);
		}
	}

	public function createArticle()
	{
		if (!$this->input->is_ajax_request()) { exit('invalid request'); }
		$form_rules = array(
			array(
				'field' => 'name',
				'label' => 'artikel naam',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'content',
				'label' => 'artikel inhoud',
				'rules' => 'trim|required'
			),
		);

		$this->form_validation->set_rules($form_rules);

		if ($this->form_validation->run() == FALSE)
		{
			echo '<div class="errors">'.validation_errors().'</div>';
		}
		else
		{
			$data = array(
				'name' => $this->input->post('name'),
				'content' => $this->input->post('content'),
			);

			echo $this->menu_model->insertArticle($data);
		}
	}

    public function editTraining($id)
    {

        if(isset($this->session->userdata['logged_in'])) {
            $this->layout->data['userstats'] = $this->menu_model->getUserStats($this->session->userdata['logged_in']['username']);
            $this->layout->data['records'] = $this->menu_model->getTraining($id);

            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('date', 'Date', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');

            if($this->form_validation->run() == FALSE)
            {
            }
            else
            {
                $id = $this->input->post('id');

                $data = array(
                    'name' => $this->input->post('name'),
                    'date' => $this->input->post('date'),
                    'description' => $this->input->post('description')
                );

                if($this->menu_model->editTraining($id, $data))
                {
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">De training is succesvol aangepast.</div>');
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

	public function deleteTraining()
	{
		$id = $_POST['id'];

		if($this->menu_model->deleteTraining($id))
		{
			return true;
		} else {
            return false;
        }
	}

    public function editMeeting($id)
    {
        if(isset($this->session->userdata['logged_in'])) {
            $this->layout->data['userstats'] = $this->menu_model->getUserStats($this->session->userdata['logged_in']['username']);
            $this->layout->data['records'] = $this->menu_model->getMeeting($id);

            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('date', 'Date', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');

            if($this->form_validation->run() == FALSE)
            {
            }
            else
            {
                $id = $this->input->post('id');

                $data = array(
                    'name' => $this->input->post('name'),
                    'date' => $this->input->post('date'),
                    'description' => $this->input->post('description')
                );

                if($this->menu_model->editMeeting($id, $data))
                {
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">De themabijeenkomst is succesvol aangepast.</div>');
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

	public function deleteMeeting()
    {
        $id = $_POST['id'];

        if($this->menu_model->deleteMeeting($id))
        {
            return true;
        } else {
            return false;
        }
    }

    public function shop()
    {
        if(isset($this->session->userdata['logged_in'])) {

            $this->form_validation->set_rules('email', 'email', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');

            if($this->form_validation->run() == FALSE)
            {
            }
            else
            {
                $name = $this->session->userdata['logged_in']['username'];
                $email = $this->input->post('email');
                $article = $this->input->post('description');

                if($this->menu_model->sendShopArticle($article, $email))
                {
                    $this->menu_model->sendArticleToOwner($name, $email, $article);
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Het artikel is succesvol besteld.</div>');
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
}