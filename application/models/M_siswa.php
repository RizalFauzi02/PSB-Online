<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_siswa extends CI_Model
{
    function getDetailById($id)
    {
        $this->db->select('*');
        $this->db->from('pendaftaran');
        $this->db->where('id_pendaftaran', $id);
        $query = $this->db->get();
        return $query;
    }

    function getDaftar($username)
    {
        $this->db->select('*');
        $this->db->from('pendaftaran');
        $this->db->where('id_pendaftaran', $username);
        $query = $this->db->get();
        return $query;
    }

    function getDataPendaftar($namalengkap)
    {
        $this->db->select('*');
        $this->db->from('pendaftaran');
        $this->db->join('users', 'pendaftaran.nama_siswa = users.namalengkap', 'inner');
        $this->db->where('users.namalengkap', $namalengkap);

        $query = $this->db->get();
        return $query->result();
    }
}
