<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konfigurasi_tambahan_model extends CI_Model
{

    public $table = 'config';
    public $id = 'id_config';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all data
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

    // update by id
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

}
