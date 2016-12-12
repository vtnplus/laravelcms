<?php
namespace Remios\Utils;
use \Exception;
class colorConverter {

    function Hexa($dec) { // convert dec to hex

        if($dec<0 || $dec>255) {
            return false;
        } else {

            $p = floor($dec/16);
            $s = $dec%16;

            return dechex($p).dechex($s);

        }

    }

    function Deci($hex) { // convert hex to dec

        $HEXpar = preg_split('//','0123456789abcdef',-1,PREG_SPLIT_NO_EMPTY);
        
        if(strlen($hex)==1) {

            if(in_array($hex,$HEXpar)) {

                $dec = hexdec($hex);

                return ($dec * 16) + $dec;

            } else {
                return false;
            }

        } elseif(strlen($hex)==2) {

            $hex1 = substr($hex,0,1);
            $hex2 = substr($hex,1,1);

            if(in_array($hex1,$HEXpar) && in_array($hex2,$HEXpar)) {

                $dec1 = hexdec($hex1);
                $dec2 = hexdec($hex2);

                return ($dec1 * 16) + $dec2;

            } else {
                return false;
            }

        } else {
            return false;

        }

    }

    function isRGB($R,$G,$B) { // check validity of RGB color code

        if($this->Hexa($R)==false || $this->Hexa($G)==false || $this->Hexa($B)==false) {

            $this->RGBError = 1;

            if($this->Hexa($R)==false) {
                $Re = 'Minimal value of Red color is 0 and maximal value is 255<br />';
            } else {
                $Re = '';
            }

            if($this->Hexa($G)==false) {
                $Ge = 'Minimal value of Green color is 0 and maximal value is 255<br />';
            } else {
                $Ge = '';
            }

            if($this->Hexa($B)==false) {
                $Be = 'Minimal value of Blue color is 0 and maximal value is 255<br />';
            } else {
                $Be = '';
            }

            $this->RGBErrorMessage = '<div><b>Error RGB Color Value!</b><br />'.$Re.$Ge.$Be.'</div>';

        } else {
            $this->RGBError = 0;
        }

    }

    function isHEX($HEX) { // check validity of HEX color code

        $HEX = strtolower(str_replace('#','',$HEX));
        $HEX = preg_split('//',$HEX,-1,PREG_SPLIT_NO_EMPTY);
        $HEXpar = preg_split('//','0123456789abcdef',-1,PREG_SPLIT_NO_EMPTY);
        $HEXlen = count($HEX);

        /*
        // for css rule only
        if($HEXlen==3 || $HEXlen==6) {

            if($HEXlen==3) {

                if(in_array($HEX[0],$HEXpar) && in_array($HEX[1],$HEXpar) && in_array($HEX[2],$HEXpar)) {
                    $this->HEXError = 0;
                } else {

                    $this->HEXError = 1;
                    $this->HEXErrorMessage = '<div><b>Error HEX Color Value!</b><br />Minimal value of each HEX color is 0 and maximal value is f</div>';

                }

            } else {

                if(in_array($HEX[0],$HEXpar) && in_array($HEX[1],$HEXpar) && in_array($HEX[2],$HEXpar) && in_array($HEX[3],$HEXpar) && in_array($HEX[4],$HEXpar) && in_array($HEX[5],$HEXpar)) {
                    $this->HEXError = 0;
                } else {

                    $this->HEXError = 1;
                    $this->HEXErrorMessage = '<div><b>Error HEX Color Value!</b><br />Minimal value of each HEX color is 0 and maximal value is f</div>';

                }

            }
        ///////////////////////////////////
        */
        // for all rule, include css
        if($HEXlen==6) {

            if(in_array($HEX[0],$HEXpar) && in_array($HEX[1],$HEXpar) && in_array($HEX[2],$HEXpar) && in_array($HEX[3],$HEXpar) && in_array($HEX[4],$HEXpar) && in_array($HEX[5],$HEXpar)) {
                $this->HEXError = 0;
            } else {

                $this->HEXError = 1;
                $this->HEXErrorMessage = '<div><b>Error HEX Color Value!</b><br />Minimal value of each HEX color is 0 and maximal value is f</div>';

            }
        ///////////////////////////////////
        } else {
            $this->HEXError = 1;
            $this->HEXErrorMessage = '<div><b>Error HEX Color Value!</b><br />Lenght of Hex color must be 3 or 6 characters</div>';
        }

    }

