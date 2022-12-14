<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->session->sess_destroy();
		$this->load->view('login');
	}
	public function acceso()
    {
    	$this->load->model('Clientes_model');
        $cliente = $this->Clientes_model->acceso($_POST['rfc'], $_POST['clave']);
        if ($cliente) {
            $this->session->set_userdata($cliente);
            Redirect('Dashboard/home');
        } else {
            Redirect('Welcome?e');
        }
    }
}
