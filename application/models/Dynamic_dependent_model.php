<?php
class Dynamic_dependent_model extends CI_Model
{
 function fetch_country()
 {
  $this->db->order_by("name", "ASC");
  $query = $this->db->get("countries");
 
  return $query->result();
 }

 function fetch_state($country_name)
 {
  $country_id1= $this->db->get_where('countries', array('name' => $country_name))->result_array();
  $this->db->where('country_id', $country_id1[0]['id']);
  $this->db->order_by('name', 'ASC');
  $query1 = $this->db->get('states');
  $output = '<option value="">Select State</option>';
  foreach($query1->result() as $row)
  {
   $output .= '<option value="'.$row->name.'">'.$row->name.'</option>';
  }
  return $output;
 }

 function fetch_city($state_id)
 {
  $this->db->where('state_id', $state_id);
  $this->db->order_by('city_name', 'ASC');
  $query = $this->db->get('city');
  $output = '<option value="">Select City</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->city_id.'">'.$row->city_name.'</option>';
  }
  return $output;
 }
}

?>