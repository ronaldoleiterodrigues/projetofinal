<?php

namespace App\Models;

use PDO;
use PDOException;

class Contexto
{
    protected $banco;

    protected function __construct()
    {
        $inf = "mysql:host=localhost:3307;dbname=projeto_final";
        try {
            $this->banco = new PDO($inf, "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // função responsavel por listar os objetos no banco de 
    protected function ObterTodos($tabela)
    {
        $sql = "SELECT * FROM {$tabela} ORDER BY ID DESC";
        try {
            $p = $this->banco->prepare($sql);
            $ret = $p->execute();
            $this->banco = null;

            if (!$ret) {
                echo "Erro ao buscar {$tabela}";
            } else {
                $retor = $p->fetchAll(PDO::FETCH_OBJ);
                return $retor;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // Obter dados com join
    // protected function ObterComJoin($tabela,$tabela2, $tabela3, $join, $join2)
    // {
    //     $sql = "SELECT * 
    //               FROM {$tabela} INNER JOIN 
    //                     {$tabela2} ON({$tabela2}.ID = {$tabela}.{$join})";
    //         if($tabela3 <> ""){
    //             $sql = $sql."INNER JOIN
    //             {$tabela3} ON({$tabela3}.ID = {$tabela}.{$join2}) ";
    //         }
    //     try {
    //         $p = $this->banco->prepare($sql);
    //         // echo "<pre>";var_dump($p); echo "<pre>";
    //         $ret = $p->execute();
    //         $this->banco = null;

    //         if (!$ret) {
    //             echo "Erro ao buscar {$tabela}";
    //         } else {
    //             $retor = $p->fetchAll(PDO::FETCH_OBJ);
    //             return $retor;
    //         }
    //     } catch (PDOException $e) {
    //         die($e->getMessage());
    //     }
    // }
    // função responsavel por obter um dado por id
    protected function ObterPorId($tabela, $id)
    {
        $sql = "SELECT * FROM {$tabela} WHERE ID = ?";
        try {
            $p = $this->banco->prepare($sql);
            $p->bindValue(1, $id);
            $ret = $p->execute();
            $this->banco = null;

            if (!$ret) {
                echo "Erro ao buscar {$tabela}";
            } else {
                $retor = $p->fetchAll(PDO::FETCH_OBJ);
                return $retor;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    // função responsavel por obter um dado pelo código
    protected function ObterPorCodigo($tabela, $codigo)
    {
        $sql = "SELECT * FROM {$tabela} WHERE CODIGO = ?";
        try {
            $p = $this->banco->prepare($sql);
            $p->bindParam(1, $codigo);
            $ret = $p->execute();
            $this->banco = null;

            if (!$ret) {
                echo "Erro ao buscar {$tabela}";
            } else {
                $retor = $p->fetchAll(PDO::FETCH_OBJ);
                return $retor;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // função responsavel por cadastrar os objetos no banco de dados

    protected function insert($tabela, $objeto)
    {
        $atributos = $objeto->atributos();
        $sql = "INSERT INTO {$tabela}(" . implode(',', array_slice($atributos, 1)) . ") 
                        VALUES(" . implode(',', array_fill(0, (count($atributos) - 1), '?')) . ")";

        try {
            $stmt = $this->banco->prepare($sql);
            foreach (array_slice($atributos, 1) as $x => $atributo) {
                $stmt->bindValue(($x + 1), $objeto->get($atributo));
            }
            // var_dump($stmt);
            $ret = $stmt->execute();
            $id = $this->banco->lastInsertId();
            $this->banco = null;

            if (!$ret) {
                echo "Erro ao inserir dados";
            } else {
                var_dump($ret);
                return $id;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // função responsavel por Atualizar os objetos no banco de dados

    protected function update($tabela, $objeto)
    {
        $atributos = $objeto->atributos(true);
        $sql = "UPDATE {$tabela} SET " . implode(',', preg_filter('/$/', '=?', array_slice($atributos, 1))) . " 
                        WHERE id = ?";

        try {
            $stmt = $this->banco->prepare($sql);
            $i = 1;
            foreach (array_slice($atributos, 1) as $atributo) {
                $stmt->bindValue($i, $objeto->get($atributo));
                $i++;
            }
            $stmt->bindValue($i, $objeto->get('id'));
            $ret = $stmt->execute();
            $this->banco = null;

            if (!$ret) {
                echo "Erro ao alterar dados";
            } else {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // função responsavel por excluir dados no banco de dados

    protected function delete($tabela, $id)
    {
        $sql = "DELETE FROM {$tabela}  WHERE id = ? LIMIT 1";

        try {
            $stmt = $this->banco->prepare($sql);
            $stmt->bindValue(1, $id);
            $ret = $stmt->execute();
            $this->banco = null;

            if (!$ret) {
                echo "Erro ao apagar dados";
            } else {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    // função responsavel por obter o ultimo registro inserido e uma tabela
    protected function UltimoRegistro($tabela, $campo)
    {
        $sql = "SELECT MAX({$campo}) AS ULTIMO FROM {$tabela}";

        try {
            $p = $this->banco->prepare($sql);
            $ret = $p->execute();
            $this->banco = null;

            if (!$ret) {
                echo "Erro ao buscar {$tabela}";
            } else {
                $retor = $p->fetchAll(PDO::FETCH_OBJ);
                return $retor;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
