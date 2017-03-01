<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
      <h1 class="page-header">Edição de Pessoa</h1>

      <form class="form-group" action="<?=base_url('pessoas/atualiza/'.$pessoa[0]->id_pessoas);?>" method="post">

        <?php
          $vdc['nome_razao'] = set_value('nome_razao');
          $vdc['codigo'] = set_value('codigo');
          $vdc['tipo'] = set_value('tipo');
          $vdc['cpf_cnpj'] = set_value('cpf_cnpj');
          $vdc['rg_ie'] = set_value('rg_ie');
          $vdc['endereco'] = set_value('endereco');
          $vdc['numero'] = set_value('numero');
          $vdc['complemento'] = set_value('complemento');
          $vdc['bairro'] = set_value('bairro');
          $vdc['cidade'] = set_value('cidade');
          $vdc['estado'] = set_value('estado');
          $vdc['cep'] = set_value('cep');
          $vdc['telefone'] = set_value('telefone');
          $vdc['celular'] = set_value('celular');
          $vdc['email'] = set_value('email');
          $vdc['observacoes'] = set_value('observacoes');

          if (validation_errors() == TRUE) {
            echo '<div class="alert alert-danger" role="alert">';
            echo validation_errors();
            echo '</div>';

          }
          else {
            if (!isset($codigogerado) && !isset($ceplocalizado) && ($vdc['nome_razao'] == '')) {
              $vdc['nome_razao'] = $pessoa[0]->nome_razao;
              $vdc['codigo'] = $pessoa[0]->codigo;
              $vdc['tipo'] = $pessoa[0]->tipo;
              $vdc['cpf_cnpj'] = $pessoa[0]->cpf_cnpj;
              $vdc['rg_ie'] = $pessoa[0]->rg_ie;
              $vdc['endereco'] = $pessoa[0]->endereco;
              $vdc['numero'] = $pessoa[0]->numero;
              $vdc['complemento'] = $pessoa[0]->complemento;
              $vdc['bairro'] = $pessoa[0]->bairro;
              $vdc['cidade'] = $pessoa[0]->cidade;
              $vdc['estado'] = $pessoa[0]->estado;
              $vdc['cep'] = $pessoa[0]->cep;
              $vdc['telefone'] = $pessoa[0]->telefone;
              $vdc['celular'] = $pessoa[0]->celular;
              $vdc['email'] = $pessoa[0]->email;
              $vdc['observacoes'] = $pessoa[0]->observacoes;
            }
          }

          if (isset($codigogerado)) {
            $vdc['codigo'] = $codigogerado[0]->codigo;
          }

          if (isset($ceplocalizado)) {
            $vdc['endereco'] = $ceplocalizado['tipo_logradouro'].' '.$ceplocalizado['logradouro'];
            $vdc['bairro'] = $ceplocalizado['bairro'];
            $vdc['cidade'] = $ceplocalizado['cidade'];
            $vdc['estado'] = $ceplocalizado['uf'];
          }
        ?>

        <div class="form-group">
          <label for="nome_razao">Nome/Razão Social</label>
          <input type="text" class="form-control" id="nome_razao" name="nome_razao" value="<?=$vdc['nome_razao'];?>" autofocus>
        </div>

        <div class="row">
          <div class="col-md-3">
            <label for="codigo">Código</label>
            <div class="input-group">
              <input type="text" class="form-control" id="codigo" name="codigo" value="<?=$vdc['codigo'];?>">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-default" name="submit" value="gerar">
                  <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                </button>
              </span>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="tipo">Tipo</label>
              <select class="form-control" id="tipo" name="tipo">
                <?php $tipos = unserialize(CPESSOASTIPO);?>
                <option value="<?=CTIPOFISICA?>" <?=set_select('tipo', '<?=CTIPOFISICA?>')?> <?=$vdc['tipo']==CTIPOFISICA?'selected':'';?>><?=$tipos[CTIPOFISICA]?></option>
                <option value="<?=CTIPOJURIDICA?>" <?=set_select('tipo', '<?=CTIPOJURIDICA?>')?> <?=$vdc['tipo']==CTIPOJURIDICA?'selected':'';?>><?=$tipos[CTIPOJURIDICA]?></option>
                <option value="<?=CTIPOADVOGADO?>" <?=set_select('tipo', '<?=CTIPOADVOGADO?>')?> <?=$vdc['tipo']==CTIPOADVOGADO?'selected':'';?>><?=$tipos[CTIPOADVOGADO]?></option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="cpf_cnpj">CPF/CNPJ</label>
              <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value="<?=$vdc['cpf_cnpj'];?>">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="rg_ie">RG/Inscrição</label>
              <input type="text" class="form-control" id="rg_ie" name="rg_ie" value="<?=$vdc['rg_ie'];?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <label for="cep">CEP</label>
            <div class="input-group">
              <input type="text" class="form-control" id="cep" name="cep" value="<?=$vdc['cep'];?>">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-default" name="submit" value="buscarcep">
                  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
              </span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="endereco">Endereço</label>
              <input type="text" class="form-control" id="endereco" name="endereco" value="<?=$vdc['endereco'];?>">
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group">
              <label for="numero">Número</label>
              <input type="text" class="form-control" id="numero" name="numero" value="<?=$vdc['numero'];?>">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="complemento">Complemento</label>
              <input type="text" class="form-control" id="complemento" name="complemento" value="<?=$vdc['complemento'];?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label for="bairro">Bairro</label>
              <input type="text" class="form-control" id="bairro" name="bairro" value="<?=$vdc['bairro'];?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="cidade">Cidade</label>
              <input type="text" class="form-control" id="cidade" name="cidade" value="<?=$vdc['cidade'];?>">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="estado">Estado</label>
              <input type="text" class="form-control" id="estado" name="estado" value="<?=$vdc['estado'];?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="telefone">Telefone</label>
              <input type="text" class="form-control" id="telefone" name="telefone" value="<?=$vdc['telefone'];?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="celular">Celular</label>
              <input type="text" class="form-control" id="celular" name="celular" value="<?=$vdc['celular'];?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="text" class="form-control" id="email" name="email" value="<?=$vdc['email'];?>">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="observacoes">Observações</label>
          <textarea class="form-control" id="observacoes" name="observacoes"><?=$vdc['observacoes'];?></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="submit" value="gravar">Gravar</button>

      </form>

    </div>
  </div>
</div>
