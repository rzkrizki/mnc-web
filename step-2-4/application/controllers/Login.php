<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		init_view('login');
	}

	public function verification()
	{
		$post = $this->input->post();
        $session = $this->session->userdata(); 
        
        if (!empty($this->session->userdata())) {
			if ($session['username'] != $post['username']){
				$data['message'] = 'Username belum terdaftar';
				$data['status'] = 500;
			}elseif($session['password'] != $post['password']){
				$data['message'] = 'Username dan password tidak cocok';
				$data['status'] = 500;
            }else {
                $data['message'] = 'Berhasil login';
                $data['status'] = 200;
            }
        }else{
            $data['message'] = 'Kamu belum terdaftar, silahkan mendaftar terlebih dahulu';
            $data['status'] = 500;
        }

        echo json_encode($data);
	}
}