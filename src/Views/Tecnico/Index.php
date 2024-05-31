    <div class="form-cad bg-branco pd-10 box-12">
    <div class="box-12 flex justify-start limpar">
        <div class="box-8">
            <?php if (isset($id) && $id != '') {
                echo "<h1 class='fonte32 fonte-roboto fw-300 mg-b-2'><i class='fas fa-user fonte30 fnc-azul mg-r-1'></i> Editar Tecnico</h1>";
            } else {
                echo "<h1 class='fonte32 fonte-roboto fw-300 mg-b-2'><i class='fas fa-user fonte30 fnc-azul mg-r-1'></i> Cadastrar Tecnico</h1>";
            }
            ?>
        </div>
    </div>
    <div class="divider limpar"></div>
        <form action="" method="POST">

            <div class="box-12">
                <input type="hidden" name="id" value="<?php if (isset($id) && $id != '') echo $return[0]->ID; ?>"  />
                <input type="hidden" name="ativo" value="<?php if (isset($id) && $id != '') echo $return[0]->ATIVO;
                                                            else echo '1'; ?>" >
          
          <input type="hidden" name="data_inclusao" value="<?php echo date('Y-m-d H:i:s')?>" >   
        <input type="hidden" name="data_exclusao" value="00-00-0000 00:00:00">    
        </div>

            <div class="box-6">
                <label for="">Nome Completo</label>
                <input type="text" name="nome" value="<?php if (isset($id) && $id != '') echo $return[0]->NOME; ?>" required>
            </div>

            <div class="box-6">
                <label for="">Data Nascimento</label>
                <input type="date" name="data_nascimento" onkeypress="formata_mascara(this, '##-##-####')" value="<?php if (isset($id) && $id != '') echo $return[0]->DATA_NASCIMENTO; ?>" required>
            </div> 
<!-- Tipo profissão -->
            <div class="box-6">
                <label for="">Tipo Profissão</label>
                <select name="cbo" id="" class="">
                    <?php
                    if($id == ''){echo "<option value='' selected> Escolha uma opção... </option>";}
                    if (isset($tpp) && count($tpp) > 0) {
                        
                        foreach ($tpp as $dados) {
                            if (isset($id) && $id != '' && $return[0]->CBO == $dados->ID) {
                                echo "<option value='{$dados->ID}' selected>" . $Formater->formataTextoCap($dados->NOME) . " </option>";
                            } else {
                                echo "<option value='{$dados->ID}'>" . $Formater->formataTextoCap($dados->NOME) . " </option>";
                            }
                        }
                    }
                    ?>
                </select>
            </div>
<!-- raça e cor  -->
            <div class="box-6">
                <label for="">Cor da pele</label>
                <select name="raca_cor" id="" class="">
                    <option value="">Escoha uma opção...</option>
                    <option value="1">Branco</option>
                    <option value="2">Negro</option>
                    <option value="3">Pardo</option>
                </select>
            </div>

            <!-- sexo -->

            <div class="sexo box-12 mg-t-2 mg-b-2 pd-20 bg-p3-paper">
                <label>Sexo: </label>
                <div class="flex">
                    <?php if (isset($id) && $id != "") { ?>
                        <span class="fonte-poppin fonte16 espaco-letra"> Masculino: </span> <input type="radio" name="sexo" value="M" class="fnc-cinza" />
                        <span class="fonte-poppin fonte16 espaco-letra"> Feminino: </span> <input type="radio" name="sexo" value="F" class="fnc-cinza" />
                    <?php } else { ?>
                        <span class="fonte-poppin fonte16 espaco-letra"> Masculino: </span> <input type="radio" name="sexo" value="M" class="fnc-cinza" />
                        <span class="fonte-poppin fonte16 espaco-letra"> Feminino: </span> <input type="radio" name="sexo" value="F" class="fnc-cinza" />
                    <?php } ?>
                </div>
            </div> 
            
            <div class="box-12"><input type="submit" value="Cadastrar" class="btn btn-borda-azul fnc-preto-1 fw-600"> </div>

        </form>
    </div>