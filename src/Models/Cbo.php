<?php

namespace App\Models;

class Cbo
{
    private $id;
    private $nome;
    private $ativo;
    
    function __construct($id = null, $nome=null, $ativo=null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->ativo = $ativo;
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
