<?php

/**
 * Description of Util
 *
 * @author develop
 */
class Format {

    static function agora($t = 1) {
        if ($t == 1) {
            setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
            date_default_timezone_set('America/Sao_Paulo');
            $data_completa = strftime("%A, %d de %B de %Y");
            echo $data_completa;
        }
        if ($t == 2) {
            $data_completa = date("d/m/Y");
            echo $data_completa;
        }
    }

    static function percent($number) {
        return $number * 100 . '%';
    }

    static function inteiro($number) {
        $numero = number_format($number);
        return $numero;
    }

    static function moeda($valor, $moeda = 'brl', $mostrar_zero = false) {
        return $valor ? number_format($valor, 2, ',', '.') : ($mostrar_zero ? '0,00' : '');
    }

    static function moeda_bd($valor) {
        $replace = array('.', '-', '');
        $total = str_replace($replace, "", $valor);
        return $total;
    }

    static function dif_horario($horario1, $horario2) {
        $h1 = strtotime("$horario1");
        $h2 = strtotime("$horario2");
        $h3 = $h2 - $h1;

        $anos = ($h3 / (60 * 60 * 24 * 365));
        $dias = ($h3 / (60 * 60 * 24)) % 365;
        $horas = ($h3 / (60 * 60)) % 24;
        echo $minutos = ($h3 / 60) % 60;
    }

    static function LongitudeLatitude($endereço) {
        $Address = urlencode($endereço);
        $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=" . $Address . "&sensor=true";
        $xml = simplexml_load_file($request_url) or die("url not loading");
        $status = $xml->status;
        if ($status == "OK") {
            $Lat = $xml->result->geometry->location->lat;
            $Lon = $xml->result->geometry->location->lng;
            return $LatLng = "$Lat,$Lon";
        }
    }

}
