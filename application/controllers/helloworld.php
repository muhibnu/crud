<?php
defined('BASEPATH') OR exit ('No direct script acces allowed');

class Helloworld extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model('mymodel');
	}

	public function index(){ 
	    $this->load->model('mymodel'); 
        $data = $this->mymodel->GetMahasiswa('data_mahasiswa'); 
	    $data = array('data' => $data); 
	    $this->load->view('data_mahasiswa', $data);
	 }

	public function add_data()
	{
		$this->load->view('form_add');
	}  

	public function insert()
	{
		$this->load->model('mymodel');
		$data = array('no_induk' => $this->input->post('no_induk'),'nama' => $this->input->post('nama'), 'alamat' =>
			$this->input->post ('alamat'));
		$data = $this->mymodel->insert('data_mahasiswa',$data);
		redirect(base_url(),'refresh');
	}

	public function edit_data()
	{
		if (isset($_POST['submit']))
		{
			$nim = $this->input->post('ni');
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');

			$data = array(
				'no_induk' => $nim,
				'nama' => $nama,
				'alamat' => $alamat,
			);
			
			$this->mymodel->update('data_mahasiswa', $nim ,$data);

			//$this->session->set_flashdata('edit', 'Data Mahasiswa Berhasi Dirubah');

			redirect('index.php/helloworld');
		}else
		{
			$id = $this->uri->segment(3);

			$data = array(
				'title' => 'Data Mahasiswa',
				'mhs' => $this->db->get_where('data_mahasiswa',array('no_induk' => $id))->row_array()
			);
			$this->load->view('form_edit', $data);	 
					
		}	
	}

	public function delete_data()
	{
		$nim = $this->uri->segment(3);

		$where = array(
			'no_induk' => $nim
		);
		
		$this->mymodel->delete('data_mahasiswa', $where);

		redirect('index.php/helloworld');
		}
	}
?> 
 