<?php
header("Content-Type: application/json; charset=utf-8");

function FipeJson($resource, $data = null) {
  $url = "http://veiculos.fipe.org.br/api/veiculos";

  $header = [
    "Cache-Control: no-cache",
    "Content-Type: application/json",
    "Host: veiculos.fipe.org.br",
    "Referer: http://veiculos.fipe.org.br"
  ];

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url ."/". $resource);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
  $output = curl_exec($ch);
  curl_close($ch);

  return json_encode($output);
}

$tabela_referencia = FipeJson("ConsultarTabelaDeReferencia");
// echo json_decode($tabela_referencia);

$marcas = FipeJson("ConsultarMarcas", array(
  "codigoTabelaReferencia" => 231,
  "codigoTipoVeiculo" => 1
));
// echo json_decode($marcas);

$modelos = FipeJson("ConsultarModelos", array(
  "codigoTabelaReferencia" => 231,
  "codigoTipoVeiculo" => 1,
  "codigoMarca" => 26,
));
// echo json_decode($modelos);

$ano_modelo = FipeJson("ConsultarAnoModelo", array(
  "codigoTabelaReferencia" => 231,
  "codigoTipoVeiculo" => 1,
  "codigoMarca" => 26,
  "codigoModelo" => 4925
));
// echo json_decode($ano_modelo);

$modelos_do_ano = FipeJson("ConsultarModelosAtravesDoAno", array(
  "codigoTabelaReferencia" => 231,
  "codigoTipoVeiculo" => 1,
  "codigoMarca" => 26,
  "codigoModelo" => 4925,
  "ano" => "2010-1",
  "codigoTipoCombustivel" => 1,
  "anoModelo" => 2011
));
// echo json_decode($modelos_do_ano);

$valor_veiculo = FipeJson("ConsultarValorComTodosParametros", array(
  "codigoTabelaReferencia" => 231,
  "codigoTipoVeiculo" => 1,
  "codigoMarca" => 26,
  "codigoModelo" => 4925,
  "ano" => "2010-1",
  "codigoTipoCombustivel" => 1,
  "anoModelo" => 2011,
  "tipoConsulta" => "tradicional"
));
// echo json_decode($valor_veiculo);