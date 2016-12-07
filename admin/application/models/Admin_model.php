<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Model class for admin controller
 *
 */
class Admin_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

    public function getUserStats($name)
    {
        $this->db->select('training_amount, meeting_amount, auth');
        $this->db->from('users');
        $this->db->where('username', $name);
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return false;   
    }

	public function getDataByName($name)
    {
		$this->db->select('*');
		$this->db->from($name);
		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;
    }

    public function createData($table, $data)
    {
    	return $this->db->insert($table, $data);
    }

    public function editDataByID($table, $id, $data) 
    {
    	return $this->db->update($table, $data, array('id' => $id));
    }

    public function deleteDataByID($table, $id)
    {
    	return $this->db->delete($table, array('id' => $id));
    }

    public function getData($id)
    {
        $this->db->select('*');
        $this->db->from('mediaarticles');
        $this->db->where('id' == $id);
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return 'sdf';
    }
}