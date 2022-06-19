<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modul_pdf extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Modul_pdf_model');
        $this->load->model('Kategori_modul_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $modul_pdf = $this->Modul_pdf_model->get_all();
        $data = array(
            'modul_pdf_data' => $modul_pdf,
        );
        $this->template->load('template', 'modul_pdf/modul_pdf_list', $data);
    }

    public function read($id)
    {
        $row = $this->Modul_pdf_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
                'modul_pdf_id' => $row->modul_pdf_id,
                'title' => $row->title,
                'deskripsi' => $row->deskripsi,
                'tanggal' => $row->tanggal,
                'author' => $row->author,
                'tahun_terbit' => $row->tahun_terbit,
                'file_pdf' => $row->file_pdf,
                'kategori_modul_id' => $row->kategori_modul_id,
                'view' => $row->view,
            );
            $this->template->load('template', 'modul_pdf/modul_pdf_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('modul_pdf'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'kategori' => $this->Kategori_modul_model->get_all(),
            'action' => site_url('modul_pdf/create_action'),
            'modul_pdf_id' => set_value('modul_pdf_id'),
            'title' => set_value('title'),
            'deskripsi' => set_value('deskripsi'),
            'tanggal' => set_value('tanggal'),
            'author' => set_value('author'),
            'tahun_terbit' => set_value('tahun_terbit'),
            'file_pdf' => set_value('file_pdf'),
            'kategori_modul_id' => set_value('kategori_modul_id'),
            'view' => set_value('view'),
        );
        $this->template->load('template', 'modul_pdf/modul_pdf_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $config['upload_path']      = './assets/template/assets/pdf';
            $config['allowed_types']    = 'pdf';
            $config['max_size']         = 10048;
            $config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload("file_pdf");
            $data = $this->upload->data();
            $file_pdf = $data['file_name'];

            $data = array(
                'title' => $this->input->post('title', TRUE),
                'deskripsi' => $this->input->post('deskripsi', TRUE),
                'tanggal' => date('Y-m-d'),
                'author' => $this->input->post('author', TRUE),
                'tahun_terbit' => $this->input->post('tahun_terbit', TRUE),
                'file_pdf' => $file_pdf,
                'kategori_modul_id' => $this->input->post('kategori_modul_id', TRUE),
            );

            $this->Modul_pdf_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('modul_pdf'));
        }
    }

    public function update($id)
    {
        $row = $this->Modul_pdf_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'kategori' => $this->Kategori_modul_model->get_all(),
                'action' => site_url('modul_pdf/update_action'),
                'modul_pdf_id' => set_value('modul_pdf_id', $row->modul_pdf_id),
                'title' => set_value('title', $row->title),
                'deskripsi' => set_value('deskripsi', $row->deskripsi),
                'tanggal' => date('Y-m-d'),
                'author' => set_value('author', $row->author),
                'tahun_terbit' => set_value('tahun_terbit', $row->tahun_terbit),
                'file_pdf' => set_value('file_pdf', $row->file_pdf),
                'kategori_modul_id' => set_value('kategori_modul_id', $row->kategori_modul_id),
            );
            $this->template->load('template', 'modul_pdf/modul_pdf_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('modul_pdf'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('modul_pdf_id', TRUE));
        } else {
            $data = array(
                'title' => $this->input->post('title', TRUE),
                'deskripsi' => $this->input->post('deskripsi', TRUE),
                'tanggal' => $this->input->post('tanggal', TRUE),
                'author' => $this->input->post('author', TRUE),
                'tahun_terbit' => $this->input->post('tahun_terbit', TRUE),
                'file_pdf' => $this->input->post('file_pdf', TRUE),
                'kategori_modul_id' => $this->input->post('kategori_modul_id', TRUE),
                'view' => $this->input->post('view', TRUE),
            );

            $this->Modul_pdf_model->update($this->input->post('modul_pdf_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('modul_pdf'));
        }
    }

    public function delete($id)
    {
        $row = $this->Modul_pdf_model->get_by_id(decrypt_url($id));

        if ($row) {
            if ($row->file_pdf == null || $row->file_pdf == '') {
			} else {
				$target_file = './assets/template/assets/pdf/' . $row->file_pdf;
				unlink($target_file);
			}
            $this->Modul_pdf_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('modul_pdf'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('modul_pdf'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
        $this->form_validation->set_rules('author', 'author', 'trim|required');
        $this->form_validation->set_rules('tahun_terbit', 'tahun terbit', 'trim|required');
        $this->form_validation->set_rules('file_pdf', 'file pdf', 'trim');
        $this->form_validation->set_rules('kategori_modul_id', 'kategori modul id', 'trim|required');
        $this->form_validation->set_rules('modul_pdf_id', 'modul_pdf_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "modul_pdf.xls";
        $judul = "modul_pdf";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Author");
        xlsWriteLabel($tablehead, $kolomhead++, "Tahun Terbit");
        xlsWriteLabel($tablehead, $kolomhead++, "File Pdf");
        xlsWriteLabel($tablehead, $kolomhead++, "Kategori Modul Id");
        xlsWriteLabel($tablehead, $kolomhead++, "View");

        foreach ($this->Modul_pdf_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->title);
            xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
            xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
            xlsWriteLabel($tablebody, $kolombody++, $data->author);
            xlsWriteLabel($tablebody, $kolombody++, $data->tahun_terbit);
            xlsWriteLabel($tablebody, $kolombody++, $data->file_pdf);
            xlsWriteNumber($tablebody, $kolombody++, $data->kategori_modul_id);
            xlsWriteNumber($tablebody, $kolombody++, $data->view);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file Modul_pdf.php */
/* Location: ./application/controllers/Modul_pdf.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-19 10:51:13 */
/* http://harviacode.com */