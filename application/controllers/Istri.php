<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Istri extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Istri_model');
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
        $istri = $this->Istri_model->get_all();

        $data = array(
            'judul_halaman' => 'Data Istri Karyawan',
            'istri_data'    => $istri
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('istri_list_view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create() 
    {
        $karyawan   = $this->Karyawan_model->get_all();

        $data = array(
            'judul_halaman' => 'Tambah Data Istri Karyawan',
            'button'        => 'Create',
            'action'        => site_url('istri/create_action'),
    	    'id'            => set_value('id'),
    	    'karyawan_data' => $karyawan,
    	    'tempat_lahir'  => set_value('tempat_lahir'),
    	    'tgl_lahir'     => set_value('tgl_lahir'),
    	    'nama_istri'    => set_value('nama_istri'),
    	    'foto'          => set_value('foto'),
	);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('istri_list_view', $data);
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
            		'id_karyawan'  => $this->input->post('id_karyawan',TRUE),
            		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
            		'tgl_lahir'    => $this->input->post('tgl_lahir',TRUE),
            		'nama_istri'   => $this->input->post('nama_istri',TRUE),
            		'foto'         => $this->upload(),
        	    );
            }
            else{
                $data = array(
                    'id_karyawan'  => $this->input->post('id_karyawan',TRUE),
                    'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
                    'tgl_lahir'    => $this->input->post('tgl_lahir',TRUE),
                    'nama_istri'   => $this->input->post('nama_istri',TRUE),
                    'foto'         => 'no_pict.PNG',
                );
            }

            $this->Istri_model->insert($data);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Istri Berhasil <b>Ditambahkan</b>
                </div>'
            );
            redirect(site_url('istri'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Istri_model->get_by_id($id);
        $karyawan   = $this->Karyawan_model->get_all();

        if ($row) {
            $data = array(
                'judul_halaman'=> 'Ubah Data Istri Karyawan',
                'button'       => 'Update',
                'action'       => site_url('istri/update_action'),
        		'id'           => set_value('id', $row->id),
        		'id_karyawan'  => set_value('id_karyawan', $row->id_karyawan),
                'karyawan_data' => $karyawan,
        		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
        		'tgl_lahir'    => set_value('tgl_lahir', $row->tgl_lahir),
        		'nama_istri'   => set_value('nama_istri', $row->nama_istri),
        		'foto'         => set_value('foto', $row->foto),
                'old_image'    => set_value('foto', $row->foto)
    	    );
        $this->load->view('templates/header', $data);
        $this->load->view('istri_form_view', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger" role="alert">
                    Data tidak <b>Ditemukan</b>
                </div>'
            );
            redirect(site_url('istri'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            if( !$this->upload()){
                $data = array(
            		'id_karyawan'  => $this->input->post('id_karyawan',TRUE),
            		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
            		'tgl_lahir'    => $this->input->post('tgl_lahir',TRUE),
            		'nama_istri'   => $this->input->post('nama_istri',TRUE),
            		'foto'         => $this->input->post('old_image',TRUE)
        	    );
            }
            else{
                $data = array(
                    'id_karyawan'  => $this->input->post('id_karyawan',TRUE),
                    'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
                    'tgl_lahir'    => $this->input->post('tgl_lahir',TRUE),
                    'nama_istri'   => $this->input->post('nama_istri',TRUE),
                    'foto'         => $this->upload()
                );
            }
            $this->Istri_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Istri Berhasil <b>Diubah</b>
                </div>'
            );
            redirect(site_url('istri'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Istri_model->get_by_id($id);

        if ($row) {
            $this->Istri_model->delete($id);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Istri Berhasil <b>Dihapus</b>
                </div>'
            );
            redirect(site_url('istri'));
        } else {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger" role="alert">
                    Data <b>tidak ditemukan</b>
                </div>'
            );
            redirect(site_url('istri'));
        }
    }

    public function upload(){
        // cek jika ada gambar diupload

        $config = [
          'upload_path'   => './uploads/photo/istri/',
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
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
	$this->form_validation->set_rules('nama_istri', 'nama istri', 'trim|required');
	// $this->form_validation->set_rules('foto', 'foto', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Istri.php */
/* Location: ./application/controllers/Istri.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-29 07:04:19 */
/* http://harviacode.com */