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

---

## FIPE API

  **ATENÇÃO**
  - Essa API não é declaradamente pública, portanto consuma com moderação pois podem ocorrer restrições e bloqueios.
  - Essas informações foram obtidas diretamente do site oficial da FIPE apenas fazendo leitura do código e analisando as chamadas que lá exitem!
  - Esse repositório não tem nenhum vínculo com a FIPE e tem o intuito de ser apenas informativo, dúvidas acesse http://veiculos.fipe.org.br/
  

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
        "Codigo": 228,
        "Mes": "abril/2018 "
      }
    ]
    ```

### Consultar Marcas
  Passar via ```header``` o tipo de veículo, exitem três tipos e também o código de referência mensal.
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
      "codigoTabelaReferencia": 228,
      "codigoTipoVeiculo": 3
    }
    ```

  - Result
    ```json
    [
      {
        "Label": "AGRALE",
        "Value": "102"
      }
    ]
    ```


### Consultar Modelos
  Passar via ```header``` o tipo de veículo, código de referência mensal e código da marca.

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

  - Result
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

### Consultar Ano Modelo
  Passar via ```header``` o tipo de veículo, código de referência mensal, código da marca e código do modelo.

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
      "codigoTipoVeiculo": 3,
      "codigoTabelaReferencia": 228,
      "codigoModelo": 5986,
      "codigoMarca": 102,
      "ano": "",
      "codigoTipoCombustivel": "",
      "anoModelo": "",
      "modeloCodigoExterno": ""
    }
    ```

  - Result
    ```json
    [
      {
        "Label": "32000",
        "Value": "32000-3"
      }
    ]
    ```


### Consultar Modelos Através do Ano
  Passar via ```header``` o tipo de veículo, código de referência mensal, código da marca, código do modelo, ano (string), código do tipo de combustível e código do ano/modelo.
  
  No ```codigoTipoCombustivel``` e ```anoModelo``` tem que fazer um parse do ```ano (32000-3)``` para obter esses 2 valores, onde:
  ```
  codigoTipoCombustivel = 3
  anoModelo = 32000
  ```


  - POST:
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
      "codigoTipoVeiculo": 3,
      "codigoTabelaReferencia": 228,
      "codigoModelo": 5986,
      "codigoMarca": 102,
      "ano": "32000-3",
      "codigoTipoCombustivel": 3,
      "anoModelo": 32000,
      "modeloCodigoExterno": ""
    }
    ```

  - Result
    ```json
    [
      {
        "Label": "10000 / 10000 S  2p (diesel) (E5)",
        "Value": "5986"
      }
    ]
    ```

Enjoy :)
