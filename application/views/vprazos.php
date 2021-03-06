<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

      <h1 class="page-header">Prazos do Processo
        <div class="btn-group pull-right" role="group">
          <a class="btn btn-primary" href="<?=base_url()?>prazos/novo/<?=$processo[0]->id_processos;?>" role="button">Novo</a>
        </div>
      </h1>

      <?=$dadosdoprocesso;?>

      <div class="row">

        <div class="col-md-2">
          <h5><a href="#">A Vencer <span class="badge">0</span></a></h5>
          <h5><a href="#">Encerrados <span class="badge">0</span></a></h5>
          <h5><a href="#">Vencidos <span class="badge">0</span></a></h5>
          <h5><a href="#">Todos <span class="badge">0</span></a></h5>
        </div>

        <div class="col-md-10">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Data</th>
                  <th>Descrição</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($prazos as $row): ?>
                  <tr>
                    <td><a href="<?=base_url('prazos/consulta/'.$row->id_processos.'/'.$row->id_prazos);?>">
                      <?=nice_date($row->data_prazo, 'd/m/Y');?></a></td>
                    <td><?=$row->descricao;?></td>

                    <td style="white-space:nowrap">
                      <a class="btn btn-default btn-xs"
                        href="<?=base_url('prazos/edita/'.$row->id_processos.'/'.$row->id_prazos);?>">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Editar"></span></a>
                      <a class="btn btn-default btn-xs"
                        href="<?=base_url('prazos/exclui/'.$row->id_processos.'/'.$row->id_prazos);?>"
                        onclick="return confirm('Confirma exclusão desse Prazo?')">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Excluir"></span></a>
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
