<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{

    public function inserdata($table, $data)
    {
        $this->db->insert($table, $data);
        $ret = $this->db->insert_id();
        return $ret;
    }

    public function updateData($table, $id, $data)
    {
        $this->db->where('id', $id);
        $ret = $this->db->update($table, $data);
        return $ret;
    }

    public function deleteData($table, $where)
    {
        $this->db->where($where);
        $ret = $this->db->delete($table);
        return $ret;
    }

    public function getData($table, $orderKey, $orderValue, $limit = null, $offset = null)
    {
        $this->db->order_by($orderKey, $orderValue);
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get($table)->result();
    }

    public function getDataWhere($table, $where, $con = null)
    {
        if ($con) {
            $ret = $this->db->get_where($table, $where)->$con();
        } else {
            $ret = $this->db->get_where($table, $where)->row();
        }
        return $ret;
    }

    public function getDataMitra()
    {
        $this->db->select('mitra.*, bidang_usaha.nama as nama_bidang');
        $this->db->from('mitra');
        $this->db->join('bidang_usaha', 'bidang_usaha.id = mitra.bidang_usaha_id');
        $this->db->order_by('mitra.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataLowongan($id = null)
    {
        $this->db->select('lowongan.*, mitra.nama as nama_perusahaan, mitra.kontak');
        $this->db->from('lowongan');
        $this->db->join('mitra', 'mitra.id = lowongan.mitra_id');
        if ($id) {
            $this->db->where('lowongan.id', $id);
        }
        $this->db->order_by('lowongan.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
}
