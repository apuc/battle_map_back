# Авторизация

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
            api/user/login
        </td>
        <td>
            Авторизация
        </td>
    </tr>
</table>

### Авторизация

`http://battle_map.loc/api/user/login`

<p>
    Для того, чтобы получить данные авторизвции необходимо отправить <b>GET</b> запрос
    на URL http://battle_map.loc/api/user/login.
</p>
<p> 
    Пример запроса:
</p>

`http://dnrone.loc/api/user/login?username=popo&password=fdbh6473gsd6w7`

<p>
    Возвращает объект <b>Профиля</b> и токен доступа с датой окончания действия токена.
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
    </tr>
    <tr>
        <td>
            username
        </td>
        <td>
            Имя пользователя
        </td>
    </tr>
     <tr>
        <td>
            password
        </td>
        <td>
            Пароль
        </td>
    </tr>
</table>

<p>
    Пример возвращаемых данных
</p>

```json5
{
  "message": "Authorization is successful!",
  "data": {
    "id": 1,
    "username": "admin",
    "email": "admin@mail.com",
    "access_token": "f4LKxjpYb7AZQMTFZjfLzk-t6cXdB8rG",
    "access_token_expired_at": "2022-06-28 00:00:00"
  }
}
```