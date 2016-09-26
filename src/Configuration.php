<?php

namespace Rimelek\Ellipse3D;


class Configuration
{
    /**
     * @var string
     */
    private $type = Ellipse3D::TYPE_GIF;

    /**
     * @var int
     */
    private $quality = 100;

    /**
     * @var int
     */

    private $width = 400;
    /**
     * @var int
     */
    private $height = 400;

    /**
     * @var int
     */
    private $canvasWidth = 402;

    /**
     * @var int
     */
    private $canvasHeight = 402;

    /**
     * @var array
     */
    private $lineColorsX = ['0,0,0'];

    /**
     * @var array
     */
    private $lineColorsY = ['0,0,0'];


    /**
     * @var string
     */
    private $borderColor = "0,0,1";

    /**
     * @var string
     */
    private $backgroundColor = "255,255,255";

    /**
     * @var bool
     */
    private $transparentBackground = false;

    /**
     * @var string
     */
    private $fillColor = "255,255,255";

    /**
     * @var int
     */
    private $space = 50;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Configuration
     */
    public function setType(string $type): Configuration
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuality(): int
    {
        return $this->quality;
    }

    /**
     * @param int $quality
     * @return Configuration
     */
    public function setQuality(int $quality): Configuration
    {
        $this->quality = $quality;
        return $this;
    }

    /**
     * Width of the ellipse
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     *
     * @param int $width Width of the ellipse
     * @return Configuration
     */
    public function setWidth(int $width): Configuration
    {
        $this->width = $width;
        return $this;
    }

    /**
     * Height of the ellipse
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height Height of the ellipse
     * @return Configuration
     */
    public function setHeight(int $height): Configuration
    {
        $this->height = $height;
        return $this;
    }

    /**
     * Width of the canvas
     * @return int
     */
    public function getCanvasWidth(): int
    {
        return $this->canvasWidth;
    }

    /**
     * @param int $canvasWidth Width of the canvas
     * @return Configuration
     */
    public function setCanvasWidth(int $canvasWidth): Configuration
    {
        $this->canvasWidth = $canvasWidth;
        return $this;
    }

    /**
     * Height of the canvas
     * @return int
     */
    public function getCanvasHeight(): int
    {
        return $this->canvasHeight;
    }

    /**
     * @param int $canvasHeight Height of the canvas
     * @return Configuration
     */
    public function setCanvasHeight(int $canvasHeight): Configuration
    {
        $this->canvasHeight = $canvasHeight;
        return $this;
    }

    /**
     * Colors of lines horizontally
     *
     * @return array
     */
    public function getLineColorsX(): array
    {
        return $this->lineColorsX;
    }

    /**
     * @param array $colors Colors of lines horizontally in r,g,b format
     * @return Configuration
     */
    public function setLineColorsX(array $colors): Configuration
    {
        $this->lineColorsX = $colors;
        return $this;
    }

    /**
     * Colors of lines vertically
     *
     * @return array
     */
    public function getLineColorsY(): array
    {
        return $this->lineColorsY;
    }

    /**
     * @param array $colors Colors of lines vertically in r,g,b format
     * @return Configuration
     */
    public function setLineColorsY(array $colors): Configuration
    {
        $this->lineColorsY = $colors;
        return $this;
    }

    /**
     * @param array $colors Colors of lines horizontally and vertically in r,g,b format
     * @return Configuration
     */
    public function setLineColors(array $colors): Configuration
    {
        return $this->setLineColorsX($colors)->setLineColorsY($colors);
    }

    /**
     * Space between lines
     *
     * @return int
     */
    public function getSpace(): int
    {
        return $this->space;
    }

    /**
     * @param int $space Space between lines
     * @return Configuration
     */
    public function setSpace(int $space): Configuration
    {
        $this->space = $space;
        return $this;
    }

    /**
     * @return string
     */
    public function getBorderColor(): string
    {
        return $this->borderColor;
    }

    /**
     * @param string $borderColor
     * @return Configuration
     */
    public function setBorderColor(string $borderColor): Configuration
    {
        $this->borderColor = $borderColor;
        return $this;
    }

    /**
     * @return string
     */
    public function getBackgroundColor(): string
    {
        return $this->backgroundColor;
    }

    /**
     * @param string $backgroundColor
     * @return Configuration
     */
    public function setBackgroundColor(string $backgroundColor): Configuration
    {
        $this->backgroundColor = $backgroundColor;
        return $this;
    }

    /**
     * @return string
     */
    public function getFillColor(): string
    {
        return $this->fillColor;
    }

    /**
     * @param string $fillColor
     * @return Configuration
     */
    public function setFillColor(string $fillColor): Configuration
    {
        $this->fillColor = $fillColor;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isTransparentBackground(): bool
    {
        return $this->transparentBackground;
    }

    /**
     * @param boolean $transparentBackground
     * @return Configuration
     */
    public function setTransparentBackground(bool $transparentBackground): Configuration
    {
        $this->transparentBackground = $transparentBackground;
        return $this;
    }


}