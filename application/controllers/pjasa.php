<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pjasa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pjasa_model');

        // var_dump($this->session->all_userdata());die();

        // if($this->session->userdata('role_id') == )

    }

    public function index()
    {

        if ($this->session->userdata('role_id') == 'Beauty') {
            redirect('pjasa/indexbeauty');
        } else if ($this->session->userdata('role_id') == 'admin') {
            redirect('admin');
        } else {

            // var_dump($this->session->all_userdata());die();

            $where = [
                'id_pjasa' => $this->session->userdata('id'),
                // 'status_aktif' => 1,
            ];

            $data['AllProductClean'] = $this->db->get_where('productclean', $where)->result_array();

            $this->load->view('template_pjasa/header_pjasa');
            $this->load->view('pjasa/index', $data);
            $this->load->view('template_pjasa/footer_pjasa');
        }
    }
    public function indexbeauty()
    {

        if ($this->session->userdata('role_id') == 'Clean') {
            redirect('pjasa/');
        } else if ($this->session->userdata('role_id') == 'admin') {
            redirect('admin');
        } else {
            $where = [
                'id_pjasa' => $this->session->userdata('id'),

            ];
            $data['AllProductBeauty'] = $this->db->get_where('productbeauty', $where)->result_array();

            $this->load->view('template_pjasa/header_pjasa');
            $this->load->view('pjasa/indexbeauty', $data);
            $this->load->view('template_pjasa/footer_pjasa');
        }
    }

    public function tambahClean()
    {
        //
        $this->form_validation->set_rules('nama_jasa', 'Nama_jasa', 'required|trim');
        $this->form_validation->set_rules('harga_jasa', 'Harga_jasa', 'required|trim');
        $this->form_validation->set_rules('desc_mini', 'Desc_mini', 'required|trim');
        $this->form_validation->set_rules('desc', 'Desc', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template_pjasa/header_pjasa');
            $this->load->view('pjasa/tambahClean');
            $this->load->view('template_pjasa/footer_pjasa');
        } else {
            $filename = $this->_uploadGambar("clean");
            $data = [
                'id_pjasa' => $this->session->userdata('id'),
                'nama_clean' => $this->input->post('nama_jasa'),
                'harga_clean' => $this->input->post('harga_jasa'),
                'desc_clean' => $this->input->post('desc'),
                'descmini_clean' => $this->input->post('desc_mini'),
                'tipe_product' => $this->input->post('tipe'),
                'gambar_clean' => $filename,
            ];
            $this->Pjasa_model->tambahJasaClean($data);
            $this->session->set_flashdata('p_success', 'Item berhasil ditambah');
            redirect('pjasa');
        }
    }

    private function _uploadGambar($tipe = "beauty")
    {
        $namaFiles = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $type = $_FILES['gambar']['type'];
        $eror = $_FILES['gambar']['error'];

        $tmpName = $_FILES['gambar']['tmp_name'];

        if ($eror === 4) {

            $this->session->set_flashdata('alert_file', 'Anda belum memilih gambar');

            if ($tipe == "beauty") {
                redirect('pjasa/tambahBeauty');
            } else {
                redirect('pjasa/tambahClean');
            }

            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFiles);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            $this->session->set_flashdata('alert_file', 'Yang anda upload bukan foto');

            if ($tipe == "beauty") {
                redirect('pjasa/tambahBeauty');
            } else {
                redirect('pjasa/tambahClean');
            }

            return false;
        }

        $namaFilesBaru = uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assetsAwal/img/product/feature-product/' . $namaFilesBaru);

        return $namaFilesBaru;
    }

    public function hapusClean($id)
    {
        $this->Pjasa_model->deleteClean($id);
        $this->session->set_flashdata('p_success', 'Item berhasil dinonaktifkan');

        redirect('pjasa');
    }
    public function aktifClean($id)
    {
        $this->Pjasa_model->aktifClean($id);
        $this->session->set_flashdata('p_success', 'Item berhasil diaktifkan');

        redirect('pjasa');
    }

    public function editClean($id)
    {
        $this->form_validation->set_rules('nama_jasa', 'Nama_jasa', 'required');
        $this->form_validation->set_rules('harga_jasa', 'Harga_jasa', 'required');
        $this->form_validation->set_rules('desc_mini', 'Desc_mini', 'required');
        $this->form_validation->set_rules('desc', 'Desc', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');
        if ($this->form_validation->run() == false) {
            $data['idclean'] = $id;
            $data['productClean'] = $this->Pjasa_model->getProductClean();
            $this->load->view('template_pjasa/header_pjasa');
            $this->load->view('pjasa/editClean', $data);
            $this->load->view('template_pjasa/footer_pjasa');
        } else {
            $idclean = $this->input->post('idclean');
            $file_name = $_FILES['gambar']['name'];

            $new_file = "";
            // var_dump($file_name);die();
            if ($file_name == "") {
                // var_dump("Tidak");die();
                $new_file = $this->input->post('gambar_lama');
            } else {
                $new_file = $this->_uploadGambar();
            }

            $data = [
                'nama_clean' => $this->input->post('nama_jasa'),
                'harga_clean' => $this->input->post('harga_jasa'),
                'desc_clean' => $this->input->post('desc'),
                'descmini_clean' => $this->input->post('desc_mini'),
                'tipe_product' => $this->input->post('tipe'),
                'gambar_clean' => $new_file,
            ];
            $this->Pjasa_model->updateJasaClean($idclean, $data);
            $this->session->set_flashdata('p_success', 'Item berhasil diubah');
            redirect('pjasa');
        }
    }

    public function tambahBeauty()
    {
        $this->form_validation->set_rules('nama_jasa', 'Nama_jasa', 'required|trim');
        $this->form_validation->set_rules('harga_jasa', 'Harga_jasa', 'required|trim');
        $this->form_validation->set_rules('desc_mini', 'Desc_mini', 'required|trim');
        $this->form_validation->set_rules('desc', 'Desc', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template_pjasa/header_pjasa');
            $this->load->view('pjasa/tambahBeauty');
            $this->load->view('template_pjasa/footer_pjasa');
        } else {
            $filename = $this->_uploadGambar();
            $data = [
                'id_pjasa' => $this->session->userdata('id'),
                'nama_beauty' => $this->input->post('nama_jasa'),
                'harga_beauty' => $this->input->post('harga_jasa'),
                'desc_beauty' => $this->input->post('desc'),
                'descmini_beauty' => $this->input->post('desc_mini'),
                'tipe_product' => $this->input->post('tipe'),
                'gambar_beauty' => $filename,
            ];
            $this->Pjasa_model->tambahJasaBeauty($data);
            $this->session->set_flashdata('p_success', 'Item berhasil ditambah');
            redirect('pjasa/indexbeauty');
        }
    }
    public function hapusBeauty($id)
    {

        $this->Pjasa_model->deleteBeauty($id);
        $this->session->set_flashdata('p_success', 'Item berhasil di non-aktifkan');
        redirect('pjasa/indexbeauty');
    }

    public function aktifBeauty($id)
    {

        $this->Pjasa_model->aktifBeauty($id);
        $this->session->set_flashdata('p_success', 'Item berhasil diaktifkan');

        redirect('pjasa/indexbeauty');
    }

    public function editBeauty($id)
    {
        $this->form_validation->set_rules('nama_jasa', 'Nama_jasa', 'required|trim');
        $this->form_validation->set_rules('harga_jasa', 'Harga_jasa', 'required|trim');
        $this->form_validation->set_rules('desc_mini', 'Desc_mini', 'required|trim');
        $this->form_validation->set_rules('desc', 'Desc', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['idjasa'] = $id;
            $data['productBeauty'] = $this->Pjasa_model->getProductBeauty();
            $this->load->view('template_pjasa/header_pjasa');
            $this->load->view('pjasa/editBeauty', $data);
            $this->load->view('template_pjasa/footer_pjasa');
        } else {
            $idbeauty = $this->input->post('idbeauty');
            $data = [
                'nama_beauty' => $this->input->post('nama_jasa'),
                'harga_beauty' => $this->input->post('harga_jasa'),
                'desc_beauty' => $this->input->post('desc'),
                'descmini_beauty' => $this->input->post('desc_mini'),
                'tipe_product' => $this->input->post('tipe'),
            ];

            // $config['upload_path'] = '.assetsAwal/img/product/feature-product/';
            // $config['allowed_types'] = 'jpg|jpeg|png';
            // $this->load->library('upload', $config);
            // $upload = $this->upload->do_upload('gambar');
            // var_dump($upload);die();
            // if ($upload) {
            //     $upload = $this->upload->data();
            //     $datagambar = array(
            //         'gambar_beauty' => $upload['name'],
            //     );
            //     $data = array_merge($data, $datagambar);
            // } else {
            //     $data = $data;
            // }

            $uploadGambar = $_FILES['gambar'];

            // var_dump($uploadGambar);die();
            $datagambar = [];
            if ($uploadGambar['name'] == "") {
                // var_dump("kosong");die();
                $datagambar = array(
                    'gambar_beauty' => $this->input->post('gambar_lama'),
                );
            } else {
                $datagambar = array(
                    'gambar_beauty' => $this->_uploadGambarEdit("beauty", $id),
                );
            }

            $data = array_merge($data, $datagambar);

            //    'gambar_beauty' => $this->_uploadGambarEdit("beauty", $id),

            $this->Pjasa_model->updateJasaBeauty($idbeauty, $data);
            $this->session->set_flashdata('p_success', 'Item berhasil diubah');
            redirect('pjasa/indexbeauty');
        }
    }

    private function _uploadGambarEdit($tipe, $id)
    {
        $namaFiles = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $type = $_FILES['gambar']['type'];
        $eror = $_FILES['gambar']['error'];

        $tmpName = $_FILES['gambar']['tmp_name'];

        if ($eror === 4) {

            $this->session->set_flashdata('alert_file', 'Anda belum memilih gambar');

            if ($tipe == "beauty") {
                redirect('pjasa/editBeauty/' . $id);
            } else {
                redirect('pjasa/editClean/' . $id);
            }

            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFiles);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            $this->session->set_flashdata('alert_file', 'Yang anda upload bukan foto');

            if ($tipe == "beauty") {
                redirect('pjasa/editBeauty/' . $id);

            } else {
                redirect('pjasa/editClean/' . $id);

            }

            return false;
        }

        $namaFilesBaru = uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assetsAwal/img/product/feature-product/' . $namaFilesBaru);

        return $namaFilesBaru;
    }

    public function riwayat()
    {

        $sesi = $this->session->userdata('id');

        $jasa = "";
        if ($this->session->userdata('role_id') == "Clean") {
            $jasa = "clean";

        } else {
            $jasa = "beauty";
        }

        $data['cl'] = $this->Pjasa_model->getTipeById($jasa, $sesi);
        $data['jasa_'] = strtolower($this->session->userdata('role_id'));
        // $data['bt'] = $this->Pjasa_model->getTipeById("beauty", $sesi);

        $this->load->view('template_pjasa/header_pjasa');
        $this->load->view('pjasa/riwayat', $data);
        $this->load->view('template_pjasa/footer_pjasa');
    }

    public function tampilOpsi1($ambil)
    {

        $s = $this->session->userdata('id');
        $data['jenis'] = $ambil;
        $data['hm'] = $this->Pjasa_model->getTipeById($ambil, $s);

        $this->load->view('ajax/index2', $data);
    }

    public function pesananMasuk()
    {

        $sesi = $this->session->userdata('id');

        // $data['cl'] = $this->Pjasa_model->getTipeById("clean", $sesi);
        // $data['bt'] = $this->Pjasa_model->getTipeById("beauty", $sesi);
        $jasa = "";
        if ($this->session->userdata('role_id') == "Clean") {
            $jasa = "clean";

        } else {
            $jasa = "beauty";
        }

        $data['cl'] = $this->Pjasa_model->getPesananMasuk($jasa, $sesi);
        $data['jasa_'] = strtolower($this->session->userdata('role_id'));

        $this->load->view('template_pjasa/header_pjasa');
        $this->load->view('pjasa/pesananMasuk', $data);
        $this->load->view('template_pjasa/footer_pjasa');
    }

    public function tolakPesanan()
    {
        $alasan = $this->input->post('alasann');

        if (is_null($alasan)) {

            //redirect harus pilih alasan
            // var_dump('kosong');die();
            // var_dump($this->session->all_userdata());die();

        } else {
            if ($alasan == "on") {
                $alasan = $this->input->post('alasan');
            }
        }

        $id_order = $this->input->post('id_order');

        $data = [
            'status' => 2,
            'alasan_tolak' => $alasan,
        ];

        $jasa = strtolower($this->session->userdata('role_id'));

        // var_dump($jasa);die();

        $table = 'transaksi_' . $jasa;
        $nama_id_order = 'id_order' . $jasa;

        $where = [
            $nama_id_order => $id_order,
        ];

        $pesan = '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Berhasil!</strong> Pesanan berhasil ditolak.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>';

        $this->db->update($table, $data, $where);

        $this->session->set_flashdata('pesan', $pesan);

        redirect('pjasa/pesananMasuk/');

    }

    public function prosesPesanan($jenis, $jasa, $id_order)
    {

        $status = 0;
        $pesan = "";
        if ($jenis == "terima") {
            $status = 4;
            $pesan = '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Berhasil!</strong> Pesanan berhasil diterima.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>';
        } else {
            $status = 2;
            $pesan = '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Berhasil!</strong> Pesanan berhasil ditolak.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>';

        }

        $data = [
            'status' => $status,
        ];

        $table = 'transaksi_' . $jasa;
        $nama_id_order = 'id_order' . $jasa;

        $where = [
            $nama_id_order => $id_order,
        ];

        $this->db->update($table, $data, $where);

        $this->session->set_flashdata('pesan', $pesan);

        redirect('pjasa/pesananMasuk/');

    }

    public function pesananOnProgress()
    {
        $sesi = $this->session->userdata('id');

        // $data['cl'] = $this->Pjasa_model->getTipeById("clean", $sesi);
        // $data['bt'] = $this->Pjasa_model->getTipeById("beauty", $sesi);
        $jasa = "";
        if ($this->session->userdata('role_id') == "Clean") {
            $jasa = "clean";

        } else {
            $jasa = "beauty";
        }

        $data['cl'] = $this->Pjasa_model->getPesananOnProgress($jasa, $sesi);
        $data['jasa_'] = strtolower($this->session->userdata('role_id'));

        $this->load->view('template_pjasa/header_pjasa');
        $this->load->view('pjasa/pesananOnProgress', $data);
        $this->load->view('template_pjasa/footer_pjasa');
    }
}