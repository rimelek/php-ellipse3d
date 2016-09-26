<?php
//színek beállítása
$colors['fill']    = '140,100,255';
$colors['bgcolor'] = '000,000,001';
$colors['border']   = '000,000,000';

$colors['_0'] = '000,000,000';
$colors['_1'] = '000,000,255';
$colors['_2'] = '000,255,000';
$colors['_3'] = '000,255,255';
$colors['_4'] = '255,000,000';
$colors['_5'] = '255,000,255';
$colors['_6'] = '255,255,000';
$colors['_7'] = '255,255,255';

$colors['monox'] = '000,000,000';
$colors['monoy'] = '000,000,000';

//Méretek, és kép típus
$space		= 10;
$type		= 'gif';
$width		= 400;
$height		= 400;
$quality	= 100;

$space		= (isset($_GET['space']))	? abs((int)$_GET['space'])	: $space;
$type		= (isset($_GET['type']))	? $_GET['type']		: $type;
$width		= (isset($_GET['width']))	? $_GET['width']	: $width;
$height		= (isset($_GET['height']))	? $_GET['height']	: $height;
$quality	= (isset($_GET['quality']))	? $_GET['quality']	: $quality;

class Gomb
{
    var $type;
    var $source;
    var $width;
    var $height;

    var $colors = array();

    //Kép elõkészítése
    function __construct($type,$width,$height)
    {
		if (!in_array(strtolower($type),array('jpeg','jpg','png','gif')))
		{
			$type = 'gif';
		}
        header("Content-type: image/$type");
        $this->type   = $type;
        $this->width  = $width;
        $this->height = $height;
        $this->source = imageCreate($width,$height);
    }
    
    //színek megadása
    function set_colors($colors)
    {
        foreach($colors as $key => $value)
        {
            global $$key;
            if(isset($_GET[$key])){ $value = $_GET[$key];}
            $rgb = explode(',',$value);
            $$key = imageColorAllocate($this->source,$rgb[0],$rgb[1],$rgb[2]);
            $this->colors[$key] = $$key;
        }
    }
    
    //kép kirajzolása
    function print_image($quality)
    {
        $func = 'image'.$this->type;
        if(strtolower($this->type) != 'gif' and strtolower($this->type) != 'png')
        {
            $func($this->source,null,$quality);
        }else{
            $func($this->source);
        }
    }

	//Rajz összeállítása
    function rajz($w,$h,$space,$colors = array())
    {
        $j = 4;
        $i=round($space/2);
        while($i<=$w){
        if($j < 7){$j++;}else{$j=0;}
        $colorX = (isset($_GET['monox'])) ? $colors['monox'] : $colors['_'.$j];
        ImageArc(
            $this->source,
            round($this->width/2),
            round($this->height/2),
            $i,
            $h,
            0,
            360,
            $colorX
            );
        $i+=$space;
        }
        $j = 4;
        $i=round($space/2);
        while($i<=$h){
        if($j < 7){$j++;}else{$j=0;}
        $colorY = (isset($_GET['monoy'])) ? $colors['monoy'] : $colors['_'.$j];
        ImageArc(
            $this->source,
            round($this->width/2),
            round($this->height/2),
            $w,
            $i,
            0,
            360,
            $colorY
            );
        $i+=$space;
        }
        if(isset($_GET['border'])){
			ImageArc($this->source,round($this->width/2),round($this->height/2),
                    $w,$h,0,360,$colors['border']);
		}
        imageFill($this->source,10,10,$colors['bgcolor']);
        imageFill($this->source,10,$this->height-10,$colors['bgcolor']);
        imageFill($this->source,$this->width-10,10,$colors['bgcolor']);
        imageFill($this->source,$this->width-10,$this->height-10,$colors['bgcolor']);
        ImageColorTransparent($this->source,$colors['bgcolor']);
    }
}

$img = new Gomb($type,$width,$height);
$img->set_colors($colors);
$w = (isset($_GET['w'])) ? $_GET['w'] : $img->width;
$h = (isset($_GET['h'])) ? $_GET['h'] : $img->height;
imagefill($img->source,1,1,$fill);

$img->rajz($w,$h,$space,$img->colors);

$img->print_image($quality);
?>