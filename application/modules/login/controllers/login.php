<?php
class Login extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

	function index()
	{
		$this->load->view('login/index');
	}

	function cek_login()
	{
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        if($this->session->userdata('username') != $username) {
            
            $data = array('username' => $username,
                          'password' => $password);
            $hasil = $this->m_login->cek_user($data);

            if($hasil->num_rows() == 1) {

                foreach($hasil -> result() as $sess) {
                    $sess_data['uid'] = $sess->uid;
                    $sess_data['username'] = $sess->username;
                    $sess_data['level'] = $sess->level;
                    $sess_data['status_user'] = $sess->status_user;
                    $this->session->set_userdata($sess_data);
                }

                if($this->session->userdata('status_user') == 1) {
                    redirect('backend/index');
                }else{
                    $this->session->set_flashdata('alert', '<h4 class="alert alert-danger text-center title">Akun anda tidak aktif!</h4>');
                    redirect('login/index');
                }

            }else{
                $this->session->set_flashdata('alert', '<h4 class="alert alert-danger text-center title">Username atau Password tidak benar</h4>');
                redirect('login/index');
            }
            
        }else{
            $this->session->set_flashdata('alert', '<h4 class="alert alert-danger text-center title">Sudah login gan!</h4>');
            redirect('login/index');
        }
	}

    function logout()
    {
        $this->session->unset_userdata('uid');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('status_user');
        session_destroy();
        redirect('login/','refresh');
    }
}