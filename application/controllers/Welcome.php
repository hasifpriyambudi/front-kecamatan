<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller{
	public function index(){
		$data['title'] = 'Dashboard Kabupaten Banjarnegara';

		$this->load->view('temp/header', $data);
		$this->load->view('temp/sidebar');
		$this->load->view('index');
		$this->load->view('temp/footer');
	}

	public function penduduk(){
		$data['title'] = 'Penduduk Kabupaten Banjarnegara';

		$this->load->view('temp/header', $data);
		$this->load->view('temp/sidebar');
		$this->load->view('penduduk');
		$this->load->view('temp/footer');
	}

	public function keluarga(){
		$data['title'] = 'Keluarga Kabupaten Banjarnegara';

		$this->load->view('temp/header', $data);
		$this->load->view('temp/sidebar');
		$this->load->view('keluarga');
		$this->load->view('temp/footer');
	}

	public function anggaran(){
		$data['title'] = 'Anggaran Kabupaten Banjarnegara';

		$this->load->view('temp/header', $data);
		$this->load->view('temp/sidebar');
		$this->load->view('anggaran');
		$this->load->view('temp/footer');
	}

	public function bantuan(){
		$data['title'] = 'Bantuan Kabupaten Banjarnegara';

		$this->load->view('temp/header', $data);
		$this->load->view('temp/sidebar');
		$this->load->view('bantuan');
		$this->load->view('temp/footer');
	}
}