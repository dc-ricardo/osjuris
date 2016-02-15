<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
      <h1 class="page-header">Novo Apenso</h1>

      <?=$dadosdoprocesso;?>

      <form class="form-group" action="<?=base_url('apensos/insere/'.$processo[0]->id_processos);?>" method="post">

        <?php
          $localizacaosel = set_value('localizacao');

          if (validation_errors() == TRUE) {
            echo '<div class="row">';
            echo '<div class="col-md-4">';
            echo '<div class="alert alert-danger" role="alert">';
            echo validation_errors();
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
        ?>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="numero_apenso">Número do Apenso</label>
              <input type="text" class="form-control" id="numero_apenso" name="numero_apenso" autofocus
                value="<?=set_value('numero_apenso');?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="data_apenso">Data (dd/mm/aaaa)</label>
              <input type="text" class="form-control" id="data_apenso" name="data_apenso"
                value="<?=set_value('data_apenso');?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="localizacao">Localização</label>
              <select class="form-control" id='localizacao' name='localizacao'>
              <?php
                foreach($localizacoes as $row) {
                  echo "<option value='$row->id_localizacoes'";
                  echo $localizacaosel==$row->id_localizacoes?'selected':'';
                  echo ">".$row->descricao."</option>";
                }
              ?>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <label for="descricao">Descrição</label>
              <textarea class="form-control" id="descricao" name="descricao"><?=set_value('descricao');?></textarea>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Inserir</button>

      </form>
    </div>
  </div>
</div>
