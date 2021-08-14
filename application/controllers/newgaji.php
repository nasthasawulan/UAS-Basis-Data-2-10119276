<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Newgaji extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('gaji_model');
    }

    public function index()
    {
        // mencegah user yang belum login untuk mengakses halaman ini
        $this->auth->restrict();
        // mencegah user mengakses menu yang tidak boleh ia buka, parameter merupakan nilai yang diijinkan.
        $this->auth->cek_menu(2);

        $data['daftar_gaji'] = $this->gaji_model->select_all()->result();

        $this->menu->tampil_sidebar();

        $this->load->view('new-gaji', $data);
    }

    // Pagination Table
    public function lihat_gaji_paging($offset = 0)
    {
        // tentukan jumlah data per halaman
        $perpage = 10;

        // load library pagination
        $this->load->library('pagination');

        // konfigurasi tampilan paging
        $config = array(
            'base_url' => 'newgaji/lihat_gaji_paging',
            'total_rows' => count($this->gaji_model->select_all()->result()),
            'per_page' => $perpage,
        );

        // inisialisasi pagination dan config
        $this->pagination->initialize($config);
        $limit['perpage'] = $perpage;
        $limit['offset'] = $offset;
        $data['daftar_gaji'] = $this->gaji_model->select_all_paging($limit)->result();
        $this->load->view('t-new-gaji', $data);
    }

    public function lihat_gaji()
    {
        $data['daftar_gaji'] = $this->gaji_model->select_all()->result();
        $this->load->view('t-new-gaji', $data);

    }

    public function proses_gaji()
    {
        $method = $this->input->post("method");
        $gaji = new stdClass();
        if($method == 'create') {
            $data['nip'] = $this->input->post('nip');
            $data['kd_departemen'] = $this->input->post('kd_departemen');
            $data['kd_jabatan'] = $this->input->post('kd_jabatan');
            $data['uang_makan'] = $this->input->post('uang_makan');
            $data['uang_transport'] = $this->input->post('uang_transport');
            $data['uang_lembur'] = $this->input->post('uang_lembur');
            $data['uang_cuti'] = $this->input->post('uang_cuti');
            $data['potongan_gaji'] = $this->input->post('potongan_gaji');
            $data['tanggal_gajian'] = $this->input->post('tanggal_gajian');
            $data['total_gaji'] = $this->input->post('total_gaji');
            $nip = $this->gaji_model->insert_gaji($data);
            $data['nip'] = $nip;
            $gaji = $data;
        } else {
            $data['kd_departemen'] = $this->input->post('kd_departemen');
            $data['kd_jabatan'] = $this->input->post('kd_jabatan');
            $data['uang_makan'] = $this->input->post('uang_makan');
            $data['uang_transport'] = $this->input->post('uang_transport');
            $data['uang_lembur'] = $this->input->post('uang_lembur');
            $data['uang_cuti'] = $this->input->post('uang_cuti');
            $data['potongan_gaji'] = $this->input->post('potongan_gaji');
            $data['tanggal_gajian'] = $this->input->post('tanggal_gajian');
            $data['total_gaji'] = $this->input->post('total_gaji');
            $nip = $this->input->post('nip');
            $this->gaji_model->update_gaji($nip, $data);
            $data['nip'] = $nip;
            $gaji = $data;
        }

        echo json_encode([
            'gaji' => $gaji
        ]);
        exit(0);
    }

    public function show_gaji()
    {
        if($this->input->server("REQUEST_METHOD") == "POST") {
            $nip= $this->input->post("kode");
            $gaji = $this->gaji_model->select_by_id($nip)->row();
            http_response_code(200);
            echo json_encode([
                'gaji' => $gaji,
            ]);
            exit(0);
        }
    }

    public function edit_gaji($nip)
    {
        $data['daftar_gaji'] = $this->gaji_model->select_by_id($nip)->row();
        $this->load->view('edit_gaji', $data);
    }

    public function proses_edit_gaji()
    {
        $data['kd_departemen'] = $this->input->post('kd_departemen');
        $data['kd_jabatan'] = $this->input->post('kd_jabatan');
        $data['uang_makan'] = $this->input->post('uang_makan');
        $data['uang_transport'] = $this->input->post('uang_transport');
        $data['uang_lembur'] = $this->input->post('uang_lembur');
        $data['uang_cuti'] = $this->input->post('uang_cuti');
        $data['potongan_gaji'] = $this->input->post('potongan_gaji');
        $data['tanggal_gajian'] = $this->input->post('tanggal_gajian');
        $data['total_gaji'] = $this->input->post('total_gaji');
        $nip = $this->input->post('nip');
        $this->gaji_model->update_gaji($nip, $data);
        redirect('newgaji');
    }

    public function delete_gaji($nip)
    {
        $this->gaji_model->delete_gaji($nip);
        redirect('newgaji');
    }

    // proses untuk mencari item
    public function proses_cari_gaji()
    {
        $nip = $this->input->post('nip');
        $data['daftar_gaji'] = $this->gaji_model->select_by_kode($nip)->result();
        $this->load->view('t-new-gaji', $data);
    }

}

/* End of file new-item.php */
/* Location: ./application/controllers/new-item.php */
