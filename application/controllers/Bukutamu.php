<?php 

class Bukutamu extends CI_Controller{

	var $API = "";

	public function __construct(){
		parent::__construct();
		$this->API="http://localhost/apibukutamu/index.php";
	}

	public function index(){
		$data = array(
				'bukutamu' => json_decode($this->curl->simple_get($this->API.'/buku_tamu_api'))
				);
		$this->load->view('bukutamu/list',$data);
	}

	public function create(){

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('komentar','Komentar','required');

		$this->form_validation->set_message('required','%s masih kosong silahkan di isi');
		$this->form_validation->set_error_delimiters("<div class='error'>","</div>");
		if($this->form_validation->run() == TRUE)
		{
			$data = array(
				'nama' => $this->input->post('nama'),
				'komentar' => $this->input->post('komentar')
			);


			$insert =  $this->curl->simple_post(
						 $this->API.'/buku_tamu_api', $data, array(CURLOPT_BUFFERSIZE => 10)
						); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Simpan data berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Simpan data berhasil');
            }
            redirect('bukutamu');
		}else{
            $this->load->view('bukutamu/create');
		}
		
	}


	public function edit(){

		if(isset($_POST['submit']))
		{
			$data = array(
				'id' => $this->input->post('id'),
				'nama' => $this->input->post('nama'),
				'komentar' => $this->input->post('komentar')
			);


			$update =  $this->curl->simple_put($this->API.'/buku_tamu_api', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('bukutamu');
		}else{
			$params = array('id'=>  $this->uri->segment(3));
            $data['bukutamu'] = json_decode($this->curl->simple_get($this->API.'/buku_tamu_api',$params));
            //print_r($this->curl->simple_get($this->API.'/buku_tamu_api?',$params));
            $this->load->view('bukutamu/edit',$data);
		}
		
	}
	/*
	  function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id' => $this->input->post('id'),
				'nama' => $this->input->post('nama'),
				'komentar' => $this->input->post('komentar')
                );
            $update =  $this->curl->simple_put($this->API.'/buku_tamu_api', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('mahasiswa');
        }else{
            //$data['jurusan'] = json_decode($this->curl->simple_get($this->API.'/jurusan'));
            $params = array('id'=>  $this->uri->segment(3));
            $data['mahasiswa'] = json_decode($this->curl->simple_get($this->API.'/buku_tamu_api',$params));
            $this->load->view('mahasiswa/edit',$data);
        }
    }
*/
	public function delete($id){
        if(empty($id)){
            redirect('bukutamu');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/buku_tamu_api', array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Hapus Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Hapus Data Gagal');
            }
            redirect('bukutamu');
        }
    }
}