<?php
namespace Cumppla;

class ActualizarEstadoFormularioFisico
{
    /**
     * @var string
     */
    protected $url = null;
    /**
     * @var string
     */
    protected $documento = '';
    /**
     * @var string
     */
    protected $estado = '';
    /**
     * @var string
     */
    protected $entidad = '';

    public function __construct($url, $documento, $estado, $entidad)
    {
        $this->url = $url;
        $this->documento = $documento;
        $this->estado = $estado;
        $this->entidad = $entidad;
    }

    public function enviar()
    {
        $starttime = microtime(true);

        $client = new \SoapClient($this->url);

        try {
            $response = $client->ActualizarEstadoFormularioFisico([
                'nroDoc' => $this->documento,
                'estado' => $this->estado,
                'tipoEntidad' => $this->entidad
            ]);

            $res = null;

            if ($response->ActualizarEstadoFormularioFisicoResult == 1) {
                $res = true;
            } else {
                $res = false;
            }

            $endtime = microtime(true);
            $timediff = $endtime - $starttime;

            return new ActualizarEstadoFormularioFisicoResponse($res, $timediff);
        } catch (\Throwable $e) {
            $endtime = microtime(true);
            $timediff = $endtime - $starttime;

            return new ActualizarEstadoFormularioFisicoResponse(
                false,
                $timediff,
                $e->getMessage()
            );
        }
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param string $document
     */
    public function setDocument($document)
    {
        $this->document = $document;
    }

    /**
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param string $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return string
     */
    public function getEntidad()
    {
        return $this->entidad;
    }

    /**
     * @param string $entidad
     */
    public function setEntidad($entidad)
    {
        $this->entidad = $entidad;
    }
}
