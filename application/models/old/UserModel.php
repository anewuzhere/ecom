<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

public function getAllUser(){
    $q = $this->db->get('tbl_accounts');
    return $q->result();
	
}
public function getUser($account_id){
    $q = $this->db->get_where('tbl_accounts', array('account_id' => $account_id));
    return $q->row();
}
public function updateUser($account_id, $user){
    $this->db->where('account_id', $account_id);
    $this->db->update('tbl_accounts', $user);
}
public function deleteUser($account_id){
    $this->db->delete('tbl_accounts', array('account_id' => $account_id)); 
}
 public function insertUser($user){
		$this->db->insert('tbl_accounts', $user);
}
public function getAllPackage(){
    $q = $this->db->get('tbl_package');
    return $q->result();
	
}
public function HotelAjax($id){
   $q = $this->db->get_where('tbl_tourpackage', array('package_id_f' => $id));
    return $q->result();
}
public function RateAjax($id){
   $q = $this->db->get_where('tbl_rate', array('tour_id_f' => $id));
    return $q->result();
}
public function InclusionAjax($id){
   $q = $this->db->get_where('tbl_inclusions', array('inc_package_id' => $id));
    return $q->result();
}
public function insertBook($user){
		$this->db->insert('tbl_transaction', $user);
}
public function getAllTransaction($id){
    $q = $this->db->get_where('tbl_transaction', array('account_id' => $id, 'isCurrent'=> 'y'));
    return $q->row();
}
public function getTransaction($id){
    $q = $this->db->get_where('tbl_transaction', array('transaction_id' => $id));
    return $q->row();
}
public function getprevtransaction($id){
    $q = $this->db->get_where('tbl_transaction', array('account_id' => $id, 'isCurrent'=> 'n'));
    return $q->result();
}
public function updateCancel($account_id, $user){
    $this->db->where('transaction_id', $account_id);
    $this->db->update('tbl_transaction', $user);
}
public function getPackage($account_id){
    $q = $this->db->get_where('tbl_package', array('package_id' => $account_id));
    return $q->row();
}
public function getTour($account_id){
    $q = $this->db->get_where('tbl_tourpackage', array('tour_id' => $account_id));
    return $q->row();
}
public function getRate($id){
    $q = $this->db->get_where('tbl_rate', array('rate_id' => $id));
    return $q->row();
}
public function getInclusion($account_id){
    $q = $this->db->get_where('tbl_inclusions', array('inc_package_id' => $account_id));
    return $q->result();
}
public function getInclusion_fixed($account_id){
     $this->db->select('inc_id');
     $this->db->from('tbl_inclusions');
     $this->db->where('inc_package_id',$account_id);

    return $this->db->get()->result();
}
public function getInclusion2($account_id){
    $q = $this->db->get_where('tbl_inclusions', array('inc_id' => $account_id));
    return $q->row();
}
public function getlastTransaction($id){
    $this->db->order_by("transaction_id", "desc");
    $this->db->limit(1);
    $q = $this->db->get_where('tbl_transaction', array('account_id' => $id, 'isRated'=> 'n'));
    return $q->row();
}
public function updatePackage($package_id, $user){
    $this->db->where('package_id', $package_id);
    $this->db->update('tbl_package', $user);
}
public function get4Package(){
    $this->db->order_by("ratings", "desc");
    $this->db->limit(4);
    $q = $this->db->get('tbl_package');
    return $q->result();
	
}
}