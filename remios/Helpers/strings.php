<?php
if(!function_exists("esc_html")){
function esc_html( $text ) {
        $safe_text = check_invalid_utf8( $text );
        //$safe_text = _wp_specialchars( $safe_text, ENT_QUOTES );
        
        return $safe_text;
}
}

if(!function_exists("esc_attr")){
function esc_attr( $text ) {
        $safe_text = check_invalid_utf8( $text );
        //$safe_text = _wp_specialchars( $safe_text, ENT_QUOTES );
        
        return $safe_text;
}
}

if(!function_exists("esc_url")){
function esc_url($text){
        return urldecode($text);
}
}

if(!function_exists("esc_textarea")){
function esc_textarea( $text ) {
        $safe_text = htmlspecialchars( $text, ENT_QUOTES, "UTF-8" );
        
        return $safe_text;
}
}

if(!function_exists("esc_html_textarea")){
    function esc_html_textarea( $text ) {
        $safe_text = htmlspecialchars_decode( $text, ENT_QUOTES );
        
        return $safe_text;
    }
}


function character_limiter($str, $n = 500, $end_char = '&#8230;')
{
    if (strlen($str) < $n) {
        return $str;
    }
    $str = strip_tags($str);
    $str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));

    if (strlen($str) <= $n) {
        return $str;
    }

    $out = '';
    foreach (explode(' ', trim($str)) as $val) {
        $out .= $val . ' ';

        if (strlen($out) >= $n) {
            $out = trim($out);

            return (strlen($out) == strlen($str)) ? $out : $out . $end_char;
        }
    }
}

if(!function_exists("check_invalid_utf8")){
        function check_invalid_utf8($string, $strip = false){

                $string = (string) $string;
         
         
         
            if ( 0 === strlen( $string ) ) {
         
                return '';
         
            }
         
         
         
            // Store the site charset as a static to avoid multiple calls to get_option()
         
            static $is_utf8;
         
            if ( !isset( $is_utf8 ) ) {
         
                $is_utf8 = in_array( "UTF-8", array( 'utf8', 'utf-8', 'UTF8', 'UTF-8' ) );
         
            }
         
            if ( !$is_utf8 ) {
         
                return $string;
         
            }
         
         
         
            // Check for support for utf8 in the installed PCRE library once and store the result in a static
         
            static $utf8_pcre;
         
            if ( !isset( $utf8_pcre ) ) {
         
                $utf8_pcre = @preg_match( '/^./u', 'a' );
         
            }
         
            // We can't demand utf8 in the PCRE installation, so just return the string in those cases
         
            if ( !$utf8_pcre ) {
         
                return $string;
         
            }
         
         
         
            // preg_match fails when it encounters invalid UTF8 in $string
         
            if ( 1 === @preg_match( '/^./us', $string ) ) {
         
                return $string;
         
            }
         
         
         
            // Attempt to strip the bad chars if requested (not recommended)
         
            if ( $strip && function_exists( 'iconv' ) ) {
         
                return iconv( 'utf-8', 'utf-8', $string );
         
            }
         
         
         
            return '';

        }


}