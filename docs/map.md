# Коментарии

## Методы

<table>
    <tr>
        <th>
            Метод
        </th>
        <th>
            Описание
        </th>
    </tr>
    <tr>
        <td>
            api/map/map/
        </td>
        <td>
            Получить данные
        </td>
    </tr>
     <tr>
        <td>
            api/map/map-list/
        </td>
        <td>
            Получить список данных
        </td>
    </tr>
     <tr>
        <td>
            api/map/set-map/
        </td>
        <td>
            Сохранить данные
        </td>
    </tr>
</table>

### Получить данные

`http://battlemap.loc/api/map/map/`
<p>
    Для получения данных необходимо отправить <b>GET</b> запрос на URL http://battlemap.loc/api/map/map/
</p>
<p>
    Требуемые параметры:
</p>
<table>
    <tr>
        <th>
            Параметры
        </th>
        <th>
            Значение
        </th>
        <th>
            Требуется
        </th>
    </tr>
    <tr>
        <td>
            map_id
        </td>
        <td>
            id карты
        </td>
        <td>
            Да
        </td>
    </tr>
</table>
<p>
    Пример запроса:
</p>

`http://battlemap.loc/api/map/map/?map_id=1`

<p>
    Пример возвращаемых данных
</p>

```json5
{
  "message": "One map.",
  "data": [
    {
      "id": 1,
      "json_data": "nd cnd cnd",
      "created_at": "2022-04-19 12:36:11",
      "status": 1,
      "_links": {
        "self": {
          "href": "http://battlemap.loc/api/map/map?map_id=1"
        }
      }
    }
  ]
}
```

### Получение списка данных

`http://battlemap.loc/api/map/map-list/`
<p>
    Для получения списка данных необходимо отправить <b>GET</b> запрос на URL http://battlemap.loc/api/map/map-list/
</p>

<p>
    Пример запроса:
</p>

`http://battlemap.loc/api/map/map-list/`

<p>
    Пример возвращаемых данных
</p>

```json5
{
  "news": [
    {
      "id": 2,
      "json_data": "nd cnd cnd",
      "created_at": "2022-04-19 12:36:11",
      "status": 1,
      "_links": {
        "self": {
          "href": "http://battlemap.loc/api/map/map?map_id=2"
        }
      }
    },
    '...',
    {
      "id": 17,
      "json_data": " fnjfbj jnfvjnjfvn jfnvjnffnj",
      "created_at": "2022-04-19 14:19:50",
      "status": 1,
      "_links": {
        "self": {
          "href": "http://battlemap.loc/api/map/map?map_id=17"
        }
      }
    }
  ],
  "_links": {
    "self": {
      "href": "http://battlemap.loc/api/map/map-list?page=1"
    },
    "first": {
      "href": "http://battlemap.loc/api/map/map-list?page=1"
    },
    "last": {
      "href": "http://battlemap.loc/api/map/map-list?page=1"
    }
  },
  "_meta": {
    "totalCount": 17,
    "pageCount": 1,
    "currentPage": 1,
    "perPage": 20
  }
}
```

### Создание коментария

`http://battlemap.loc/api/map/set-map/`
<p>
    Для создания записи необходимо отправить <b>POST</b> запрос на URL http://battlemap.loc/api/map/set-map/
</p>
<p>
    Параметры:
</p>
<table>
    <tr>
        <th>
            Параметры
        </th>
        <th>
            Значение
        </th>
    </tr>
    <tr>
        <td>
            json_data
        </td>
        <td>
            Данные в json формате
        </td>
    </tr>
</table>
<p>
    Пример запроса:
</p>

`http://battlemap.loc/api/map/set-map/`

<p>
    Пример возвращаемых данных
</p>

```json5
{
  "message": "Comment is created!",
  "data": {
    "id": 26,
    "comment_body": "jbjdhfbvjhfbvfcfvffvf",
    "username": "popo"
  }
}
```
