<?php

/**
 * PHP version 7.4
 *
 * @category CVT
 * @package App\Models
 * @author Alexander Chazov
 * @license MIT
 */
namespace App\Models;

/**
 * Class Param
 *
 * @package App\Models
 */
class Param extends AbstractModel
{
    public const TABLE_NAME = 'params';

    protected int $figureId;
    protected string $dotType;
    protected int $pointId;

    /**
     * @param string $dotType
     */
    public function setDotType(string $dotType): void
    {
        $this->dotType = $dotType;
    }

    /**
     * @param int $figureId
     */
    public function setFigureId(int $figureId): void
    {
        $this->figureId = $figureId;
    }

    /**
     * @param int $pointId
     */
    public function setPointId(int $pointId): void
    {
        $this->pointId = $pointId;
    }
}
