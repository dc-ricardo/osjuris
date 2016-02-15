<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
      <h1 class="page-header">Edição do Apenso</h1>

      <?=$dadosdoprocesso;?>

      <form class="form-group" action="<?=base_url('apensos/altera/'.$apenso[0]->id_processos.'/'.$apenso[0]->id_apensos);?>" method="post">

        <?php
          // valor dos campos do banco
          $vdc['numero_apenso'] = $apenso[0]->numero_apenso;
          $vdc['data_apenso'] = $apenso[0]->data_apenso;
          $vdc['localizacao'] = $apenso[0]->id_localizacoes;
          $vdc['descricao'] = $apenso[0]->descricao;

          if (validation_errors() == TRUE) {
            echo '<div class="row">';
            echo '<div class="col-md-4">';
            echo '<div class="alert alert-danger" role="alert">';
            echo validation_errors();
            echo '</div>';
            echo '</div>';
            echo '</div>';

            // mantém valos dos campos editados em caso de erro de validação
            $vdc['numero_apenso'] = set_value('numero_processo');
            $vdc['data_apenso'] = set_value('numero_interno');
            $vdc['localizacao'] = set_value('localizacao');
            $vdc['descricao'] = set_value('descricao');
          }
        ?>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="numero_apenso">Número do Apenso</label>
              <input type="text" class="form-control" id="numero_apenso" name="numero_apenso" autofocus
                value="<?=$vdc['numero_apenso'];?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="data_apenso">Data (dd/mm/aaaa)</label>
              <input type="text" class="form-control" id="data_apenso" name="data_apenso"
                value="<?=nice_date($vdc['data_apenso'], 'd/m/Y');?>">
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="localizacao">Localização</label>
              <select class="form-control" id='localizacao' name='localizacao'>
                <?php
                  foreach($localizacoes as $row) {
                    echo "<option value='$row->id_localizacoes'";
                    echo $vdc['localizacao']==$row->id_localizacoes?'selected':'';
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
              <textarea class="form-control" id="descricao" name="descricao"><?=$vdc['descricao'];?></textarea>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Gravar</button>

      </form>
    </div>
  </div>
</div>
