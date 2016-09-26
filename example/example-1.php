<?php

use Rimelek\Ellipse3D\Ellipse3D;
use Rimelek\Ellipse3D\Configuration;

require '../vendor/autoload.php';

$type = 'png';
$quality = 100;
$space = 10;
$height = 200;
$width = 200;
$canvasHeight = 300;
$canvasWidth = 300;
$backgroundColor = '000,000,001';
$fillColor = '140,100,255';
$borderColor = '000,000,000';
$lineColors = [
    '000,000,000',
    '000,000,255',
    '000,255,000',
    '000,255,255',
    '255,000,000',
    '255,000,255',
    '255,255,000',
    '255,255,255',
];

$typeConstant = Ellipse3D::class . '::TYPE_' . strtoupper(filter_input(INPUT_GET, 'type') ? : $type);

$configuration = (new Configuration())
    ->setBackgroundColor(filter_input(INPUT_GET, 'bg') ? : $backgroundColor)
    ->setFillColor(filter_input(INPUT_GET, 'fill') ? : $fillColor)
    ->setBorderColor(filter_input(INPUT_GET, 'border') ? : $borderColor)
    ->setLineColorsX(filter_input(INPUT_GET, 'linesx', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) ? : $lineColors)
    ->setLineColorsY(filter_input(INPUT_GET, 'linesy', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) ? : $lineColors)
    ->setQuality(filter_input(INPUT_GET, 'quality', FILTER_VALIDATE_INT) ? : $quality)
    ->setSpace(filter_input(INPUT_GET, 'space', FILTER_VALIDATE_INT) ? : $space)
    ->setType(defined($typeConstant) ? constant($typeConstant) : Ellipse3D::TYPE_GIF)
    ->setHeight(filter_input(INPUT_GET, 'height', FILTER_VALIDATE_INT) ? : $height)
    ->setWidth(filter_input(INPUT_GET, 'width', FILTER_VALIDATE_INT) ? : $width)
    ->setCanvasHeight(filter_input(INPUT_GET, 'canvasHeight', FILTER_VALIDATE_INT) ? : $canvasHeight)
    ->setCanvasWidth(filter_input(INPUT_GET, 'canvasWidth', FILTER_VALIDATE_INT) ? : $canvasWidth)
    ->setTransparentBackground(filter_input(INPUT_GET, 'trbg', FILTER_VALIDATE_BOOLEAN) ? : false)
;

$ellipse = new Ellipse3D($configuration);
$ellipse->show();