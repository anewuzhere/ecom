<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model{
public function getProd($id)
    {
  
        $query = $this->db->get_where('staff', array('id' => $id));
        return $query->row();
  
    }
public function update($id,$data){
    $this->db->where('id',$id);
    $this->db->update('staff',$data);
}

public function delete($id,$data){
    $this->db->where('id', $id);
    $this->db->delete('staff');
}
public function getItems(){
    $query = $this -> db->get('staff');
    return $query->result();
}


public function insertUser($data){
    $this->db->insert('staff', $data);
}


    
}

?>