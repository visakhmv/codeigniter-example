<?php
class Visakh_model extends CI_Model
{
    public function getAllRows($search)
    {
        if ($search) {
            $this->db->like('id', $search);
            $this->db->or_like('name', $search);
            $this->db->or_like('email', $search);
            $this->db->or_like('phone', $search);
        }
        $query = $this->db->get('my_table');
        // Returns the results as an array
        return $query->result_array();
    }

    public function insertToMyTable($data)
    {
        $this->db->insert('my_table', $data);
    }

    public function getRowByID($id)
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

    public function updateMyTable($id, $row)
    {
        $this->db->where('id', $id);
        $this->db->update('my_table', $row);
    }

    public function deleteFromMyTable($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('my_table');
    }

    public function checkLogin($user)
    {
        return $this->db->get_where('login', array('username' => $user))->row_array();
        /*
    OR
    $this->db->where('username', $user);
    $query = $this->db->get('login');
    return $query->row_array();
     */
    }

    public function getAllEntryCount()
    {
        return $this->db->count_all_results('my_table');
    }

    public function getAllRows2($from, $limit)
    {
        $this->db->limit($limit, $from);
        $query = $this->db->get('my_table');
        // Returns the results as an array
        return $query->result_array();
    }

    public function addStudent($data)
    {
        $this->db->insert('my_table_master', $data);
    }

    public function getCourseList()
    {
        return $this->db->get('my_table_child')->result_array();
    }

    public function getStudentsList()
    {
        $this->db->join('my_table_child', 'my_table_child.course_id=my_table_master.course_id');
        return $this->db->get('my_table_master')->result_array();
    }
}
