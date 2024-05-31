    <div class="form-cad bg-branco pd-10 box-12">
    <div class="box-12 flex justify-start limpar">
        <div class="box-8">
            <?php if (isset($id) && $id != '') {
                echo "<h1 class='fonte32 fonte-roboto fw-300 mg-b-2'><i class='fas fa-user fonte30 fnc-azul mg-r-1'></i> Editar Usuário</h1>";
            } else {
                echo "<h1 class='fonte32 fonte-roboto fw-300 mg-b-2'><i class='fas fa-user fonte30 fnc-azul mg-r-1'></i> Cadastrar Usuário</h1>";
            }
            ?>
        </div>
    </div>
    <div class="divider limpar"></div>
        <form action="" method="POST">

            <div class="box-12"><input type="submit" value="Cadastrar" class="btn btn-borda-azul fnc-preto-1 fw-600"> </div>

        </form>
    </div>