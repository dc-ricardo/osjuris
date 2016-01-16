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
                  <th>Cliente</th>
                  <th>Advogado</th>
                  <th>Comandos</th>
                </tr>
              </thead>
              <tbody>
                <!-- <?php foreach($processos as $row): ?>
                  <tr>
                    <td><?=$row->numero_processo;?></td>
                    <td><?=$row->numero_interno;?></td>
                    <td><?=$row->cliente;?></td>
                    <td><?=$row->advogado;?></td>

                    <td>
                      <a class="btn btn-default btn-xs" href="#">Consultar</a>
                      <a class="btn btn-default btn-xs" href="#">Editar</a>
                      <a class="btn btn-default btn-xs" href="#">Partes</a>
                      <a class="btn btn-default btn-xs" href="#">Advogados</a>
                      <a class="btn btn-default btn-xs" href="#">Interessados</a>
                    </td> -->

                    <!-- <td>
                      <a class="btn btn-default btn-xs" href="<?=base_url('pessoas/consulta/'.$pessoa->id_pessoas)?>">Consultar</a>
                      <a class="btn btn-default btn-xs" href="<?=base_url('pessoas/edita/'.$pessoa->id_pessoas)?>">Editar</a>
                      <a class="btn btn-default btn-xs" href="#">Processos</a>
                    </td> -->
                  <!-- </tr> -->
                <!-- <?php endforeach; ?> -->
              </tbody>
            </table>
          </div>

          <!-- <nav><?=$paginacao?></nav> -->

        </div>
      </div>

    </div>
  </div>
</div>
