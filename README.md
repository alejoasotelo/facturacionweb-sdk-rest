![FacturacionWeb](https://raw.githubusercontent.com/alejoasotelo/facturacionweb-sdk-rest/master/logo.png)

# FacturacionWeb SDK Rest - PHP

FacturacionWeb SDK Rest es una librería para conectar con la Api Rest de FacturacionWeb (https://facturacionweb.com.ar).

Es necesario para poder conectar el accessToken de FacturacionWeb.

Ejemplo:
accessToken: ASDFPWEIRQWEFASDLASDMCVLWEPRIQWEK

### Instalación vía Composer

```bash
composer require alejoasotelo/facturacionweb
```

### Cómo se utiliza la libreria?

```php
<?php

require_once __DIR__.'/vendor/autoload.php';

use AlejoASotelo\FacturacionWeb;

$accessToken = 'MIACCESSTOKEN';
$debug = true;

$ws = new FacturacionWeb($accessToken, $debug);
$result = $ws->getComprobante(1);

var_dump($result);
```