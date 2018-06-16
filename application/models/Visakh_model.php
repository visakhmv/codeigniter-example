<?php
class Visakh_model extends CI_Model
{
    function getAllRows($search)
    {
        if($search){
            $this->db->like('id',$search);
            $this->db->or_like('name',$search);
            $this->db->or_like('email',$search);
            $this->db->or_like('phone',$search);
        }
        $query = $this->db->get('my_table');
        /* Same as
        $query = $this->db->query('SELECT * FROM test');
         */
        // Returns the results as an array
        return $query->result_array();
    }

    function insertToMyTable($data)
    {
        $this->db->insert('my_table', $data);
    }

    function getRowByID($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('my_table');
        /*
        Alternate option
        $query = $this->db->get_where('my_table',array('id'=>$id));
         */
        //Only single row result is required so row_array() is used instead of result_array()
        return $query->row_array();
    }

    function updateMyTable($id, $row)
    {
        $this->db->where('id', $id);
        $this->db->update('my_table', $row);
    }

    function deleteFromMyTable($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('my_table');
    }

    function checkLogin($user){
        return $this->db->get_where('login',array('username'=>$user))->row_array();
        /*
        OR
        $this->db->where('username', $user);
        $query = $this->db->get('login');
        return $query->row_array();
        */
    }
}
