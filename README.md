# Documentação

- [FIPE API](#fipe-api)
- [FIPE JSON](#fipe-json)

---

# Preço de Veículo

Conheça esse projeto completo que usa as mesmas chamadas à API da FIPE.

https://github.com/giovanigenerali/precodeveiculo

---

## FIPE API

[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/850a98a74ef2f76f18ec)

**ATENÇÃO**

- Essa API não é declaradamente pública, portanto consuma com moderação pois podem ocorrer restrições e bloqueios.
- Essas informações foram obtidas diretamente do site oficial da FIPE apenas fazendo leitura do código e analisando as chamadas que lá exitem!
- Esse repositório não tem nenhum vínculo com a FIPE e tem o intuito de ser apenas informativo, dúvidas acesse http://veiculos.fipe.org.br/

O script que realiza essa consulta está disponível aqui [fipejson.php](https://github.com/wgenial/fipe-json/blob/master/src/fipejson.php).

### Tabela de Referência

Aqui retorna o código de referência mensal para fazer as outras chamadas.

- POST

  ```
  http://veiculos.fipe.org.br/api/veiculos/ConsultarTabelaDeReferencia
  ```

- Headers

  ```
  Host: veiculos.fipe.org.br
  Referer: http://veiculos.fipe.org.br
  Content-Type: application/json
  ```

- Result
  ```json
  [
    {
      "Codigo": 231,
      "Mes": "julho/2018 "
    }
  ]
  ```

### Consultar Marcas

Passar via `header` o tipo de veículo, exitem três tipos e também o código de referência mensal.

```
  1 = carros
  2 = motos
  3 = caminhões
```

- POST

  ```
  http://veiculos.fipe.org.br/api/veiculos/ConsultarMarcas
  ```

- Headers

  ```
  Host: veiculos.fipe.org.br
  Referer: http://veiculos.fipe.org.br
  Content-Type: application/json
  ```

- Body

  ```json
  {
    "codigoTabelaReferencia": 231,
    "codigoTipoVeiculo": 1
  }
  ```

- Result
  ```json
  [
    {
      "Label": "Hyundai",
      "Value": "26"
    }
  ]
  ```

### Consultar Modelos

Passar via `header` o tipo de veículo, código de referência mensal e código da marca.

- POST

  ```
  http://veiculos.fipe.org.br/api/veiculos/ConsultarModelos
  ```

- Headers

  ```
  Host: veiculos.fipe.org.br
  Referer: http://veiculos.fipe.org.br
  Content-Type: application/json
  ```

- Body

  ```json
  {
    "codigoTabelaReferencia": 231,
    "codigoTipoVeiculo": 1,
    "codigoMarca": 26
  }
  ```

- Result
  ```json
  {
    "Modelos": [
      {
        "Label": "AZERA GLS 3.3 V6 24V 4p Aut.",
        "Value": 4403
      }
    ]
  }
  ```

### Consultar Ano Modelo

Passar via `header` o tipo de veículo, código de referência mensal, código da marca e código do modelo.

- POST

  ```
  http://veiculos.fipe.org.br/api/veiculos/ConsultarAnoModelo
  ```

- Headers

  ```
  Host: veiculos.fipe.org.br
  Referer: http://veiculos.fipe.org.br
  Content-Type: application/json
  ```

- Body

  ```json
  {
    "codigoTabelaReferencia": 231,
    "codigoTipoVeiculo": 1,
    "codigoMarca": 26,
    "codigoModelo": 4403
  }
  ```

- Result
  ```json
  [
    {
      "Label": "2011 Gasolina",
      "Value": "2011-1"
    }
  ]
  ```

### Consultar Modelos Através do Ano

Passar via `header` o tipo de veículo, código de referência mensal, código da marca, código do modelo, ano (string), código do tipo de combustível e código do ano/modelo.

No `codigoTipoCombustivel` e `anoModelo` tem que fazer um parse do `ano (2011-1)` para obter esses 2 valores, onde:

```
codigoTipoCombustivel = 1
anoModelo = 2011
```

- POST:

  ```
  http://veiculos.fipe.org.br/api/veiculos/ConsultarModelosAtravesDoAno
  ```

- Headers

  ```
  Host: veiculos.fipe.org.br
  Referer: http://veiculos.fipe.org.br
  Content-Type: application/json
  ```

- Body

  ```json
  {
    "codigoTabelaReferencia": 231,
    "codigoTipoVeiculo": 1,
    "codigoMarca": 26,
    "ano": "2011-1",
    "codigoTipoCombustivel": 1,
    "anoModelo": 2011
  }
  ```

- Result
  ```json
  [
    {
      "Label": "AZERA GLS 3.3 V6 24V 4p Aut.",
      "Value": "4403"
    }
  ]
  ```

### Consultar Valor do Veículo

Passar via `header` o tipo de veículo, código de referência mensal, código da marca, código do modelo, ano (string), código do tipo de combustível, código do ano/modelo e tipoConsulta (tradicional).

No `codigoTipoCombustivel` e `anoModelo` tem que fazer um parse do `ano (2011-1)` para obter esses 2 valores, onde:

```
codigoTipoCombustivel = 1
anoModelo = 2011
```

- POST:

  ```
  http://veiculos.fipe.org.br/api/veiculos/ConsultarValorComTodosParametros
  ```

- Headers

  ```
  Host: veiculos.fipe.org.br
  Referer: http://veiculos.fipe.org.br
  Content-Type: application/json
  ```

- Body
  ```json
  {
    "codigoTabelaReferencia": 231,
    "codigoTipoVeiculo": 1,
    "codigoMarca": 26,
    "ano": "2011-1",
    "codigoTipoCombustivel": 1,
    "anoModelo": 2011,
    "codigoModelo": 4403,
    "tipoConsulta": "tradicional"
  }
  ```

### Consultar Veículo pelo Código FIPE

Também pode ser consultado o veículo diretamente pelo código FIPE utilizando o `modeloCodigoExterno`, ano do modelo `anoModelo` e tabela de referência `codigoTabelaReferencia`. Observe que o `tipoConsulta` agora é `codigo` e o parâmetro `codigoTipoVeiculo` pode ser `1` (carros), `2` (motos), `3` (caminhões).

- Body

  ```json
  {
    "codigoTabelaReferencia": 263,
    "codigoTipoVeiculo": 1,
    "anoModelo": 2011,
    "modeloCodigoExterno": "004357-5",
    "tipoConsulta": "codigo"
  }
  ```

- Result
  ```json
  {
    "Valor": "R$ 39.225,00",
    "Marca": "Hyundai",
    "Modelo": "AZERA GLS 3.3 V6 24V 4p Aut.",
    "AnoModelo": 2011,
    "Combustivel": "Gasolina",
    "CodigoFipe": "015069-0",
    "MesReferencia": "julho de 2018 ",
    "Autenticacao": "s47hx3btzqfx",
    "TipoVeiculo": 1,
    "SiglaCombustivel": "G",
    "DataConsulta": "sábado, 28 de julho de 2018 16:34"
  }
  ```

---

## FIPE JSON

Listagem com todos os veículos: carro, moto e caminhão.

O script que realiza essa consulta está disponível aqui [crawler-g1.php](https://github.com/wgenial/fipe-json/blob/master/src/crawler-g1.php).

- Estrutura das pastas: AAAA/MM (ANO/MÊS)

```

AAAA/MM/moto.json

```

```json
[
  {
    "modelo": "ATV 100",
    "marca": "ADLY",
    "cod_fipe": "840015-6"
  }
]
```

Dentro de cada pasta contém o arquivo json de cada veículo, o nome é o próprio código FIPE.

```
AAAA/MM/moto/840015-6.json
```

```json
[
  {
    "tipo": "2000 gasolina",
    "valor": "3702"
  },
  {
    "tipo": "2001 gasolina",
    "valor": "4316"
  },
  {
    "tipo": "2002 gasolina",
    "valor": "4555"
  }
]
```

Enjoy :)
