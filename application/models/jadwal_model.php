<?php
        class jadwal_model extends CI_Model {
                
                function __construct(){
                        parent::__construct();
                }
                
                // Fungsi insert data ke t_jadwal
                function insert_jadwal($data){
                        return $this->db->insert('cuti', $data);
                }
                
                // Fungsi menampilkan seluruh data dari t_model         
                function select_all(){
                        $this->db->select('*');
                        $this->db->from('cuti');
                        $this->db->order_by('nip', 'keterangan');
                        return $this->db->get();
                }

                /**
                 * Fungsi menampilkan data berdasarkan kode model.
                 * Fungsi ini digunakan untuk proses pencarian.
                 */
                function select_by_kode($nip){
                        $this->db->select('*');
                        $this->db->from('cuti');
                        $this->db->where("(LOWER(nip) LIKE '%{$nip}%' )");

                        return $this->db->get();
                }

                function select_by_id($nip){
                        $this->db->select('*');
                        $this->db->from('cuti');
                        $this->db->where('nip', $nip);

                        return $this->db->get();
                }

                // Fungsi update data ke t_model
                function update_jadwal($nip, $data){
                        $this->db->where('nip', $nip);
                        $this->db->update('cuti', $data);
                }

                // Fungsi delete data dari t_model
                function delete_jadwal($nip){
                        $this->db->where('nip', $nip);
                        $this->db->delete('cuti');
                }
                

                // fungsi yang digunakan oleh paginationsample
                function select_all_paging($limit=array()){
                        $this->db->select('*');
                        $this->db->from('cuti');
                        
                        if ($limit != NULL)
                                $this->db->limit($limit['perpage'], $limit['offset']);
                        
                        return $this->db->get();
                }

                // Menghitung jumlah rows
                function jumlah_jadwal(){
                        $this->db->select('*');
                        $this->db->from('cuti');
                        return $this->db->count_all_results();
                }
                
			function eksport_data() {
                        $this->db->select('nip, dari_tanggal, sampai_tanggal, jumlah_hari, keterangan');
                        $this->db->from('cuti');
                        return $this->db->get();
                }

				
        }
?>