    function isHSL($H,$S,$L) { // check validity of HSL color code

        if(($H<0 || $S<0 || $L<0) || ($H>360 || $S>100 || $L>100)) {
            $this->HSLError = 1;

            if($H<0 || $H>360) {
                $He = 'Minimal value of Hue color is 0 and maximal value is 360<br />';
            } else {
                $He = '';
            }
            if($S<0 || $S>100) {
                $Se = 'Minimal value of Saturation color is 0 and maximal value is 100<br />';
            } else {
                $Se = '';
            }
            if($L<0 || $L>100) {
                $Le = 'Minimal value of Lightness color is 0 and maximal value is 100';
            } else {
                $Le = '';
            }

            $this->HSLErrorMessage = '<div><b>Error HSL Color Value!</b><br />'.$He.$Se.$Le.'</div>';

        } else {
            $this->HSLError = 0;
        }

    }

    function RGB2HEX($R,$G,$B) { // convert RGB to HEX color

        $this->isRGB($R,$G,$B);

        if($this->RGBError==0) {

            $Rh = $this->Hexa($R);
            $Gh = $this->Hexa($G);
            $Bh = $this->Hexa($B);

            $Rh1 = substr($Rh,0,1);
            $Rh2 = substr($Rh,1,1);

            $Gh1 = substr($Gh,0,1);
            $Gh2 = substr($Gh,1,1);

            $Bh1 = substr($Bh,0,1);
            $Bh2 = substr($Bh,1,1);
            
            /*
            // for css rule only
            if(($Rh1==$Rh2) && ($Gh1==$Gh2) && ($Bh1==$Bh2)) {
                return '#'.$Rh1.$Gh1.$Bh1;
            } else {
                return '#'.$Rh.$Gh.$Bh;
            }
            */
            return '#'.$Rh.$Gh.$Bh; // for all rule, include css

        }
    }

    function HEX2RGB($HEX) { // convert HEX to RGB color

        $this->isHEX($HEX);

        if($this->HEXError==0) {

            $HEX = str_replace('#','',$HEX);

            if(strlen($HEX)==3) {

                $R = $this->Deci(substr($HEX,0,1));
                $G = $this->Deci(substr($HEX,1,1));
                $B = $this->Deci(substr($HEX,2,1));

            } else {

                $R = $this->Deci(substr($HEX,0,2));
                $G = $this->Deci(substr($HEX,2,2));
                $B = $this->Deci(substr($HEX,4,2));

            }

            return array($R,$G,$B);

        }

    }

    function RGB2HSL($R,$G,$B) { // convert RGB to HSL color; adapted from www.easyrgb.com

        $this->isRGB($R,$G,$B);

        if($this->RGBError==0) {

            $R = $R/255; 
            $G = $G/255;
            $B = $B/255;

            $RGB = array($R,$G,$B);
            sort($RGB);

            $min = $RGB[0];  
            $max = $RGB[2]; 
            $delta = $max-$min;   

            $L = ($max+$min)/2;

            if($delta==0)  {              
                $H = 0;                             
                $S = 0;
            } else {                                
                if($L<0.5) {
                    $S = $delta/($max+$min);
                } else {
                    $S = $delta/(2-$max-$min);
                }

                $Rn = ((($max-$R)/6)+($delta/2))/$delta;
                $Gn = ((($max-$G)/6)+($delta/2))/$delta;
                $Bn = ((($max-$B)/6)+($delta/2))/$delta;

                if($R==$max) {
                    $H = $Bn-$Gn;
                }
                if($G==$max) {
                    $H = (1/3)+$Rn-$Bn;
                }
                if($B==$max) {
                    $H = (2/3)+$Gn-$Rn;
                }

                if($H<0) {
                    $H = $H+1;
                }
                if($H>1) {
                    $H = $H-1;
                }
            }

            $H = $H*360;
            $S = $S*100;
            $L = $L*100;

            return array($H,$S,$L);

        }

    }   

