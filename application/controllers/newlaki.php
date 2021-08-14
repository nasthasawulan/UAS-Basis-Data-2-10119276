<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Newlaki extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('laki_model');
    }

    public function index()
    {
        // mencegah user yang belum login untuk mengakses halaman ini
        $this->auth->restrict();
        // mencegah user mengakses menu yang tidak boleh ia buka, parameter merupakan nilai yang diijinkan.
        $this->auth->cek_menu(2);

        $data['daftar_item'] = $this->laki_model->select_all()->result();

        $this->menu->tampil_sidebar();

        $this->load->view('new-laki', $data);
    }

    // Pagination Table
    public function lihat_item_paging($offset = 0)
    {
        // tentukan jumlah data per halaman
        $perpage = 10;

        // load library pagination
        $this->load->library('pagination');

        // konfigurasi tampilan paging
        $config = array(
            'base_url' => 'newlaki/lihat_item_paging',
            'total_rows' => count($this->laki_model->select_all()->result()),
            'per_page' => $perpage,
        );

        // inisialisasi pagination dan config
        $this->pagination->initialize($config);
        $limit['perpage'] = $perpage;
        $limit['offset'] = $offset;
        $data['daftar_item'] = $this->laki_model->select_all_paging($limit)->result();
        $this->load->view('t-laki', $data);
    }

    public function lihat_item()
    {
        $data['daftar_item'] = $this->laki_model->select_all()->result();
        $this->load->view('t-laki', $data);

    }

    public function proses_item()
    {
        $method = $this->input->post("method");
        $item = new stdClass();
        if($method == 'create') {
            $data['nip'] = $this->input->post('nip');
            $data['nama_pegawai'] = $this->input->post('nama_pegawai');
            $data['tempat_lahir'] = $this->input->post('tempat_lahir');
            $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
            $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
            $data['agama'] = $this->input->post('agama');
            $data['alamat'] = $this->input->post('alamat');
            $data['no_telepon'] = $this->input->post('no_telepon');
            $nip = $this->laki_model->insert_item($data);
            $data['nip'] = $nip;
            $item = $data;
        } else {
            $data['nama_pegawai'] = $this->input->post('nama_pegawai');
            $data['tempat_lahir'] = $this->input->post('tempat_lahir');
            $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
            $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
            $data['agama'] = $this->input->post('agama');
            $data['alamat'] = $this->input->post('alamat');
            $data['no_telepon'] = $this->input->post('no_telepon');
            $nip = $this->input->post('nip');
            $this->laki_model->update_item($nip, $data);
            $data['nip'] = $nip;
            $item = $data;
        }

        echo json_encode([
            'item' => $item
        ]);
        exit(0);
    }

    public function show_item()
    {
        if($this->input->server("REQUEST_METHOD") == "POST") {
            $nip= $this->input->post("kode");
            $item = $this->laki_model->select_by_id($nip)->row();
            http_response_code(200);
            echo json_encode([
                'item' => $item,
            ]);
            exit(0);
        }
    }

    public function edit_item($nip)
    {
        $data['daftar_item'] = $this->laki_model->select_by_id($nip)->row();
        $this->load->view('edit_item', $data);
    }

    public function proses_edit_item()
    {
        $data['nama_pegawai'] = $this->input->post('nama_pegawai');
        $data['tempat_lahir'] = $this->input->post('tempat_lahir');
        $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['agama'] = $this->input->post('agama');
        $data['alamat'] = $this->input->post('alamat');
        $data['no_telepon'] = $this->input->post('no_telepon');
        $nip = $this->input->post('nip');
        $this->laki_model->update_item($nip, $data);
        redirect('newlaki');
    }

    public function delete_item($nip)
    {
        $this->laki_model->delete_item($nip);
        redirect('newlaki');
    }

    // proses untuk mencari item
    public function proses_cari_item()
    {
        $nip = $this->input->post('nip');
        $data['daftar_item'] = $this->laki_model->select_by_kode($nip)->result();
        $this->load->view('t-laki', $data);
    }

}

/* End of file new-item.php */
/* Location: ./application/controllers/new-item.php */
