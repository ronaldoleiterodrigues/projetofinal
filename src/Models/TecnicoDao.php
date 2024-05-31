<?php

namespace App\Models;
use PDO;
use PDOException;

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
        $query = " SELECT T.ID, T.NOME,T.DATA_NASCIMENTO,T.SEXO,T.DATA_INCLUSAO,T.ATIVO,T.DATA_EXCLUSAO,
                         C.NOME AS CBO, R.DESCRICAO AS RACA_COR
                    FROM TECNICO AS T INNER JOIN
                         CBO AS C ON (C.ID = T.CBO) INNER JOIN
                         RACA_COR R ON(R.ID = T.RACA_COR)
        ";
        try {
            $p = $this->banco->prepare($query);
            // echo "<pre>";var_dump($p); echo "<pre>";
            $ret = $p->execute();
            $this->banco = null;

            if (!$ret) {
                echo "Erro ao buscar dados no banco";
            } else {
                $retor = $p->fetchAll(PDO::FETCH_OBJ);
                return $retor;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // Este método lista apenas um usuario no banco de dados
    public function ObterUm($id)
    {
        return $this->ObterPorId('TECNICO', $id);
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
