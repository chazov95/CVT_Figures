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


use Exception;
use SQLite3;

/**
 * Class AbstractModel
 *
 * @package App\Models
 */
abstract class AbstractModel
{
    /**
     * @param $tableName
     * @return int
     */
    public function save($tableName): int
    {
        $objectVars = get_object_vars($this);

        foreach ($objectVars as &$objectVar) {

            if (is_string($objectVar)) {
                $objectVar = "'" . $objectVar . "'";
            }
        }

        unset($objectVar);

        $modelProps = implode(', ', $objectVars);

        try {
            $db = new SQLite3(__DIR__ . '/../../db/db.sqlite');

            $db->query("insert into $tableName values (null, $modelProps)");

            $id = $db->lastInsertRowID();

            $db->close();

            return $id;
        }catch (Exception $exception){
            return $exception->getMessage();
        }
    }
}
