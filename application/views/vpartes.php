<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
      <h1 class="page-header">Partes do Processo</h1>

      <?=$dadosdoprocesso;?>

      <?php
        if (validation_errors() == TRUE) {
          echo '<div class="alert alert-danger" role="alert">';
          echo validation_errors();
          echo '</div>';
        }
      ?>

      <form class="form-group"
        action="<?=base_url('processos/insereparte/'.$processo[0]->id_processos);?>" method="post">

        <div class="row">

          <div class="col-md-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Autores</h3>
              </div>

              <div class="panel-body">
                <div class="input-group">
                  <input type="text" class="form-control" id="autor" name="autor">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary" name="submit" value="autor">
                      <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                    </button>
                  </span>
                </div>

                <div class="table-responsive">
                  <table class="table table-hover">
                    <?php foreach($autores as $autor): ?>
                      <tr>
                        <td width="100%"><?= $autor->nome_razao;?></td>
                        <td>
                          <a class="glyphicon glyphicon-trash" aria-hidden="true"
                            href="<?=base_url('processos/removeparte/'.$processo[0]->id_processos.'/'
                              .$autor->id_partes)?>"></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </table>
                </div>

              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Réus</h3>
              </div>

              <div class="panel-body">
                <div class="input-group">
                  <input type="text" class="form-control" id="reu" name="reu">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary" name="submit" value="reu">
                      <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                    </button>
                  </span>
                </div>

                <div class="table-responsive">
                  <table class="table table-hover">
                    <?php foreach($reus as $reu): ?>
                      <tr>
                        <td width="100%"><?= $reu->nome_razao;?></td>
                        <td>
                          <a class="glyphicon glyphicon-trash" aria-hidden="true"
                            href="<?=base_url('processos/removeparte/'.$processo[0]->id_processos.'/'
                              .$reu->id_partes)?>"></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Advogados</h3>
              </div>

              <div class="panel-body">
                <div class="input-group">
                  <input type="text" class="form-control" id="advogado" name="advogado">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary" name="submit" value="advogado">
                      <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                    </button>
                  </span>
                </div>

                <div class="table-responsive">
                  <table class="table table-hover">
                    <?php foreach($advogados as $advogado): ?>
                      <tr>
                        <td width="100%"><?= $advogado->nome_razao;?></td>
                        <td>
                          <a class="glyphicon glyphicon-trash" aria-hidden="true"
                            href="<?=base_url('processos/removeparte/'.$processo[0]->id_processos.'/'
                              .$advogado->id_partes)?>"></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Interessados</h3>
              </div>

              <div class="panel-body">
                <div class="input-group">
                  <input type="text" class="form-control" id="interessado" name="interessado">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary" name="submit" value="interessado">
                      <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                    </button>
                  </span>
                </div>

                <div class="table-responsive">
                  <table class="table table-hover">
                    <?php foreach($interessados as $interessado): ?>
                      <tr>
                        <td width="100%"><?= $interessado->nome_razao;?></td>
                        <td>
                          <a class="glyphicon glyphicon-trash" aria-hidden="true"
                            href="<?=base_url('processos/removeparte/'.$processo[0]->id_processos.'/'
                              .$interessado->id_partes)?>"></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>
      </form>

    </div>
  </div>
</div>
