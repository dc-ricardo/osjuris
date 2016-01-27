<div class="container-fluid">
  <div class="row">
    <div class="col-sm-9 col-sm-offset-0 col-md-12 col-md-offset-0 main">
      <h1 class="page-header">Edição do Processo</h1>
      <form class="form-group" action="<?=base_url('processos/altera/'.$processo[0]->id_processos);?>" method="post">

        <?php
          // valor dos campos do banco
          $vdc['numero_processo'] = $processo[0]->numero_processo;
          $vdc['numero_interno'] = $processo[0]->numero_interno;
          $vdc['data_abertura'] = $processo[0]->data_abertura;
          $vdc['localizacao'] = $processo[0]->id_localizacoes;
          $vdc['descricao'] = $processo[0]->descricao;

          if (validation_errors() == TRUE) {
            echo '<div class="row">';
            echo '<div class="col-md-4">';
            echo '<div class="alert alert-danger" role="alert">';
            echo validation_errors();
            echo '</div>';
            echo '</div>';
            echo '</div>';

            // mantém valos dos campos editados em caso de erro de validação
            $vdc['numero_processo'] = set_value('numero_processo');
            $vdc['numero_interno'] = set_value('numero_interno');
            $vdc['localizacao'] = set_value('localizacao');
            $vdc['descricao'] = set_value('descricao');

          }
        ?>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="numero_processo">Número do Processo</label>
              <input type="text" class="form-control" id="numero_processo" name="numero_processo" autofocus
                value="<?=$vdc['numero_processo'];?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="numero_interno">Número Interno</label>
              <input type="text" class="form-control" id="numero_interno" name="numero_interno"
                value="<?=$vdc['numero_interno'];?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="data_abertura">Data (dd/mm/aaaa)</label>
              <input type="date" class="form-control" id="data_abertura" name="data_abertura"
                value="<?=nice_date($vdc['data_abertura'], 'd/m/Y');?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="localizacao">Localização</label>
              <select class="form-control" id='localizacao' name='localizacao'>
              <?php
                foreach($localizacoes as $row) {
                  echo "<option value='$row->id_localizacoes'";
                  echo $vdc['localizacao']==$row->id_localizacoes?'selected':'';
                  echo ">".$row->descricao."</option>";
                }
              ?>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <label for="descricaos">Descrição</label>
              <textarea class="form-control" id="descricao" name="descricao"><?=$vdc['descricao'];?></textarea>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Gravar</button>

      </form>
    </div>
  </div>
</div>
