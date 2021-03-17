<?php

namespace hakuryo\sihamWSClient\personnelle;

use hakuryo\sihamWSClient\personnelle\Adresse;
use stdClass;

/**
 * Description of AdresseHeberge
 *
 * @author dere01
 */
class AdresseHeberge extends Adresse {

    public $codePaysAdresse;
    public $villeAdresse;
    
    public function __construct(stdClass $class) {
        parent::__construct($class);
    }

}
