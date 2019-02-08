<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaffModel extends CI_Model{
    public function view(){
        $query = $this -> db->get('customer');
        return $query->result();
}
public function update($id,$data){
    $this->db->where('cus_id',$id);
    $this->db->update('customer',$data);
}

public function delete($id,$data){
    $this->db->where('cus_id', $id);
    $this->db->delete('customer');
}

public function insertUser($data){
    $this->db->insert('customer', $data);
}
public function getProd($id)
{
    $query = $this->db->get_where('customer', array('id' => $id));
    return $query->row();
}
}