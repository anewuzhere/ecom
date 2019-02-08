<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConductorModel extends CI_Model{
    public function view(){
        $query = $this -> db->get('conductor');
        return $query->result();
}
public function update($id,$data){
    $this->db->where('id',$id);
    $this->db->update('conductor',$data);
}

public function delete($id,$data){
    $this->db->where('id', $id);
    $this->db->delete('conductor');
}

public function insertUser($data){
    $this->db->insert('conductor', $data);
}
public function getProd($id)
{
    $query = $this->db->get_where('conductor', array('id' => $id));
    return $query->row();
}
}