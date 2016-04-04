<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

      <h1 class="page-header">Apensos
        <div class="btn-group pull-right" role="group">
          <a class="btn btn-primary" href="<?=base_url()?>apensos/novo/<?=$processo[0]->id_processos;?>" role="button">Novo</a>
        </div>
      </h1>

      <?=$dadosdoprocesso;?>

      <div class="row">

        <div class="col-md-2">
          <h5><a href="#">Abertos <span class="badge">0</span></a></h5>
          <h5><a href="#">Ativos <span class="badge">0</span></a></h5>
          <h5><a href="#">Encerrados <span class="badge">0</span></a></h5>
        </div>

        <div class="col-md-10">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Número</th>
                  <th>Data</th>
                  <th>Localização</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($apensos as $row): ?>
                  <tr>
                    <td>
                      <a href="<?=base_url('apensos/consultaap/'.$row->id_processos.'/'.$row->id_apensos);?>">
                        <?=$row->numero_apenso;?></a>
                    </td>
                    <td><?=nice_date($row->data_apenso, 'd/m/Y');?></td>
                    <td><?=$row->localizacao;?></td>

                    <td>
                      <a class="btn btn-default btn-xs"
                        href="<?=base_url('apensos/edita/'.$row->id_processos.'/'.$row->id_apensos);?>">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Editar"></span></a>
                      <a class="btn btn-default btn-xs"
                        href="<?=base_url('apensos/andamentos/'.$row->id_processos.'/'.$row->id_apensos);?>">
                        <span class="glyphicon glyphicon-tag" aria-hidden="true" title="Andamentos"></span></a>
                    </td>

                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <!-- <nav><?=$paginacao?></nav> -->

        </div>
      </div>

    </div>
  </div>
</div>
