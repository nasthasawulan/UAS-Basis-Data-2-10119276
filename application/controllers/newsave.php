<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Newsave extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('save_model');
    }

    public function index()
    {
        // mencegah user yang belum login untuk mengakses halaman ini
        $this->auth->restrict();
        // mencegah user mengakses menu yang tidak boleh ia buka, parameter merupakan nilai yang diijinkan.
        $this->auth->cek_menu(2);

        $data['daftar_save'] = $this->save_model->select_all()->result();

        $this->menu->tampil_sidebar();

        $this->load->view('new-save', $data);
    }

    // Pagination Table
    public function lihat_save_paging($offset = 0)
    {
        // tentukan jumlah data per halaman
        $perpage = 10;

        // load library pagination
        $this->load->library('pagination');

        // konfigurasi tampilan paging
        $config = array(
            'base_url' => 'newsave/lihat_save_paging',
            'total_rows' => count($this->save_model->select_all()->result()),
            'per_page' => $perpage,
        );

        // inisialisasi pagination dan config
        $this->pagination->initialize($config);
        $limit['perpage'] = $perpage;
        $limit['offset'] = $offset;
        $data['daftar_save'] = $this->save_model->select_all_paging($limit)->result();
        $this->load->view('t-new-save', $data);
    }

    public function lihat_save()
    {
        $data['daftar_save'] = $this->save_model->select_all()->result();
        $this->load->view('t-new-save', $data);

    }

    public function proses_save()
    {
        $method = $this->input->post("method");
        $save = new stdClass();
        if($method == 'create') {
            $data['nip'] = $this->input->post('nip');
            $data['tanggal_absen'] = $this->input->post('tanggal_absen');
            $data['keterangan_absen'] = $this->input->post('keterangan_absen');
            $nip = $this->save_model->insert_save($data);
            $data['nip'] = $nip;
            $save = $data;
        } else {
            $data['tanggal_absen'] = $this->input->post('tanggal_absen');
            $data['keterangan_absen'] = $this->input->post('keterangan_absen');
            $nip = $this->input->post('nip');
            $this->save_model->update_save($nip, $data);
            $data['nip'] = $nip;
            $save = $data;
        }

        echo json_encode([
            'save' => $save
        ]);
        exit(0);
    }

    public function show_save()
    {
        if($this->input->server("REQUEST_METHOD") == "POST") {
            $nip= $this->input->post("kode");
            $save = $this->save_model->select_by_id($nip)->row();
            http_response_code(200);
            echo json_encode([
                'save' => $save,
            ]);
            exit(0);
        }
    }

    public function edit_save($nip)
    {
        $data['daftar_save'] = $this->save_model->select_by_id($nip)->row();
        $this->load->view('edit_save', $data);
    }

    public function proses_edit_save()
    {
        $data['tanggal_absen'] = $this->input->post('tanggal_absen');
        $data['keterangan_absen'] = $this->input->post('keterangan_absen');
        $nip = $this->input->post('nip');
        $this->save_model->update_save($save, $data);
        redirect ('newsave');
    }

    public function delete_save($nip)
    {
        $this->save_model->delete_save($nip);
        redirect ('newsave');
    }

    // proses untuk mencari item
    public function proses_cari_save()
    {
        $nip = $this->input->post('nip');
        $data['daftar_save'] = $this->save_model->select_by_kode($nip)->result();
        $this->load->view('t-new-save', $data);
    }
     
    public function tambahin()
    {
        $data['tambah']=$this->save_model->get_sum()->result();
    }
}

/* End of file new-item.php */
/* Location: ./application/controllers/new-item.php */
