<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Anak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Anak_model');
        $this->load->model('Karyawan_model');
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
        $anak       = $this->Anak_model->get_all();
        
        $data = array(
            'judul_halaman' => 'Data Anak',
            'anak_data'     => $anak
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('anak_list_view', $data);
        $this->load->view('templates/footer', $data);
    }


    public function create() 
    {
        $karyawan   = $this->Karyawan_model->get_all();

        $data = array(
            'judul_halaman' => 'Tambah Data Anak',
            'button'        => 'Create',
            'action'        => site_url('anak/create_action'),
    	    'id'            => set_value('id'),
    	    'karyawan_data' => $karyawan,
    	    'nama_anak'     => set_value('nama_anak'),
    	    'tempat_lahir'  => set_value('tempat_lahir'),
    	    'tgl_lahir'     => set_value('tgl_lahir'),
    	    'foto'          => set_value('foto'),
    	);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('anak_form_view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $karyawan   = $this->Karyawan_model->get_all();

            if( $this->upload() ){
                $data = array(
            		'id_karyawan'     => $this->input->post('id_karyawan',TRUE),
            		'nama_anak'       => $this->input->post('nama_anak',TRUE),
            		'tempat_lahir'    => $this->input->post('tempat_lahir',TRUE),
            		'tgl_lahir'       => $this->input->post('tgl_lahir',TRUE),
            		'foto'            => $this->upload()
        	    );
            }
            else{
                $data = array(
                    'id_karyawan'     => $this->input->post('id_karyawan',TRUE),
                    'nama_anak'       => $this->input->post('nama_anak',TRUE),
                    'tempat_lahir'    => $this->input->post('tempat_lahir',TRUE),
                    'tgl_lahir'       => $this->input->post('tgl_lahir',TRUE),
                    'foto'            => 'no_pict.JPG'
                );
            }

            $this->Anak_model->insert($data);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Anak Berhasil <b>Ditambahkan</b>
                </div>'
            );
            redirect(site_url('anak'));
        }
    }
    
    public function update($id) 
    {
        $row        = $this->Anak_model->get_by_id($id);
        $karyawan   = $this->Karyawan_model->get_all();
        if ($row) {
            $data = array(
                'judul_halaman' => 'Edit Data Anak',
                'button'        => 'Update',
                'action'        => site_url('anak/update_action'),
        		'id'            => set_value('id', $row->id),
        		'id_karyawan'   => set_value('id_karyawan', $row->id_karyawan),
                'karyawan_data' => $karyawan,
        		'nama_anak'     => set_value('nama_anak', $row->nama_anak),
        		'tempat_lahir'  => set_value('tempat_lahir', $row->tempat_lahir),
        		'tgl_lahir'     => set_value('tgl_lahir', $row->tgl_lahir),
        		'foto'          => set_value('foto', $row->foto),
                'old_image'     => set_value('foto', $row->foto),
    	    );
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('anak_form_view', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger" role="alert">
                    Data <b>Tidak Ditemukan</b>
                </div>'
            );
            redirect(site_url('anak'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            if( !$this->upload() ){
                $data = array(
            		'id_karyawan'     => $this->input->post('id_karyawan',TRUE),
            		'nama_anak'       => $this->input->post('nama_anak',TRUE),
            		'tempat_lahir'    => $this->input->post('tempat_lahir',TRUE),
            		'tgl_lahir'       => $this->input->post('tgl_lahir',TRUE),
        		    'foto'            => $this->input->post('old_image',TRUE)
        	    );
            }
            else{
                $data = array(
                    'id_karyawan'     => $this->input->post('id_karyawan',TRUE),
                    'nama_anak'       => $this->input->post('nama_anak',TRUE),
                    'tempat_lahir'    => $this->input->post('tempat_lahir',TRUE),
                    'tgl_lahir'       => $this->input->post('tgl_lahir',TRUE),
                    'foto'            => $this->upload()
                );
            }

            $this->Anak_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Anak Berhasil <b>Diperbaharui</b>
                </div>'
            );
            redirect(site_url('anak'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Anak_model->get_by_id($id);

        if ($row) {
            $this->Anak_model->delete($id);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Anak Berhasil <b>Dihapus</b>
                </div>'
            );
            redirect(site_url('anak'));
        } else {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger" role="alert">
                    Data <b>tidak ditemukan</b>
                </div>'
            );
            redirect(site_url('anak'));
        }
    }

    public function upload(){
        // cek jika ada gambar diupload

        $config = [
          'upload_path'   => './uploads/photo/anak/',
          'allowed_types' => 'jpg|png|jpeg',
          'max_size'      => '2048'
        ];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto'))
        {   
          $this->create();
        } 
        else{
          $file = $this->upload->data();  
          $foto = $file['file_name'];
        }
          return $foto; 
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_karyawan', 'id karyawan', 'trim|required');
	$this->form_validation->set_rules('nama_anak', 'nama anak', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
	// $this->form_validation->set_rules('foto', 'foto', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Anak.php */
/* Location: ./application/controllers/Anak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-29 07:04:32 */
/* http://harviacode.com */