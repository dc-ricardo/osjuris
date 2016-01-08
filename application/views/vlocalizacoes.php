<div class="container-fluid">
  <div class="row">
    <div class="col-sm-9 col-sm-offset-0 col-md-12 col-md-offset-0 main">

      <h1 class="page-header">Localizações</h1>

      <?php
        if (isset($editar)) {
          $vdc['descricao'] = $editar[0]->descricao;
          $focoins = '';
          $focoedt = 'autofocus';
          $id = $editar[0]->id_localizacoes;
        }
        else {
          $vdc['descricao'] = '';
          $focoins = 'autofocus';
          $focoedt = '';
          $id = '';
        }
      ?>

      <div class="row">

        <div class="col-md-6">

          <div class="panel panel-default">
            <div class="panel-body">

              <div class="table-responsive">
                <table class="table table-hover">
                  <?php foreach($localizacoes as $localizacao): ?>
                    <tr>
                      <td><?= $localizacao->descricao;?></td>
                      <td>
                        <a class="glyphicon glyphicon-edit" aria-hidden="true"
                          href="<?=base_url('localizacoes/edita/'.$localizacao->id_localizacoes)?>"></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </table>
              </div>

            </div>
          </div>
        </div>

        <div class="col-md-6">

          <form class="form-group" action="<?=base_url('localizacoes/grava/'.$id);?>" method="post">

            <div class="panel panel-default">

              <div class="panel-heading">
                <h3 class="panel-title">Nova</h3>
              </div>

              <div class="panel-body">
                <input type="text" class="form-control" id="nlocalizacao" name="nlocalizacao" <?=$focoins;?>>
              </div>
            </div>

            <div class="panel panel-default">

              <div class="panel-heading">
                <h3 class="panel-title">Editar</h3>
              </div>

              <div class="panel-body">
                <input type="text" class="form-control" id="elocalizacao"
                  name="elocalizacao" value="<?=$vdc['descricao'];?>" <?=$focoedt;?>>
              </div>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Gravar</button>

          </form>

        </div>

      </div>
    </div>
  </div>
</div>
