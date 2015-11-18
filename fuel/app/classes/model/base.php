<?php
use Orm\Model;

class Model_Base extends Model {

    public static function getTablesRow() {
        $result = array();
        foreach (self::properties() as $key => $value) {
            $result[] = self::table() . '.' . $key;
        }

        return $result;
    }
        
}
