<?php

namespace App\Models;

class Tecnico
{
    private $id;
    private $cbo;
    private $nome;
    private $data_nascimento;
    private $sexo;
    private $raca_cor;
    private $ativo; 
    private $data_inclusao;
    private $data_exclusao;
   
    
    function __construct($id = null, $nome=null, $data_nascimento=null, $sexo=null, $raca_cor=null, $ativo=null, $data_inclusao=null, $data_exclusao=null) {
        $this->id = $id;
        $this->cbo = [];
        $this->nome = $nome;
        $this->data_nascimento = $data_nascimento;
        $this->sexo = $sexo;
        $this->raca_cor = $raca_cor;
        $this->ativo = $ativo;
        $this->data_inclusao = $data_inclusao;
        $this->data_exclusao = $data_exclusao;
        
    }
    function get($atributo){
        return $this->$atributo;
    }

    function set($atributo, $valor){
        $this->$atributo = $valor;
    }

    function setCbo($nome){
        $this->cbo[] = new Cbo(null, $nome);
    }

    function atributos($preenchidos = false){
        if (!$preenchidos) return array_keys(get_object_vars($this));

        return array_keys(array_filter(get_object_vars($this), function($value){ return $value != '';}));
    }
}
