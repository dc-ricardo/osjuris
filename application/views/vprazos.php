<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

      <!-- <?php $interesse = unserialize(CINTERESSE);?> -->

      <h1 class="page-header">Prazos
        <div class="btn-group pull-right" role="group">
          <a class="btn btn-primary" href="<?=base_url()?>prazos/novo/<?=$processo[0]->id_processos;?>" role="button">Novo</a>
        </div>
      </h1>

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Dados do Processo</h3>
            </div>
            <div class="panel-body">
              <?=$processo[0]->numero_processo;?> |
              <?=$processo[0]->numero_interno;?> |
              <?=nice_date($processo[0]->data_abertura, 'd/m/Y');?> |
              <?=$processo[0]->localizacao;?>
            </div>
          </div>
        </div>
      </div>

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
                    <td><?=nice_date($row->data_prazo, 'd/m/Y');?></td>
                    <td><?=$row->descricao;?></td>

                    <td style="white-space:nowrap">
                      <a class="btn btn-default btn-xs"
                        href="<?=base_url('prazos/edita/'.$row->id_processos.'/'.$row->id_prazos);?>">Editar</a>
                      <a class="btn btn-default btn-xs"
                        href="<?=base_url('prazos/exclui/'.$row->id_processos.'/'.$row->id_prazos);?>"
                        onclick="return confirm('Confirma exclusão desse Prazo?')">Excluir</a>
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
