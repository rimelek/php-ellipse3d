# Description

This library is just a rewritten version of v1.0.0 from 2009. 
Do not expect real 3D graphic.

Here some example what you can do with this library: [Pictures](example/pics.md)

# Installation

php composer.phar require rimelek/ellipse3d:2.*

# Requirements

- PHP >= 7.0
- GD extension

# Usage

Create a Configuration instance:

    use Rimelek\Ellipse3D\Configuration;
    use Rimelek\Ellipse3D\Ellipse3D;
    
    $configuration = new Configuration();
    
Set options:

    $configuration
        ->setBackgroundColor($backgroundColor)
        ->setFillColor($fillColor)
        ->setBorderColor($borderColor)
        ->setLineColorsX($lineColors)
        ->setLineColorsY($lineColors)
        ->setQuality($quality)
        ->setSpace($space)
        ->setType(Ellipse3D::TYPE_GIF)
        ->setHeight($height)
        ->setWidth($width)
        ->setCanvasHeight($canvasHeight)
        ->setCanvasWidth($canvasWidth)
        ->setTransparentBackground(false);
        
All colors are in the following format: r,g,b (Ex. 255,0,255)
        
Pass it to Ellipse3D's constructor:

    $ellipse = new Ellipse3D($configuration);
    
Show the result:

    $ellipse->show();
    
**Note** that it sends the appropriate HTTP header for the chosen image type.