<?php
        class Laki_model extends CI_Model {
                
                function __construct(){
                        parent::__construct();
                }
                
                // Fungsi insert data ke t_model
                function insert_item($data){
                        return $this->db->insert('pegawai', $data);
                }
                
                // Fungsi menampilkan seluruh data dari t_model         
                function select_all(){
                        $this->db->select('*');
                        $this->db->from('pegawai');
                        $this->db->where('jenis_kelamin',"Laki-laki");
                        $this->db->order_by('nip', 'nama_pegawai');
                        return $this->db->get();
                }

                /**
                 * Fungsi menampilkan data berdasarkan kode model.
                 * Fungsi ini digunakan untuk proses pencarian.
                 */
                function select_by_kode($nip){
                        $this->db->select('*');
                        $this->db->from('pegawai');
                        $this->db->where("(LOWER(nip) LIKE '%{$nip}%' )");

                        return $this->db->get();
                }

                function select_by_id($nip){
                        $this->db->select('*');
                        $this->db->from('pegawai');
                        $this->db->where('nip', $nip);

                        return $this->db->get();
                }

                // Fungsi update data ke t_model
                function update_item($nip, $data){
                        $this->db->where('nip', $nip);
                        $this->db->update('pegawai', $data);
                }

                // Fungsi delete data dari t_model
                function delete_item($nip){
                        $this->db->where('nip', $nip);
                        $this->db->delete('pegawai');
                }
                

                // fungsi yang digunakan oleh paginationsample
                function select_all_paging($limit=array()){
                        $this->db->select('*');
                        $this->db->from('pegawai');
                        $this->db->where('jenis_kelamin',"Laki-laki");
                        
                        if ($limit != NULL)
                                $this->db->limit($limit['perpage'], $limit['offset']);
                        
                        return $this->db->get();
                }

                // Menghitung jumlah rows
                function jumlah_item(){
                        $this->db->select('*');
                        $this->db->from('pegawai');
                        $this->db->where('jenis_kelamin',"Laki-laki");
                        return $this->db->count_all_results();
                }
                
			function eksport_data() {
                        $this->db->select('nip, nama_pegawai, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, alamat, no_telepon');
                        $this->db->from('pegawai');
                        $this->db->where('jenis_kelamin',"Laki-laki");
                        return $this->db->get();
                }

				
        }
?>
