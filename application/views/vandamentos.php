<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

      <?php $interesse = unserialize(CINTERESSE);?>

      <h1 class="page-header">Andamentos
        <div class="btn-group pull-right" role="group">
          <a class="btn btn-primary" href="<?=base_url()?>andamentos/novo/<?=$processo[0]->id_processos;?>" role="button">Novo</a>
        </div>
      </h1>

      <?=$dadosdoprocesso;?>

      <div class="row">

        <div class="col-md-1">
          <h5><a href="#">Públicos <span class="badge">0</span></a></h5>
          <h5><a href="#">Privados <span class="badge">0</span></a></h5>
          <h5><a href="#">Todos <span class="badge">0</span></a></h5>
        </div>

        <div class="col-md-11">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Data</th>
                  <th>Descrição</th>
                  <th>Interesse</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($andamentos as $row): ?>
                  <tr>
                    <td><?=nice_date($row->data_andamento, 'd/m/Y');?></td>
                    <td><?=$row->descricao;?></td>
                    <td><?=$interesse[$row->interesse];?></td>

                    <td style="white-space:nowrap">
                      <a class="btn btn-default btn-xs"
                        href="<?=base_url('andamentos/edita/'.$row->id_processos.'/'.$row->id_andamentos);?>">Editar</a>
                      <a class="btn btn-default btn-xs"
                        href="<?=base_url('andamentos/exclui/'.$row->id_processos.'/'.$row->id_andamentos);?>"
                        onclick="return confirm('Confirma exclusão desse Andamento?')">Excluir</a>
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
