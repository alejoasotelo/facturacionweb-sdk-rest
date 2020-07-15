<?php

namespace AlejoASotelo;

use Joomla\Http\HttpFactory;

class FacturacionWeb
{
    const BASE_URL_DEV = 'http://fwtest.facturacionweb.com.ar/api/';
    const BASE_URL_PROD = 'https://facturador.facturacionweb.com.ar/api/';

    private $version = '0.1.0';

    private $debug = true;
    private $http = null;
    private $accessToken = null;
    private $response = null;
    private $token = null;

    public function __construct($accessToken, $debug = true)
    {
        if (empty($accessToken)) {
            throw new Exception('Faltan el accessToken, se obtiene desde la configuración del usuario en facturacionWeb.com.ar');
        }

        $this->accessToken = $accessToken;
        $this->debug = $debug;
        $this->response = null;
        $this->token = null;
        $this->http = HttpFactory::getHttp();
    }

    private function getBaseUrl($endpoint = 'login')
    {
        $base = $this->debug ? self::BASE_URL_DEV : self::BASE_URL_PROD;

        return $base.$endpoint;
    }

    /**
     * Obtener comprobante emitido
     *
     * @param integet $id
     * @return ComprobanteResponse https://facturacionweb.helpdocsonline.com/comprobantes$ComprobanteResponse
     */
    public function getComprobante($id)
    {
        $uri = $this->getBaseUrl('/comprobante/'.$id);

        return $this->makeRequest($uri, 'get');
    }

    /**
     * Genera un comprobante
     *
     * @param RequestGenerarCae $comprobante https://facturacionweb.helpdocsonline.com/comprobantes$RequestGenerarCae
     * @return ComprobanteResponse https://facturacionweb.helpdocsonline.com/comprobantes$ComprobanteResponse
     */
    public function addComprobante($comprobante)
    {
        $uri = $this->getBaseUrl('/comprobante/generar-cae');

        return $this->makeRequest($uri, 'post', $comprobante);
    }

    /**
     * Cargar comprobante recibido
     *
     * @param RequestCargarRecibido $comprobante https://facturacionweb.helpdocsonline.com/comprobantes$RequestCargarRecibido
     * @return ComprobanteResponse https://facturacionweb.helpdocsonline.com/comprobantes$ComprobanteResponse
     */
    public function addComprobanteRecibido($comprobante)
    {
        $uri = $this->getBaseUrl('/comprobante/cargar-recibido');

        return $this->makeRequest($uri, 'post', $comprobante);
    }

    protected function makeRequest($uri, $method = 'get', $data = null)
    {
        $availableMethods = array(
            'get',
            'post',
            'request',
            'delete',
            'put',
        );

        $method = strtolower($method);

        if (!in_array($method, $availableMethods)) {
            $method = 'get';
        }

        $headers = array(
            'Content-Type' => 'application/json',
        );

        $uri .= '?accessToken='.$this->accessToken;

        if ($method == 'post') {
            $response = $this->http->{$method}($uri, $data, $headers);
        } else {
            $response = $this->http->{$method}($uri, $headers);
        }

        $this->response = $response;

        if ($response->code == 200) {
            return json_decode($response->body);
        } else {
            return null;
        }
    }

    public function getResponse()
    {
        return $this->response;
    }
}
