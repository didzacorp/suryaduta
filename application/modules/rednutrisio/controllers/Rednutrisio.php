<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rednutrisio extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		
		// $this->load->model('lokasi/lokasi_model');
		$this->load->model('model/member_model');
		$this->load->model('model/funnel_model');
		$this->load->model('model/trafic_model');
		$this->load->model('model/transaksi_model');
		
	}

	public function index($username='',$pixel='')
	{
		$funnel = explode('/', $_SERVER['REQUEST_URI']);
		setcookie("SuryaDutaCookie",session_id(),mktime (0, 0, 0, 12, 31, 3019));
		$data = array();
		$data['content'] = 'manage';
		$data['funnel'] = $funnel[1];
		$data['username'] = $username;
		$data['pixel'] = $pixel;
		
		$this->load->view($data['content'],$data);
	}

	function saveTrafic()
	{
		$cookie = $this->input->post('cookie');
		$funnel = $this->input->post('funnel');
		$username = $this->input->post('username');
		$pixel = $this->input->post('pixel');
		$urlFunnel = 'http://'.$_SERVER['SERVER_NAME'].'/'.$funnel;
		// echo $urlFunnel;exit;
		$dataMember = $this->member_model->get(array("username" => $username));
		// echo $this->db->last_query();
		$dataFunnel = $this->funnel_model->get(array("link" => $urlFunnel));
		// echo $this->db->last_query(); exit;
		// $dataFunnel = $this->trafic_model->save($data);
		$dataTrafic = array();
		$setFunnel = array();
		if ($dataFunnel['id']) {
			if ($dataMember['id']) {
				$cekTrafic = $this->trafic_model->get(array(
					"id_member" => $dataMember['id'],
					"unique_id" => $cookie
				));
				if (!$cekTrafic['id']) {
					$dataTrafic['id'] = 0;
					$dataTrafic['id_member'] = $dataMember['id'];
					$dataTrafic['unique_id'] = $cookie;
					$dataTrafic['id_funnel'] = $dataFunnel['id'];
					$dataTrafic['tanggal'] = date('Y-m-d');
					$dataTrafic['jam'] = date('H:i:s');
					$dataTrafic['ip_address'] = get_client_ip_server() ? : '';
					$dataTrafic['lokasi'] = get_client_location($dataTrafic['ip_address']);
					$dataTrafic['user_agent'] = $_SERVER['HTTP_USER_AGENT'] ? : '';
					$dataTrafic['pixel'] = $pixel;
					// echo $this->db->last_query(); exit;
					$this->trafic_model->save($dataTrafic);

					$setFunnel['id'] = $dataFunnel['id'];
					$setFunnel['jumlah_trafic'] = ($dataFunnel['jumlah_trafic'] + 1);
					$this->funnel_model->save($setFunnel);
				}
				
			}
		}
		
	}

	function daftarBasic()
	{
		$cookie = $this->input->post('cookie');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$konfirmasiEmail = $this->input->post('konfirmasiEmail');
		$funnel = $this->input->post('funnel');
		$username = $this->input->post('username');
		$pixel = $this->input->post('pixel');

		if (!$nama) {
			$this->error('Nama Wajib diisi');
		}

		if (!$email) {
			$this->error('Email Wajib diisi');
		}

		if (!$funnel) {
			$urlFunnel = 'http://'.$_SERVER['SERVER_NAME'];
		}else if (!$username) {
			$urlFunnel = 'http://'.$_SERVER['SERVER_NAME'].'/'.$funnel;
		}else if (!$pixel) {
			$urlFunnel = 'http://'.$_SERVER['SERVER_NAME'].'/'.$funnel.'/'.$username;
		}else{
			$urlFunnel = 'http://'.$_SERVER['SERVER_NAME'].'/'.$funnel.'/'.$username.'/'.$pixel;
		}
		
		$dataMember = $this->member_model->get(array("username" => $username));
		$dataTrafic = $this->trafic_model->get(array("unique_id" => $cookie));
		$getTransaksi = $this->transaksi_model->get(array("email_pembeli" => $email));
		$getKodeUnik =  $this->transaksi_model->getKodeUnik();

		if (!$getTransaksi['id']) {
			// if ($dataTrafic['id']) {
				

				$data = array();
				$data["id"] = 0;	
				$data['nama_pembeli'] = $nama;
				$data['email_pembeli'] = $email;
				$data['id_trafic'] = $dataTrafic['id'] ? : 0;
				$data["id_member"] = $dataMember['id'];	
				$data["tanggal"] = date('Y-m-d');	
				$data["sub_total"] = floatval(500000)+floatval($getKodeUnik);	
				$data["total"] = '500000';	
				$data["diskon"] = 0;	
				$data["cashback"] = NULL;	
				$data["status"] = 'BELUM BAYAR';	
				$data["jenis_transaksi"] = 'PENDAFTARAN MEMBER (BASIC)';
				$data["kode_unik"] = $getKodeUnik;	
				$data["url_funnel"] = $urlFunnel;	
				$data["update_time"] = date('Y-m-d H:i:s');	
				$save = $this->transaksi_model->save($data);	

				$this->update['idTrans'] = $this->transaksi_model->getLastID();
				$this->success('Behasil Prossess');
			// }else{}
		}else{
			$this->error('Gagal Prossess');
		}
		
	}
}