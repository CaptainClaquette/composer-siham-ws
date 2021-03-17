# composer-siham-ws

## Install
composer require hakuryo/siham-ws-client

## Usage

### Config
```ini
[siham]
wsdl="https://siham.exemple.fr/DossierAgentWebService/DossierAgentWebService?wsdl"
login="siham_ws_login"
password="siham_ws_password"
code_etablissement="1111111G" # your siham university code
trace=true
exception=true # use to catch soap exception
```
### Exemple
```php
<?php

require_once '../vendor/autoload.php';

use hakuryo\sihamWSClient\clients\DossierAgentWSClient;

$client = DossierAgentWSClient::from_file('../config/config.ini','siham');
echo json_encode($client->getDonneesPersonnelles('RCA000021222'),JSON_PRETTY_PRINT);
echo json_encode($client->getDonneesAdministratives('RCA000021222'),JSON_PRETTY_PRINT);

$client->set_mail_perso('jhon.doe@exemple.fr','SIHAM_USER_ID','A'); // Add mail if no value existe, throw soap exception if exist
$client->set_mail_perso('jhon.doe@exemple.fr','SIHAM_USER_ID','M'); // Modify mail if a value exist, throw soap exception if no value exist
```