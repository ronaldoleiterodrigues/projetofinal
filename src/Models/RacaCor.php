<?php

namespace App\Models;

class RacaCor
{
    private $id;
    private $descricao;
    
    function __construct($id = null, $descricao=null) {
        $this->id = $id;
        $this->descricao = $descricao;
    }
    function get($atributo){
        return $this->$atributo;
    }

    function set($atributo, $valor){
        $this->$atributo = $valor;
    }

    function atributos($preenchidos = false){
        if (!$preenchidos) return array_keys(get_object_vars($this));

        return array_keys(array_filter(get_object_vars($this), function($value){ return $value != '';}));
    }
}
