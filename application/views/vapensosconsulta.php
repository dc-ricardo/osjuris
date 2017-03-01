<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

      <h1 class="page-header">Apenso</h1>

      <?=$dadosdoprocesso;?>
      <?=$dadosdoapenso;?>

      <!-- encerramento do apenso -->
      <div class="row">
        <div class="col-md-12">
          <hr>
          <?php if ($apenso[0]->posicao != CPOSAPEENCERRADO) { ?>
            <a class="btn btn-warning"
              href="<?=base_url("apensos/encerra/".$apenso[0]->id_processos.'/'.$apenso[0]->id_apensos);?>"
              role="button">Encerrar</a>
          <?php } else { ?>
            <a href="<?=base_url("apensos/reposiciona/".$apenso[0]->id_processos.'/'.$apenso[0]->id_apensos);?>"
              role="button">Estornar Encerramento</a>
          <?php } ?>
        </div>
      </div>

    </div>
  </div>
</div>
