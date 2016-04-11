<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

      <?php $posicoes = unserialize(CPOSPRO);?>

      <div class="row">

        <div class="col-md-2">
          <h1 class="page-header">Processos</h1>
        </div>

        <div class="col-md-4">
          <form class="form-group" action="<?=base_url('processos/localiza');?>" method="post">
            <div class="input-group">
              <input type="text" class="form-control" id="conteudo" name="conteudo" placeholder="localizar por número do processo/interno...">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-default" name="submit" value="localizapessoa">
                  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
              </span>
            </div>
          </form>
        </div>

        <div class="col-md-6">
          <div class="btn-group pull-right" role="group">
            <a class="btn btn-primary" href="<?=base_url()?>processos/novo" role="button">Novo</a>
          </div>
        </div>

      </div>

      <div class="row">

        <div class="col-md-2">
          <h5><a href="<?=base_url('processos/consultatodos');?>">Todos <span class="badge"><?=$todos;?></span></a></h5>
          <h5><a href="<?=base_url('processos/consultaabertos');?>">Abertos <span class="badge"><?=$abertos;?></span></a></h5>
          <h5><a href="<?=base_url('processos/consultaativos');?>">Ativos <span class="badge"><?=$ativos;?></span></a></h5>
          <h5><a href="<?=base_url('processos/consultaapensados');?>">Apensados <span class="badge"><?=$apensados;?></span></a></h5>
          <h5><a href="<?=base_url('processos/consultaencerrados');?>">Encerrados <span class="badge"><?=$encerrados;?></span></a></h5>
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
                  <th>Posição</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($processos as $row): ?>
                  <tr>
                    <td><a href="<?=base_url('processos/consulta/'.$row->id_processos);?>"><?=$row->numero_processo;?></a></td>
                    <td><?=$row->numero_interno;?></td>
                    <td><?=nice_date($row->data_abertura, 'd/m/Y');?></td>
                    <td><?=$row->localizacao;?></td>
                    <td><?=$posicoes[$row->posicao];?></td>

                    <td width="155px">
                      <a class="btn btn-default btn-xs" href="<?=base_url('processos/edita/'.$row->id_processos);?>">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Editar"></span></a>
                      <a class="btn btn-default btn-xs" href="<?=base_url('processos/partes/'.$row->id_processos);?>">
                        <span class="glyphicon glyphicon-user" aria-hidden="true" title="Partes"></span></a>
                      <a class="btn btn-default btn-xs" href="<?=base_url('andamentos/consulta/'.$row->id_processos);?>">
                        <span class="glyphicon glyphicon-tag" aria-hidden="true" title="Andamentos"></span></a>
                      <a class="btn btn-default btn-xs" href="<?=base_url('prazos/consulta/'.$row->id_processos);?>">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true" title="Prazos"></span></a>
                      <a class="btn btn-default btn-xs" href="<?=base_url('apensos/consulta/'.$row->id_processos);?>">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true" title="Apensos"></span></a>
                    </td>

                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <nav><?=$paginacao?></nav>

        </div>
      </div>

    </div>
  </div>
</div>
