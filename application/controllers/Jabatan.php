<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jabatan_model');
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
        $jabatan = $this->Jabatan_model->get_all();

        $data = array(
            'judul_halaman' => 'Data Jabatan',
            'jabatan_data'  => $jabatan
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('jabatan_list_view', $data);
        $this->load->view('templates/footer', $data);
    }


    public function create() 
    {
        $data = array(
            'judul_halaman' => 'Tambah Data Jabatan',
            'button'        => 'Create',
            'action'        => site_url('jabatan/create_action'),
    	    'id'            => set_value('id'),
    	    'id_jabatan'    => set_value('id_jabatan'),
    	    'nama_jabatan'  => set_value('nama_jabatan'),
    	    'gaji_pokok'    => set_value('gaji_pokok'),
    	);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('jabatan_form_view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'id_jabatan'      => $this->input->post('id_jabatan',TRUE),
        		'nama_jabatan'    => $this->input->post('nama_jabatan',TRUE),
        		'gaji_pokok'      => $this->input->post('gaji_pokok',TRUE),
    	    );

            $this->Jabatan_model->insert($data);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Jabatan Berhasil <b>Ditambahkan</b>
                </div>'
            );
            redirect(site_url('jabatan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jabatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_halaman' => 'Ubah Data Jabatan',
                'button'        => 'Update',
                'action'        => site_url('jabatan/update_action'),
        		'id'            => set_value('id', $row->id),
        		'id_jabatan'    => set_value('id_jabatan', $row->id_jabatan),
        		'nama_jabatan'  => set_value('nama_jabatan', $row->nama_jabatan),
        		'gaji_pokok'    => set_value('gaji_pokok', $row->gaji_pokok),
    	    );
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('jabatan_form_view', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger" role="alert">
                    Data <b>Tidak Ditemukan</b>
                </div>'
            );
            redirect(site_url('jabatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
        		'id_jabatan'      => $this->input->post('id_jabatan',TRUE),
        		'nama_jabatan'    => $this->input->post('nama_jabatan',TRUE),
        		'gaji_pokok'      => $this->input->post('gaji_pokok',TRUE),
    	    );

            $this->Jabatan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Jabatan Berhasil <b>Diperbarui</b>
                </div>'
            );
            redirect(site_url('jabatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jabatan_model->get_by_id($id);

        if ($row) {
            $this->Jabatan_model->delete($id);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Jabatan Berhasil <b>Dihapus</b>
                </div>'
            );
            redirect(site_url('jabatan'));
        } else {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger" role="alert">
                    Data <b>Tidak Ditemukan</b>
                </div>'
            );
            redirect(site_url('jabatan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_jabatan', 'id jabatan', 'trim|required');
	$this->form_validation->set_rules('nama_jabatan', 'nama jabatan', 'trim|required');
	$this->form_validation->set_rules('gaji_pokok', 'gaji pokok', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Jabatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-01 16:15:16 */
/* http://harviacode.com */