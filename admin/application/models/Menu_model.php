<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Model class for admin controller
 *
 */
class Menu_model extends CI_Model
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
		$query = $this->db->get($name);

		if($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}

    public function getTraining($id)
    {
        $this->db->select('*');
        $this->db->from('training');
        $this->db->where('id', $id);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1)
            return $query->result();
        else
            return false;
    }

    public function getMeeting($id)
    {
        $this->db->select('*');
        $this->db->from('thememeetings');
        $this->db->where('id', $id);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1)
            return $query->result();
        else
            return false;
    }

    public function createData($table, $data)
    {
        return $this->db->insert($table, $data);
    }

	public function insertTraining($data)
	{
		return $this->db->insert('training', $data);
	}

	public function insertMeeting($data)
	{
		return $this->db->insert('thememeetings', $data);
	}

	public function insertArticle($data)
	{
		return $this->db->insert('mediaarticles', $data);
	}

    public function editTraining($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('training', $data);
    }

    public function editMeeting($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('thememeetings', $data);
    }

    public function deleteTraining($data)
    {
        return $this->db->delete('training', array('id' => $data));
    }

    public function deleteMeeting($data)
    {
        return $this->db->delete('thememeetings', array('id' => $data));
    }

    public function sendShopArticle($article, $user_email)
    {
        $headers = 'MIME-Version: 1.0\r\n' . "\r\n" .
            'From: FitFlex <info@fitflextraining.nl>' . "\r\n" .
            'Return-Path: info@fitflextraining.nl' . "\r\n" .
            'Reply-To: info@fitflextraining.nl' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        $subject = 'FitFlex WebShop: Artikel ' . $article;
        $message = 'Geachte gebruiker,<br /><br />Uw artikel: '. $article .' is succesvol besteld!<br /><br />U zult dit artikel zo spoedig mogelijk in handen nemen door Loek Vogels.<br /><br />Heeft u dit niet aangevraagd? Neem dan contact met ons op.<br /><br />Bedankt,<br />fitflextraining.nl';

        return mail($user_email, $subject, $message, $headers, '-finfo@fitflextraining.nl');
    }

    public function sendArticleToOwner($name, $email, $article)
    {
        $headers = 'MIME-Version: 1.0\r\n' . "\r\n" .
            'From: FitFlex <info@fitflextraining.nl>' . "\r\n" .
            'Return-Path: info@fitflextraining.nl' . "\r\n" .
            'Reply-To: info@fitflextraining.nl' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        $subject = 'FitFlex WebShop: Artikel ' . $article;
        $message = 'Beste Loek,<br /><br />Er is een nieuw artikel besteld. <br/ ><br/> Het betreft artikel: '. $article .'.<br /><br />Dit artikel is besteld door: ' . $name . '.<br />Deze gebruiker heeft het email adres: '. $email .'<br />Dit is een automatisch gegenereerd bericht.<br />Reageren op deze email heeft geen nut.<br />Bedankt,<br />fitflextraining.nl';

        return mail('iron420man@gmail.com', $subject, $message, $headers, '-finfo@fitflextraining.nl');
    }
}