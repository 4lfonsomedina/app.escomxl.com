<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {

	function acceso($rfc,$clave){

		$cliente = $this->db->where('rfc',$rfc)->where('clave',$clave)->get('clientes');
		if($cliente->num_rows()>0){
			return $cliente->row_array();
		}else{
			return FALSE;
		}
	}
	function get_clientes($rfc,$base){
		$this->db=$this->load->database($base,true);
		return $this->db->where('rfc',$rfc)->get('clientes')->result();
	}
	function get_cliente($id_cliente,$base){
		$this->db=$this->load->database($base,true);
		return $this->db->where('id_cliente',$id_cliente)->get('clientes')->row();
	}
	function get_lecturas($fecha1,$fecha2,$id_cliente,$base){
        $this->db=$this->load->database($base,true);
        //traer todos los clientes
        $rmu = $this->db->select("*,'' as lecturas")->where('id_cliente',$id_cliente)->get('clientes')->row()->rmu;
        $lecturas=Array();
        $lecturas=$this->db->select("fecha, sum(kvarh) as kvarh, sum(kwhe) as kwhe, sum(kwhr) as kwhr")
        					->where('rmu',$rmu)
                            ->where('fecha >=',$fecha1)
                            ->where('fecha <=',$fecha2)
                            ->group_by('fecha')
                            ->order_by('fecha')
                            ->get('cfe_lectura')
                            ->result();
       
        return $lecturas;
    }	

}

/* End of file Clientes_model.php */
/* Location: ./application/models/Clientes_model.php */