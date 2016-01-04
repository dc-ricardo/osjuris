<div class="container-fluid">
  <div class="row">
    <div class="col-sm-9 col-sm-offset-0 col-md-12 col-md-offset-0 main">
      <h1 class="page-header">Edição de Pessoa</h1>

      <form class="form-group" action="<?=base_url('pessoas/atualiza/'.$pessoa[0]->id_pessoas);?>" method="post">

        <?php if (validation_errors() == TRUE) {
          echo '<div class="alert alert-danger" role="alert">';
          echo validation_errors();
          echo '</div>';
        }?>

        <div class="form-group">
          <label for="nome_razao">Nome/Razão Social</label>
          <input type="text" class="form-control" id="nome_razao" name="nome_razao" value="<?=$pessoa[0]->nome_razao;?>">
        </div>

        <div class="row">
          <div class="col-md-3">
            <label for="codigo">Código</label>
            <div class="input-group">
              <input type="text" class="form-control" id="codigo" name="codigo" value="<?=$pessoa[0]->codigo;?>">
              <span class="input-group-btn">
                <button type="button" class="btn btn-default">Gerar</button>
              </span>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="tipo">Tipo</label>
              <select class="form-control" id="tipo" name="tipo">
                <?php $tipos = unserialize(PESSOAS_TIPO);?>
                <h4><?=$tipos[$pessoa[0]->tipo]?></h4>
                <option value="<?=PTIPO_FISICA?>" <?=set_select('tipo', '<?=PTIPO_FISICA?>')?> <?=$pessoa[0]->tipo==PTIPO_FISICA?'selected':'';?>><?=$tipos[PTIPO_FISICA]?></option>
                <option value="<?=PTIPO_JURIDICA?>" <?=set_select('tipo', '<?=PTIPO_JURIDICA?>')?> <?=$pessoa[0]->tipo==PTIPO_JURIDICA?'selected':'';?>><?=$tipos[PTIPO_JURIDICA]?></option>
                <option value="<?=PTIPO_ADVOGADO?>" <?=set_select('tipo', '<?=PTIPO_ADVOGADO?>')?> <?=$pessoa[0]->tipo==PTIPO_ADVOGADO?'selected':'';?>><?=$tipos[PTIPO_ADVOGADO]?></option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="cpf_cnpj">CPF/CNPJ</label>
              <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value="<?=$pessoa[0]->cpf_cnpj;?>">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="rg_ie">RG/Inscrição</label>
              <input type="text" class="form-control" id="rg_ie" name="rg_ie" value="<?=$pessoa[0]->rg_ie;?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="endereco">Endereço</label>
              <input type="text" class="form-control" id="endereco" name="endereco" value="<?=$pessoa[0]->endereco;?>">
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group">
              <label for="numero">Número</label>
              <input type="text" class="form-control" id="numero" name="numero" value="<?=$pessoa[0]->numero;?>">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="complemento">Complemento</label>
              <input type="text" class="form-control" id="complemento" name="complemento" value="<?=$pessoa[0]->complemento;?>">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="bairro">Bairro</label>
              <input type="text" class="form-control" id="bairro" name="bairro" value="<?=$pessoa[0]->bairro;?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="cidade">Cidade</label>
              <input type="text" class="form-control" id="cidade" name="cidade" value="<?=$pessoa[0]->cidade;?>">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="estado">Estado</label>
              <input type="text" class="form-control" id="estado" name="estado" value="<?=$pessoa[0]->estado;?>">
            </div>
          </div>
          <div class="col-md-4">
            <label for="cep">CEP</label>
            <div class="input-group">
              <input type="text" class="form-control" id="cep" name="cep" value="<?=$pessoa[0]->cep;?>">
              <span class="input-group-btn">
                <button type="button" class="btn btn-default">Buscar</button>
              </span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="telefone">Telefone</label>
              <input type="text" class="form-control" id="telefone" name="telefone" value="<?=$pessoa[0]->telefone;?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="celular">Celular</label>
              <input type="text" class="form-control" id="celular" name="celular" value="<?=$pessoa[0]->celular;?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="text" class="form-control" id="email" name="email" value="<?=$pessoa[0]->email;?>">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="observacoes">Observações</label>
          <textarea class="form-control" id="observacoes" name="observacoes"><?=$pessoa[0]->observacoes;?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Gravar</button>

      </form>

    </div>
  </div>
</div>