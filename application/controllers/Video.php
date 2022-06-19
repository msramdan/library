<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Video extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Video_model');
        $this->load->model('Kategori_video_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $video = $this->Video_model->get_all();
        $data = array(
            'video_data' => $video,
        );
        $this->template->load('template', 'video/video_list', $data);
    }

    public function read($id)
    {
        $row = $this->Video_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
                'video_id' => $row->video_id,
                'title' => $row->title,
                'deskripsi' => $row->deskripsi,
                'tanggal' => $row->tanggal,
                'kategori_video_id' => $row->kategori_video_id,
                'link_url' => $row->link_url,
                'view' => $row->view,
            );
            $this->template->load('template', 'video/video_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('video'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'kategori' => $this->Kategori_video_model->get_all(),
            'action' => site_url('video/create_action'),
            'video_id' => set_value('video_id'),
            'title' => set_value('title'),
            'deskripsi' => set_value('deskripsi'),
            'tanggal' => set_value('tanggal'),
            'kategori_video_id' => set_value('kategori_video_id'),
            'link_url' => set_value('link_url'),
            'view' => set_value('view'),
        );
        $this->template->load('template', 'video/video_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'title' => $this->input->post('title', TRUE),
                'deskripsi' => $this->input->post('deskripsi', TRUE),
                'tanggal' => date('Y-m-d'),
                'kategori_video_id' => $this->input->post('kategori_video_id', TRUE),
                'link_url' => $this->input->post('link_url', TRUE),
            );

            $this->Video_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('video'));
        }
    }

    public function update($id)
    {
        $row = $this->Video_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'kategori' => $this->Kategori_video_model->get_all(),
                'action' => site_url('video/update_action'),
                'video_id' => set_value('video_id', $row->video_id),
                'title' => set_value('title', $row->title),
                'deskripsi' => set_value('deskripsi', $row->deskripsi),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'kategori_video_id' => set_value('kategori_video_id', $row->kategori_video_id),
                'link_url' => set_value('link_url', $row->link_url),
                'view' => set_value('view', $row->view),
            );
            $this->template->load('template', 'video/video_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('video'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('video_id', TRUE));
        } else {
            $data = array(
                'title' => $this->input->post('title', TRUE),
                'deskripsi' => $this->input->post('deskripsi', TRUE),
                'tanggal' => date('Y-m-d'),
                'kategori_video_id' => $this->input->post('kategori_video_id', TRUE),
                'link_url' => $this->input->post('link_url', TRUE),
            );

            $this->Video_model->update($this->input->post('video_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('video'));
        }
    }

    public function delete($id)
    {
        $row = $this->Video_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Video_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('video'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('video'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
        $this->form_validation->set_rules('kategori_video_id', 'kategori video id', 'trim|required');
        $this->form_validation->set_rules('link_url', 'link url', 'trim|required');
        $this->form_validation->set_rules('video_id', 'video_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "video.xls";
        $judul = "video";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Title");
        xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
        xlsWriteLabel($tablehead, $kolomhead++, "Kategori Video Id");
        xlsWriteLabel($tablehead, $kolomhead++, "Link Url");
        xlsWriteLabel($tablehead, $kolomhead++, "View");

        foreach ($this->Video_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->title);
            xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
            xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
            xlsWriteNumber($tablebody, $kolombody++, $data->kategori_video_id);
            xlsWriteLabel($tablebody, $kolombody++, $data->link_url);
            xlsWriteNumber($tablebody, $kolombody++, $data->view);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file Video.php */
/* Location: ./application/controllers/Video.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-19 10:42:24 */
/* http://harviacode.com */