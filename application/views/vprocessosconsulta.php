<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
      <?php $posicoes = unserialize(CPOSPRO);?>
      <h1 class="page-header">Processo
        <div class="btn-group pull-right" role="group">
          <a class="btn btn-primary" href="<?=base_url('processos/novo');?>" role="button">Novo</a>
          <a class="btn btn-primary" href="<?=base_url('processos/edita/'.$processo[0]->id_processos);?>" role="button">Editar</a>
          <a class="btn btn-primary" href="<?=base_url('processos/partes/'.$processo[0]->id_processos);?>" role="button">Partes</a>
          <a class="btn btn-primary" href="<?=base_url('andamentos/consulta/'.$processo[0]->id_processos);?>" role="button">Andamentos</a>
          <a class="btn btn-primary" href="<?=base_url('prazos/consulta/'.$processo[0]->id_processos);?>" role="button">Prazos</a>
          <a class="btn btn-primary" href="<?=base_url('apensos/consulta/'.$processo[0]->id_processos);?>" role="button">Apensos</a>
        </div>
      </h1>

      <div class="row">
        <div class="col-md-3">
          <h5 class="text-muted">Número do Processo</label>
          <h4><?=$processo[0]->numero_processo;?></h4>
        </div>
        <div class="col-md-3">
          <h5 class="text-muted">Número Interno</label>
          <h4><?=$processo[0]->numero_interno;?></h4>
        </div>
        <div class="col-md-2">
          <h5 class="text-muted">Data (dd/mm/aaaa)</label>
          <h4><?=nice_date($processo[0]->data_abertura, 'd/m/Y');?></h4>
        </div>
        <div class="col-md-4">
          <h5 class="text-muted">Localização</h5>
          <h4><?=$processo[0]->localizacao;?></h4>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          <h5 class="text-muted">Descrição</h5>
          <h4><?= nl2br($processo[0]->descricao); ?></h4>
        </div>
        <div class="col-md-2">
          <h5 class="text-muted">Valor da Causa</label>
          <h4><?=number_format($processo[0]->valor_causa, 2, ',', '.');?></h4>
        </div>
        <div class="col-md-2">
          <h5 class="text-muted">Posição</label>
          <h4><?=$posicoes[$processo[0]->posicao];?></h4>
        </div>
      </div>

      <h2>Partes</h2>

      <div class="row">

        <div class="col-md-3">
          <h3 class="panel-title">Autores</h3>
          <div class="table-responsive">
            <table class="table table-hover">
              <?php foreach($autores as $autor): ?>
                <tr>
                  <td width="100%"><?= $autor->nome_razao;?></td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>

        <div class="col-md-3">
          <h3 class="panel-title">Réus</h3>
          <div class="table-responsive">
            <table class="table table-hover">
              <?php foreach($reus as $reu): ?>
                <tr>
                  <td width="100%"><?= $reu->nome_razao;?></td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>

        <div class="col-md-3">
          <h3 class="panel-title">Advogados</h3>
          <div class="table-responsive">
            <table class="table table-hover">
              <?php foreach($advogados as $advogado): ?>
                <tr>
                  <td width="100%"><?= $advogado->nome_razao;?></td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>

        <div class="col-md-3">
          <h3 class="panel-title">Interessados</h3>
          <div class="table-responsive">
            <table class="table table-hover">
              <?php foreach($interessados as $interessado): ?>
                <tr>
                  <td width="100%"><?= $interessado->nome_razao;?></td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <hr>
          <?php if ($processo[0]->posicao != CPOSPROENCERRADO) { ?>
            <a class="btn btn-warning" href="<?=base_url("processos/encerra/".$processo[0]->id_processos);?>" role="button">Encerrar</a>
          <?php } else { ?>
            <a href="<?=base_url("processos/reposiciona/".$processo[0]->id_processos);?>" role="button">Estornar Encerramento</a>
          <?php } ?>
        </div>
      </div>

    </div>
  </div>
</div>
