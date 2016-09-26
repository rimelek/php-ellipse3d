<?php


namespace Rimelek\Ellipse3D;


class Ellipse3D
{
    const TYPE_JPEG = 'jpeg';
    const TYPE_PNG = 'png';
    const TYPE_GIF = 'gif';

    /**
     * @var Configuration $configuration
     */
    private $configuration;

    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @return resource
     */
    public function getSource()
    {
        static $source;
        if (!$source) {
            $source = imagecreate($this->configuration->getCanvasWidth(), $this->configuration->getCanvasHeight());
        }
        return $source;
    }

    /**
     * @param string $color
     * @return int
     */
    private function allocateColor(string $color): int
    {
        list($r, $g, $b) = explode(',', $color) + [0, 0, 0];
        return imagecolorallocate($this->getSource(), $r, $g, $b);
    }

    /**
     * @param array $colors
     * @return array
     */
    private function allocateColors(array $colors)
    {
        $allocatedColors = [];
        foreach ($colors as $key => $color) {
            $allocatedColors[$key] = $this->allocateColor($color);
        }
        return $allocatedColors;
    }

    /**
     * Show the drawn ellipse on the screen
     */
    public function show()
    {
        $type = $this->configuration->getType();

        if (!in_array($type, [self::TYPE_JPEG, self::TYPE_PNG, self::TYPE_GIF], true)) {
            $type = self::TYPE_GIF;
        }

        $this->draw();

        header("Content-type: image/" . $type);
        $func = 'image' . $type;
        if ($type === self::TYPE_JPEG) {
            $func($this->getSource(), null, $this->configuration->getQuality());
        } else {
            $func($this->getSource());
        }
    }

    /**
     * Draw everything
     */
    private function draw()
    {
        $conf = $this->configuration;

        $width = $conf->getWidth();
        $height = $conf->getHeight();
        $space = $conf->getSpace();
        $lineColorsX = $this->allocateColors($conf->getLineColorsX());
        $lineColorsY = $this->allocateColors($conf->getLineColorsY());
        $borderColor = $conf->getBorderColor() ? $this->allocateColor($conf->getBorderColor()) : null;
        $fillColor = $conf->getFillColor() ? $this->allocateColor($conf->getFillColor()) : null;
        $backgroundColor = $conf->getBorderColor() ? $this->allocateColor($conf->getBorderColor()) : null;
        $canvasWidth = $conf->getCanvasWidth();
        $canvasHeight = $conf->getCanvasHeight();
        $centerX = round($canvasWidth / 2);
        $centerY = round($canvasHeight / 2);
        $source = $this->getSource();

        if ($fillColor) {
            imagefill($this->getSource(), 1, 1, $fillColor);
        }

        $j = 4;
        $i = round($space / 2);
        $cLineColorsX = count($lineColorsX);
        while ($i <= $width) {
            $j = $j < $cLineColorsX ? $j + 1 : 0;
            $colorX = $lineColorsX[$j];
            imagearc($source, $centerX, $centerY, $i, $height, 0, 360, $colorX);
            $i += $space;
        }
        $j = 4;
        $i = round($space / 2);
        $cLineColorsY = count($lineColorsY);
        while ($i <= $height) {
            $j = $j < $cLineColorsY ? $j + 1 : 0;
            $colorY = $lineColorsY[$j];
            imagearc($source, $centerX, $centerY, $width, $i, 0, 360, $colorY);
            $i += $space;
        }
        if ($borderColor) {
            imagearc($source, $centerX, $centerY, $width, $height, 0, 360, $borderColor);
        }

        imagefill($source, 10, 10, $backgroundColor);
        imagefill($source, 10, $canvasHeight - 10, $backgroundColor);
        imagefill($source, $canvasWidth - 10, 10, $backgroundColor);
        imagefill($source, $canvasWidth - 10, $canvasHeight - 10, $backgroundColor);

        if ($conf->isTransparentBackground()) {
            imagecolortransparent($this->getSource(), $backgroundColor);
        }

    }
}