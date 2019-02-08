<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DriverModel extends CI_Model{
    public function view(){
        $query = $this -> db->get('driver');
        return $query->result();
}
public function update($id,$data){
    $this->db->where('id',$id);
    $this->db->update('driver',$data);
}

public function delete($id,$data){
    $this->db->where('id', $id);
    $this->db->delete('driver');
}

public function insertUser($data){
    $this->db->insert('driver', $data);
}
public function getProd($id)
{
    $query = $this->db->get_where('driver', array('id' => $id));
    return $query->row();
}
}