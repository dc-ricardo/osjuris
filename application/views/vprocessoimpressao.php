<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link href="<?=base_url();?>assets/css/print.css" rel="stylesheet">
  <title>Processo <?=$processo[0]->numero_processo;?></title>
</head>

<body>

  <?php $posicaoprocesso = unserialize(CPOSPRO); ?>
  <?php $posicaoapenso = unserialize(CPOSAPE); ?>

  <div class="wrap">

  <h1>Processo <?=$processo[0]->numero_processo;?></h1>

  <p>Número Interno...: <?=$processo[0]->numero_interno;?>
  <p>Data da Abertura.: <?=nice_date($processo[0]->data_abertura, 'd/m/Y');?>
  <p>Localização......: <?=$processo[0]->localizacao;?>
  <p>Valor da Causa...: <?=$processo[0]->valor_causa;?>
  <p>Posição..........: <?=$posicaoprocesso[$processo[0]->posicao];?>
  <p>Descrição........: <?=$processo[0]->descricao;?>

  <h2>Partes</h2>

  <h3>Autores</h3>
  <?php foreach($autores as $row): ?>
    <p><?=$row->nome_razao.' - '.$row->cpf_cnpj;?>
  <?php endforeach; ?>

  <h3>Réus</h3>
  <?php foreach($reus as $row): ?>
    <p><?=$row->nome_razao.' - '.$row->cpf_cnpj;?>
  <?php endforeach; ?>

  <h3>Advogados</h3>
  <?php foreach($advogados as $row): ?>
    <p><?=$row->nome_razao.' - '.$row->cpf_cnpj;?>
  <?php endforeach; ?>

  <h3>Interessados</h3>
  <?php foreach($interessados as $row): ?>
    <p><?=$row->nome_razao.' - '.$row->cpf_cnpj;?>
  <?php endforeach; ?>

  <h2>Andamentos</h2>
  <table>
    <th align="left">Data</th>
    <th align="left">Descrição</th>
    <?php foreach($andamentos as $row): ?>
      <tr>
        <td width="100px"><?=nice_date($row->data_andamento, 'd/m/Y');?></td>
        <td><?=$row->descricao;?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <?php foreach($apensos as $apenso) { ?>
    <h2>Apenso <?=$apenso->numero_apenso;?></h2>

    <p>Data da Abertura.: <?=nice_date($apenso->data_apenso, 'd/m/Y');?>
    <p>Localização......: <?=$apenso->localizacao;?>
    <p>Valor da Causa...: <?=$apenso->valor_causa;?>
    <p>Posição..........: <?=$posicaoapenso[$apenso->posicao];?>

    <h2>Andamentos do Apenso</h2>
    <table>
      <th align="left">Data</th>
      <th align="left">Descrição</th>
      <?php foreach($apensosand as $apensoand) { ?>
        <tr>
          <td width="100px"><?=nice_date($apensoand->data_andamento, 'd/m/Y');?></td>
          <td><?=$apensoand->descricao;?></td>
        </tr>
      <?php } ?>
    </table>

  <?php } ?>

  </div>

</body>

</html>
