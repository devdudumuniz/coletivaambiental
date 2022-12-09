<?php
/**
 * Description of Util
 *
 * @author develop
 */
class Filter {

    static function redirect($url) {
        @header("Location:$url");
    }

    static function removerespaco($str) {
        return trim($str);
    }

    static function lrtrim($str) {
        return rtrim(ltrim(trim($str)));
    }

    static function maiscula($str) {
        return strtolower($str);
    }

    static function agora() {
        return date('d/m/Y H:i:s');
    }

    static function slug($str) {
        return preg_replace('/\s+/', '-', $str);
    }

    static function slug2($string, $replacement = '-') {
        $translations = array(
            '/ä|æ|ǽ/' => 'ae',
            '/ö|œ/' => 'oe',
            '/ü/' => 'ue',
            '/Ä/' => 'Ae',
            '/Ü/' => 'Ue',
            '/Ö/' => 'Oe',
            '/À|Á|Â|Ã|Ä|Å|Ǻ|Ā|Ă|Ą|Ǎ/' => 'A',
            '/à|á|â|ã|å|ǻ|ā|ă|ą|ǎ|ª/' => 'a',
            '/Ç|Ć|Ĉ|Ċ|Č/' => 'C',
            '/ç|ć|ĉ|ċ|č/' => 'c',
            '/Ð|Ď|Đ/' => 'D',
            '/ð|ď|đ/' => 'd',
            '/È|É|Ê|Ë|Ē|Ĕ|Ė|Ę|Ě/' => 'E',
            '/è|é|ê|ë|ē|ĕ|ė|ę|ě/' => 'e',
            '/Ĝ|Ğ|Ġ|Ģ/' => 'G',
            '/ĝ|ğ|ġ|ģ/' => 'g',
            '/Ĥ|Ħ/' => 'H',
            '/ĥ|ħ/' => 'h',
            '/Ì|Í|Î|Ï|Ĩ|Ī|Ĭ|Ǐ|Į|İ/' => 'I',
            '/ì|í|î|ï|ĩ|ī|ĭ|ǐ|į|ı/' => 'i',
            '/Ĵ/' => 'J',
            '/ĵ/' => 'j',
            '/Ķ/' => 'K',
            '/ķ/' => 'k',
            '/Ĺ|Ļ|Ľ|Ŀ|Ł/' => 'L',
            '/ĺ|ļ|ľ|ŀ|ł/' => 'l',
            '/Ñ|Ń|Ņ|Ň/' => 'N',
            '/ñ|ń|ņ|ň|ŉ/' => 'n',
            '/Ò|Ó|Ô|Õ|Ō|Ŏ|Ǒ|Ő|Ơ|Ø|Ǿ/' => 'O',
            '/ò|ó|ô|õ|ō|ŏ|ǒ|ő|ơ|ø|ǿ|º/' => 'o',
            '/Ŕ|Ŗ|Ř/' => 'R',
            '/ŕ|ŗ|ř/' => 'r',
            '/Ś|Ŝ|Ş|Š/' => 'S',
            '/ś|ŝ|ş|š|ſ/' => 's',
            '/Ţ|Ť|Ŧ/' => 'T',
            '/ţ|ť|ŧ/' => 't',
            '/Ù|Ú|Û|Ũ|Ū|Ŭ|Ů|Ű|Ų|Ư|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ/' => 'U',
            '/ù|ú|û|ũ|ū|ŭ|ů|ű|ų|ư|ǔ|ǖ|ǘ|ǚ|ǜ/' => 'u',
            '/Ý|Ÿ|Ŷ/' => 'Y',
            '/ý|ÿ|ŷ/' => 'y',
            '/Ŵ/' => 'W',
            '/ŵ/' => 'w',
            '/Ź|Ż|Ž/' => 'Z',
            '/ź|ż|ž/' => 'z',
            '/Æ|Ǽ/' => 'AE',
            '/ß/' => 'ss',
            '/Ĳ/' => 'IJ',
            '/ĳ/' => 'ij',
            '/Œ/' => 'OE',
            '/ƒ/' => 'f'
        );

        $quotedReplacement = preg_quote($replacement, '/');

        $merge = array(
            '/[^\s\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]/mu' => ' ',
            '/\\s+/' => $replacement,
            sprintf('/^[%s]+|[%s]+$/', $quotedReplacement, $quotedReplacement) => '',
        );

        $map = $translations + $merge;
        return strtolower(preg_replace(array_keys($map), array_values($map), $string));
    }

    static function moeda($valor, $moeda = 'brl', $mostrar_zero = false) {
        return $valor ? number_format($valor, 2, ',', '.') : ($mostrar_zero ? '0,00' : '');
    }

    static function moeda_bd($valor) {
        $replace = array('.', '-', '');
        $total = str_replace($replace, "", $valor);
        return $total;
    }

    static function UrlExternal($string) {
        $url = preg_replace("(^https?://)", "", $string);
        return "http://" . $url;
    }

    static public function addslashes_once($input) {
        //These characters are single quote ('), double quote ("), backslash (\) and NUL (the NULL byte).
        $pattern = array("\\'", "\\\"", "\\\\", "\\0");
        $replace = array("", "", "", "");
        if (preg_match("/[\\\\'\"\\0]/", str_replace($pattern, $replace, $input))) {
            return addslashes($input);
        } else {
            return $input;
        }
    }

    static function stripslashesFull($obj) {
        if (is_object($obj)) {
            $vars = get_object_vars($obj);
            foreach ($vars as $k => $v) {
                $obj->{$k} = stripslashesFull($v);
            }
        } 
        return $obj;
    }

}
