<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang_model extends CI_Model
{

    public $table = 'barang';
    public $id = 'barang_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('barang_id', $q);
	$this->db->or_like('kode_barang', $q);
	$this->db->or_like('nama_barang', $q);
	$this->db->or_like('jumlah', $q);
	$this->db->or_like('desk', $q);
	$this->db->or_like('photo', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }


    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function generatekode()
    {

        $this->db->select('RIGHT(kode_barang,4) as kode_barang', false);
        $this->db->order_by("kode_barang", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('barang');

        // CEK JIKA DATA ADA
        if ($query->num_rows() <> 0) {
            $data       = $query->row(); // ambil satu baris data
            $kodeReq  = intval($data->kode_barang) + 1; // tambah 1
        } else {
            $kodeReq  = 1; // isi dengan 1
        }

        $lastKode = str_pad($kodeReq, 4, "0", STR_PAD_LEFT);
        $REQ      = "BR";
        $newKode  = $REQ . "-". $lastKode;

        return $newKode;  // return kode baru

    }

}

/* End of file Barang_model.php */
/* Location: ./application/models/Barang_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-06 00:12:19 */
/* http://harviacode.com */