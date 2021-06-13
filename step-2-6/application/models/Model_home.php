<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_home extends CI_Model
{

	public function contruct()
	{
		parent::__construct();
	}

    public function get_data_article($post){
        $this->output->enable_profiler(false);
		$arrsearch = $post['search'];
		$start = $post['start'];
		$length = $post['length'];
        $search = $arrsearch['value'];
        $order = $post['order'];

        $qsearch = '';

        $where = '';  
        
        if($search != '') {
            $where .= "
                AND (
                    DATE_FORMAT(publish_date, '%e %b %Y') LIKE '%".$search."%' OR
                    title LIKE '%".$search."%' OR
                    description LIKE '%".$search."%' OR
                    content LIKE '%".$search."%'
                )
            ";
        }

        $coloumn = $order[0]['column'];

		$dir = $order[0]['dir'];

        if($coloumn == 0){
            $coloumn_by = 'publish_date '.$dir.'';
        }elseif($coloumn == 1){
            $coloumn_by = 'publish_date '.$dir.'';
		}elseif($coloumn == 2){
            $coloumn_by = 'title '.$dir.'';
        }

        $json = array();

        $sql = 'SELECT 
            id,
            DATE_FORMAT(publish_date, "%e %b %Y") as publish_date,
            title, 
            description, 
            content
            FROM article
            WHERE id > 0
            '.$where.'
            ORDER BY '.$coloumn_by.' 
        ';

        $query = $this->db->query($sql);

		$total = $query->num_rows();
		$json['recordsFiltered'] = $total;
		$json['recordsTotal'] = $total;
		$json['draw'] = $this->input->post('draw');

		$json['data'] = array();

		$sql .= "LIMIT ".$start.",".$length.";";

		$query = $this->db->query($sql);

        $i=0;
        $no = 1;
        foreach ($query->result() as $k => $v) {
            $json['data'][$i]['no'] = $no;
            $json['data'][$i]['publish_date'] = $v->publish_date;
			$json['data'][$i]['title'] = $v->title;
            $json['data'][$i]['description'] = $v->description;
            $json['data'][$i]['content'] = $v->content;
            $json['data'][$i]['action'] = '<div style="white-space:nowrap;">';
            $json['data'][$i]['action'] .= '<button type="button" class="btn btn-success" onclick="editData('.$v->id.')"><i class="fa fa-pencil"></i> EDIT</button></a>';
			$json['data'][$i]['action'] .= '<button type="button" class="btn btn-danger" onclick="deleteData('.$v->id.')"><i class="fa fa-trash"></i> DELETE</button></a>';
            $json['data'][$i]['action'] .= '<button type="button" class="btn btn-info" onclick="detailData('.$v->id.')"><i class="fa fa-info"></i> DETAIL</button></a>';
            $json['data'][$i]['action'] .= '</div>';
            $no++;
			$i++;
        }

        return $json;
    }

    public function submit_article($post){

        $data = array(
            'title' => $post['title'],
            'description' => $post['description'],
            'content' => $post['content'],
            'publish_date' => date("Y-m-d", strtotime($post['publish_date'])),
        );

        $result = $this->db->insert('article', $data);

        if($result){
            $data['result'] = $result;
            $data['message'] = 'Berhasil menambahkan article';
            $data['status'] = 200;
        }else{
            $data['result'] = [];
            $data['message'] = 'Gagal menambahkan article';
            $data['status'] = 500;
        }

        return $data;
    }

    public function get_article_by_id($id){
        $sql = 'SELECT 
            id,
            DATE_FORMAT(publish_date, "%e %b %Y") as publish_date,
            title, 
            description, 
            content
            FROM article
            WHERE id = '.$id.'
        ';
        return $this->db->query($sql)->row();
    }

    public function update_article($post){

        $data = array(
            'title' => $post['title'],
            'description' => $post['description'],
            'content' => $post['content'],
            'publish_date' => date("Y-m-d", strtotime($post['publish_date'])),
        );

        $result = $this->db->where('id', $post['id'])->update('article', $data);

        if($result){
            $data['result'] = $result;
            $data['message'] = 'Berhasil update article';
            $data['status'] = 200;
        }else{
            $data['result'] = [];
            $data['message'] = 'Gagal update article';
            $data['status'] = 500;
        }

        return $data;
    }

    public function remove_article($id){

        $result = $this->db->where('id', $id)->delete('article');

        if($result){
            $data['result'] = $result;
            $data['message'] = 'Berhasil menghapus article';
            $data['status'] = 200;
        }else{
            $data['result'] = [];
            $data['message'] = 'Gagal menghapus article';
            $data['status'] = 500;
        }

        return $data;
    }

}