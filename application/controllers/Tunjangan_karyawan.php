<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tunjangan_karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tunjangan_karyawan_model');
        $this->load->model('Karyawan_model');
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
        $tunjangan_karyawan = $this->Tunjangan_karyawan_model->read();
        $karyawan           = $this->Karyawan_model->get_all();
        $tunjangan          = $this->Tunjangan_model->get_all();

        $data = array(
            'judul_halaman' => 'Data Tunjangan karyawan',
            'tunjangan_karyawan_data' => $tunjangan_karyawan,
            // 'tunjangan_data'          => $tunjangan,
            'karyawan_data'           => $karyawan
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tunjangan_karyawan_list_view', $data);
        $this->load->view('templates/footer', $data);
    }


    public function create() 
    {
        $karyawan           = $this->Karyawan_model->get_all();
        $tunjangan          = $this->Tunjangan_model->get_all();
        $data = array(
            'judul_halaman'    => 'Tambah Data Tunjangan Karyawan',
            'tunjangan_data'   => $tunjangan,
            'karyawan_data'    => $karyawan,
            'button'      => 'Create',
            'action'      => site_url('tunjangan_karyawan/create_action'),
    	    'id'          => set_value('id'),
    	    'id_karyawan' => set_value('id_karyawan'),
    	    'tujangan'    => set_value('tujangan'),
    	);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tunjangan_karyawan_form_view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $jum_tun    = $this->Tunjangan_model->jumlah_tunjangan();
        $jt         = count($this->Tunjangan_model->get_all());
        $biaya      = $this->Karyawan_model->get_all();


        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $i = 0;
            $tunjang = $this->input->post('tunjangan',TRUE);
            

            for( $i; $i<$jt; $i++ ){
              $total = 1000;
              $t      = $tunjang[$i];            
              $data = array(
        		'id_karyawan' => $this->input->post('id_karyawan',TRUE),
        		'tujangan'    => $t,
                'biaya_tunjangan' => $total
    	      );

              if(isset($tunjang[$i]) && $tunjang != $tunjang[$i]){
              
              $this->Tunjangan_karyawan_model->insert($data);
              }
              else{
                break;
              }
            }
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Tunjangan Karyawan Berhasil <b>Ditambahkan</b>
                </div>'
            );
            redirect(site_url('tunjangan_karyawan'));
        }
    }
    
    public function update($id) 
    {
        $karyawan           = $this->Karyawan_model->get_all();
        $tunjangan          = $this->Tunjangan_model->get_all();

        $row = $this->Tunjangan_karyawan_model->get_by_id($id);

        if ($row) {

        $data = array(
            'judul_halaman'    => 'Ubah Data Tunjangan Karyawan',
            'tunjangan_data'   => $tunjangan,
            'karyawan_data'    => $karyawan,
                'button'       => 'Update',
                'action'       => site_url('tunjangan_karyawan/update_action'),
        		'id'           => set_value('id', $row->id),
        		'id_karyawan'  => set_value('id_karyawan', $row->id_karyawan),
        		'tujangan'     => set_value('tujangan', $row->tujangan),
                'o'            => explode(', ', $row->tujangan)
    	    );
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('tunjangan_karyawan_form_view', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger" role="alert">
                    Data <b>Tidak Ditemukan</b>
                </div>'
            );
            redirect(site_url('tunjangan_karyawan'));
        }
    }
    
    public function update_action() 
    {
        // $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
        		'id_karyawan' => $this->input->post('id_karyawan',TRUE),
        		'tujangan' => $this->input->post('tujangan',TRUE),
    	    );

            $this->Tunjangan_karyawan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Tunjangan Karyawan Berhasil <b>Diperbarui</b>
                </div>'
            );
            redirect(site_url('tunjangan_karyawan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tunjangan_karyawan_model->get_by_id($id);

        if ($row) {
            $this->Tunjangan_karyawan_model->delete($id);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Tunjangan karyawan Berhasil <b>Dihapus</b>
                </div>'
            );
            redirect(site_url('tunjangan_karyawan'));
        } else {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger" role="alert">
                    Data <b>Tidak Ditemukan</b>
                </div>'
            );
            redirect(site_url('tunjangan_karyawan'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('id_karyawan', 'id karyawan', 'trim|required');
    $this->form_validation->set_rules('id_karyawan', 'id karyawan', 'trim|required|is_unique[tunjangan_karyawan.id_karyawan]',
            [
                'is_unique' => 'Karyawan Sudah Mendapatkan Tunjangan!'
            ]
        );
	// $this->form_validation->set_rules('tujangan', 'tujangan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tunjangan_karyawan.php */
/* Location: ./application/controllers/Tunjangan_karyawan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-06 16:35:05 */
/* http://harviacode.com */