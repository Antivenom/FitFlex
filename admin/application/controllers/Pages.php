<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Controller class for Pages
 */
class Pages extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('admin_model');
	}

	public function index()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$this->layout->data['userstats'] = $this->admin_model->getUserStats($this->session->userdata['logged_in']['username']);
		}
		$this->layout->render();
	}

	public function getMenuItem()
	{
		$id = $_POST['id'];

		$data['menuData'] = $this->getDataByName($id);

		$data['selected'] = $this->load->view('pages.views/page' . $id, '', true);

        $data['userStats'] = $this->admin_model->getUserStats($this->session->userdata['logged_in']['username']);

		echo json_encode($data);
	}

	private function getDataByName($id)
	{
		$id--;
		$titles = array('training', 'thememeetings', 'mediaarticles', 'shop');

		return $this->admin_model->getDataByName($titles[$id]);
	}

	public function returnHome()
	{
		return $this->load->view('pages.views/index');
	}
}