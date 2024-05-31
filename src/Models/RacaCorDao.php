<?php

namespace App\Models;

class RacaCorDao extends Contexto
{
    function __construct() {
        parent::__construct();
    }

    public function listarTodos(){
        return $this->ObterTodos('RACA_COR');
    }
     // Este método lista apenas um usuario no banco de dados
     public function ObterUm($id)
     {
         return $this->ObterPorId('RACA_COR',$id);
     }
 
     // Este método adiciona um novo usuario no banco de dados
     function Adicionar($tecnico)
     {
         return $this->insert('RACA_COR', $tecnico);
     }
 
     // Este método altera os dados de um usuários cadastrados no banco de dados
     function alterar($tecnico)
     {
         return $this->update('RACA_COR', $tecnico);
     }
 
     // Este método exclui um usuários cadastrados no banco de dados
     function deletar($tecnico)
     {
         return $this->delete('RACA_COR', $tecnico);
     } 
}