    function HSL2RGB($H,$S,$L) { // convert HSL to RGB color; adapted from www.easyrgb.com

        $this->isHSL($H,$S,$L);

        if($this->HSLError==0) {

            $H = $H/360; 
            $S = $S/100;
            $L = $L/100;

            if($S==0) {

                $R = $L*255;
                $G = $L*255;
                $B = $L*255;

            } else {

                if($L<0.5) {
                    $temp2 = $L*(1+$S);
                } else {
                    $temp2 = ($L+$S)-($S*$L);
                }

                $temp1 = (2*$L)-$temp2;

                $Rtemp3 = $H+(1/3);
                $Gtemp3 = $H;
                $Btemp3 = $H-(1/3);

                $R = 255*$this->Hue2RGB($temp1,$temp2,$Rtemp3);
                $G = 255*$this->Hue2RGB($temp1,$temp2,$Gtemp3);
                $B = 255*$this->Hue2RGB($temp1,$temp2,$Btemp3);
            }

            return array($R,$G,$B);

        }

    }

    function Hue2RGB($temp1,$temp2,$temp3) { // part of HSL2RGB function

        if($temp3<0) {
            $temp3 = $temp3+1;
        }
        if($temp3>1) {
            $temp3 = $temp3-1;
        }

        if((6*$temp3)<1) {
            return $temp1+($temp2-$temp1)*6*$temp3;
        } elseif((2*$temp3)<1) {
            return $temp2;
        } elseif((3*$temp3)<2) {
            return $temp1+($temp2-$temp1)*((2/3)-$temp3)*6;
        } else {
            return $temp1;
        }

    }

    function HEX2HSL($HEX) { // convert HEX to HSL color

        $this->isHEX($HEX);

        if($this->HEXError==0) {

            $temp = $this->HEX2RGB($HEX);

            return $this->RGB2HSL($temp[0],$temp[1],$temp[2]);

        }

    }

    function HSL2HEX($H,$S,$L) { // convert HSL to HEX color

        $this->isHSL($H,$S,$L);

        if($this->HSLError==0) {

            $temp = $this->HSL2RGB($H,$S,$L);

            return $this->RGB2HEX($temp[0],$temp[1],$temp[2]);

        }

    }

}



class Color extends colorConverter {
    var $darken = "#000000";
    var $lighten = "#FFFFFF";
    function Monochromatic($HEX) { // Monochromatic
        
        $color1 = strtolower($HEX); // base color

        $RGB = $this->HEX2RGB($color1);
        $R = $RGB[0];
        $G = $RGB[1];
        $B = $RGB[2];

        $R2 = $this->MonoC($R,2);
        $G2 = $this->MonoC($G,2);
        $B2 = $this->MonoC($B,2);

        $color2 = $this->RGB2HEX($R2,$G2,$B2);

        $R3 = $this->MonoC($R,3);
        $G3 = $this->MonoC($G,3);
        $B3 = $this->MonoC($B,3);

        $color3 = $this->RGB2HEX($R3,$G3,$B3);

        $R4 = $this->MonoC($R,4);
        $G4 = $this->MonoC($G,4);
        $B4 = $this->MonoC($B,4);

        $color4 = $this->RGB2HEX($R4,$G4,$B4);

        $color5 = $this->SecondC($color1);
        $color6 = $this->SecondC($color2);
        $color7 = $this->SecondC($color3);
        $color8 = $this->SecondC($color4);

        return array($color1,$color2,$color3,$color4,$color5,$color6,$color7,$color8);

    }

    function Analogous($HEX) { // Analogous
        
        $color1 = strtolower($HEX); // base color

        $temp = $this->HEX2HSL($color1);

        $H = $temp[0];
        $S = $temp[1];
        $L = $temp[2];

        $H1 = $this->FixHue($H+30);
        $H2 = $this->FixHue($H-30);

        $color2 = $this->HSL2HEX($H1,$S,$L);
        /*
        $color3 = '#fff'; // for css rule only
        */
        $color3 = '#ffffff'; // for all rule, include css
        $color4 = $this->HSL2HEX($H2,$S,$L);

        $color5 = $this->SecondC($color1);
        $color6 = $this->SecondC($color2);
        $color7 = $this->SecondC($color3);
        $color8 = $this->SecondC($color4);

        return array($color1,$color2,$color3,$color4,$color5,$color6,$color7,$color8);

    }

