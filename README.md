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


Enjoy :)