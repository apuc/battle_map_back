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
     </tr>
     <tr>
        <td>
            api/map/get-changes/
        </td>
        <td>
            Список дат с событиями
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
      "date": "2022-05-06",
      "json_data": "hhfbxxxx88",
      "circle_data": "fdbg8888fgbg999",
      "_links": {
        "self": {
          "href": "http://battlemap.loc/api/map/map?date=2022-05-06"
        }
      }
    },
    '...',
    {
      "date": "2022-04-21",
      "json_data": "fmkcbnc fnvjfcnvm",
      "circle_data": null,
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
        <th>
            Требуется
        </th>
    </tr>
    <tr>
        <td>
            json_data
        </td>
        <td>
            Данные в json формате
        </td>
        <td>
            Да
        </td>
    </tr>
    <tr>
        <td>
            date
        </td>
        <td>
            Дата, для сохранения данных. Если данные с переданной датой уже существуют, то данные будут презаписаны
        </td>
        <td>
            Да
        </td>
    </tr>
    <tr>
        <td>
           circle_data
        </td>
        <td>
            Данные для построения кругов
        </td>
        <td>
            Нет
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
      "date": "2022-05-06",
      "json_data": "hhfbxxxx88",
      "circle_data": "fdbg8888fgbg999",
      "_links": {
        "self": {
          "href": "http://battlemap.loc/api/map/map?date=2022-05-06"
        }
      }
    }
  ]
}
```

### Получить даты с событиями

`http://battlemap.loc/api/map/get-changes/`
<p>
    Для получения списка дат с событиями необходимо отправить <b>GET</b> запрос на URL http://battlemap.loc/api/map/get-changes/
</p>


`http://battlemap.loc/api/map/get-changes`

<p>
    Пример возвращаемых данных
</p>

```json5
[
  "2022-03-19",
  "2022-03-20",
  "2022-03-21",
  "2022-03-22",
  "2022-03-23",
  "2022-03-24",
  "2022-03-26",
  "2022-03-27",
  "2022-03-29",
  "2022-03-30",
  "2022-03-19",
  "2022-04-21",
  "2022-04-21",
  "2022-04-21",
  "2022-04-21",
  "2022-04-21",
  "2022-04-22",
  "2022-01-24",
  "2022-01-25",
  "2022-04-28",
  "2022-04-27"
]
```
