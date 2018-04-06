# FIPE JSON

Listagem com todos os veículos: carro, moto e caminhão.

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

## FIPE API

### Tabela de Referência

  POST:
  ```
  http://veiculos.fipe.org.br/api/veiculos/ConsultarTabelaDeReferencia
  ```

  Headers
  ```
  Host: veiculos.fipe.org.br
  Referer: http://veiculos.fipe.org.br
  Content-Type: application/json
  ```

  Result
  ```json
  [
    {
      "Codigo": 228,
      "Mes": "abril/2018 "
    }
  ]
  ```

### Consultar Marcas

  POST:
  ```
  http://veiculos.fipe.org.br/api/veiculos/ConsultarMarcas
  ```

  Headers
  ```
  Host: veiculos.fipe.org.br
  Referer: http://veiculos.fipe.org.br
  Content-Type: application/json
  ```

  Body
  ```json
  {
    "codigoTabelaReferencia": 228,
    "codigoTipoVeiculo": 3
  }
  ```

  Result
  ```json
  [
    {
      "Label": "AGRALE",
      "Value": "102"
    }
  ]
  ```


### Consultar Modelos

  POST:
  ```
  http://veiculos.fipe.org.br/api/veiculos/ConsultarModelos
  ```

  Headers
  ```
  Host: veiculos.fipe.org.br
  Referer: http://veiculos.fipe.org.br
  Content-Type: application/json
  ```

  Body
  ```json
  {
    "codigoTipoVeiculo": 3,
    "codigoTabelaReferencia": 228,
    "codigoModelo": "",
    "codigoMarca": 102,
    "ano": "",
    "codigoTipoCombustivel": "",
    "anoModelo": "",
    "modeloCodigoExterno": ""
  }
  ```

  Result
  ```json
  {
    "Modelos": [
      {
        "Label": "10000 / 10000 S  2p (diesel) (E5)",
        "Value": 5986
      }
    ]
  }
  ```

Enjoy :)
