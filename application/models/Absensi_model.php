<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Absensi_model extends CI_Model
{

    public $table = 'absensi';
    public $id = 'id';
    public $date = 'tanggal';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->date, $this->order);
        return $this->db->get($this->table)->result();
    }
    
    // function get_all()
    // {
    //     $sql = 'SELECT * FROM `absensi` JOIN `karyawan` 
    //             ON `absensi`.`nip` = `karyawan`.`nip` 
    //             ' ;
    //     $query = $this->db->query($sql);
    //     return $query->result();
    // }

    // function get_hadir()
    // {
    //     $sql = 'SELECT tanggal,keterangan,  GROUP_CONCAT(keterangan) AS "list_hadir", 
    //             SUM(CASE WHEN absensi.keterangan = "hadir" then 1, 0) AS "jumlah_hadir",
    //             SUM(CASE WHEN absensi.keterangan = "izin" then 1, 0) AS "jumlah_izin"
    //             FROM
    //             `absensi` GROUP BY tanggal' ;
    //     $query = $this->db->query($sql);
    //     return $query->result();
    // }

    function get_hadir()
    {
        $sql = 'SELECT *,`keterangan_presensi`.`id`, `tanggal`, 
                SUM(IF(`keterangan_presensi`.`id`=1,1,0)) AS jumlah_hadir,
                SUM(IF(`keterangan_presensi`.`id`=2,1,0)) AS jumlah_tidak_hadir,
                SUM(IF(`keterangan_presensi`.`id`=3,1,0)) AS jumlah_izin,
                SUM(IF(`keterangan_presensi`.`id`=4,1,0)) AS jumlah_sakit,
                SUM(IF(`keterangan_presensi`.`id`=5,1,0)) AS jumlah_cuti
                FROM
                `absensi` 
                JOIN `keterangan_presensi` ON `absensi`.`keterangan` = `keterangan_presensi`.`keterangan`
                GROUP BY tanggal' ;
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_hadir_id($id)
    {

        $sql = "SELECT CONCAT(YEAR(`tanggal`),'/',MONTH(`tanggal`)) AS tahun_bulan ,SUM(IF(`keterangan_presensi`.`id`=1,1,0)) AS jumlah_hadir FROM `keterangan_presensi` JOIN `absensi` ON `absensi`.`keterangan` = `keterangan_presensi`.`keterangan` WHERE `absensi`.`nip` = '$id' AND `absensi`.`keterangan` = 'hadir' AND MONTH(`absensi`.`tanggal`) = MONTH(NOW())" ;
        // $this->db->select('keterangan_presensi.id');
        // $this->db->from('keterangan_presensi');
        // $this->db->join('absensi', 'absensi.keterangan = keterangan_presensi.keterangan');
        // $this->db->where('absensi.nip', $id);
        // $this->db->where('absensi.keterangan', 'hadir');
        // $this->db->where('MONTH(absensi.tanggal)', 12);

        // $query=$this->db->get();
        // return $query->result_array();

        $query = $this->db->query($sql);
        return $query->result();
    }

    function detail_absensi($id)
    {
        return $this->db->get_where('absensi', ['tanggal' => $id])->result();
    }

    // function get_sakit()
    // {
    //     $sql = 'SELECT * FROM `absensi` WHERE keterangan="cuti" GROUP BY tanggal' ;
    //     $query = $this->db->query($sql);
    //     return $query->result();
    // }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->or_where('tanggal', $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
    	$this->db->or_like('tanggal', $q);
    	// $this->db->or_like('jumlah_hadir', $q);
    	// $this->db->or_like('jumlah_alpa', $q);
    	// $this->db->or_like('jumlah_sakit', $q);
    	// $this->db->or_like('jumlah_izin', $q);
    	// $this->db->or_like('jumlah_cuti', $q);
    	$this->db->or_like('nip', $q);
    	$this->db->or_like('nama_karyawan', $q);
    	$this->db->or_like('keterangan', $q);
    	$this->db->or_like('jam_masuk', $q);
    	$this->db->or_like('jam_keluar', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
    	$this->db->or_like('tanggal', $q);
    	// $this->db->or_like('jumlah_hadir', $q);
    	// $this->db->or_like('jumlah_alpa', $q);
    	// $this->db->or_like('jumlah_sakit', $q);
    	// $this->db->or_like('jumlah_izin', $q);
    	// $this->db->or_like('jumlah_cuti', $q);
    	$this->db->or_like('nip', $q);
    	$this->db->or_like('nama_karyawan', $q);
    	$this->db->or_like('keterangan', $q);
    	$this->db->or_like('jam_masuk', $q);
    	$this->db->or_like('jam_keluar', $q);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->trans_start();
        $this->db->insert($this->table, $data);
        $this->db->trans_complete();
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        // $this->db->and_where($this->tanggal, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->date, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Absensi_model.php */
/* Location: ./application/models/Absensi_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-02 19:07:49 */
/* http://harviacode.com */