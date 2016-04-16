<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link href="<?=base_url();?>assets/css/print.css" rel="stylesheet">
  <title>Pessoa <?=$pessoa[0]->nome_razao;?></title>
</head>

<body>

  <?php $tipopessoa = unserialize(CPESSOASTIPO); ?>
  <?php $parte = unserialize(CPARTES); ?>

  <div class="wrap">

  <h1><?=$pessoa[0]->nome_razao;?></h1>

  <p>Código........: <?=$pessoa[0]->codigo;?>
  <p>Tipo..........: <?=$tipopessoa[$pessoa[0]->tipo];?>
  <p>CPF/CNPJ......: <?=$pessoa[0]->cpf_cnpj;?>
  <p>RG/INscrição..: <?=$pessoa[0]->rg_ie;?>
  <p>Endereço......: <?=$pessoa[0]->endereco;?>
  <p>Número........: <?=$pessoa[0]->numero;?>
  <p>Complemento...: <?=$pessoa[0]->complemento;?>
  <p>CEP...........: <?=$pessoa[0]->cep;?>
  <p>Bairro........: <?=$pessoa[0]->bairro;?>
  <p>Cidade........: <?=$pessoa[0]->cidade;?>
  <p>Estado........: <?=$pessoa[0]->estado;?>
  <p>Telefone......: <?=$pessoa[0]->telefone;?>
  <p>Celular.......: <?=$pessoa[0]->celular;?>
  <p>E-mail........: <?=$pessoa[0]->email;?>
  <p>Observações...: <?=$pessoa[0]->observacoes;?>

  <h2>Processos</h2>

  <table>
    <th align="left">N. Processo</th>
    <th align="left">N. Interno</th>
    <th align="left">Data de Abertura</th>
    <th align="left">Descrição</th>
    <th align="left">Parte</th>
    <?php foreach($processos as $row): ?>
      <tr>
        <td valign="top"><?=$row->numero_processo;?></td>
        <td valign="top"><?=$row->numero_interno;?></td>
        <td valign="top"><?=nice_date($row->data_abertura, 'd/m/Y');?></td>
        <td valign="top"><?=$row->descricao;?></td>
        <td valign="top"><?=$parte[$row->tipo_parte];?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  </div>

</body>

</html>
