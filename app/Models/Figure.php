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
 * Class Figure
 *
 * @package App\Models
 */
class Figure extends AbstractModel
{
    public const TABLE_NAME = 'figures';

    protected string $type;

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
