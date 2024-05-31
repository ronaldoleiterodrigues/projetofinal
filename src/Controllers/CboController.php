<?php

namespace App\Controllers;

use App\Models\Cbo;
use App\Models\CboDao;
use App\Models\Notifications;


class TecnicoController extends Notifications
{

    // Função responsavel por buscar todos os usuários cadastrados no banco de dados

    public function Listar()
    {
        $cboDao = new CboDao();
        $ret = $cboDao->Listar();
        require_once "Views/Painel/Index.php";
    }

    // Função responsavel por validar os dados recebidos e definir se ira inserir ou alterar um usuário

    function Index()
    {
        $cboDao = new CboDao();
        $ret = $cboDao->Listar(); 
        $id = "";
        if ($_GET && isset($_GET['id'])) {
            $id = $_GET['id'];
            $obterUm = new CboDao();
            $return = $obterUm->ObterUm($id);
            require_once "Views/Painel/Index.php";
        }

        if ($_POST) {

            $dados = $_POST;
            if ($dados['id'] == '') {
                $this->Inserir($dados);
            } else {
                $this->Alterar($dados);
            }
        }

        $cboDao = new CboDao();
        $ret = $cboDao->Listar();

        if (is_string($ret)) {
            echo "<div class='alert alert-danger'>{$ret}</div>";
        }
        require_once "Views/Painel/Index.php";
    }

    // Função responsavel por inserir um usuário

    function inserir($dados)
    {
        // echo "<pre>";
        // var_dump($dados);
        // echo "</pre>";
        $cbo = new Cbo();
        foreach ($dados as $chave => $valor) {
            $cbo->set($chave, $valor);
        }
        $cboDao = new CboDao();
        $ret = $cboDao->Adicionar($cbo);
        echo $this->Success("Cbo", "Cadastrado", "Listar");
    }

    // função responsavel por validar a opção do usuário em excluir um usuário

    public function DeleteConfirm()
    {
        $id = [];
        if ($_GET) {
            $id = $_GET['id'];
        }
        echo $this->Confirm("Excluir", "Cbo", "", $id);

        require_once "Views/Shared/Header.php";
    }

    // Função responsavel por excluir um usuário

    public function Delete()
    {
        $id = [];
        $id = $_GET['id'];
        $cboDao = new CboDao();
        $ret = $cboDao->deletar($id);
        echo $this->Success("Cbo", "Excluido", "Listar");
        require_once "Views/Shared/Header.php";
    }

    // Função responsavel por alterar os dados de um usuário

    function alterar($dados)
    {
        $cbo = new Cbo();
        foreach ($dados as $chave => $valor) {
            $cbo->set($chave, $valor);
        }
        $cboDao = new CboDao();
        $ret = $cboDao->alterar($cbo);
        echo $this->Success("Cbo", "Alterado", "Listar");
    }
}
