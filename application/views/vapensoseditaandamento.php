<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

      <h1 class="page-header">Edita Andamento do Apenso</h1>

      <?=$dadosdoprocesso;?>
      <?=$dadosdoapenso;?>

      <form class="form-group" action="<?=base_url('apensos/alteraandamento/'.$apenso[0]->id_processos.'/'.$apenso[0]->id_apensos.'/'.$andamento[0]->id_apensosand);?>" method="post">

        <?php
          if (validation_errors() == TRUE) {
            echo '<div class="row">';
            echo '<div class="col-md-12">';
            echo '<div class="alert alert-danger" role="alert">';
            echo validation_errors();
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
        ?>

        <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <label for="data_andamento">Data (dd/mm/aaaa)</label>
              <input type="text" class="form-control" id="data_andamento" name="data_andamento"
                value="<?=nice_date($andamento[0]->data_andamento, 'd/m/Y');?>">
            </div>
          </div>
          <div class="col-md-9">
            <div class="form-group">
              <label for="descricao">Descrição</label>
              <textarea class="form-control" id="descricao" name="descricao"><?=$andamento[0]->descricao;?></textarea>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group">
              <label for="visao">Interesse</label>

              <div class="radio">
                <label>
                  <input type="radio" name="interesse" id="publico" value="<?=CINTERESSEPUBLICO;?>"
                    <?=$andamento[0]->interesse==CINTERESSEPUBLICO?'checked':'';?>>
                  Público
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="interesse" id="privado" value="<?=CINTERESSEPRIVADO;?>"
                    <?=$andamento[0]->interesse==CINTERESSEPRIVADO?'checked':'';?>>
                  Privado
                </label>
              </div>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Gravar</button>

      </form>
    </div>
  </div>
</div>
