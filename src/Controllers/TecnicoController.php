<?php

namespace App\Controllers;

use App\Models\Tecnico;
use App\Models\TecnicoDao;
use App\Models\CboDao;
use App\Models\RacaCorDao;
use App\Models\Notifications;


class TecnicoController extends Notifications
{

    // Função responsavel por buscar todos os usuários cadastrados no banco de dados

    public function Listar()
    {
        $tecDao = new TecnicoDao();
        $ret = $tecDao->ListarTodos();
        require_once "Views/Painel/Index.php";
    }

    // Função responsavel por validar os dados recebidos e definir se ira inserir ou alterar um usuário

    function Index()
    {
        $TppDao = new CboDao();
        $tpp = $TppDao->listar();

        $rcDao = new RacaCorDao();
        $rc = $rcDao->listarTodos();

        $id = "";
        if ($_GET && isset($_GET['id'])) {
            $id = $_GET['id'];
            $obterUm = new TecnicoDao();
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

        $tecDao = new TecnicoDao();
        $ret = $tecDao->ListarTodos();

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
        
        $tecnico = new Tecnico();
        foreach ($dados as $chave => $valor) {
            $tecnico->set($chave, $valor);
        }
        $tecDao = new TecnicoDao();
        $ret = $tecDao->Adicionar($tecnico);
        echo $this->Success("Tecnico", "Cadastrado", "Listar");
    }

    // função responsavel por validar a opção do usuário em excluir um usuário

    public function DeleteConfirm()
    {
        $id = [];
        if ($_GET) {
            $id = $_GET['id'];
        }
        echo $this->Confirm("Excluir", "Tecnico", "", $id);

        require_once "Views/Shared/Header.php";
    }

    // Função responsavel por excluir um usuário

    public function Delete()
    {
        $id = [];
        $id = $_GET['id'];
        $tecDao = new TecnicoDao();
        $ret = $tecDao->deletar($id);
        echo $this->Success("Tecnico", "Excluido", "Listar");
        require_once "Views/Shared/Header.php";
    }

    // Função responsavel por alterar os dados de um usuário

    function alterar($dados)
    {
        $tecnico = new Tecnico();
        foreach ($dados as $chave => $valor) {
            $tecnico->set($chave, $valor);
        }
        $tecnicoDao = new TecnicoDao();
        $ret = $tecnicoDao->alterar($tecnico);
        echo $this->Success("Tecnico", "Alterado", "Listar");
    }
}
