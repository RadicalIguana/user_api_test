## Тестовое задание на позицию PHP-разработчик

Задание:
1. Развернуть laravel проект
2. Разработать метод апи «Регистрация нового юзера» api/registration с параметрами email, password, gender
3. Разработать апи метод api/profile для выдачи данных Пользователя
4. Предоставить документацию в виде Postman проекта
5. Представить скриншоты запросов из Postman

Версии:
1. PHP 8.4.7
2. Laravel 12.14.1

## API Документация

### Базовый URL
```
http://localhost:8000/api
```

### Аутентификация
API использует Laravel Sanctum для аутентификации. После успешной регистрации вы получите токен доступа, который нужно использовать в заголовке `Authorization` для защищенных эндпоинтов.

### Эндпоинты

#### 1. Регистрация пользователя
```http
POST /registration
```

**Параметры запроса:**
```json
{
    "email": "user@example.com",
    "password": "password123",
    "gender": "male" // или "female", или "" (пустая строка для "не указан")
}
```

**Ответ (201 Created):**
```json
{
    "access_token": "1|abcdef123456...",
    "token_type": "Bearer"
}
```

**Возможные ошибки:**
- 422 Unprocessable Entity - ошибки валидации
- 500 Internal Server Error - серверная ошибка

#### 2. Получение профиля пользователя
```http
GET /profile
```

**Заголовки:**
```
Authorization: Bearer {access_token}
```

**Ответ (200 OK):**
```json
{
    "data": {
        "id": 1,
        "email": "user@example.com",
        "gender": "male",
        "created_at": "2024-03-20T12:00:00.000000Z"
    }
}
```

**Возможные ошибки:**
- 401 Unauthorized - отсутствует или неверный токен
- 500 Internal Server Error - серверная ошибка

### Примеры использования

#### Регистрация нового пользователя
```bash
curl -X POST http://localhost:8000/api/registration \
  -H "Content-Type: application/json" \
  -d '{
    "email": "user@example.com",
    "password": "password123",
    "gender": "male"
  }'
```

#### Получение профиля
```bash
curl http://localhost:8000/api/profile \
  -H "Authorization: Bearer {access_token}"
```

### Коды ответов
- 200: Успешный запрос
- 201: Ресурс успешно создан
- 401: Не авторизован
- 422: Ошибка валидации
- 500: Внутренняя ошибка сервера

