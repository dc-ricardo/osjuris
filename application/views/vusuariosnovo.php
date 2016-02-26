<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
      <h1 class="page-header">Novo Usuário</h1>

      <form class="form-group" action="<?=base_url()?>usuarios/insere" method="post">

        <?php
          if (validation_errors() == TRUE) {
            echo '<div class="row">';
            echo '<div class="col-md-4">';
            echo '<div class="alert alert-danger" role="alert">';
            echo validation_errors();
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }

          $vdc['nome'] = set_value('nome');
          $vdc['email'] = set_value('email');
          $vdc['nivel'] = set_value('nivel');
          $vdc['habilitado'] = set_value('habilitado');

          $niveis = unserialize(CNIVELUSUARIO);
        ?>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="nome_razao">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" value="<?=$vdc['nome'];?>" autofocus>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="nome_razao">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" value="<?=$vdc['email'];?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="nome_razao">Nível</label>
              <select class="form-control" id="tipo" name="nivel">
                <option value="<?=CNIVELOPERADOR?>" <?=set_select('nivel', '<?=CNIVELOPERADOR?>')?> <?=$vdc['nivel']==CNIVELOPERADOR?'selected':'';?>><?=$niveis[CNIVELOPERADOR]?></option>
                <option value="<?=CNIVELADVOGADO?>" <?=set_select('nivel', '<?=CNIVELADVOGADO?>')?> <?=$vdc['nivel']==CNIVELADVOGADO?'selected':'';?>><?=$niveis[CNIVELADVOGADO]?></option>
                <option value="<?=CNIVELCLIENTE?>" <?=set_select('nivel', '<?=CNIVELCLIENTE?>')?> <?=$vdc['nivel']==CNIVELCLIENTE?'selected':'';?>><?=$niveis[CNIVELCLIENTE]?></option>
                <option value="<?=CNIVELINTERESSADO?>" <?=set_select('nivel', '<?=CNIVELINTERESSADO?>')?> <?=$vdc['nivel']==CNIVELINTERESSADO?'selected':'';?>><?=$niveis[CNIVELINTERESSADO]?></option>
                <option value="<?=CNIVELADMINISTRADOR?>" <?=set_select('nivel', '<?=CNIVELADMINISTRADOR?>')?> <?=$vdc['nivel']==CNIVELADMINISTRADOR?'selected':'';?>><?=$niveis[CNIVELADMINISTRADOR]?></option>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="habilitado" name="habilitado" checked value="1"> Habilitado
                </label>
              </div>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary" name="submit" value="gravar">Inserir</button>

      </form>

    </div>
  </div>
</div>
