<?php 
	
	function formatearFecha($fecha)
	{
		/**/
		/*0123456789012345678*/
		/*2023-06-02 08:35:53*/ /*recuperamos el DIA extrayendo de:*/

		$dia=substr($fecha,8,2);/*$fecha,posicion,cant de caracteres que quiero recuperar*/
		$mes=substr($fecha,5,2);/*$fecha,posicion,cant de caracteres que quiero recuperar*/
		$anio=substr($fecha,0,4);/*$fecha,posicion,cant de caracteres que quiero recuperar*/	
		$hora=substr($fecha,11,5);/*$fecha,posicion,cant de caracteres que quiero recuperar*/

		$fechaformateada=$dia.'-'.$mes.'-'.$anio.' '.$hora;
		return $fechaformateada;
	}
?>