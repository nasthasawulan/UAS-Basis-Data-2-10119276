<?php
        class list_model extends CI_Model {
                
                function __construct(){
                        parent::__construct();
                }
                
                // Fungsi insert data ke t_model
                function insert_list($data){
                        return $this->db->insert('lembur', $data);
                }
                
                // Fungsi menampilkan seluruh data dari t_model         
                function select_all(){
                        $this->db->select('*');
                        $this->db->from('lembur');
                        $this->db->order_by('nip', 'jumlah_jam_lembur');
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

                // Fungsi update data ke t_model
                function update_list($nip, $data){
                        $this->db->where('nip', $nip);
                        $this->db->update('lembur', $data);
                }

                // Fungsi delete data dari t_model
                function delete_list($nip){
                        $this->db->where('nip', $nip);
                        $this->db->delete('lembur');
                }
                

                // fungsi yang digunakan oleh paginationsample
                function select_all_paging($limit=array()){
                        $this->db->select('*');
                        $this->db->from('lembur');
                        
                        if ($limit != NULL)
                                $this->db->limit($limit['perpage'], $limit['offset']);
                        
                        return $this->db->get();
                }

                // Menghitung jumlah rows
                function jumlah_list(){
                        $this->db->select('*');
                        $this->db->from('lembur');
                        return $this->db->count_all_results();
                }
                
				function eksport_data() {
                        $this->db->select('nip, tanggal_lembur, jumlah_jam_lembur');
                        $this->db->from('lembur');
                        return $this->db->get();
                }

				
        }
?>
