<?php
class Bootstrap_model extends CI_Model
{
    function getAllCountries($search,$count=false,$from=0,$limit=null)
    {
        if($search){
            $this->db->like('name',$search);
        }
        $this->db->select('code,name,continent,region,population');
        /* Same as
        $query = $this->db->query('SELECT * FROM test');
         */
        // Returns the results as an array
        if($count){
            return $this->db->get('country')->num_rows();
        }else{
            $this->db->limit($limit,$from);
            return $this->db->get('country')->result_array();
        }
    }

    function searchCounty($term){
        $this->db->select('code as id,name as value');
        $this->db->like('name',$term);
        $this->db->limit('10');
        return $this->db->get('country')->result_array();
    }
}