<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
      <h1 class="page-header">Dashboard</h1>

      <div class="row">

        <div class="col-md-12">

          <div class="row">
            <div class="col-md-4">
              <div class="jumbotron">
                <h4 align="center">Prazos</h4>
                <h2 align="center">12</h2>
              </div>
            </div>
            <div class="col-md-4">
              <div class="jumbotron">
                <h4 align="center">Alertas</h4>
                <h2 align="center">12</h2>
              </div>
            </div>
            <div class="col-md-4">
              <div class="jumbotron">
                <h4 align="center">Parados</h4>
                <h2 align="center">12</h2>
              </div>
            </div>
          </div>

          <!-- Prazos -->
          <div class="panel panel-danger">
            <div class="panel-heading">Prazos</div>
            <!-- <div class="panel-body"> -->
            <!-- </div> -->

            <table class="table">
              <thead>
                <tr>
                  <th>Data</th>
                  <th>Descrição</th>
                  <th>Processo</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($prazos as $row): ?>
                  <tr>
                    <td><?=nice_date($row->data_prazo, 'd-m-Y');?></td>
                    <td><?=$row->prazos_descricao;?></td>
                    <td><a href="<?=base_url('processos/consulta/'.$row->id_processos);?>"><?=$row->numero_interno;?></a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <!-- Processos -->
          <div class="panel panel-info">
            <div class="panel-heading">Processos com alertas</div>
            <!-- <div class="panel-body">
            </div> -->

            <table class="table">
              <thead>
                <tr>
                  <th>N. Processo</th>
                  <th>N. Interno</th>
                  <th>Data de Abertura</th>
                  <th>Descrição</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($processos as $row): ?>
                  <tr>
                    <td><a href="<?=base_url('processos/consulta/'.$row->id_processos);?>"><?=$row->numero_processo;?></a></td>
                    <td><?=$row->numero_interno;?></td>
                    <td><?=nice_date($row->data_abertura, 'd/m/Y');?></td>
                    <td><?=$row->descricao;?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <!-- Processos Parados -->
          <div class="panel panel-warning">
            <div class="panel-heading">Processos parados</div>
            <!-- <div class="panel-body">
            </div> -->

            <table class="table">
              <thead>
                <tr>
                  <th>N. Processo</th>
                  <th>N. Interno</th>
                  <th>Data de Abertura</th>
                  <th>Descrição</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($parados as $row): ?>
                  <tr>
                    <td><a href="<?=base_url('processos/consulta/'.$row->id_processos);?>"><?=$row->numero_processo;?></a></td>
                    <td><?=$row->numero_interno;?></td>
                    <td><?=nice_date($row->data_abertura, 'd/m/Y');?></td>
                    <td><?=$row->descricao;?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>
