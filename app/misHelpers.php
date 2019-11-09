<?php

    /**
     * buscar cadena dentro de otra cadena
     */
    function esObligatorio($cadena)
    {
        if(strpos($cadena, 'filtro') === FALSE){
            return '(*)';
        } else {
            return '';
        }       
    }

    /**
     * formato fecha para busqueda
     */
    function obtenerFechaConciliacion($fecha)
    {
        return date('Y-m-d',strtotime($fecha));
    }

    /**
     * Formato moneda
     */
    function calculoTotal($monto, $interes)
    {
        return $monto + ($monto * ($interes / 100));
    }

    /**
     * Formato moneda
     */
    function calculoSaldo($monto, $interes)
    {
        return $monto * ($interes / 100);
    }

    /**
     * Formato moneda
     */
    function formatoMoneda($valor)
    {
        return '$'.number_format($valor, 0, 3, '.');
    }

    /**
     * Formato interes
     */
    function formatoInteres($valor)
    {
        return $valor.'%';
    }

    /**
     * Agrega puntos y guió n al rut
     */
    function formatoRut($valor)
    {
        $rut = $valor;
        $largo = strlen($rut);
        $largoFinal = 0;
        $arrayRutFormato = array();
        $rutFinal = "";
        //obtener largo total para poblar nuevo array
        if ($largo == 9) {
            //si largo es 9 nuevo largo sera de 11 0-11 = 12
            $largoFinal = 12;
        } else {
            //si largo es 9 nuevo largo sera de 10 0-10 = 11
            $largoFinal = 11;
        }
        //formato inicial de array
        for ($i = 0; $i < $largoFinal; $i++) {
            if ($i == $largoFinal - 2) {
                array_push($arrayRutFormato, "-");
            } else {
                array_push($arrayRutFormato, ".");
            }
        }
        //convertir rut en array
        $arrayRut = str_split($rut);
        //recorrer array para construir nuevo array
        for ($i = 0; $i < $largoFinal; $i++) {
            if ($largo == 9) {
                if ($i >= 0 && $i <= 1) {
                    $arrayRutFormato[$i] = $arrayRut[$i];
                }
                if ($i >= 3 && $i <= 5) {
                    $arrayRutFormato[$i] = $arrayRut[$i - 1];
                }
                if ($i >= 7 && $i <= 9) {
                    $arrayRutFormato[$i] = $arrayRut[$i - 2];
                }
                if ($i == 11) {
                    $arrayRutFormato[$i] = $arrayRut[$i - 3];
                }
            } else {
                if ($i == 0) {
                    $arrayRutFormato[$i] = $arrayRut[$i];
                }
                if ($i >= 2 && $i <= 4) {
                    $arrayRutFormato[$i] = $arrayRut[$i - 1];
                }
                if ($i >= 6 && $i <= 8) {
                    $arrayRutFormato[$i] = $arrayRut[$i - 2];
                }
                if ($i == 10) {
                    $arrayRutFormato[$i] = $arrayRut[$i - 3];
                }
            }
        }
        //convertir array en string
        $rutFinal = implode("", $arrayRutFormato);
        $valor = $rutFinal;
        return $valor;
    }

    /**
     * Formatea fecha
     */
    function formatoFecha($valor)
    {
        if($valor != null && $valor != ''){
            $bloque = explode('-', $valor);
            return $nuevaFecha = $bloque[2] . '-' . $bloque[1] . '-' . $bloque[0];            
        }else{
            return '';
        }

    }

    /**
     * arreglo cuotas
     */
    function crearArregloCuotas($numero_cuotas, $fecha_solicitud, $monto)
    {
        $cuotas = $numero_cuotas;
        $fecha = $fecha_solicitud;
        $dia_pago = 25;
        $year_inicio = 0;
        $mes_inicio = 0;
        $fecha_cuota = '';
        $montoConInteres = ((2 / 100) * $monto) + $monto;
        $montoCouta = $montoConInteres / $cuotas;
        $coleccion = array();   
        //obtener año, mes y dia
        $year = substr($fecha,0,-6);
        $mes = substr($fecha,5,-3);
        $dia = substr($fecha,8);
        $year_pago = $year + 0; //casteo a entreo
        //mes de inicio
        if($dia < 15){
            $mes_inicio = $mes + 0; //casteo a entero
        }else{
            //inicio mes siguiente
            $mes_inicio = $mes + 1;
            if($mes_inicio == 13){
                $mes_inicio = 1;
                $year_pago++; 
            }      
        }
        $year_inicio = $year;
        $mes_pago = $mes_inicio;
        //loop cuotas     
        for($i = 0; $i < $cuotas; $i++){
            if($mes_pago > 12){
                $mes_pago = 1;
                $year_pago++; 
            }
            if($mes_pago < 10){
                $mes_pago = '0'.$mes_pago;
            }      
            $fecha_cuota = (string)$year_pago.'-'.$mes_pago.'-'.$dia_pago;

            array_push($coleccion,array('numero' => $i + 1, 'fecha' => formatoFecha($fecha_cuota), 'monto' => $montoCouta));


            $mes_pago++;       
        }
        return $coleccion;
    }    

    /**
     * obtener total prestamo
     */
    function obtenerTotalPrestamo($cuotas){
        $suma = 0;
        foreach ($cuotas as $cuota ) {
            $suma = $suma + $cuota['monto'];
        }
        return formatoMoneda($suma);
    }