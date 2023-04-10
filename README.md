# ExaminAI

![ExaminAI Banner](https://raw.githubusercontent.com/MelarcAB/ai-english-teacher/main/public/img/examinai_logo_teal.png?token=GHSAT0AAAAAACBC34E2TKVW765PY47AYDWEZBUE44Q)

ExaminAI es una aplicación web desarrollada con Laravel 10 y Tailwind CSS que utiliza la inteligencia artificial de OpenAI para generar y corregir exámenes de inglés de manera eficiente.

## Requisitos

- PHP 8.2 o superior
- Composer
- Node.js y npm

## Dependencias

- Laravel 10
- Tailwind CSS
- OpenAI API

## Configuración

1. Clona el repositorio:

```bash
git clone https://github.com/MelarcAB/ExaminAI.git
```
2. Clona el repositorio:
```
composer install
```

3. Instala las dependencias de npm con npm install

4. Copia el archivo .env.example a .env y genera la clave para la app:
```
cp .env.example .env
php artisan key:generate
```

5. Configura las variables de entorno en el archivo .env. Importante las colas (queues) en database y la base de datos que corresponda:

```
QUEUE_CONNECTION=database
OPENAI_API_KEY=your_openai_api_key
GOOGLE_AUTH_CLIENT_ID=your_google_auth_client_id
GOOGLE_AUTH_CLIENT_SECRET=your_google_auth_client_secret
```

6. Compila los assets con npm:
```
npm run dev
```

7. Ejecuta las migraciones y seeders:
```
php artisan migrate --seed
```

8. Inicia el servidor de desarrollo:
```
php artisan serve
```
