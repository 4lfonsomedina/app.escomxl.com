<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('id_cliente')){Redirect("Welcome");}
		$this->load->model('Clientes_model');
	}
	public function home(){
		$data['clientes']=$this->Clientes_model->get_clientes($this->session->userdata('rfc'),$this->session->userdata('base'));
		$this->load->view('cabecera');
		$this->load->view('home',$data);
		$this->load->view('pie');
	}
	public function index(){
		$data['base'] = $this->session->userdata('base');
       	$data['fecha1']=date('Y-m-')."01";
		$data['fecha2']=date('Y-m-d');
		$data['clientes']=$this->Clientes_model->get_clientes($this->session->userdata('rfc'),$this->session->userdata('base'));
		if(isset($_POST['fecha1'])){
			$data['fecha1']=$_POST['fecha1'];
			$data['fecha2']=$_POST['fecha2'];
			$data['id_cliente']=$_POST['id_cliente'];
	        $data['cliente'] = $this->Clientes_model->get_resumen_cliente_periodo(
	        	$data['id_cliente'],
	        	$data['fecha1'],
	        	$data['fecha2'],
	        	$data['base']
	        );
    	}

        $this->load->view('cabecera');
		$this->load->view('lecturas',$data);
		$this->load->view('pie');
	}
	public function ayuda(){
		$this->load->view('cabecera');
		$this->load->view('ayuda');
		$this->load->view('pie');
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */