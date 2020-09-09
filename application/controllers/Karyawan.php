<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    function __construct()
    {

        parent::__construct();

        $this->load->model('Karyawan_model');
        $this->load->model('Agama_model');
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
        

        $karyawan = $this->Karyawan_model->get_all();
        $agama    = $this->Agama_model->get_all();
        $jabatan  = $this->Jabatan_model->get_all();
        $total    = $this->Karyawan_model->jumlah_karyawan();
        $data = array(
            'jum_kar'       => $total,
            'judul_halaman' => 'Data Karyawan',
            'karyawan_data' => $karyawan,
            'agama_data'    => $agama,
            'jabatan_data'  => $jabatan
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('karyawan_list_view', $data);
        $this->load->view('templates/footer', $data);
    }   

    public function read($id) 
    {
        $row = $this->Karyawan_model->get_by_id($id);
        $karyawan = $this->Karyawan_model->get_all();
        if ($row) {
            $data = array(
                
            'judul_halaman' => 'Detail Data Karyawan',
            'karyawan_data' => $karyawan,
                'id'            => $row->id,
                'nip'           => $row->nip,
                'nama'          => $row->nama,
                'jabatan'       => $row->jabatan,
                'jk'            => $row->jk,
                'kota_lahir'    => $row->kota_lahir,
                'tanggal_lahir' => $row->tanggal_lahir,
                'agama'         => $row->agama,
                'alamat'        => $row->alamat,
                'email'         => $row->email,
                'telepon'       => $row->telepon,
                'foto'          => $row->foto,
                'status'        => $row->status,
                'anak'          => $row->anak,
                'kk'         =>  $row->kk,
                'slip'          => $row->slip,
            );
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('karyawan_detail_view', $data);
            $this->load->view('templates/footer', $data);        
        } else {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger" role="alert">
                    Data <b>Tidak Ditemukan</b>
                </div>'
            );
            redirect(site_url('karyawan'));
        }
    }



    public function create() 
    {
        $agama    = $this->Agama_model->get_all();
        $jabatan  = $this->Jabatan_model->get_all();

        $data = array(
            'judul_halaman' => 'Tambah Data Karyawan',
            'button'        => 'Create',
            'jabatan_data'  => $jabatan,
            'agama_data'    => $agama,
            'action'        => site_url('karyawan/create_action'),
    	    'id'            => set_value('id'),
    	    'nip'           => set_value('nip'),
    	    'nama'          => set_value('nama'),
    	    'jabatan'       => set_value('jabatan'),
    	    'jk'            => set_value('jk'),
    	    'kota_lahir'    => set_value('kota_lahir'),
    	    'tanggal_lahir' => set_value('tanggal_lahir'),
    	    'agama'         => set_value('agama'),
    	    'alamat'        => set_value('alamat'),
    	    'email'         => set_value('email'),
    	    'telepon'       => set_value('telepon'),
    	    'foto'          => set_value('foto'),
            'status'        => set_value('status'),
            'anak'          => set_value('anak'),
            'kk'            => set_value('kk'),
            'slip'          => set_value('slip'),
    	);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('karyawan_form_view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create_action() 
    {
        $agama    = $this->Agama_model->get_all();
        $jabatan  = $this->Jabatan_model->get_all();

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            if($this->upload() || $this->upload_kk() || $this->upload_slip()){
                $data = array(
            		'nip'           => $this->input->post('nip',TRUE),
            		'nama'          => $this->input->post('nama',TRUE),
            		'jabatan'       => $this->input->post('jabatan',TRUE),
            		'jk'            => $this->input->post('jk',TRUE),
            		'kota_lahir'    => $this->input->post('kota_lahir',TRUE),
            		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
            		'agama'         => $this->input->post('agama',TRUE),
            		'alamat'        => $this->input->post('alamat',TRUE),
            		'email'         => $this->input->post('email',TRUE),
            		'telepon'       => $this->input->post('telepon',TRUE),
            		'foto'          => $this->upload(),
                    'status'        => $this->input->post('status',TRUE),
                    'anak'          => $this->input->post('anak',TRUE),
                    'kk'            => $this->upload_kk(),
                    'slip'          => $this->upload_slip(),
        	    );
            }
            else{
                 $data = array(
                    'nip'           => $this->input->post('nip',TRUE),
                    'nama'          => $this->input->post('nama',TRUE),
                    'jabatan'       => $this->input->post('jabatan',TRUE),
                    'jk'            => $this->input->post('jk',TRUE),
                    'kota_lahir'    => $this->input->post('kota_lahir',TRUE),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
                    'agama'         => $this->input->post('agama',TRUE),
                    'alamat'        => $this->input->post('alamat',TRUE),
                    'email'         => $this->input->post('email',TRUE),
                    'telepon'       => $this->input->post('telepon',TRUE),
                    'foto'          => 'no_pict.jpg',
                    'status'        => $this->input->post('status',TRUE),
                    'anak'          => $this->input->post('anak',TRUE),
                    'kk'            => 'no_pict.jpg',
                    'slip'          => 'no_pict.jpg',
            );

            }
            $this->Karyawan_model->insert($data);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Karyawan Berhasil <b>Ditambahkan</b>
                </div>'
            );
            redirect(site_url('karyawan'));
        }
    }
    
    public function update($id) 
    {
        $row    = $this->Karyawan_model->get_by_id($id);
        $agama  = $this->Agama_model->get_all();
        $jabatan  = $this->Jabatan_model->get_all();
        
        if ($row) {
            $data = array(
                'judul_halaman' => 'Ubah Data Karyawan',
                'button'        => 'Update',
                'agama_data'    => $agama,
                'jabatan_data'  => $jabatan,
                'action'        => site_url('karyawan/update_action'),
        		'id'            => set_value('id', $row->id),
        		'nip'           => set_value('nip', $row->nip),
        		'nama'          => set_value('nama', $row->nama),
        		'jabatan'       => set_value('jabatan', $row->jabatan),
        		'jk'            => set_value('jk', $row->jk),
        		'kota_lahir'    => set_value('kota_lahir', $row->kota_lahir),
        		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
        		'agama'         => set_value('agama', $row->agama),
        		'alamat'        => set_value('alamat', $row->alamat),
        		'email'         => set_value('email', $row->email),
        		'telepon'       => set_value('telepon', $row->telepon),
        		'foto'          => set_value('foto', $row->foto),
                'old_image'     => set_value('foto', $row->foto),
                'kk'          => set_value('kk', $row->kk),
                'old_image_kk'     => set_value('kk', $row->kk),
                'slip'          => set_value('slip', $row->slip),
                'old_image_slip'   => set_value('slip', $row->slip),
                'status'        => set_value('status', $row->status),
                'anak'          => set_value('anak', $row->anak),
    	    );
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('karyawan_form_view', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger" role="alert">
                    Data <b>Tidak Ditemukan</b>
                </div>'
            );
            redirect(site_url('karyawan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            if($this->upload() || $this->upload_kk() || $this->upload_slip()){
                $data = array(
                    'nip'           => $this->input->post('nip',TRUE),
                    'nama'          => $this->input->post('nama',TRUE),
                    'jabatan'       => $this->input->post('jabatan',TRUE),
                    'jk'            => $this->input->post('jk',TRUE),
                    'kota_lahir'    => $this->input->post('kota_lahir',TRUE),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
                    'agama'         => $this->input->post('agama',TRUE),
                    'alamat'        => $this->input->post('alamat',TRUE),
                    'email'         => $this->input->post('email',TRUE),
                    'telepon'       => $this->input->post('telepon',TRUE),
                    'foto'          => $this->upload(),
                    'kk'            => $this->upload_kk(),
                    'slip'          => $this->upload_slip(),
                    'status'        => $this->input->post('status',TRUE),
                    'anak'          => $this->input->post('anak',TRUE),
                );
                
            }else{
                $data = array(
                    'nip'           => $this->input->post('nip',TRUE),
                    'nama'          => $this->input->post('nama',TRUE),
                    'jabatan'       => $this->input->post('jabatan',TRUE),
                    'jk'            => $this->input->post('jk',TRUE),
                    'kota_lahir'    => $this->input->post('kota_lahir',TRUE),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
                    'agama'         => $this->input->post('agama',TRUE),
                    'alamat'        => $this->input->post('alamat',TRUE),
                    'email'         => $this->input->post('email',TRUE),
                    'telepon'       => $this->input->post('telepon',TRUE),
                    'foto'          => $this->input->post('old_image',TRUE),
                    'kk'            => $this->input->post('old_image_kk',TRUE),
                    'slip'          => $this->input->post('old_image_slip',TRUE),
                    'status'        => $this->input->post('status',TRUE),
                    'anak'          => $this->input->post('anak',TRUE),
                );
            }
            $this->Karyawan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Karyawan Berhasil <b>Diperbarui</b>
                </div>'
            );
            redirect(site_url('karyawan'));
        }
    }

    public function upload(){
        // cek jika ada gambar diupload

        $config = [
          'upload_path'   => './uploads/photo/karyawan/',
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

    public function upload_kk(){
        // cek jika ada gambar diupload

        $config = [
          'upload_path'   => './uploads/photo/kk/',
          'allowed_types' => 'jpg|png|jpeg',
          'max_size'      => '2048'
        ];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('kk'))
        {   
          $this->create();
        } 
        else{
          $file = $this->upload->data();  
          $kk = $file['file_name'];
        }
          return $kk; 
    }

    public function upload_slip(){
        // cek jika ada gambar diupload

        $config = [
          'upload_path'   => './uploads/photo/slip/',
          'allowed_types' => 'jpg|png|jpeg',
          'max_size'      => '2048'
        ];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('slip'))
        {   
          $this->create();
        } 
        else{
          $file = $this->upload->data();  
          $slip = $file['file_name'];
        }
          return $slip; 
    }
    
    public function delete($id) 
    {
        $row = $this->Karyawan_model->get_by_id($id);

        if ($row) {
            $this->Karyawan_model->delete($id);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Karyawan Berhasil <b>Dihapus</b>
                </div>'
            );
            redirect(site_url('karyawan'));
        } else {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger" role="alert">
                    Data <b>Tidak Ditemukan</b>
                </div>'
            );
            redirect(site_url('karyawan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nip', 'nip', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('jk', 'jk', 'trim|required');
	$this->form_validation->set_rules('kota_lahir', 'kota lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('telepon', 'telepon', 'trim|required');
	// $this->form_validation->set_rules('foto', 'sfoto', 'trim|required');
    $this->form_validation->set_rules('status', 'status', 'trim|required');
    $this->form_validation->set_rules('anak', 'anak', 'trim|required');
    
	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-01 18:48:42 */
/* http://harviacode.com */