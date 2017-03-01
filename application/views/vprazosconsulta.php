<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

      <h1 class="page-header">Prazo
        <div class="btn-group pull-right" role="group">
          <a class="btn btn-primary" href="<?=base_url()?>prazos/novo/<?=$processo[0]->id_processos;?>" role="button">Novo</a>
        </div>
      </h1>

      <?=$dadosdoprocesso;?>

      <div class="row">

        <div class="col-md-12">

          <div class="row">

            <div class="col-md-2">
              <div class="form-group">
                <h5>Vencimento</h5>
                <h4><?=nice_date($prazo[0]->data_prazo, 'd/m/Y');?></h4>
              </div>
            </div>

            <div class="col-md-10">
              <h5>Descrição</h5>
              <h4><?=$prazo[0]->descricao;?></h4>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>
