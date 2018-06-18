<?php
class Bootstrap_model extends CI_Model
{
    public function getAllCountries($search, $count = false, $from = 0, $limit = null)
    {
        if ($search) {
            $this->db->like('name', $search);
        }
        $this->db->select('code,name,continent,region,population');
        /* Same as
        $query = $this->db->query("SELECT code,name,continent,region,population FROM test where name like '%$search%'");
         */
        // Returns the results as an array
        if ($count) {
            return $this->db->count_all_results('country');
        } else {
            $this->db->limit($limit, $from);
            return $this->db->get('country')->result_array();
        }
    }

    public function searchCounty($term)
    {
        $this->db->select('code as id,name as value');
        $this->db->like('name', $term);
        $this->db->limit('10');
        return $this->db->get('country')->result_array();
    }

    public function getCountyDetails($code)
    {
        $this->db->where('code', $code);
        $query = $this->db->get('country');
        /*
        Alternate option
        $query = $this->db->get_where('my_table',array('id'=>$id));
         */
        //Only single row result is required so row_array() is used instead of result_array()
        return $query->row_array();
    }

    public function getCountyCities($code)
    {
        $this->db->order_by('Name');
        return $this->db->get_where('city', array('CountryCode' => $code))->result_array();
    }

    public function getCountyLanguages($code)
    {
        $this->db->order_by('Percentage', 'desc');
        return $this->db->get_where('countrylanguage', array('CountryCode' => $code))->result_array();
    }
}