    function Complementary($HEX) { // Complementary
        
        $color1 = strtolower($HEX); // base color

        $RGB = $this->HEX2RGB($color1);
        $R = $RGB[0];
        $G = $RGB[1];
        $B = $RGB[2];

        $temp = $this->HEX2HSL($HEX);

        $H = $temp[0];
        $H = $this->FixHue($H+180);
        $S = $temp[1];
        $L = $temp[2];

        $color2 = $this->HSL2HEX($H,$S,$L);

        $RGB2 = $this->HEX2RGB($color2);
        $R2 = $RGB2[0];
        $G2 = $RGB2[1];
        $B2 = $RGB2[2];

        $R = $this->MonoC($R,2);
        $G = $this->MonoC($G,2);
        $B = $this->MonoC($B,2);

        $color3 = $this->RGB2HEX($R,$G,$B);

        $R2 = $this->MonoC($R2,2);
        $G2 = $this->MonoC($G2,2);
        $B2 = $this->MonoC($B2,2);

        $color4 = $this->RGB2HEX($R2,$G2,$B2);

        $color5 = $this->SecondC($color1);
        $color6 = $this->SecondC($color2);
        $color7 = $this->SecondC($color3);
        $color8 = $this->SecondC($color4);

        return array($color1,$color2,$color3,$color4,$color5,$color6,$color7,$color8);

    }

    function Triads($HEX) { // Triads
        
        $color1 = strtolower($HEX); // base color

        $temp = $this->HEX2HSL($color1);

        $H = $temp[0];
        $S = $temp[1];
        $L = $temp[2];

        $H1 = $this->FixHue($H+120);
        $H2 = $this->FixHue($H-120);

        $color2 = $this->HSL2HEX($H1,$S,$L);
        /*
        $color3 = '#fff'; // for css rule only
        */
        $color3 = '#ffffff'; // for all rule, include css
        $color4 = $this->HSL2HEX($H2,$S,$L);

        $color5 = $this->SecondC($color1);
        $color6 = $this->SecondC($color2);
        $color7 = $this->SecondC($color3);
        $color8 = $this->SecondC($color4);

        return array($color1,$color2,$color3,$color4,$color5,$color6,$color7,$color8);

    }

    function FixHue($Hue) {

        if($Hue<0) {
            return $Hue+360;
        } elseif($Hue>360) {
            return $Hue-360;
        } else {
            return $Hue;
        }

    }

    function SecondC($c) {

        $RGB = $this->HEX2RGB($c);
        $R = $RGB[0];
        $G = $RGB[1];
        $B = $RGB[2];

        $par = 0.75;

        $R2 = floor($par*$R);
        $G2 = floor($par*$G);
        $B2 = floor($par*$B);

        return $this->RGB2HEX($R2,$G2,$B2);

    }

    function MonoC($c,$n) {

        $par1 = 128;
        $par2 = 192;
        $par3 = 64;
        $par4 = 223;

        $diffC = $c-$par1; // $c = color
        $diff = abs($diffC);

        if($n==2) {
            if($diffC>=1) {
                return $par2+floor(0.5*$diff);
            } elseif($diffC<0) {
                return $par2-floor(0.5*$diff);
            } else {
                return $par2;
            }
        } 
        
        if($n==3) {
            if($diffC>=1) {
                return $par3+floor(0.5*$diff);
            } elseif($diffC<0) {
                return $par3-floor(0.5*$diff);
            } else {
                return $par3;
            }
        } 
        
        if($n==4) {
            if($diffC>=1) {
                return $par4+floor(0.25*$diff);
            } elseif($diffC<0) {
                return $par4-floor(0.25*$diff);
            } else {
                return $par4;
            }
        } 

    }

    function darken( $HEX, $amount = 10){
        $color1 = strtolower($HEX); // base color

        $data = $this->hexToHsl($color1);

        $H = $data["H"];
        $S = $data["S"];
        $L = $data["L"];

        // Check if we were provided a number
        if( $amount ) {
            $L = ($L * 100) - $amount;
            $L = ($L < 0) ? 0 : $L/100;
        } else {
            // We need to find out how much to darken
            $L = $L/2 ;
        }
       
        return $this->hslToHex($H,$S,$L);
    }

