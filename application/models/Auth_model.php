<?php

/**
 *
 */
class Auth_model extends CI_Model
{
    public function tambahUser($data)
    {
        $this->db->insert('user', $data);
    }
    public function getDataUser($username)
    {
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }
}