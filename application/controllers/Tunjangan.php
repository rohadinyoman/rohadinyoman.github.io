<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tunjangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tunjangan_model');
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
        $tunjangan = $this->Tunjangan_model->get_all();

        $data = array(
            'judul_halaman'  => 'Data Tunjangan',
            'tunjangan_data' => $tunjangan
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tunjangan_list_view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create() 
    {
        $data = array(
            'judul_halaman'     => 'Tambah Data Tunjangan',
            'button'            => 'Create',
            'action'            => site_url('tunjangan/create_action'),
    	    'id'                => set_value('id'),
    	    'nama_tunjangan'    => set_value('nama_tunjangan'),
    	    'uang_tunjangan'    => set_value('uang_tunjangan'),
    	);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tunjangan_form_view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'nama_tunjangan' => $this->input->post('nama_tunjangan',TRUE),
        		'uang_tunjangan' => $this->input->post('uang_tunjangan',TRUE),
    	    );

            $this->Tunjangan_model->insert($data);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Tunjangan Berhasil <b>Ditambahkan</b>
                </div>'
            );
            redirect(site_url('tunjangan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tunjangan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_halaman'  => 'Ubah Data Tunjangan',
                'button'         => 'Update',
                'action'         => site_url('tunjangan/update_action'),
        		'id'             => set_value('id', $row->id),
        		'nama_tunjangan' => set_value('nama_tunjangan', $row->nama_tunjangan),
        		'uang_tunjangan' => set_value('uang_tunjangan', $row->uang_tunjangan),
    	    );
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('tunjangan_form_view', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger" role="alert">
                    Data <b>Tidak Ditemukan</b>
                </div>'
            );
            redirect(site_url('tunjangan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
        		'nama_tunjangan' => $this->input->post('nama_tunjangan',TRUE),
        		'uang_tunjangan' => $this->input->post('uang_tunjangan',TRUE),
    	    );

            $this->Tunjangan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Tunjangan Berhasil <b>Biperbarui</b>
                </div>'
            );
            redirect(site_url('tunjangan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tunjangan_model->get_by_id($id);

        if ($row) {
            $this->Tunjangan_model->delete($id);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Tunjangan Berhasil <b>Dihapus</b>
                </div>'
            );
            redirect(site_url('tunjangan'));
        } else {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger" role="alert">
                    Data <b>Tidak Ditemukan</b>
                </div>'
            );
            redirect(site_url('tunjangan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_tunjangan', 'nama tunjangan', 'trim|required');
	$this->form_validation->set_rules('uang_tunjangan', 'uang tunjangan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tunjangan.php */
/* Location: ./application/controllers/Tunjangan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-01 17:40:47 */
/* http://harviacode.com */