<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facturacion_model extends CI_Model {

	function get_saldos($rfc,$mes,$ano,$base){
		$this->db=$this->load->database($base,true);
		$facturas = $this->db->select("facturas_clientes.*,clientes.*,facturas_clientes.iva as iva_fac")->join('clientes','facturas_clientes.id_cliente=clientes.id_cliente')->where('mes',$mes)
							->where('ano',$ano)
							->where('rfc_cliente',$rfc)
							->order_by('tipo')
							->order_by('total','DESC')
							->get('facturas_clientes')->result();
		
		return $facturas;
	}
}

/* End of file Facturacion_model.php */
/* Location: ./application/models/Facturacion_model.php */