<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengunjung extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Pengunjung_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $pengunjung = $this->Pengunjung_model->get_all();
        $data = array(
            'pengunjung_data' => $pengunjung,
        );
        $this->template->load('template', 'pengunjung/pengunjung_list', $data);
    }

    public function read($id)
    {
        $row = $this->Pengunjung_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
                'pengunjung_id' => $row->pengunjung_id,
                'username' => $row->username,
                'nama' => $row->nama,
                'jenis_kelamin' => $row->jenis_kelamin,
                'alamat' => $row->alamat,
                'password' => $row->password,
            );
            $this->template->load('template', 'pengunjung/pengunjung_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengunjung'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pengunjung/create_action'),
            'pengunjung_id' => set_value('pengunjung_id'),
            'username' => set_value('username'),
            'nama' => set_value('nama'),
            'jenis_kelamin' => set_value('jenis_kelamin'),
            'alamat' => set_value('alamat'),
            'password' => set_value('password'),
        );
        $this->template->load('template', 'pengunjung/pengunjung_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'username' => $this->input->post('username', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'password' => sha1($this->input->post('password', TRUE)),
            );

            $this->Pengunjung_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pengunjung'));
        }
    }

    public function update($id)
    {
        $row = $this->Pengunjung_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pengunjung/update_action'),
                'pengunjung_id' => set_value('pengunjung_id', $row->pengunjung_id),
                'username' => set_value('username', $row->username),
                'nama' => set_value('nama', $row->nama),
                'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
                'alamat' => set_value('alamat', $row->alamat),
                'password' => set_value('password', $row->password),
            );
            $this->template->load('template', 'pengunjung/pengunjung_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengunjung'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pengunjung_id', TRUE));
        } else {

            if ($this->input->post('password') == '' || $this->input->post('password') == null) {
                $data = array(
                    'username' => $this->input->post('username', TRUE),
                    'nama' => $this->input->post('nama', TRUE),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                    'alamat' => $this->input->post('alamat', TRUE),
                );
            } else {
                $data = array(
                    'username' => $this->input->post('username', TRUE),
                    'nama' => $this->input->post('nama', TRUE),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                    'alamat' => $this->input->post('alamat', TRUE),
                    'password' => sha1($this->input->post('password', TRUE)),
                );
            }

            $this->Pengunjung_model->update($this->input->post('pengunjung_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengunjung'));
        }
    }

    public function delete($id)
    {
        $row = $this->Pengunjung_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Pengunjung_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengunjung'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengunjung'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        // $this->form_validation->set_rules('password', 'password', 'trim|required');

        $this->form_validation->set_rules('pengunjung_id', 'pengunjung_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Pengunjung.php */
/* Location: ./application/controllers/Pengunjung.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-19 13:35:25 */
/* http://harviacode.com */