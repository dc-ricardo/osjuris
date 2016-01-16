<div class="container-fluid">
  <div class="row">
    <div class="col-sm-9 col-sm-offset-0 col-md-12 col-md-offset-0 main">

      <h1 class="page-header">Processo
        <div class="btn-group pull-right" role="group">
          <a class="btn btn-primary" href="#" role="button">Novo</a>
          <a class="btn btn-primary" href="#" role="button">Editar</a>
          <a class="btn btn-primary" href="#" role="button">Partes</a>
        </div>
      </h1>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <h5 class="text-muted">Número do Processo</label>
            <h4><?=$processo[0]->numero_interno;?></h4>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <h5 class="text-muted">Número Interno</label>
            <h4><?=$processo[0]->numero_interno;?></h4>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <h5 class="text-muted">Data (dd/mm/aaaa)</label>
            <h4><?=nice_date($processo[0]->data_abertura, 'd/m/Y');?></h4>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <h5 class="text-muted">Localização</h5>
            <h4><?=$processo[0]->localizacao;?></h4>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
