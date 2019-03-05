<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeModel extends CI_Model {

public function getAllUser(){
    $q = $this->db->get('tbl_accounts');
    return $q->result();
	
}
public function countAllUser(){
    $q = $this->db->get('tbl_accounts');
    return $q->num_rows();
	
}
public function getAllClient(){
   $q = $this->db->get_where('tbl_accounts', array('access_lvl' => 'user'));
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
public function countAllPackage(){
    $q = $this->db->get('tbl_package');
    return $q->num_rows();
	
}
public function viewLogs(){
    $q = $this->db->get('tbl_userlog');
    return $q->result();
	
}
public function getAllTransaction($id){
    $q = $this->db->get_where('tbl_transaction', array('transaction_id' => $id, 'isCurrent'=> 'y'));
    return $q->row();
}
public function getAllNTransaction($id){
    $q = $this->db->get_where('tbl_transaction', array('account_id' => $id, 'isCurrent'=> 'n'));
    return $q->result();
}
public function countAllTransaction(){
    $q = $this->db->get_where('tbl_transaction', array( 'isCurrent'=> 'y'));
    return $q->num_rows();
}
public function getCurrentTransaction(){
    $this->db->limit(5);
    $q = $this->db->get_where('tbl_transaction', array( 'isCurrent'=> 'y'));
    return $q->result();
}
public function getPackage($account_id){
    $q = $this->db->get_where('tbl_package', array('package_id' => $account_id));
    return $q->row();
}
public function getInclusion($account_id){
    $q = $this->db->get_where('tbl_inclusions', array('inc_package_id' => $account_id));
    return $q->result();
}
public function getTour($account_id){
    $q = $this->db->get_where('tbl_tourpackage', array('package_id_f' => $account_id));
    return $q->result();
}
public function getOneInclusion($account_id){
    $q = $this->db->get_where('tbl_inclusions', array('inc_id' => $account_id));
    return $q->row();
}
public function updateInclusion($inc_id, $user){
    $this->db->where('inc_id', $inc_id);
    $this->db->update('tbl_inclusions', $user);
}
public function deleteInclusion($id){
    $this->db->delete('tbl_inclusions', array('inc_id' => $id)); 
}
 public function insertInclusion($user){
		$this->db->insert('tbl_inclusions', $user);
}
public function getOneHotel($account_id){
    $q = $this->db->get_where('tbl_tourpackage', array('tour_id' => $account_id));
    return $q->row();
}
public function updateHotel($tour_id, $user){
    $this->db->where('tour_id', $tour_id);
    $this->db->update('tbl_tourpackage', $user);
}
public function deleteHotel($id){
    $this->db->delete('tbl_tourpackage', array('tour_id' => $id)); 
}
 public function insertHotel($user){
		$this->db->insert('tbl_tourpackage', $user);
}
public function getRate($id){
    $q = $this->db->get_where('tbl_rate', array('tour_id_f' => $id));
    return $q->result();
}
public function deleteRate($id){
    $this->db->delete('tbl_rate', array('rate_id' => $id)); 
}
public function insertRate($user){
		$this->db->insert('tbl_rate', $user);
}
public function insertPackage($user){
		$this->db->insert('tbl_package', $user);
}
public function updatePackage($package_id, $user){
    $this->db->where('package_id', $package_id);
    $this->db->update('tbl_package', $user);
}
public function deletePackage($id){
    $this->db->delete('tbl_package', array('package_id' => $id)); 
}








public function getTransactionList(){
    $q = $this->db->get('tbl_transaction');
    return $q->result();
	
}
public function getTour_T($account_id){
    $q = $this->db->get_where('tbl_tourpackage', array('tour_id' => $account_id));
    return $q->row();
}
public function getRate_T($id){
    $q = $this->db->get_where('tbl_rate', array('rate_id' => $id));
    return $q->row();
}
public function getInclusion_T($account_id){
    $q = $this->db->get_where('tbl_inclusions', array('inc_package_id' => $account_id));
    return $q->result();
}
public function updateCancel($account_id, $user){
    $this->db->where('transaction_id', $account_id);
    $this->db->update('tbl_transaction', $user);
}
public function updateVerify($account_id, $user){
    $this->db->where('transaction_id', $account_id);
    $this->db->update('tbl_transaction', $user);
}
public function insertDeposit($user){
		$this->db->insert('tbl_deposit', $user);
}
public function getTransaction($account_id){
    $q = $this->db->get_where('tbl_transaction', array('transaction_id' => $account_id));
    return $q->row();
}
public function countTransaction(){
    $q = $this->db->get_where('tbl_deposit', array('date' => date('m')));
    return $q->result();
}
public function foreCast($year){
    $q = $this->db->get_where('tbl_deposit', array('dateyear' => $year));
    return $q->result();
}
public function foreCastAll(){
    $q = $this->db->get('tbl_deposit');
    return $q->result();
	
}
public function get4Package(){
    $this->db->order_by("ratings", "desc");
    $this->db->limit(4);
    $q = $this->db->get('tbl_package');
    return $q->result();
	
}
}