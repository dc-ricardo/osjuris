<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

      <h1 class="page-header">Novo Prazo</h1>

      <?=$dadosdoprocesso;?>

      <form class="form-group" action="<?=base_url('prazos/insere/'.$processo[0]->id_processos);?>" method="post">

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
              <label for="data_prazo">Data (dd/mm/aaaa)</label>
              <input type="text" class="form-control" id="data_prazo" name="data_prazo"
                value="<?=set_value('data_prazo');?>">
            </div>
          </div>
          <div class="col-md-10">
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
