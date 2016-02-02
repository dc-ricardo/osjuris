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
