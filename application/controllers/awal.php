<?php
defined('BASEPATH') or exit('No direct script access allowed');

class awal extends CI_Controller
{
    private $conn;
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Awal_model');
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
        // var_dump($this->session->all_userdata());die();

        if (!$this->session->userdata('id')) {
            redirect('auth');
        }
    }

    // public function sessionLogin(){
    //     redirect('Auth');
    // }

    public function index()
    {
        $this->load->view('templateAwal/header');
        $this->load->view('kontenAwal/index');
        $this->load->view('templateAwal/footer');
    }

    public function history($pesanan = null)
    {

        $sesi = $this->session->userdata('id');

        $tipe = "";

        if (is_null($pesanan)) {
            $tipe = "clean";
        } else {
            $tipe = $pesanan;
        }

        $data['ckClean'] = $this->Awal_model->getHistory($sesi, $tipe);
        $data['riwayat_jasa'] = $tipe;

        $this->load->view('templateAwal/header');
        $this->load->view('kontenAwal/history', $data);
        $this->load->view('templateAwal/footer');
    }
    public function editprofile()
    {
        // updateProfile

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama Lengkap tidak boleh kosong',
        ]);

        $this->form_validation->set_rules('uname', 'Username', 'required|trim', [
            'required' => 'Username tidak boleh kosong',
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Username tidak boleh kosong',
            'valid_email' => 'Email tidak valid',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat tidak boleh kosong',
        ]);

        $this->form_validation->set_rules('nohp', 'Nomor Hp', 'required|max_length[15]|min_length[8]|trim', [
            'required' => 'Alamat tidak boleh kosong',
            'max_length' => 'Nomor Hp tidak valid',
            'min_length' => 'Nomor Hp tidak valid',
        ]);

        $id = $this->session->userdata('id');

        $data['upd'] = $this->Awal_model->getDataUserById($id);

        if ($this->form_validation->run() == false) {

            $this->load->view('templateAwal/header');
            $this->load->view('kontenAwal/editprofile', $data);
            $this->load->view('templateAwal/footer');
        } else {
            $this->updateProfile();
        }
    }

    public function editPassword()
    {

        $id = $this->session->userdata('id');

        $data['upd'] = $this->Awal_model->getDataUserById($id);

        $this->load->view('templateAwal/header');
        $this->load->view('kontenAwal/editPassword', $data);
        $this->load->view('templateAwal/footer');
    }

    public function tampilOpsi($ambil)
    {

        $sesi = $this->session->userdata('id');
        $data['jenis'] = $ambil;
        $data['cb'] = $this->Awal_model->getHistory($sesi, $ambil);

        $this->load->view('ajax/index', $data);
    }

    public function updateProfile()
    {

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('uname');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $nohp = $this->input->post('nohp');

        $data = [
            'nama' => $nama,
            'username' => $username,
            'email' => $email,
            'alamat' => $alamat,
            'phone_number' => $nohp,
        ];

        //masukin ke model
        $this->Awal_model->updUser($id, $data);

        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('alamat');
        $this->session->unset_userdata('phone_number');
        $this->session->set_userdata($data);

        $this->session->set_flashdata('pesan', '
					<div class="alert alert-success alert-dismissible fade show mt-2 col-lg-10" role="alert">
                        <strong>Yeay!</strong> profil berhasil diperbarui.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');

        redirect('awal/editprofile');
    }

    public function updpw()
    {
        $pwlama = $this->input->post('pwlama');
        $pwbaru = $this->input->post('pwbaru');
        $pwbaru1 = $this->input->post('pwbaru1');
        $user = $this->Auth_model->getDataUser($this->session->userdata('username'));
        $id = $user['id'];

        if (password_verify($pwlama, $user['password'])) {

            if ($pwbaru == $pwbaru1) {

                $data = [
                    'password' => password_hash($pwbaru, PASSWORD_DEFAULT),
                ];

                $this->Awal_model->updUser($id, $data);
                $this->session->set_flashdata('pw', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Success!</strong> Password telah diubah.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');

                redirect('awal/editprofile');
            } else {
                $this->session->set_flashdata('pw', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Warning!</strong> Password tidak serupa.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');

                redirect('awal/editprofile');
            }
        } else {

            $this->session->set_flashdata('pw', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Warning!</strong> Password lama salah.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');

            redirect('awal/editprofile');
        }
    }

    public function daftar_pesanan($pesanan = null)
    {
        $sesi = $this->session->userdata('id');

        $tipe = "";

        if (is_null($pesanan)) {
            $tipe = "clean";
        } else {
            $tipe = $pesanan;
        };

        $data['ckClean'] = $this->Awal_model->getPesananOnProgress($sesi, $tipe);

        $data['riwayat_jasa'] = $tipe;

        $this->load->view('templateAwal/header');
        $this->load->view('kontenAwal/daftar_pesanan', $data);
        $this->load->view('templateAwal/footer');
    }

    public function batal_pesanan($id, $jasa)
    {

        $data = [
            'status' => 3,
        ];

        $table = 'transaksi_' . $jasa;
        $id_order = 'id_order' . $jasa;

        $where = [
            $id_order => $id,
        ];

        $this->db->update($table, $data, $where);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Berhasil!</strong> Data berhasil dibatalkan.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>');

        redirect('awal/daftar_pesanan/');

    }

    public function selesai_pesanan($id, $jasa)
    {

        $data = [
            'status' => 1,
        ];

        $table = 'transaksi_' . $jasa;
        $id_order = 'id_order' . $jasa;

        $where = [
            $id_order => $id,
        ];

        $this->db->update($table, $data, $where);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Berhasil!</strong> Pesanan selesai.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>');

        redirect('awal/daftar_pesanan/');

    }

    public function rating_pesanan()
    {

        $id_pjasa = $this->input->post('id_jasa');
        // $id_user = $this->session->userdata('id');
        $rating = $this->input->post('rating');
        $id_order = $this->input->post('id_order');
        $tabel = $this->input->post('jasa');

        $order = 'id_order' . $tabel;

        $data = [
            'rating' => $rating,
        ];

        $where = [
            $order => $id_order,
        ];

        $table = 'transaksi_' . $tabel;

        $this->db->update($table, $data, $where);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Berhasil!</strong> Rating telah diinput.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>');

        redirect('awal/history/');

    }
}