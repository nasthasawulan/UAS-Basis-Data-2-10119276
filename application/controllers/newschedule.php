<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Newschedule extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('jadwal_model');
    }

    public function index()
    {
        // mencegah user yang belum login untuk mengakses halaman ini
        $this->auth->restrict();
        // mencegah user mengakses menu yang tidak boleh ia buka, parameter merupakan nilai yang diijinkan.
        $this->auth->cek_menu(2);

        $data['daftar_jadwal'] = $this->jadwal_model->select_all()->result();

        $this->menu->tampil_sidebar();

        $this->load->view('new-schedule', $data);
    }

    // Pagination Table
    public function lihat_jadwal_paging($offset = 0)
    {
        // tentukan jumlah data per halaman
        $perpage = 10;

        // load library pagination
        $this->load->library('pagination');

        // konfigurasi tampilan paging
        $config = array(
            'base_url' => 'newschedule/lihat_jadwal_paging',
            'total_rows' => count($this->jadwal_model->select_all()->result()),
            'per_page' => $perpage,
        );

        // inisialisasi pagination dan config
        $this->pagination->initialize($config);
        $limit['perpage'] = $perpage;
        $limit['offset'] = $offset;
        $data['daftar_jadwal'] = $this->jadwal_model->select_all_paging($limit)->result();
        $this->load->view('t-new-jadwal', $data);
    }

    public function lihat_jadwal()
    {
        $data['daftar_jadwal'] = $this->jadwal_model->select_all()->result();
        $this->load->view('t-new-jadwal', $data);

    }

    public function proses_jadwal()
    {
        $method = $this->input->post("method");
        $jadwal = new stdClass();
        if($method == 'create') {
            $data['nip'] = $this->input->post('nip');
            $data['dari_tanggal'] = $this->input->post('dari_tanggal');
            $data['sampai_tanggal'] = $this->input->post('sampai_tanggal');
            $data['jumlah_hari'] = $this->input->post('jumlah_hari');
            $data['keterangan'] = $this->input->post('keterangan');
            $nip = $this->jadwal_model->insert_jadwal($data);
            $data['nip'] = $nip;
            $jadwal = $data;
        } else {
            $data['dari_tanggal'] = $this->input->post('dari_tanggal');
            $data['sampai_tanggal'] = $this->input->post('sampai_tanggal');
            $data['jumlah_hari'] = $this->input->post('jumlah_hari');
            $data['keterangan'] = $this->input->post('keterangan');
            $nip = $this->input->post('nip');
            $this->jadwal_model->update_jadwal($nip, $data);
            $data['nip'] = $nip;
            $jadwal = $data;
        }

        echo json_encode([
            'jadwal' => $jadwal
        ]);
        exit(0);
    }

    public function show_jadwal()
    {
        if($this->input->server("REQUEST_METHOD") == "POST") {
            $nip= $this->input->post("kode");
            $jadwal = $this->jadwal_model->select_by_id($nip)->row();
            http_response_code(200);
            echo json_encode([
                'jadwal' => $jadwal,
            ]);
            exit(0);
        }
    }

    public function edit_jadwal($nip)
    {
        $data['daftar_jadwal'] = $this->jadwal_model->select_by_id($nip)->row();
        $this->load->view('edit_jadwal', $data);
    }

    public function proses_edit_jadwal()
    {
        $data['dari_tanggal'] = $this->input->post('dari_tanggal');
        $data['sampai_tanggal'] = $this->input->post('sampai_tanggal');
        $data['jumlah_hari'] = $this->input->post('jumlah_hari');
        $data['keterangan'] = $this->input->post('keterangan');
        $nip = $this->input->post('nip');
        $this->jadwal_model->update_jadwal($nip, $data);
        redirect('newschedule');
    }

    public function delete_jadwal($nip)
    {
        $this->jadwal_model->delete_jadwal($nip);
        redirect('newschedule');
    }

    // proses untuk mencari item
    public function proses_cari_jadwal()
    {
        $nip = $this->input->post('nip');
        $data['daftar_jadwal'] = $this->jadwal_model->select_by_kode($nip)->result();
        $this->load->view('t-new-jadwal', $data);
    }

}

/* End of file new-item.php */
/* Location: ./application/controllers/new-schedule.php */
