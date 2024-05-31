<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\UsuarioDao;
use App\Models\Notifications;

class BaseController extends Notifications
{
    // Função responsavel por validar o acesso dos usuários ao sistema.

    public function Login()
    {
        require_once "Views/Home/Home.php";
        if ($_POST) {
            $s = "";
            $usu = $_POST["usuario"];
            $password = $_POST["senha"];
            $usuarioDAO = new UsuarioDao();
            $ret = $usuarioDAO->autenticar($usu);
            if (count($ret) > 0) $s = $ret[0]->SENHA;
            if (password_verify($password, $s) && count($ret) > 0) {
                $_SESSION["permissao"] = -1;
                $_SESSION["id"] = $ret[0]->ID;
                $_SESSION["nome"] = $ret[0]->NOME;
                $_SESSION["imagem"] = $ret[0]->IMAGEM;
                header("Location:index.php?controller=PainelController&metodo=Index");
            } else {
                echo $this->LoginError();
            }
        }
    }
}