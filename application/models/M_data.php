<?php

class M_data extends CI_Model{

    function cek_login($table, $where){
        return $this->db->get_where($table, $where);
    }

    function get_data($table){
        return $this->db->get($table);
    }

    function insert_data($data, $table){
        return $this->db->insert($table, $data);
    }

    function update_data($where, $table){
        return $this->db->get_where($table,$where);
    }

    function delete_data($where,$table){
        return $this->db->delete($table,$where);
    }
}