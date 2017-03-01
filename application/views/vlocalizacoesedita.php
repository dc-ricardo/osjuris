<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

      <h1 class="page-header">Edita Localização</h1>

      <div class="row">

        <div class="col-md-6">

          <form class="form-group"
            action="<?=base_url('localizacoes/altera/'.$localizacao[0]->id_localizacoes);?>"
            method="post">

            <?php
              if (validation_errors() == TRUE) {
                echo '<div class="alert alert-danger" role="alert">';
                echo validation_errors();
                echo '</div>';
              }
            ?>

            <div class="panel panel-default">

              <div class="panel-heading">
                <h3 class="panel-title">Editar</h3>
              </div>

              <div class="panel-body">
                <div class="input-group">
                  <input type="text" class="form-control" id="descricao" name="descricao"
                    value="<?=$localizacao[0]->descricao?>" autofocus>
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary" name="submit">
                      <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                    </button>
                  </span>
                </div>
              </div>
            </div>

          </form>

        </div>

      </div>
    </div>
  </div>
</div>
