<?php

/**
 * PHP version 7.4
 *
 * @category CVT
 * @package App\Controllers
 * @author Alexander Chazov
 * @license MIT
 */
namespace App\Controllers;

use App\Repositories\FigureRepository;
use App\Services\FigureManager;

/**
 * Class FigureController
 *
 * @package App\Controllers
 */
class FigureController
{
    public const CIRCLE = 'circle';
    public const TRIANGLE = 'triangle';
    public const PARALLELOGRAM = 'parallelogram';

    /**
     * @var array[]
     */
    private array $points = [];

    /**
     * FigureController constructor.
     *
     * @param array $request
     */
    public function __construct(array $request)
    {

        if ($request['action'] === 'circleAdd') {
            $this->points = [
                [
                    'dotType' => 'center',
                    'xAx' => $request['center_x'],
                    'yAx' => $request['center_y'],
                ],
                [
                    'dotType' => 'radius',
                    'xAx' => $request['radius_x'],
                    'yAx' => $request['radius_y'],
                ],
            ];
        }

        if ($request['action'] === 'triangleAdd' || $request['action'] === 'parallelogramAdd') {
            $this->points = [
                [
                    'dotType' => 'point1',
                    'xAx' => $request['dot1_x'],
                    'yAx' => $request['dot1_y'],
                ],
                [
                    'dotType' => 'point2',
                    'xAx' => $request['dot2_x'],
                    'yAx' => $request['dot2_y'],
                ],
                [
                    'dotType' => 'point3',
                    'xAx' => $request['dot3_x'],
                    'yAx' => $request['dot3_y'],
                ]
            ];
        }
    }

    /**
     * @return array
     */
    public function addCircle(): array
    {
        $figureManager = new FigureManager();
        $figureId = $figureManager->saveFigure($this->points, self::CIRCLE);

        return ['figureId' => $figureId];
    }

    /**
     * @return array
     */
    public function addTriangle(): array
    {
        $figureManager = new FigureManager();
        $figureId = $figureManager->saveFigure($this->points, self::TRIANGLE);

        return ['figureId' => $figureId];
    }

    /**
     * @return array
     */
    public function addParallelogram(): array
    {
        $figureManager = new FigureManager();
        $figureId = $figureManager->saveFigure($this->points, self::PARALLELOGRAM);

        return ['figureId' => $figureId];
    }

    /**
     * @return array
     */
    public static function list()
    {
        $figures = FigureRepository::findall();

        foreach ($figures as &$figure) {
            $figure = FigureManager::calculatearea($figure);
        }
        unset($figure);

        $result = [];

        foreach ($figures as $figure) {
            $result[] = $figure;
        }

        return $result;
    }
}