    function lighten( $HEX, $amount = 10){
        $color1 = strtolower($HEX); // base color

        $data = $this->hexToHsl($color1);

        $H = $data["H"];
        $S = $data["S"];
        $L = $data["L"];
       
        // Check if we were provided a number
        if( $amount ) {
            $L = ($L * 100) + $amount;
            $L = ($L < 0) ? 0 : $L/100;
        } else {
            // We need to find out how much to lighten
            $L += (1-$L)/2;
        }
       
        return $this->hslToHex($H,$S,$L);
    }

    function _checkHex( $hex ) {
        // Strip # sign is present
        $color = str_replace("#", "", $hex);
        // Make sure it's 6 digits
        if( strlen($color) == 3 ) {
            $color = $color[0].$color[0].$color[1].$color[1].$color[2].$color[2];
        } else if( strlen($color) != 6 ) {
            throw new Exception("HEX color needs to be 6 or 3 digits long");
        }
        return $color;
    }

    function Color2F($HEX) {
        $color1 = strtolower($HEX); // base color

        $data = $this->hexToHsl($color1);


        // Adjust Hue 180 degrees
        $data['H'] += ($data['H']>180) ? -180:180;
        // Return the new value in HEX
        return $this->hslToHex($data['H'],$data['S'],$data['L']);
    }

    
    function hslToHex( $H,$S,$L ){
        $H = $H/360;
        if( $S == 0 ) {
            $r = $L * 255;
            $g = $L * 255;
            $b = $L * 255;
        } else {
            if($L<0.5) {
                $var_2 = $L*(1+$S);
            } else {
                $var_2 = ($L+$S) - ($S*$L);
            }
            $var_1 = 2 * $L - $var_2;
            $r = round(255 * $this->_huetorgb( $var_1, $var_2, $H + (1/3) ));
            $g = round(255 * $this->_huetorgb( $var_1, $var_2, $H ));
            $b = round(255 * $this->_huetorgb( $var_1, $var_2, $H - (1/3) ));
        }
        // Convert to hex
        $r = dechex($r);
        $g = dechex($g);
        $b = dechex($b);
        // Make sure we get 2 digits for decimals
        $r = (strlen("".$r)===1) ? "0".$r:$r;
        $g = (strlen("".$g)===1) ? "0".$g:$g;
        $b = (strlen("".$b)===1) ? "0".$b:$b;
        return "#".$r.$g.$b;
    }


