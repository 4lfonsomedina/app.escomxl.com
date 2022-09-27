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
    function get_resumen_cliente_periodo($cliente,$fecha1,$fecha2,$base){
        $this->db=$this->load->database($base,true);
        $cliente = $this->db->select("*,'' as lecturas, '' as resumen, NODO")
                    ->where('id_cliente',$cliente)
                    ->get('clientes')
                    ->row();

        $cliente->lecturas=$this->db->where('fecha >=',$fecha1)
                ->where('fecha <=',$fecha2)
                ->where('id_cliente',$cliente->id_cliente)
                ->get("cfe_calculo_temporal")
                ->result();
        $cliente->resumen=$this->db->select("id_cliente, fecha, SUM(producto) as producto, SUM(mwhr) as mw, SUM(clie_factor) as mwfactor, SUM(oferta_MDA) as oferta")
            ->where('fecha >=',$fecha1)
            ->where('fecha <=',$fecha2)
            ->where('id_cliente',$cliente->id_cliente)
            ->group_by("id_cliente,fecha")
            ->order_by("fecha")
            ->get("cfe_calculo_temporal")
            ->result();
        return $cliente;
    }

}

/* End of file Clientes_model.php */
/* Location: ./application/models/Clientes_model.php */