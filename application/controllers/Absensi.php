<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Absensi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Absensi_model');
        $this->load->model('Karyawan_model');
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
        $hadir = $this->Absensi_model->get_hadir();
        $absensi = $this->Absensi_model->get_hadir();
        $jum_kar = $this->Karyawan_model->jumlah_karyawan();

        $data = array(
            'judul_halaman'=> 'Data Kehadiran',
            'absensi_data' => $absensi,
            'jk'            => $jum_kar,
            'hadir'         => $hadir,
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('absensi_list_view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail($id)
    {
        // $hadir   = $this->Absensi_model->get_hadir();
        $absensi = $this->Absensi_model->detail_absensi($id);

        $data = array(
            'judul_halaman'=> 'Data Kehadiran',
            'absensi_data' => $absensi,
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('absensi_list_detail_view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function all()
    {
        // $hadir   = $this->Absensi_model->get_hadir();
        $absensi = $this->Absensi_model->get_all();
        $jum_kar = $this->Karyawan_model->jumlah_karyawan();

        $data = array(
            'judul_halaman'=> 'Data Kehadiran',
            'absensi_data' => $absensi,
            'jk'            => $jum_kar
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('absensi_list_all_view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function read($id) 
    {
        $row = $this->Absensi_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id'            => $row->id,
        		'tanggal'       => $row->tanggal,
        		'jumlah_hadir'  => $row->jumlah_hadir,
        		'jumlah_alpa'   => $row->jumlah_alpa,
        		'jumlah_sakit'  => $row->jumlah_sakit,
        		'jumlah_izin'   => $row->jumlah_izin,
        		'jumlah_cuti'   => $row->jumlah_cuti,
        		'nip'           => $row->nip,
        		'nama_karyawan' => $row->nama_karyawan,
        		'keterangan'    => $row->keterangan,
        		'jam_masuk'     => $row->jam_masuk,
        		'jam_keluar'    => $row->jam_keluar,
    	    );
            $this->load->view('absensi_read', $data);
        } else {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger" role="alert">
                    Data <b>Tidak Ditemukan</b>
                </div>'
            );
            redirect(site_url('absensi'));
        }
    }

    public function create() 
    {
        $karyawan = $this->Karyawan_model->get_all();
        $keterangan_presensi = $this->Keterangan_presensi_model->get_all();
        $jum_kar = $this->Karyawan_model->jumlah_karyawan();
        $data = array(
            'karyawan_data' => $karyawan,
            'jk'            => $jum_kar,
            'keterangan_presensi_data' => $keterangan_presensi,
            'judul_halaman' => 'Tambah Data Absensi',
            'button'        => 'Create',
            'action'        => site_url('absensi/create_action'),
    	    'id'            => set_value('id'),
    	    'tanggal'       => set_value('tanggal'),
    	    // 'jumlah_hadir' => set_value('jumlah_hadir'),
    	    // 'jumlah_alpa' => set_value('jumlah_alpa'),
    	    // 'jumlah_sakit' => set_value('jumlah_sakit'),
    	    // 'jumlah_izin' => set_value('jumlah_izin'),
    	    // 'jumlah_cuti' => set_value('jumlah_cuti'),
    	    'nip'           => set_value('nip'),
    	    'nama_karyawan' => set_value('nama_karyawan'),
    	    'keterangan'    => set_value('keterangan'),
    	    'jam_masuk'     => set_value('jam_masuk'),
    	    'jam_keluar'    => set_value('jam_keluar'),
    	);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('absensi_form_view', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $jum_kar = $this->Karyawan_model->jumlah_karyawan();
        
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } 
        else {

            $i = 0;
            $nama_karyawann  = $this->input->post('nama_karyawan', TRUE);
            $nipp            = $this->input->post('nip', TRUE);
            $keterangan      = $this->input->post('keterangan', TRUE);
            $jam_mas         = $this->input->post('jam_masuk',TRUE);
            $jam_pul         = $this->input->post('jam_keluar',TRUE);
            // $keter           = $this->input->post('keterangan', TRUE);
            

            for( $i; $i<$jum_kar; $i++ ){
                $n      = $nipp[$i];
                $nm     = $nama_karyawann[$i];
                $ket    = $keterangan[$i];   
                $jm     = $jam_mas[$i];
                $jp     = $jam_pul[$i];
            $data = array(
        		'tanggal' => $this->input->post('tanggal',TRUE),
        		// 'jumlah_hadir' => $this->input->post('jumlah_hadir',TRUE),
        		// 'jumlah_alpa' => $this->input->post('jumlah_alpa',TRUE),
        		// 'jumlah_sakit' => $this->input->post('jumlah_sakit',TRUE),
        		// 'jumlah_izin' => $this->input->post('jumlah_izin',TRUE),
        		// 'jumlah_cuti'   => $this->input->post('jumlah_cuti',TRUE),
        		'nip'           => $n,
        		'nama_karyawan' => $nm,
        		'keterangan'    => $ket,
        		'jam_masuk'     => $jm,
        		'jam_keluar'    => $jp
    	    );
            $this->Absensi_model->insert($data);
                
            }
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Kehadiran Berhasil <b>Ditambahkan</b>
                </div>'
            );
            redirect(site_url('absensi'));
            
        }
    }
    
    public function update($id) 
    {
        $karyawan = $this->Karyawan_model->get_all();
        $keterangan_presensi = $this->Keterangan_presensi_model->get_all();
        $row = $this->Absensi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'karyawan_data'             => $karyawan,
                'keterangan_presensi_data'  => $keterangan_presensi,
                'judul_halaman'             => 'Ubah Data Absensi',
                'button'                    => 'Update',
                'action'                    => site_url('absensi/update_action'),
        		'id'                        => set_value('id', $row->id),
        		'tanggal'                   => set_value('tanggal', $row->tanggal),
        		// 'jumlah_hadir' => set_value('jumlah_hadir', $row->jumlah_hadir),
        		// 'jumlah_alpa' => set_value('jumlah_alpa', $row->jumlah_alpa),
        		// 'jumlah_sakit' => set_value('jumlah_sakit', $row->jumlah_sakit),
        		// 'jumlah_izin' => set_value('jumlah_izin', $row->jumlah_izin),
        		// 'jumlah_cuti' => set_value('jumlah_cuti', $row->jumlah_cuti),
                'jam_masuk'       => set_value('jam_masuk', $row->jam_masuk),
                'jam_keluar'      => set_value('jam_keluar', $row->jam_keluar),

        		'nip'             => set_value('nip', $row->nip),
        		'nama_karyawan'   => set_value('nama_karyawan', $row->nama_karyawan),
        		'keterangan'      => set_value('keterangan', $row->keterangan),
        		
    	    );
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('absensi_form_view', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-danger" role="alert">
                    Data <b>Tidak Ditemukan</b>
                </div>'
            );redirect(site_url('absensi'));
        }
    }
    
    public function update_action() 
    {
        $this->_ruless();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
        		'tanggal' => $this->input->post('tanggal',TRUE),
        		// 'jumlah_hadir' => $this->input->post('jumlah_hadir',TRUE),
        		// 'jumlah_alpa' => $this->input->post('jumlah_alpa',TRUE),
        		// 'jumlah_sakit' => $this->input->post('jumlah_sakit',TRUE),
        		// 'jumlah_izin' => $this->input->post('jumlah_izin',TRUE),
        		// 'jumlah_cuti' => $this->input->post('jumlah_cuti',TRUE),
                'jam_masuk'       => $this->input->post('jam_masuk',TRUE),
                'jam_keluar'      => $this->input->post('jam_keluar',TRUE),

        		'nip'             => $this->input->post('nip',TRUE),
        		'nama_karyawan'   => $this->input->post('nama_karyawan',TRUE),
        		'keterangan'      => $this->input->post('keterangan',TRUE),
        		
    	    );

            $this->Absensi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Kehadiran Berhasil <b>Diubah</b>
                </div>'
            );
            redirect(site_url('absensi/all'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Absensi_model->get_by_id($id);

        if ($row) {
            $this->Absensi_model->delete($id);
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data Kehadiran Berhasil <b>dihapus</b>
                </div>'
            );
            redirect(site_url('absensi'));
        } else {
            $this->session->set_flashdata(
                'message', 
                '<div class="alert alert-success" role="alert">
                    Data <b>Tidak Ditemukan</b>
                </div>'
            );            
            redirect(site_url('absensi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required|is_unique[absensi.tanggal]',
            [
                'is_unique' => 'Absensi pada tanggal ini sudah diset!'
            ]
        );
	// $this->form_validation->set_rules('jumlah_hadir', 'jumlah hadir', 'trim|required');
	// $this->form_validation->set_rules('jumlah_alpa', 'jumlah alpa', 'trim|required');
	// $this->form_validation->set_rules('jumlah_sakit', 'jumlah sakit', 'trim|required');
	// $this->form_validation->set_rules('jumlah_izin', 'jumlah izin', 'trim|required');
	// $this->form_validation->set_rules('jumlah_cuti', 'jumlah cuti', 'trim|required');
	// $this->form_validation->set_rules('nip', 'nip', 'trim|required');
	// $this->form_validation->set_rules('nama_karyawan', 'nama karyawan', 'trim|required');
	// $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	// $this->form_validation->set_rules('jam_masuk', 'jam masuk', 'trim|required');
	// $this->form_validation->set_rules('jam_keluar', 'jam keluar', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _ruless() 
    {
 
    // $this->form_validation->set_rules('jumlah_hadir', 'jumlah hadir', 'trim|required');
    // $this->form_validation->set_rules('jumlah_alpa', 'jumlah alpa', 'trim|required');
    // $this->form_validation->set_rules('jumlah_sakit', 'jumlah sakit', 'trim|required');
    // $this->form_validation->set_rules('jumlah_izin', 'jumlah izin', 'trim|required');
    // $this->form_validation->set_rules('jumlah_cuti', 'jumlah cuti', 'trim|required');
    // $this->form_validation->set_rules('nip', 'nip', 'trim|required');
    // $this->form_validation->set_rules('nama_karyawan', 'nama karyawan', 'trim|required');
    // $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
    // $this->form_validation->set_rules('jam_masuk', 'jam masuk', 'trim|required');
    // $this->form_validation->set_rules('jam_keluar', 'jam keluar', 'trim|required');

    $this->form_validation->set_rules('id', 'id', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


}

/* End of file Absensi.php */
/* Location: ./application/controllers/Absensi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-02 19:07:49 */
/* http://harviacode.com */