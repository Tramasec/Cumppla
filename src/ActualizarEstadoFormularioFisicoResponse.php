<?php
namespace Cumppla;

class ActualizarEstadoFormularioFisicoResponse
{
    public $uploaded = false;
    public $responseTime = 0;
    public $error = '';

    public function __construct($uploaded, $responseTime, $error = '')
    {
        $this->uploaded = $uploaded;
        $this->responseTime = $responseTime;
        $this->error = $error;
    }
}
