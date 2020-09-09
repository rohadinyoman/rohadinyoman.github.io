<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Keterangan_presensi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Keterangan_presensi_model');
        $this->load->library('form_validation');
        $this->load->library('ion_auth');

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        $keterangan_presensi = $this->Keterangan_presensi_model->get_all();

        $data = array(
            'judul_halaman'            => 'Data Keterangan Presensi',
            'keterangan_presensi_data' => $keterangan_presensi
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('keterangan_presensi_list_view', $data);
    }

    public function create() 
    {
        $data = array(
            'judul_halaman' => 'Tambah Data Keterangan Presensi',
            'button'        => 'Create',
            'action'        => site_url('keterangan_presensi/create_action'),
    	    'id'            => set_value('id'),
    	    'keterangan'    => set_value('keterangan'),
    	);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('keterangan_presensi_form_view', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		      'keterangan' => $this->input->post('keterangan',TRUE),
	        );

            $this->Keterangan_presensi_model->insert($data);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Keterangan Presensi Berhasil <b>Ditambahkan</b>
                </div>'
            );
            redirect(site_url('keterangan_presensi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Keterangan_presensi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_halaman' => 'Ubah Data Keterangan Presensi',
                'button'        => 'Update',
                'action'        => site_url('keterangan_presensi/update_action'),
        		'id'            => set_value('id', $row->id),
        		'keterangan'    => set_value('keterangan', $row->keterangan),
        	    );
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/footer', $data);
            $this->load->view('keterangan_presensi_form_view', $data);
        } else {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger" role="alert">
                    Data <b>Tidak Ditemukan</b>
                </div>'
            );
            redirect(site_url('keterangan_presensi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
    		'keterangan' => $this->input->post('keterangan',TRUE),
    	    );

            $this->Keterangan_presensi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Keterangan Presensi Berhasil <b>Diperbarui</b>
                </div>'
            );
            redirect(site_url('keterangan_presensi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Keterangan_presensi_model->get_by_id($id);

        if ($row) {
            $this->Keterangan_presensi_model->delete($id);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Keterangan Presensi Berhasil <b>Dihapus</b>
                </div>'
            );
            redirect(site_url('keterangan_presensi'));
        } else {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger" role="alert">
                    Data <b>Tidak Ditemukan</b>
                </div>'
            );
            redirect(site_url('keterangan_presensi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Keterangan_presensi.php */
/* Location: ./application/controllers/Keterangan_presensi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-02 19:09:58 */
/* http://harviacode.com */