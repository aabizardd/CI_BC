<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index()
    {

        $data['productClean'] = $this->Admin_model->getAllProdClean();
        $this->load->view('template_admin/header_admin');
        $this->load->view('admin/index', $data);
        $this->load->view('template_admin/footer_admin');
    }
    public function editClean()
    {
        $this->form_validation->set_rules('nama_jasa', 'Nama_jasa', 'required|trim');
        $this->form_validation->set_rules('harga_jasa', 'Harga_jasa', 'required|trim');
        $this->form_validation->set_rules('desc_mini', 'Desc_mini', 'required|trim');
        $this->form_validation->set_rules('desc', 'Desc', 'required|trim');
        $this->form_validation->set_rules('gambar_clean', 'Gambar_clean', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['productClean'] = $this->Admin_model->getProductClean();
            $this->load->view('template_admin/header_admin');
            $this->load->view('admin/editClean', $data);
            $this->load->view('template_admin/footer_admin');
        } else {
            $idclean = $this->input->post('idclean');
            $data = [
                'nama_clean' => $this->input->post('nama_jasa'),
                'harga_clean' => $this->input->post('harga_jasa'),
                'desc_clean' => $this->input->post('desc'),
                'descmini_clean' => $this->input->post('desc_mini'),
                'gambar_clean' => $this->input->post('gambar_clean'),
                'tipe_product' => $this->input->post('tipe'),
            ];
            $this->Admin_model->updateJasaClean($idclean, $data);
            redirect('admin');
        }
    }

    public function hapusJasaClean($id)
    {
        $this->Admin_model->hapusJasaClean($id);
        redirect('admin');
    }

    public function tambahClean()
    {
        $this->form_validation->set_rules('nama_jasa', 'Nama_jasa', 'required|trim');
        $this->form_validation->set_rules('harga_jasa', 'Harga_jasa', 'required|trim');
        $this->form_validation->set_rules('desc_mini', 'Desc_mini', 'required|trim');
        $this->form_validation->set_rules('desc', 'Desc', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template_admin/header_admin');
            $this->load->view('admin/tambahClean');
            $this->load->view('template_admin/footer_admin');
        } else {
            $data = [
                'id_pjasa' => $this->session->userdata('id'),
                'nama_clean' => $this->input->post('nama_jasa'),
                'harga_clean' => $this->input->post('harga_jasa'),
                'desc_clean' => $this->input->post('desc'),
                'descmini_clean' => $this->input->post('desc_mini'),
                'gambar_clean' => $this->_uploadGambar(),
                'tipe_product' => $this->input->post('tipe'),
            ];
            $this->Admin_model->tambahJasaClean($data);
            redirect('admin');
        }
    }

    private function _uploadGambar()
    {
        $namaFiles = $_FILES['file']['name'];
        $ukuranFile = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];
        $eror = $_FILES['file']['error'];

        $tmpName = $_FILES['file']['tmp_name'];

        if ($eror === 4) {

            $this->session->set_flashdata('mm', '<div class="alert alert-danger alert-dismissible show" role="alert">
      Chose an image or video first!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>');

            redirect('admin/tambahClean');

            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFiles);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            $this->session->set_flashdata('mm', '<div class="alert alert-danger alert-dismissible show" role="alert">
      Your uploaded file, is not image or video!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>');

            redirect('admin/tambahClean');
            return false;
        }

        $namaFilesBaru = uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assetsAwal/img/product/feature-product/' . $namaFilesBaru);

        return $namaFilesBaru;
    }

    public function beauty()
    {

        $data['productBeauty'] = $this->Admin_model->getAllProdBeauty();
        $this->load->view('template_admin/header_admin');
        $this->load->view('admin/beauty', $data);
        $this->load->view('template_admin/footer_admin');
    }

    public function editBeauty()
    {
        $this->form_validation->set_rules('nama_jasa', 'Nama_jasa', 'required|trim');
        $this->form_validation->set_rules('harga_jasa', 'Harga_jasa', 'required|trim');
        $this->form_validation->set_rules('desc_mini', 'Desc_mini', 'required|trim');
        $this->form_validation->set_rules('desc', 'Desc', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['productBeauty'] = $this->Admin_model->getProductBeauty();
            $this->load->view('template_admin/header_admin');
            $this->load->view('admin/editBeauty', $data);
            $this->load->view('template_admin/footer_admin');
        } else {
            $idbeauty = $this->input->post('idbeauty');
            $data = [
                'nama_beauty' => $this->input->post('nama_jasa'),
                'harga_beauty' => $this->input->post('harga_jasa'),
                'desc_beauty' => $this->input->post('desc'),
                'descmini_beauty' => $this->input->post('desc_mini'),
                'tipe_product' => $this->input->post('tipe'),
            ];
            $this->Admin_model->updateJasaBeauty($idbeauty, $data);
            redirect('admin/beauty');
        }
    }

    public function hapusJasaBeauty($id)
    {
        $this->Admin_model->hapusJasaBeauty($id);
        redirect('admin/beauty');
    }

    public function tambahBeauty()
    {
        $this->form_validation->set_rules('nama_jasa', 'Nama_jasa', 'required|trim');
        $this->form_validation->set_rules('harga_jasa', 'Harga_jasa', 'required|trim');
        $this->form_validation->set_rules('desc_mini', 'Desc_mini', 'required|trim');
        $this->form_validation->set_rules('desc', 'Desc', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template_admin/header_admin');
            $this->load->view('admin/tambahBeauty');
            $this->load->view('template_admin/footer_admin');
        } else {
            $data = [
                'id_pjasa' => $this->session->userdata('id'),
                'nama_beauty' => $this->input->post('nama_jasa'),
                'harga_beauty' => $this->input->post('harga_jasa'),
                'desc_beauty' => $this->input->post('desc'),
                'descmini_beauty' => $this->input->post('desc_mini'),
                'tipe_product' => $this->input->post('tipe'),
            ];
            $this->Admin_model->tambahJasaBeauty($data);
            redirect('admin/beauty');
        }
    }

    public function dataUser($role = "")
    {

        if ($role == "" || $role == "Konsumen") {
            $data['role'] = "Konsumen";
            $data['allUser'] = $this->Admin_model->getallUser(['role_id' => "Konsumen"]);
        } elseif ($role == "Beauty" || $role == "beauty") {
            $data['role'] = $role;
            $data['allUser'] = $this->Admin_model->getAllDataBeauty();
        } else {
            $data['role'] = $role;
            $data['allUser'] = $this->Admin_model->getAllDataClean();
        }

        $this->load->view('template_admin/header_admin');
        $this->load->view('admin/dataUser', $data);
        $this->load->view('template_admin/footer_admin');
    }

    public function hapusUser($id)
    {
        $this->Admin_model->deleteUser($id);
        redirect('admin/dataUser');
    }

    public function dataPjasa()
    {

        $data['allPjasa'] = $this->Admin_model->getAllPjasa();
        $this->load->view('template_admin/header_admin');
        $this->load->view('admin/dataPjasa', $data);
        $this->load->view('template_admin/footer_admin');
    }

    public function hapusPjasa($id)
    {
        $this->Admin_model->deletePjasa($id);
        redirect('admin/dataPjasa');
    }

    public function ubahStatus($status, $role, $id)
    {

        $this->Admin_model->ubahStatusUser($status, $id);
        $this->session->set_flashdata('success', 'Status aktif berhasil diubah');
        redirect('admin/dataUser/' . $role);

    }
}