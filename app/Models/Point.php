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
 * Class Point
 *
 * @package App\Models
 */
class Point extends AbstractModel
{
    public const TABLE_NAME = 'points';

    protected int $xAx;
    protected int $yAx;

    /**
     * @param int $xAx
     */
    public function setXAx(int $xAx): void
    {
        $this->xAx = $xAx;
    }

    /**
     * @param int $yAx
     */
    public function setYAx(int $yAx): void
    {
        $this->yAx = $yAx;
    }
}
