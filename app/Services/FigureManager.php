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

use App\Models\Figure;
use App\Models\Param;
use App\Models\Point;

/**
 * Class FigureManager
 *
 * @package App\Services
 */
class FigureManager
{
    /**
     * @param $figure
     * @return mixed
     */
    public static function calculateArea($figure)
    {

        switch ($figure['type']){
            case 'circle':
                $figure['area'] = round(AreaCalculate::circleCalculate($figure),2);
                break;
            case 'parallelogram':
                $figure['area'] = round(AreaCalculate::parallelogramCalculate($figure),2);
                break;
            case 'triangle':
                $figure['area'] = round(AreaCalculate::triangleCalculate($figure),2);
                break;
        }

        return $figure;
    }

    /**
     * @param array $figureArray
     * @param string $figureType
     * @return int
     */
    public function saveFigure(array $figureArray, string $figureType): int
    {
        $figure = new Figure();

        $figure->setType($figureType);

        $figureId = $figure->save($figure::TABLE_NAME);

        foreach ($figureArray as $point) {
            $newPoint = new Point();

            $newPoint->setXAx($point['xAx']);
            $newPoint->setYAx($point['yAx']);

            $pointId = $newPoint->save($newPoint::TABLE_NAME);

            $newParam = new Param();

            $newParam->setDotType($point['dotType']);
            $newParam->setFigureId($figureId);
            $newParam->setPointId($pointId);
            $newParam->save($newParam::TABLE_NAME);
        }

        return $figureId;
    }
}
