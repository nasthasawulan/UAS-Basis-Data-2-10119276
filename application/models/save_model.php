<?php
        class Save_model extends CI_Model {
                
                function __construct(){
                        parent::__construct();
                }
                
                // Fungsi insert data ke t_model
                function insert_save($data){
                        return $this->db->insert('keterangan', $data);
                }
                
                // Fungsi menampilkan seluruh data dari t_model         
                function select_all(){
                        $this->db->select('*');
                        $this->db->from('keterangan');
                        $this->db->order_by('nip', 'keterangan_absen');
                        return $this->db->get();
                }

                /**
                 * Fungsi menampilkan data berdasarkan kode model.
                 * Fungsi ini digunakan untuk proses pencarian.
                 */
                function select_by_kode($nip){
                        $this->db->select('*');
                        $this->db->from('keterangan');
                        $this->db->where("(LOWER(nip) LIKE '%{$nip}%' )");

                        return $this->db->get();
                }

                function select_by_id($nip){
                        $this->db->select('*');
                        $this->db->from('keterangan');
                        $this->db->where('nip', $nip);

                        return $this->db->get();
                }

                // Fungsi update data ke t_model
                function update_save($nip, $data){
                        $this->db->where('nip', $nip);
                        $this->db->update('keterangan', $data);
                }

                // Fungsi delete data dari t_model
                function delete_save($nip){
                        $this->db->where('nip', $nip);
                        $this->db->delete('keterangan');
                }
                

                // fungsi yang digunakan oleh paginationsample
                function select_all_paging($limit=array()){
                        $this->db->select('*');
                        $this->db->from('keterangan');
                        
                        if ($limit != NULL)
                                $this->db->limit($limit['perpage'], $limit['offset']);
                        
                        return $this->db->get();
                }

                // Menghitung jumlah rows
                function jumlah_save(){
                        $this->db->select('*');
                        $this->db->from('keterangan');
                        return $this->db->count_all_results();
                }
                
				function eksport_data() {
                        $this->db->select('nip, tanggal_absen, keterangan_absen');
                        $this->db->from('keterangan');
                        return $this->db->get();
                }

		
        }
?>
