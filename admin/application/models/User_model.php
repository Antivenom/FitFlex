<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Model class for user controller
 *
 */
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertUser($data)
    {
        return $this->db->insert('users', $data);
    }

    public function login($data)
    {
        $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1)
            return true;
        else
            return false;
    }

    public function getAllUsers()
    {
        $q = $this->db->get("users");
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

    public function getUser($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1)
            return $query->result();
        else
            return false;
    }

    public function editUser($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function deleteUser($id)
    {
        return $this->db->delete('users', array('id' => $id));
    }

    public function getIdByUsername($username)
    {
        $condition = "username =" . "'" . $username;
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1)
            return true;
        else
            return false;
    }

    public function checkVerifyStatus($username)
    {
        $condition = "username =" . "'" . $username . "' AND " . "status = '1'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1)
            return true;
        else
            return false;
    }

    public function sendVerifyMail($user_email)
    {
		$headers = 'MIME-Version: 1.0\r\n' . "\r\n" .
			'From: FitFlex <info@fitflextraining.nl>' . "\r\n" .
			'Return-Path: info@fitflextraining.nl' . "\r\n" .
			'Reply-To: info@fitflextraining.nl' . "\r\n" .
			'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		$subject = 'Verifieer uw Email Adres';
		$message = 'Geachte gebruiker,<br /><br />Klik op de onderstaande link om uw account te verifieren.<br /><br /><a href="http://www.fitflextraining.nl/admin/user/verify/'
			. md5($user_email) . '">Verifieer account!</a><br /><br />of plak de onderstaande link in uw browser<br />http://www.fitflextraining.nl/admin/user/verify/'
			. md5($user_email) . '<br /><br />Bedankt,<br />fitflextraining.nl';



		return mail($user_email, $subject, $message, $headers);
    }

    public function verifyEmailID($key)
    {
        $data = array('status' => 1);
        $this->db->where('md5(email)', $key);
        return $this->db->update('users', $data);
    }

    public function updatePassword($password, $hash)
    {
        $data = array('password' => $password);
        $this->db->where('md5(email)', $hash);
        return $this->db->update('users', $data);
    }

    public function sendPasswordRequest($user_email)
    {
		$headers = 'MIME-Version: 1.0\r\n' . "\r\n" .
			'From: FitFlex <info@fitflextraining.nl>' . "\r\n" .
			'Return-Path: info@fitflextraining.nl' . "\r\n" .
			'Reply-To: info@fitflextraining.nl' . "\r\n" .
			'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		$subject = 'Verifieer uw Email Adres';
		$message = 'Geachte gebruiker,<br /><br />Klik op de onderstaande link om uw wachtwoord te veranderen.<br /><br /><a href="http://www.fitflextraining.nl/admin/user/changepassword/'
			. md5($user_email) . '">Activeer account!</a><br /><br />of plak de onderstaande link in uw browser<br />http://www.fitflextraining.nl/admin/user/changepassword/'
			. md5($user_email) . '<br /><br />Heeft u dit niet aangevraagd? Neem dan contact met ons op.<br /><br />Bedankt,<br />fitflextraining.nl';

		return mail($user_email, $subject, $message, $headers, '-finfo@fitflextraining.nl');
    }
}