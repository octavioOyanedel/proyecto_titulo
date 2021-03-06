<?php

    /**
     * buscar prestamos pendientes o atrasados
     */
    function buscarPrestamoConDeudaActiva($coleccion)
    {
        foreach ($coleccion as $item) {
            if($item->getOriginal('estado_deuda_id') === 2 || $item->getOriginal('estado_deuda_id') === 3){
                return $item;
            }
        }
    }

    /**
     * buscar prestamos pendientes o atrasados
     */
    function buscarDeudaActiva($coleccion)
    {
        foreach ($coleccion as $item) {
            switch ($item->getOriginal('estado_deuda_id')) {
                case 2:
                    return 'Vigente';
                    break;
                case 3:
                    return 'Atrasado';
                    break;

            }
        }
    }

    /**
     * formato celda prestamo
     */
    function textoDeudaPrestamo($valor)
    {
        switch ($valor) {
            case 1:
                return 'Pagado';
                break;
            case 2:
                return 'Vigente';
                break;
            case 3:
                return 'Atrasado';
                break;
        }
    }

    /**
     * formato celda cuota
     */
    function textoDeudaCuota($valor)
    {
        switch ($valor) {
            case 1:
                return 'Pagada';
                break;
            case 2:
                return 'Vigente';
                break;
            case 3:
                return 'Atrasada';
                break;
        }
    }

    /**
     * formato celda
     */
    function celdaCadena($valor)
    {
        if($valor === '' || $valor === null){
            return '-';
        }else{
            return $valor;
        }
    }

    /**
     * formato celda cheque
     */
    function celdaCheque($valor)
    {
        if($valor === '' || $valor === null){
            return '-';
        }else{
            return $valor;
        }
    }

    /**
     * formato celda deposito
     */
    function celdaDeposito($valor)
    {
        if($valor === 0){
            return '-';
        }else{
            return 'Si';
        }
    }

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
        return (int)$monto + ((int)$monto * ((int)$interes / 100));
    }

    /**
     * Formato moneda
     */
    function calculoSaldo($monto, $interes)
    {
        return (int)$monto * ((int)$interes / 100);
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
        $array_fecha_cuota = array();
        $mes_pago = '';
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
        $mes_pago = (string)$mes_inicio;
        //loop cuotas
        for($i = 0; $i < $cuotas; $i++){
            if($mes_pago > 12){
                $mes_pago = 1;
                $year_pago++;
            }

            if($mes_pago < 10){
                $mes_pago = '0'.$mes_pago;
            }

            array_push($array_fecha_cuota,$year_pago,$mes_pago,$dia_pago);
            $fecha_cuota = implode('-',$array_fecha_cuota);
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

    /**
     * formato nombres
     */
    function formatoNombres($cadena) {
        $nombreFormateado = strtolower($cadena);
        $nombreFormateado = ucwords($nombreFormateado);
        $nombreFormateado = str_replace(" De ", " de ", $nombreFormateado);
        $nombreFormateado = str_replace(" Del ", " del ", $nombreFormateado);
        $nombreFormateado = str_replace(" La ", " la ", $nombreFormateado);
        $nombreFormateado = str_replace(" Las ", " las ", $nombreFormateado);
        $nombreFormateado = str_replace(" Lo ", " lo ", $nombreFormateado);
        $nombreFormateado = str_replace(" Los ", " los ", $nombreFormateado);
        $nombreFormateado = str_replace(" En ", " en ", $nombreFormateado);
        $nombreFormateado = str_replace(" Con ", " con ", $nombreFormateado);
        $nombreFormateado = str_replace(" Por ", " por ", $nombreFormateado);
        $nombreFormateado = str_replace(" El ", " el ", $nombreFormateado);
        return $nombreFormateado;
    }

    /**
     * obtener sistema operativo
     */
    function obtenerSistemaOperativo() {

        $os_platform  = "Sistema operativo desconocido.";
        $os_array = array(
            '/windows nt 10/i'      =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );
        foreach ($os_array as $regex => $value)
        if (preg_match($regex, $_SERVER['HTTP_USER_AGENT']))
            $os_platform = $value;
        return $os_platform;
    }

    /**
     * obtener browser
     */
    function obtenerBrowser() {

        $browser = "Browser desconocido.";
        $browser_array = array(
            '/msie/i'      => 'Internet Explorer',
            '/firefox/i'   => 'Firefox',
            '/safari/i'    => 'Safari',
            '/chrome/i'    => 'Chrome',
            '/edge/i'      => 'Edge',
            '/opera/i'     => 'Opera',
            '/netscape/i'  => 'Netscape',
            '/maxthon/i'   => 'Maxthon',
            '/konqueror/i' => 'Konqueror',
            '/mobile/i'    => 'Handheld Browser'
        );

        foreach ($browser_array as $regex => $value)
            if (preg_match($regex, $_SERVER['HTTP_USER_AGENT']))
                $browser = $value;
        return $browser;
    }

    /**
     * obtener ip
     */
    function obtenerIp(){

        if ( getenv("HTTP_CLIENT_IP") ) {
            $ip = getenv("HTTP_CLIENT_IP");
        } elseif ( getenv("HTTP_X_FORWARDED_FOR") ) {
            $ip = getenv("HTTP_X_FORWARDED_FOR");
            if ( strstr($ip, ',') ) {
                $tmp = explode(',', $ip);
                $ip = trim($tmp[0]);
            }
        } else {
            $ip = getenv("REMOTE_ADDR");
        }
        return $ip;
    }

    function obtenerMesPorNumero($numero){
        switch ($numero) {
            case 1:
                return 'Enero';
                break;
            case 2:
                return 'Febrero';
                break;
            case 3:
                return 'Marzo';
                break;
            case 4:
                return 'Abril';
                break;
            case 5:
                return 'Mayo';
                break;
            case 6:
                return 'Junio';
                break;
            case 7:
                return 'Julio';
                break;
            case 8:
                return 'Agosto';
                break;
            case 9:
                return 'Septiembre';
                break;
            case 10:
                return 'Octubre';
                break;
            case 11:
                return 'Noviembre';
                break;
            case 12:
                return 'Diciembre';
                break;
        }
    }

    function obtenerDiasPorMes($mes){
        switch ($mes) {
            case 1:
                return 31;
                break;
            case 2:
                return 28;
                break;
            case 3:
                return 31;
                break;
            case 4:
                return 30;
                break;
            case 5:
                return 31;
                break;
            case 6:
                return 30;
                break;
            case 7:
                return 31;
                break;
            case 8:
                return 31;
                break;
            case 9:
                return 30;
                break;
            case 10:
                return 31;
                break;
            case 11:
                return 30;
                break;
            case 12:
                return 31;
                break;
        }
    }

    function convertirArrayAString($arreglo){
        return implode(' ',$arreglo);
    }