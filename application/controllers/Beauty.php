<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beauty extends CI_Controller
{
    private $conn;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Beauty_model');
    }

    public function index()
    {
        $data['allpjasa_beauty'] = $this->Beauty_model->getRating();
        // $data['allpjasa_beauty'] = $this->db->get_where('user', ['role_id' => "Beauty"])->result_array();

        $this->load->view('templateAwal/header');
        $this->load->view('beauty/index', $data);
        $this->load->view('templateAwal/footer');
    }
    public function facial()
    {
        $data['allBeautyTreat'] = $this->Beauty_model->getAllFacialTreat();
        $this->load->view('templateAwal/header');
        $this->load->view('beauty/facial', $data);
        $this->load->view('templateAwal/footer');
    }
    public function nails()
    {
        $data['allBeautyTreat'] = $this->Beauty_model->getAllNailsTreat();
        $this->load->view('templateAwal/header');
        $this->load->view('beauty/nails', $data);
        $this->load->view('templateAwal/footer');
    }

    public function product($id)
    {

        $search = $this->input->get('search');

        if (!$search || $search == "") {

            $data['products'] = $this->Beauty_model->getProduct($id);
        } else {
            $data['products'] = $this->Beauty_model->getProductSearch($id, $search);

        }

        // $data['products'] = $this->Clean_model->getProduct($id);

        $this->load->view('templateAwal/header');
        $this->load->view('beauty/product', $data);
        $this->load->view('templateAwal/footer');
    }

    public function beli_product($id)
    {
        $data['products'] = $this->Beauty_model->getProduct2($id);
        $data['jam_order'] = [10.00, 10.30, 11.00, 11.30, 12.00, 12.30, 13.00, 13.30, 14.00, 14.30, 15.00, 15.30, 16.00, 16.30, 17.00];

        $this->load->view('templateAwal/header');
        $this->load->view('beauty/beli_product', $data);
        $this->load->view('templateAwal/footer');
    }

    public function prosesCheckout()
    {

        $harga = $this->input->post('harga');
        $idclean = $this->input->post('clean');
        $jml = $this->input->post("qty");
        $iduser = $this->input->post("iduser");
        $nm = $this->input->post("nm");
        $alm = $this->input->post("alamat_pesan");
        $ph = $this->input->post("ph");
        $tanggal_pesan = $this->input->post("tgl_pesan");
        $jam_pesan = $this->input->post("jam_pesan");

        $data = [

            'id_beauty' => $idclean,
            'id_user' => $iduser,
            'namapengorder' => $nm,
            'alamat_pengorder' => $alm,
            'tanggal_pesan' => $tanggal_pesan,
            'jam_pesan' => $jam_pesan,
            'nomor_pengorder' => $ph,
            'jumlah' => $jml,
            'total_harga' => $harga * $jml,
        ];

        $this->db->insert('transaksi_beauty', $data);

        redirect('beauty/confirmationBeauty');
    }

    public function confirmationBeauty()
    {

        $sesi = $this->session->userdata('id');
        $data['orderDetail'] = $this->Beauty_model->getCheckout($sesi);

        // var_dump($data['orderDetail']);die();

        $this->load->view('templateAwal/header');
        $this->load->view('beauty/confirmationBeauty', $data);
        $this->load->view('templateAwal/footer');
    }

    public function cetak_invoice($id_order)
    {

        $data['orderDetail'] = $this->Beauty_model->getInvoiceBeauty($id_order);

        $this->load->view('beauty/cetak_invoice', $data);

    }
}
