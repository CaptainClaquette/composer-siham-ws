<?php

namespace hakuryo\sihamWSClient\clients;

use Exception;
use InvalidArgumentException;
use hakuryo\sihamWSClient\administratif\DossierAdministratif;
use hakuryo\sihamWSClient\personnelle\DossierPersonnelle;
use hakuryo\sihamWSClient\personnelle\ParamListAgent;
use hakuryo\sihamWSClient\traits\DossierAdministratifOperations;
use hakuryo\sihamWSClient\traits\DossierPersonnelOperations;
use SoapClient;
use SoapFault;
use stdClass;

/**
 * 
 * @package hakuryo\sihamWSClient\clients
 */
class DossierAgentWSClient extends SoapClient
{
    use DossierPersonnelOperations;
    use DossierAdministratifOperations;

    public $dossier_personnel;
    public $dossier_administratif;
    private $code_etablissement;

    /**
     * 
     * @param string $wsdl the url of the wsdl
     * @param string $code_etablissement code of the structure using siham
     * @param array|null $parameters configuration of the soap client
     * @return void 
     */
    public function __construct(string $wsdl, string $code_etablissement, array $parameters = null)
    {
        parent::__construct($wsdl, $parameters);
        $this->code_etablissement = $code_etablissement;
        $this->dossier_personnel = new DossierPersonnelle();
        $this->dossier_administratif = new DossierAdministratif();
    }

    /**
     * 
     * @param string $ini_config_path the path of the ini file containing the following keys 
     * 'login','password','trace','exception','code_etablissement','wsdl' under an ini section
     * @param string $section The name of the ini section containing the client config
     * @return DossierAgentWSClient 
     * @throws InvalidArgumentException if all the key are not provided or wrong value type. 
     */
    public static function from_file(string $ini_config_path, string $section): DossierAgentWSClient
    {
        $config = json_decode(json_encode(parse_ini_file($ini_config_path, true, INI_SCANNER_TYPED)))->$section;
        self::check_config_data($config);
        $soapParameters = array('login' => $config->login, 'password' => $config->password, 'trace' => $config->trace, 'exceptions' => $config->exception);
        return new DossierAgentWSClient($config->wsdl, $config->code_etablissement, $soapParameters);
    }
    /**
     * 
     * @param stdClass $config the ini file config
     * @return void 
     * @throws InvalidArgumentException if all the key are not provided or wrong value type. 
     */
    private static function check_config_data(stdClass $config){
        $keys = array_keys(get_object_vars($config));
        if(count(array_intersect(['login','password','trace','exception','code_etablissement','wsdl'],$keys)) < count(['login','password','trace','exception','code_etablissement','wsdl'])){
            throw new InvalidArgumentException("You must provide the following argument in your config file : 'login','password','trace','exception','code_etablissement','wsdl'");
        }
        if(!is_bool($config->trace)){
            throw new InvalidArgumentException("The value of 'trace' argument must be 'true' or 'false'");
        }
        if(!is_bool($config->exception)){
            throw new InvalidArgumentException("The value of 'exception' argument must be 'true' or 'false'");
        }
    }

    public function __destruct()
    {
        unset($this->dossier_personnel);
        unset($this->dossier_administratif);
        unset($this->code_etablissement);
    }
}
