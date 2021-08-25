<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clean extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Clean_model');
    }

    public function index()
    {
        // $data['allCleanHome'] = $this->Clean_model->getAllCleanHome();

        $data['allpjasa_clean'] = $this->db->get_where('user', ['role_id' => "Clean"])->result_array();

        $data['avg_rating'] = $this->Clean_model->getRating();

        $this->load->view('templateAwal/header');
        $this->load->view('clean/index', $data);
        $this->load->view('templateAwal/footer');
    }

    public function product($id)
    {

        $search = $this->input->get('search');

        if (!$search || $search == "") {

            $data['products'] = $this->Clean_model->getProduct($id);

        } else {
            $data['products'] = $this->Clean_model->getProductSearch($id, $search);

        }

        $this->load->view('templateAwal/header');
        $this->load->view('clean/product', $data);
        $this->load->view('templateAwal/footer');
    }

    public function beli_product($id)
    {
        $data['products'] = $this->Clean_model->getProduct2($id);

        $data['jam_order'] = [10.00, 10.30, 11.00, 11.30, 12.00, 12.30, 13.00, 13.30, 14.00, 14.30, 15.00, 15.30, 16.00, 16.30, 17.00];

        $this->load->view('templateAwal/header');
        $this->load->view('clean/beli_product', $data);
        $this->load->view('templateAwal/footer');
    }

    public function kostProduct()
    {
        $data['allCleanKost'] = $this->Clean_model->getAllCleanKost();
        $this->load->view('templateAwal/header');
        $this->load->view('clean/kost', $data);
        $this->load->view('templateAwal/footer');
    }

    public function apartmentProduct()
    {
        $data['allCleanApartment'] = $this->Clean_model->getAllCleanApartment();
        $this->load->view('templateAwal/header');
        $this->load->view('clean/apartment', $data);
        $this->load->view('templateAwal/footer');
    }

    public function checkoutClean()
    {
        $this->load->view('templateAwal/header');
        $this->load->view('clean/checkoutClean');
        $this->load->view('templateAwal/footer');
    }
    public function confirmationClean()
    {

        $sesi = $this->session->userdata('id');
        $data['orderDetail'] = $this->Clean_model->getCheckout($sesi);

        $this->load->view('templateAwal/header');
        $this->load->view('clean/confirmationClean', $data);
        $this->load->view('templateAwal/footer');
    }

    public function cetak_invoice($id_order)
    {

        $data['orderDetail'] = $this->Clean_model->getInvoiceBeauty($id_order);

        $this->load->view('clean/cetak_invoice', $data);

    }

    public function prosesCheckout()
    {

        $harga = $this->input->post('harga');
        $idclean = $this->input->post('clean');
        $panjang = $this->input->post("panjang");
        $lebar = $this->input->post("lebar");
        $iduser = $this->input->post("iduser");
        $nm = $this->input->post("nm");
        $alm = $this->input->post("alamat_pesan");
        $ph = $this->input->post("ph");
        $tanggal_pesan = $this->input->post("tgl_pesan");
        $jam_pesan = $this->input->post("jam_pesan");

        $luas = $panjang * $lebar;
        $hargaTambahan = 0;

//         [8:39 PM, 8/15/2021] Liong: -luas kurang dari 100m2 itu 15.000
        // [8:42 PM, 8/15/2021] Liong: -luas kurang dari 100m2 itu 15.000
        // -luas lebih dr 100m2 kurang dari 300m2 itu 45.000
        // -luas lebih dr 300m2 kurang dari 600m2 itu 75.000
        // -luas lebih dr 600m2 kurang dari 900m2 itu 105.000

        if ($luas < 100) {
            $hargaTambahan = 15000;
        } elseif ($luas < 300) {
            $hargaTambahan = 45000;
        } elseif ($luas < 600) {
            $hargaTambahan = 75000;
        } else {
            $hargaTambahan = 105000;
        }

        // var_dump($luas . ": " . $hargaTambahan);die();

        $data = [

            'id_clean' => $idclean,
            'id_user' => $iduser,
            'panjang' => $panjang,
            'lebar' => $lebar,
            'namapengorder' => $nm,
            'alamat_pengorder' => $alm,
            'tanggal_pesan' => $tanggal_pesan,
            'jam_pesan' => $jam_pesan,
            'nomor_pengorder' => $ph,
            'total_harga' => $harga + $hargaTambahan,
        ];

        $this->db->insert('transaksi_clean', $data);

        redirect('clean/confirmationClean');
    }
}