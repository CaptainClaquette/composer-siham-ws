<?php

namespace sihamWSClient\personnelle;

use stdClass;

/**
 * Description of Nationalite
 *
 * @author dere01
 */
class Nationalite {

    public $codeNationalite;
    public $libLongNationalite;
    public $matricule;

    public function __construct(stdClass $class) {
        $attrs = array_keys(get_object_vars($class));
        foreach ($attrs as $attr) {
            switch ($attr) {
                default:
                    $this->$attr = $class->$attr;
            }
        }
    }

}
