<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facturacion extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('id_cliente')){Redirect("Welcome");}
		$this->load->model('Facturacion_model');
	}
	public function index(){
        $data['mes']=date('m')-1;
        $data['ano']=date('Y');
        $data['base']=$this->session->userdata('base');
        if(isset($_POST['mes'])){
        	$data['mes'] = $_POST['mes'];
        	$data['ano'] = $_POST['ano'];
        }
        $data['facturas'] = $this->Facturacion_model->get_saldos(
    		$this->session->userdata('rfc'),
    		$data['mes'],
    		$data['ano'],
    		$data['base']
        );

        $this->load->view('cabecera.php');
        $this->load->view('saldos.php',$data);
        $this->load->view('pie.php');
	}

}

/* End of file Facturacion.php */
/* Location: ./application/controllers/Facturacion.php */