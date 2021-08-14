<?php
        class gaji_model extends CI_Model {
                
                function __construct(){
                        parent::__construct();
                }
                
                // Fungsi insert data ke t_model
                function insert_gaji($data){
                        return $this->db->insert('gaji', $data);
                }
                
                // Fungsi menampilkan seluruh data dari t_model         
                function select_all(){
                        $this->db->select('*');
                        $this->db->from('gaji');
                        $this->db->order_by('nip', 'total_gaji');
                        return $this->db->get();
                }

                /**
                 * Fungsi menampilkan data berdasarkan kode model.
                 * Fungsi ini digunakan untuk proses pencarian.
                 *
                *function select_by_kode($kd_plan){
                 *       $this->db->select('*');
                 *       $this->db->from('t_model');
                 *       $this->db->where("(LOWER(kd_plan) LIKE '%{$kd_plan}%' )");

                  *      return $this->db->get();
                *}
                *

                *function select_by_id($kd_plan){
                  *      $this->db->select('*');
                  *      $this->db->from('t_model');
                   *     $this->db->where('kd_plan', $kd_plan);

                  *      return $this->db->get();
                *}
                */
                function select_by_kode($nip){
                        $this->db->select('*');
                        $this->db->from('gaji');
                        $this->db->where("(LOWER(nip) LIKE '%{$nip}%' )");

                        return $this->db->get();
                }

                function select_by_id($nip){
                        $this->db->select('*');
                        $this->db->from('gaji');
                        $this->db->where('nip', $nip);

                        return $this->db->get();
                }

                // Fungsi update data ke t_model
                function update_gaji($nip, $data){
                        $this->db->where('nip', $nip);
                        $this->db->update('gaji', $data);
                }

                // Fungsi delete data dari t_model
                function delete_gaji($nip){
                        $this->db->where('nip', $nip);
                        $this->db->delete('gaji');
                }
                

                // fungsi yang digunakan oleh paginationsample
                function select_all_paging($limit=array()){
                        $this->db->select('*');
                        $this->db->from('gaji');
                        
                        if ($limit != NULL)
                                $this->db->limit($limit['perpage'], $limit['offset']);
                        
                        return $this->db->get();
                }

                // Menghitung jumlah rows
                function jumlah_gaji(){
                        $this->db->select('*');
                        $this->db->from('gaji');
                        return $this->db->count_all_results();
                }
                
			function eksport_data() {
                        $this->db->select('nip, kd_departemen, kd_jabatan, uang_makan, uang_transport, uang_lembur, uang_cuti, potongan_gaji, tanggal_gajian, total_gaji');
                        $this->db->from('gaji');
                        return $this->db->get();
                }

				
        }
?>
