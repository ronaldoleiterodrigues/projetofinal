<?php require_once 'Views/Shared/Header.php'; ?>
<div class="container">
    <?php
    $url = $_SERVER["REQUEST_URI"];
    $controle = str_replace('Controller', '', $_GET['controller']);
    $metodo   = $_GET['metodo'];
    ?>
    <!-- Menu Lateral -->
    <nav class="menu-lateral bg-teste box-2 ">
        <div class=" mg-b-3 bg-branco radius mg-t-1 pd-10">
            <div class="">
                <i class="fa-solid fa-handshake-angle fonte16 fnc-preto-1"></i>
                <span class="fonte12 fnc-preto-1 espaco-letra fonte-fredoca mg-l-1">
                    Olá <?php echo $_SESSION['nome'] ?>, seja bem vindo!
                </span>
            </div>
        </div>

        <ul class="mg-l-2">

            <li class="mg-b-1 pd-b-1">
                <i class="fa-solid fa-user-doctor fonte16 fnc-cinza-claro"></i>
                <a href="index.php?controller=TecnicoController&metodo=Listar" class="pd-10 fonte12 fnc-cinza-claro espaco-letra fonte-fredoca mg-l-1">Tecnico</a>
            </li>

            <li class="mg-b-1 pd-b-1">
                <i class="fa-solid fa-house-medical fonte16 fnc-cinza-claro"></i>
                <a href="index.php?controller=UsuarioController&metodo=Listar" class="pd-10 fonte12 fnc-cinza-claro espaco-letra fonte-fredoca mg-l-1">Unidade</a>
            </li>

            <li class="mg-b-1 pd-b-1">
                <i class="fa-solid fa-user-pen fonte16 fnc-cinza-claro"></i>
                <a href="index.php?controller=UsuarioController&metodo=Listar" class="pd-10 fonte12 fnc-cinza-claro espaco-letra fonte-fredoca mg-l-1">Usuario</a>
            </li>

            

            <li class="mg-b-1 pd-b-1">
                <i class="fa-solid fa-right-from-bracket fonte16 fnc-branco"></i>
                <a href="index.php?controller=UsuarioController&metodo=sair" class="pd-10 fonte12 fnc-branco espaco-letra fonte-fredoca mg-l-1">Logout</a>
            </li>

        </ul>

    </nav>

    <section class="box-10 bg-branco mg-t-1 shadow-down radius">
        <div class="box-12 bg-p3-paper limpar mg-b-4 mg-t-2 shadow-down">
            <ul class="flex justify-end">
                <li>
                    <i class="fa-solid fa-house fonte24 mg-r-1"></i>
                    <a href="index.php?controller=PainelController&metodo=Index" class="">
                        Home
                    </a>
                </li>
            </ul>
        </div>

        <?php
        require_once "Views/" . $controle . "/" . $metodo . ".php";
        ?>

        <?php

        if ($controle == "Painel" && $metodo == "Index") { ?>
            <section class="box-12">
                <header>
                    <div class="box-12 flex justify-between">                      

                    </div>
                </header>

                <article class="board mg-t-4 box-12">
                </article>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script type="text/javascript" src="lib/js/chart.js"></script>
            </section>
        <?php   } ?>
    </section>
</div>
<!--  Sessão destinada a cadastro  -->
<?php require_once 'Views/Shared/Footer.php'; ?>