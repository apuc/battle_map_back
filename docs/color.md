# Цвета

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
            api/color/get-colors/
        </td>
        <td>
            Получить цвета 
        </td>
    </tr>
     <tr>
        <td>
            api/color/set-color/
        </td>
        <td>
            Сохранить цвет
        </td>
    </tr>
</table>

### Получить цвета

`http://battlemap.loc/api/color/get-colors/`
<p>
    Для получения массива цветов необходимо отправить <b>GET</b> запрос на URL http://battlemap.loc/api/color/get-colors/
</p>

<p>
    Пример запроса:
</p>

`http://battlemap.loc/api/color/get-colors/`

<p>
    Пример возвращаемых данных
</p>

```json5
{
  "message": "Colors list!",
  "data": [
    {
      "id": 1,
      "value": "dfdvfbfgb",
      "name": null
    },
    '...',
    {
      "id": 5,
      "value": "#d887000",
      "name": "yyy888"
    }
  ]
}
```

### Сохранить цвет

`http://battlemap.loc/api/color/set-color/`
<p>
    Для создания цвета необходимо отправить <b>POST</b> запрос на URL http://battlemap.loc/api/color/set-color/
    <br> При передаче параметра id данные существующего цвета будут перезаписанны.
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
            id
        </td>
        <td>
            Id цвета
        </td>
        <td>
            Нет
        </td>
    </tr>
    <tr>
        <td>
            value
        </td>
        <td>
            Значение цвета
        </td>
        <td>
            Да
        </td>
    </tr>
    <tr>
        <td>
           name
        </td>
        <td>
            Имя цвета
        </td>
        <td>
            Нет
        </td>
    </tr>
</table>
<p>
    Пример запроса:
</p>

`http://battlemap.loc/api/color/set-color/`

<p>
    Пример возвращаемых данных
</p>

```json5
{
  "message": "Color is saved!",
  "data": {
    "id": 7,
    "value": "#d887000",
    "name": "yyy888"
  }
}
```
