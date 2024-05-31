<?php

namespace App\Models;

class CboDao extends Contexto
{
    function __construct() {
        parent::__construct();
    }

    public function listar(){
        return $this->ObterTodos('CBO');
    }
     // Este método lista apenas um usuario no banco de dados
     public function ObterUm($id)
     {
         return $this->ObterPorId('CBO',$id);
     }
 
     // Este método adiciona um novo usuario no banco de dados
     function Adicionar($tecnico)
     {
         return $this->insert('CBO', $tecnico);
     }
 
     // Este método altera os dados de um usuários cadastrados no banco de dados
     function alterar($tecnico)
     {
         return $this->update('CBO', $tecnico);
     }
 
     // Este método exclui um usuários cadastrados no banco de dados
     function deletar($tecnico)
     {
         return $this->delete('CBO', $tecnico);
     } 
}
