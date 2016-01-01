<div class="container-fluid">
  <div class="row">
    <div class="col-sm-9 col-sm-offset-0 col-md-12 col-md-offset-0 main">
      <h1 class="page-header">Nova Pessoa</h1>

      <form class="form-group" action="<?=base_url()?>pessoas/insere" method="post">

        <?php if (validation_errors() == TRUE) {
          echo '<div class="alert alert-danger" role="alert">';
          echo validation_errors();
          echo '</div>';
        }?>

        <div class="row">
          <div class="col-md-3">
            <label for="codigo">Código</label>
            <div class="input-group">
              <input type="text" class="form-control" id="codigo" name="codigo" value="<?=set_value('codigo')?>">
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
                <option value="<?=PTIPO_FISICA?>" <?=set_select('tipo', '<?=PTIPO_FISICA?>')?>><?=$tipos[PTIPO_FISICA]?></option>
                <option value="<?=PTIPO_JURIDICA?>" <?=set_select('tipo', '<?=PTIPO_JURIDICA?>')?>><?=$tipos[PTIPO_JURIDICA]?></option>
                <option value="<?=PTIPO_ADVOGADO?>" <?=set_select('tipo', '<?=PTIPO_ADVOGADO?>')?>><?=$tipos[PTIPO_ADVOGADO]?></option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="cpf_cnpj">CPF/CNPJ</label>
              <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value="<?=set_value('cpf_cnpj')?>">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="rg_ie">RG/Inscrição</label>
              <input type="text" class="form-control" id="rg_ie" name="rg_ie" value="<?=set_value('rg_ie')?>">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="nome_razao">Nome/Razão Social</label>
          <input type="text" class="form-control" id="nome_razao" name="nome_razao" value="<?=set_value('nome_razao')?>">
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="endereco">Endereço</label>
              <input type="text" class="form-control" id="endereco" name="endereco" value="<?=set_value('endereco')?>">
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group">
              <label for="numero">Número</label>
              <input type="text" class="form-control" id="numero" name="numero" value="<?=set_value('numero')?>">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="complemento">Complemento</label>
              <input type="text" class="form-control" id="complemento" name="complemento" value="<?=set_value('complemento')?>">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="bairro">Bairro</label>
              <input type="text" class="form-control" id="bairro" name="bairro" value="<?=set_value('bairro')?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="cidade">Cidade</label>
              <input type="text" class="form-control" id="cidade" name="cidade" value="<?=set_value('cidade')?>">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="estado">Estado</label>
              <input type="text" class="form-control" id="estado" name="estado" value="<?=set_value('estado')?>">
            </div>
          </div>
          <div class="col-md-4">
            <label for="cep">CEP</label>
            <div class="input-group">
              <input type="text" class="form-control" id="cep" name="cep" value="<?=set_value('cep')?>">
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
              <input type="text" class="form-control" id="telefone" name="telefone" value="<?=set_value('telefone')?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="celular">Celular</label>
              <input type="text" class="form-control" id="celular" name="celular" value="<?=set_value('celular')?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="text" class="form-control" id="email" name="email" value="<?=set_value('email')?>">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="observacoes">Observações</label>
          <textarea class="form-control" id="observacoes" name="observacoes"><?=set_value('observacoes')?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Inserir</button>

      </form>

    </div>
  </div>
</div>
