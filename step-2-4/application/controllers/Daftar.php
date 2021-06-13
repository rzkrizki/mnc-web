<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		init_view('daftar');
	}

    public function submit()
    {
        $post = $this->input->post();
        $session = $this->session->userdata(); 
        
        if (!empty($this->session->userdata())) {
            if(($session['username'] != $post['username'])){
                $this->session->set_userdata('username', $post['username']);
                $this->session->set_userdata('password', $post['password']);

                $data['message'] = 'Berhasil mendaftar';
                $data['status'] = 200;
            }else{
                $data['message'] = 'Gagal mendaftar, username sudah terpakai';
                $data['status'] = 500;
            }
        }else{
            $this->session->set_userdata('username', $post['username']);
            $this->session->set_userdata('password', $post['password']);

            $data['message'] = 'Berhasil mendaftar';
            $data['status'] = 200;
        }

        echo json_encode($data);
    }
}