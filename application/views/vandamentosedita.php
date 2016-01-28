<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

      <h1 class="page-header">Edição do Andamento</h1>

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Dados do Processo</h3>
            </div>
            <div class="panel-body">
              <?=$processo[0]->numero_processo;?> |
              <?=$processo[0]->numero_interno;?> |
              <?=nice_date($processo[0]->data_abertura, 'd/m/Y');?> |
              <?=$processo[0]->localizacao;?>
            </div>
          </div>
        </div>
      </div>

      <form class="form-group" action="<?=base_url('andamentos/altera/'.$andamento[0]->id_processos.'/'.$andamento[0]->id_andamentos);?>" method="post">

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
              <input type="date" class="form-control" id="data_andamento" name="data_andamento"
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
