<?php

/**
 * PHP version 7.4
 *
 * @category CVT
 * @package App\Repositories;
 * @author Alexander Chazov
 * @license MIT
 */

namespace App\Repositories;

use Exception;
use SQLite3;

/**
 * Class FigureRepository
 *
 * @package App\Repositories
 */
class FigureRepository
{
    /**
     * @return array|string
     */
    public static function findAll()
    {
        try {
            $db = new SQLite3(__DIR__ . '/../../db/db.sqlite');
            $findAll = $db->query("
                select * from figures
                    left join params on figures.id = params.figure_id
                    left join points on params.point_id = points.id
                ");

            $figures = [];

            while ($row = $findAll->fetchArray()) {
                $figures[$row[0]]['id'] = $row[0];
                $figures[$row[0]][$row['type']]['x'] = $row['x'];
                $figures[$row[0]][$row['type']]['y'] = $row['y'];
                $figures[$row[0]]['type'] = $row['1'];
            }

            $db->close();

            return $figures;
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
}
