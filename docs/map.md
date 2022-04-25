# Данные

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
            api/map/get-data/
        </td>
        <td>
            Получить данные
        </td>
    </tr>
     <tr>
        <td>
            api/map/set-data/
        </td>
        <td>
            Сохранить данные
        </td>
    </tr>
</table>

### Получить данные

`http://battlemap.loc/api/map/set-data/`
<p>
    Для получения данных необходимо отправить <b>GET</b> запрос на URL http://battlemap.loc/api/map/set-data/
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
        <th>
            Требуется
        </th>
    </tr>
    <tr>
        <td>
            date
        </td>
        <td>
            Дата
        </td>
        <td>
            Да
        </td>
    </tr>
    <tr>
        <td>
            startDate
        </td>
        <td>
            Начальная дата. При передаче будет возвращены данные в промежутке между
            startDate и date
        </td>
        <td>
            Нет
        </td>
    </tr>
</table>
<p>
    Пример запроса:
</p>

`http://battlemap.loc/api/map/get-data/?startDate=2022-04-19&date=2022-04-25`

<p>
    Пример возвращаемых данных
</p>

```json5
{
  "message": "Data for the period.",
  "data": [
    {
      "date": "2022-04-22",
      "json_data": "fmkcbnc fnvjfcnvm",
      "_links": {
        "self": {
          "href": "http://battlemap.loc/api/map/map?date=2022-04-22"
        }
      }
    },
    '...',
    {
      "date": "2022-04-21",
      "json_data": "fmkcbnc fnvjfcnvm",
      "_links": {
        "self": {
          "href": "http://battlemap.loc/api/map/map?date=2022-04-21"
        }
      }
    }
  ]
}
```

### Сохранить данные

`http://battlemap.loc/api/map/set-data/`
<p>
    Для сохранения данных <b>POST</b> запрос на URL http://battlemap.loc/api/map/set-data/
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
    <tr>
        <td>
            date
        </td>
        <td>
            Дата, для сохранения данных. Если данные с переданной датой уже существуют, то данные будут презаписаны
        </td>
    </tr>
</table>
<p>
    Пример запроса:
</p>

`http://battlemap.loc/api/map/set-data/`

<p>
    Пример возвращаемых данных
</p>

```json5
{
  "message": "Data is saved!",
  "data": [
    {
      "date": "2022-01-24",
      "json_data": "8888777",
      "_links": {
        "self": {
          "href": "http://battlemap.loc/api/map/map?date=2022-04-25"
        }
      }
    }
  ]
}
```
