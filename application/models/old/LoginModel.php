<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {


    public function getUsers($cond){
        $this->db->where($cond);
        $q = $this->db->get('tbl_accounts');
        return $q->row();
    }
    public function insertUser($user){
		$this->db->insert('tbl_accounts', $user);
}
    

}