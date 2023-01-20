## Documentação da API (Em construção)

API roda com Docker, Possui um CRUD simples, interagindo com um banco de dados MySQL, listando, adicionando, editando. buscando valor específico e deletando items. 

#### Retorna todos os alunos

```http
  GET /api/alunos
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `api_key` | `string` | **Obrigatório**. A chave da sua API |

#### Retorna um aluno

```http
  GET /api/alunos/{id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do item que você quer no banco de dados |

#### Atualiza um aluno existente
```http
  PUT /api/alunos/{id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do item que você quer no banco de dados |

#### Armazena um aluno novo
```http
  POST /api/alunos
```


| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `api_key` | `string` | **Obrigatório**. O verbo HTTP POST |

In progress... 
