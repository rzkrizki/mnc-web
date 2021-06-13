<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_home', 'home');
	}

	public function index()
	{
		init_view('home');
	}

	public function get_article(){

		$data = $this->home->get_data_article($this->input->post());
		echo json_encode($data);
	}

	public function add_article()
	{
		init_view('article_add');
	}

	public function submit()
	{
		$data = $this->home->submit_article($this->input->post());
		echo json_encode($data);
	}

	public function edit_article($id)
	{
		$data['result'] = $this->home->get_article_by_id($id);
		init_view('article_edit', $data);
	}

	public function update()
	{
		$data = $this->home->update_article($this->input->post());
		echo json_encode($data);
	}

	public function detail_article($id)
	{
		$data['result'] = $this->home->get_article_by_id($id);
		init_view('article_detail', $data);
	}

	public function remove($id)
	{
		$data = $this->home->remove_article($id);
		echo json_encode($data);
	}
}