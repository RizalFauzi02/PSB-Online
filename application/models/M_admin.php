<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_admin extends CI_Model
{
    function getDetailById($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id_users', $id);
        $query = $this->db->get();
        return $query;
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function update_data_pendaftar($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function ddaftar($id_pendaftaran)
    {
        $this->db->where('id_pendaftaran', $id_pendaftaran);
        $this->db->delete('pendaftaran');
        return true;
    }

    function dadmin($id)
    {
        $this->db->where('id_users', $id);
        $this->db->delete('users');
        return true;
    }
}
