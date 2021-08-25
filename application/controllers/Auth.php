<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index($login = "Konsumen")
    {

        if ($this->session->userdata('role_id') == 'konsumen') {
            redirect('awal');
        } else if ($this->session->userdata('role_id') == 'penyediajasa') {
            redirect('pjasa');
        } else if ($this->session->userdata('role_id') == 'admin') {
            redirect('admin');
        } else {
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');

            if ($this->form_validation->run() == false) {
                $data['title'] = 'Login';
                $data['login_as'] = $login;
                $this->load->view('templateAwal/header_auth', $data);
                $this->load->view('auth/index');
                $this->load->view('templateAwal/footer_auth');
            } else {

                $this->_login();
            }
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->Auth_model->getDataUser($username);

        if ($user['is_active'] == 1) {

            if (password_verify($password, $user['password'])) {

                $data = [
                    'nama' => $user['nama'],
                    'username' => $user['username'],
                    'role_id' => $user['role_id'],
                    'alamat' => $user['alamat'],
                    'phone' => $user['phone_number'],
                    'id' => $user['id'],
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] == 'Konsumen') {
                    redirect('awal');
                } else if ($user['role_id'] == 'Clean' || $user['role_id'] == 'Beauty') {
                    redirect('pjasa');
                } else {
                    redirect('admin');
                }
            } else {
                $this->session->set_flashdata('message', '<small class="text-danger pl-3">Password Salah</small>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<small class="text-danger pl-3">Akun anda belum aktif!</small>');
            redirect('Auth');
        }

    }

    public function registration()
    {

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[pass]');
        $this->form_validation->set_rules('pass', 'Pass', 'required|trim|min_length[8]|matches[password]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('phone_number', 'phone_number', 'required|trim');
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Registration User';
            $this->load->view('templateAwal/header_auth', $data);
            $this->load->view('auth/registration');
            $this->load->view('templateAwal/footer_auth');
        } else {
            $data = [
                'nama' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'image' => 'default.png',
                'role_id' => $this->input->post('role_id'),
                'is_active' => 0, //kalo 0 berati ga aktif, kalo 1 berati aktif
                'alamat' => $this->input->post('alamat'),
                'phone_number' => $this->input->post('phone_number'),

            ];

            //siapkan token

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $this->input->post('email'),
                'token' => $token,
                'date_created' => time(),
            ];

            // $this->db->insert('user', $data);
            $this->Auth_model->tambahUser($data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Selamat!</strong> akun anda berhasil dibuat, silahkan aktivasi akun anda melalui email.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>');
            redirect('Auth');
        }
    }

    private function _sendEmail($token, $type)
    {

        $this->load->library('email');
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'diantugasta@gmail.com',
            'smtp_pass' => 'Diantugas28!',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->email->initialize($config);
        $this->email->from('adminCIBC@gmail.com', 'Admin CI_BC');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {

            $this->email->subject('Account Verification');
            $this->email->message('Klik link ini untuk aktivasi akun anda : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a> <br> Token aktivasi akan berlaku selama 2x24 jam, lebih dari itu token tidak akan berlaku kembali');
        } else if ($type == 'forgot') {

            $this->email->subject('Reset Password');
            $this->email->message('Klik link ini untuk mengubah password akun anda : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a> <br> Token aktivasi akan berlaku selama 2x24 jam, lebih dari itu token tidak akan berlaku kembali');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {

        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', [
            'email' => $email,
        ])->row_array();

        if ($user) {

            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {

                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {

                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> ' . $email . ' berhasil diaktifkan. Silahkan Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
                    redirect('auth');
                } else {

                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Token sudah tidak berlaku!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           Aktivasi akun gagal! Token salah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Aktivasi akun gagal! Terdapat kesalahan pada email.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('auth');
        }
    }

    public function registPenjasa()
    {
        $data['title'] = 'Registration Penjasa';
        $this->load->view('templateAwal/header_auth', $data);
        $this->load->view('auth/regPenjasa');
        $this->load->view('templateAwal/footer_auth');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Auth');
    }

    public function forgot_password()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email tidak boleh kosong',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('templateAwal/header_auth', $data);
            $this->load->view('auth/forgot_password');
            $this->load->view('templateAwal/footer_auth');

        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email])->row_array();

            if ($user) {

                if ($user['is_active'] == 1) {

                    $token = base64_encode(random_bytes(32));
                    $user_token = [
                        'email' => $email,
                        'token' => $token,
                        'date_created' => time(),
                    ];

                    $this->db->insert('user_token', $user_token);
                    $this->_sendEmail($token, 'forgot');
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Tolong cek email kamu untuk reset password!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('auth/forgot_password');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Email belum aktif!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
					</div>');
                    redirect('auth/forgot_password');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Email belum terdaftar!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('auth/forgot_password');
            }
        }

    }

    public function resetpassword()
    {

        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {

            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {

                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Reset password gagal! Token salah
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               Reset password gagal! Email salah
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {

        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Paassword', 'trim|required|min_length[8]', [
            // 'matches' => '',
            'min_length' => 'Password harus lebih dari 8 karakter',
            'requried' => 'Password tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Paassword', 'trim|required|min_length[8]|matches[password1]', [
            'matches' => 'Password tidak cocok',
            'min_length' => 'Password harus lebih dari 8 karakter!',
            'requried' => 'Password tidak boleh kosong',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('templateAwal/header_auth', $data);
            $this->load->view('auth/change_password');
            $this->load->view('templateAwal/footer_auth');

        } else {

            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Password sudah diubah ! Silahkan Login
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>');
            redirect('auth');
        }
    }
}