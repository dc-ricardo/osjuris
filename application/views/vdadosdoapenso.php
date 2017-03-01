<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Dados do Apenso</h3>
      </div>
      <div class="panel-body">
        <?=$apenso[0]->numero_apenso;?> |
        <?=nice_date($apenso[0]->data_apenso, 'd/m/Y');?> |
        <?=$apenso[0]->localizacao;?> |
        <?=$apenso[0]->descricao;?>
      </div>
    </div>
  </div>
</div>