    function hexToHsl( $color ){
        // Sanity check
        $color = $this->_checkHex($color);
        // Convert HEX to DEC
        $R = hexdec($color[0].$color[1]);
        $G = hexdec($color[2].$color[3]);
        $B = hexdec($color[4].$color[5]);
        $HSL = array();
        $var_R = ($R / 255);
        $var_G = ($G / 255);
        $var_B = ($B / 255);
        $var_Min = min($var_R, $var_G, $var_B);
        $var_Max = max($var_R, $var_G, $var_B);
        $del_Max = $var_Max - $var_Min;
        $L = ($var_Max + $var_Min)/2;
        if ($del_Max == 0)
        {
            $H = 0;
            $S = 0;
        }
        else
        {
            if ( $L < 0.5 ) $S = $del_Max / ( $var_Max + $var_Min );
            else            $S = $del_Max / ( 2 - $var_Max - $var_Min );
            $del_R = ( ( ( $var_Max - $var_R ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
            $del_G = ( ( ( $var_Max - $var_G ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
            $del_B = ( ( ( $var_Max - $var_B ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
            if      ($var_R == $var_Max) $H = $del_B - $del_G;
            else if ($var_G == $var_Max) $H = ( 1 / 3 ) + $del_R - $del_B;
            else if ($var_B == $var_Max) $H = ( 2 / 3 ) + $del_G - $del_R;
            if ($H<0) $H++;
            if ($H>1) $H--;
        }
        $HSL['H'] = ($H*360);
        $HSL['S'] = $S;
        $HSL['L'] = $L;

        return $HSL;
    }
    function getCssGradient( $color, $vintageBrowsers = FALSE, $suffix = "" , $prefix = "" ) {
        // Get the recommended gradient
        $g = ["light" => str_replace("#",'',$this->lighten($color)), "dark" => str_replace("#",'',$this->darken($color))];
        $css = "";
        /* fallback/image non-cover color */
        $css .= "{$prefix}background-color: #".str_replace("#",'',$color).";{$suffix}";
        /* IE Browsers */
        $css .= "{$prefix}filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#".$g['light']."', endColorstr='#".$g['dark']."');{$suffix}";
        /* Safari 4+, Chrome 1-9 */
        if ( $vintageBrowsers ) {
            $css .= "{$prefix}background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#".$g['light']."), to(#".$g['dark']."));{$suffix}";
        }
        /* Safari 5.1+, Mobile Safari, Chrome 10+ */
        $css .= "{$prefix}background-image: -webkit-linear-gradient(top, #".$g['light'].", #".$g['dark'].");{$suffix}";
        /* Firefox 3.6+ */
        if ( $vintageBrowsers ) {
            $css .= "{$prefix}background-image: -moz-linear-gradient(top, #".$g['light'].", #".$g['dark'].");{$suffix}";
        }
        /* Opera 11.10+ */
        if ( $vintageBrowsers ) {
            $css .= "{$prefix}background-image: -o-linear-gradient(top, #".$g['light'].", #".$g['dark'].");{$suffix}";
        }
        /* Unprefixed version (standards): FF 16+, IE10+, Chrome 26+, Safari 7+, Opera 12.1+ */
        $css .= "{$prefix}background-image: linear-gradient(to bottom, #".$g['light'].", #".$g['dark'].");{$suffix}";
        // Return our CSS
        return $css;
    }

    function getCssGradientHover( $color, $vintageBrowsers = FALSE, $suffix = "" , $prefix = "" ) {
        // Get the recommended gradient
        $g = ["light" => str_replace("#",'',$this->darken($color)), "dark" => str_replace("#",'',$this->lighten($color))];
        $css = "";
        /* fallback/image non-cover color */
        $css .= "{$prefix}background-color: #".str_replace("#",'',$color).";{$suffix}";
        /* IE Browsers */
        $css .= "{$prefix}filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#".$g['light']."', endColorstr='#".$g['dark']."');{$suffix}";
        /* Safari 4+, Chrome 1-9 */
        if ( $vintageBrowsers ) {
            $css .= "{$prefix}background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#".$g['light']."), to(#".$g['dark']."));{$suffix}";
        }
        /* Safari 5.1+, Mobile Safari, Chrome 10+ */
        $css .= "{$prefix}background-image: -webkit-linear-gradient(top, #".$g['light'].", #".$g['dark'].");{$suffix}";
        /* Firefox 3.6+ */
        if ( $vintageBrowsers ) {
            $css .= "{$prefix}background-image: -moz-linear-gradient(top, #".$g['light'].", #".$g['dark'].");{$suffix}";
        }
        /* Opera 11.10+ */
        if ( $vintageBrowsers ) {
            $css .= "{$prefix}background-image: -o-linear-gradient(top, #".$g['light'].", #".$g['dark'].");{$suffix}";
        }
        /* Unprefixed version (standards): FF 16+, IE10+, Chrome 26+, Safari 7+, Opera 12.1+ */
        $css .= "{$prefix}background-image: linear-gradient(to bottom, #".$g['light'].", #".$g['dark'].");{$suffix}";
        // Return our CSS
        return $css;
    }



    function _huetorgb( $v1,$v2,$vH ) {
        if( $vH < 0 ) {
            $vH += 1;
        }
        if( $vH > 1 ) {
            $vH -= 1;
        }
        if( (6*$vH) < 1 ) {
               return ($v1 + ($v2 - $v1) * 6 * $vH);
        }
        if( (2*$vH) < 1 ) {
            return $v2;
        }
        if( (3*$vH) < 2 ) {
            return ($v1 + ($v2-$v1) * ( (2/3)-$vH ) * 6);
        }
        return $v1;
    }


}
?>