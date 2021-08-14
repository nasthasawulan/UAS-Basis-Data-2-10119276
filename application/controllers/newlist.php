<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Newlist extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('list_model');
    }

    public function index()
    {
        // mencegah user yang belum login untuk mengakses halaman ini
        $this->auth->restrict();
        // mencegah user mengakses menu yang tidak boleh ia buka, parameter merupakan nilai yang diijinkan.
        $this->auth->cek_menu(2);

        $data['daftar_list'] = $this->list_model->select_all()->result();

        $this->menu->tampil_sidebar();

        $this->load->view('new-list', $data);
    }

    // Pagination Table
    public function lihat_list_paging($offset = 0)
    {
        // tentukan jumlah data per halaman
        $perpage = 10;

        // load library pagination
        $this->load->library('pagination');

        // konfigurasi tampilan paging
        $config = array(
            'base_url' => 'newlist/lihat_list_paging',
            'total_rows' => count($this->list_model->select_all()->result()),
            'per_page' => $perpage,
        );

        // inisialisasi pagination dan config
        $this->pagination->initialize($config);
        $limit['perpage'] = $perpage;
        $limit['offset'] = $offset;
        $data['daftar_list'] = $this->list_model->select_all_paging($limit)->result();
        $this->load->view('t-new-list', $data);
    }

    public function lihat_list()
    {
        $data['daftar_list'] = $this->list_model->select_all()->result();
        $this->load->view('t-new-list', $data);

    }

    public function proses_list()
    {
        $method = $this->input->post("method");
        $list = new stdClass();
        if($method == 'create') {
            $data['nip'] = $this->input->post('nip');
            $data['tanggal_lembur'] = $this->input->post('tanggal_lembur');
            $data['jumlah_jam_lembur'] = $this->input->post('jumlah_jam_lembur');
            $nip = $this->list_model->insert_list($data);
            $data['nip'] = $nip;
            $list = $data;
        } else {
            $data['tanggal_lembur'] = $this->input->post('tanggal_lembur');
            $data['jumlah_jam_lembur'] = $this->input->post('jumlah_jam_lembur');
            $nip = $this->input->post('nip');
            $this->list_model->update_list($nip, $data);
            $data['nip'] = $nip;
            $list = $data;
        }

        echo json_encode([
            'list' => $list
        ]);
        exit(0);
    }

    public function show_list()
    {
        if($this->input->server("REQUEST_METHOD") == "POST") {
            $nip= $this->input->post("kode");
            $list = $this->list_model->select_by_id($nip)->row();
            http_response_code(200);
            echo json_encode([
                'list' => $list,
            ]);
            exit(0);
        }
    }

    public function edit_list($nip)
    {
        $data['daftar_list'] = $this->list_model->select_by_id($nip)->row();
        $this->load->view('edit_list', $data);
    }

    public function proses_edit_list()
    {
        $data['tanggal_lembur'] = $this->input->post('tanggal_lembur');
        $data['jumlah_jam_lembur'] = $this->input->post('jumlah_jam_lembur');
        $data['nip'] = $this->input->post('nip');
        $this->list_model->update_list($nip, $data);
        redirect('newlist');
    }

    public function delete_list($nip)
    {
        $this->list_model->delete_list($nip);
        redirect('newlist');
    }

    // proses untuk mencari item
    public function proses_cari_list()
    {
        $nip = $this->input->post('nip');
        $data['daftar_list'] = $this->list_model->select_by_kode($nip)->result();
        $this->load->view('t-new-list', $data);
    }

}

/* End of file new-item.php */
/* Location: ./application/controllers/new-item.php */
