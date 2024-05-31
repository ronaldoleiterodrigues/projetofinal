<?php

namespace App\Models;

class TecnicoDao extends Contexto
{
    function __construct()
    {
        // carrega a classe pai (Contexto) que é herdado por UsuarioDao
        parent::__construct();
    }

    // Este método lista todos os usuários cadastrados no banco de dados
    public function ListarTodos()
    {
        return $this->ObterTodos('TECNICO');
    }

    // Este método lista apenas um usuario no banco de dados
    public function ObterUm($id)
    {
        return $this->ObterPorId('TECNICO',$id);
    }

    // Este método adiciona um novo usuario no banco de dados
    function Adicionar($tecnico)
    {
        return $this->insert('TECNICO', $tecnico);
    }

    // Este método altera os dados de um usuários cadastrados no banco de dados
    function alterar($tecnico)
    {
        return $this->update('TECNICO', $tecnico);
    }

    // Este método exclui um usuários cadastrados no banco de dados
    function deletar($tecnico)
    {
        return $this->delete('TECNICO', $tecnico);
    } 
}
