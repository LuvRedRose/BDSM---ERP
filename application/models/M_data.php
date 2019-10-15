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

    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    function edit_data($where, $table){
        return $this->db->get_where($table,$where);
    }

    function delete_data($where,$table){
        return $this->db->delete($table,$where);
    }

    function get_data_bykode($id_material){
        $hsl = $this->db->query("SELECT * FROM tbl_supplier where id='$id_material'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data){
                $hasil = array(
                    'id_material' => $data->id_material,
                    'material' => $data->material,
                    'price' => $data->price,
                );
            }
        }
        return $hasil;
    }
}