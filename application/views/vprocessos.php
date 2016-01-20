<div class="container-fluid">
  <div class="row">
    <div class="col-sm-9 col-sm-offset-0 col-md-12 col-md-offset-0 main">

      <h1 class="page-header">Processos
        <div class="btn-group pull-right" role="group">
          <a class="btn btn-primary" href="<?=base_url()?>processos/novo" role="button">Novo</a>
        </div>
      </h1>

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
                  <th>N. Processo</th>
                  <th>N. Interno</th>
                  <th>Data de Abertura</th>
                  <th>Localização</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($processos as $row): ?>
                  <tr>
                    <td><?=$row->numero_processo;?></td>
                    <td><?=$row->numero_interno;?></td>
                    <td><?=nice_date($row->data_abertura, 'd/m/Y');?></td>
                    <td><?=$row->localizacao;?></td>

                    <td>
                      <a class="btn btn-default btn-xs" href="<?=base_url('processos/consulta/'.$row->id_processos);?>">Consultar</a>
                      <a class="btn btn-default btn-xs" href="<?=base_url('processos/edita/'.$row->id_processos);?>">Editar</a>
                      <a class="btn btn-default btn-xs" href="<?=base_url('processos/partes/'.$row->id_processos);?>">Partes</a>
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
