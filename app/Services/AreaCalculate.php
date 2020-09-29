<?php
/**
 * PHP version 7.4
 *
 * @category CVT
 * @package App\Services;
 * @author Alexander Chazov
 * @license MIT
 */

namespace App\Services;

/**
 * Class AreaCalculate
 *
 * @package App\Services
 */
class AreaCalculate
{
    public const PI = 3.14;

    /**
     * @param $figure
     * @return float|int
     */
    public static function circleCalculate($figure)
    {
        return self:: PI * sqrt(
                (($figure['center']['x'] - $figure['radius']['x']) ** 2) +
                (($figure['center']['y'] - $figure['radius']['y']) ** 2)
            );
    }

    /**
     * @param $figure
     * @return float|int
     */
    public static function parallelogramCalculate($figure)
    {
        return abs(
            ($figure['point2']['x'] - $figure['point1']['x'])
            * ($figure['point3']['y'] - $figure['point1']['y'])
            - ($figure['point3']['x'] - $figure['point1']['x'])
            * ($figure['point2']['y'] - $figure['point1']['y'])
        );
    }

    /**
     * @param $figure
     * @return float
     */
    public static function triangleCalculate($figure)
    {
        return 0.5 * self::parallelogramCalculate($figure);
    }
}
