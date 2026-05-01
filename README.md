# ⚽ Álbum FIFA 2026 - Edición México (Sticker Manager)

Un gestor digital para coleccionistas del álbum de la Copa del Mundo 2026. Diseñado con una estética inspirada en la edición de pasta dura para México, permite llevar un control exacto de estampas obtenidas, faltantes y repetidas.

## 🚀 Características

* **Dashboard de Estadísticas**: Visualiza tu progreso global, total de estampas y porcentaje de avance en tiempo real.
* **Gestión de Secciones**: Soporta secciones especiales (FWC, Coca-Cola, Estampa 00) y las 48 selecciones nacionales.
* **Control de Repetidas**: Pestaña dedicada para ver qué cromos tienes listos para intercambiar.
* **Buscador Inteligente**: Busca por nombre de país o por código oficial (MEX, ARG, RSA, etc.).
* **Interfaz Responsiva**: Optimizado para usarse en PC o dispositivos móviles.
* **UX Intuitiva**: Click izquierdo para "pegar" estampas y Click derecho para "despegar" o corregir.

## 🛠️ Requisitos Técnicos

* **Servidor Web**: Apache (XAMPP, WampServer o Laragon).
* **Lenguaje**: PHP 7.4 o superior.
* **Base de Datos**: MySQL / MariaDB.
* **Frontend**: Bootstrap 5, Google Fonts (Bebas Neue).

## 📋 Instalación

1.  **Clonar el repositorio**:
    ```bash
    git clone [https://github.com/EdgarAntonioTorres/album-fifa-2026.git](https://github.com/EdgarAntonioTorres/album-fifa-2026.git)
    ```
2.  **Configurar la Base de Datos**:
    * Crea una base de datos llamada `album2026`.
    * Importa el archivo `database.sql` (incluido en el repositorio) para crear las tablas y las secciones.
3.  **Configurar la conexión**:
    * Abre `api.php` y ajusta las credenciales de tu base de datos (host, db, user, pass).
    ```php
    $host = 'localhost';
    $db = 'album2026';
    $user = 'root';
    $pass = ''; 
    ```
4.  **Ejecutar**: Mueve la carpeta a tu directorio `htdocs` y accede vía `localhost/album-fifa-2026`.

## 📂 Estructura del Proyecto

* `index.php`: Interfaz de usuario y lógica del frontend (JavaScript/Bootstrap).
* `api.php`: Cerebro del proyecto. Maneja la comunicación con la base de datos y devuelve datos en formato JSON.
* `database.sql`: Script necesario para inicializar la estructura y las 48 selecciones.

## 💡 Créditos

Diseñado con pasión por el fútbol y la tecnología. ¡Nos vemos en el Mundial 2026! 🇲🇽🇺🇸🇨🇦