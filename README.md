# Introducción a PHP

Este es un breve repaso de PHP (Hypertext Preprocessor) que abarca los conceptos básicos y características fundamentales de este lenguaje de programación ampliamente utilizado en el desarrollo web. PHP se utiliza principalmente para crear aplicaciones web dinámicas e interactuar con bases de datos.

## Tabla de contenidos

1. [¿Qué es PHP?](#qué-es-php)
2. [Configuración del entorno](#configuración-del-entorno)
3. [Sintaxis básica](#sintaxis-básica)
4. [Variables y tipos de datos](#variables-y-tipos-de-datos)
5. [Estructuras de control](#estructuras-de-control)
6. [Funciones](#funciones)
7. [Trabajar con formularios](#trabajar-con-formularios)
8. [Conexión a bases de datos](#conexión-a-bases-de-datos)
9. [Recursos adicionales](#recursos-adicionales)

## ¿Qué es PHP?

PHP es un lenguaje de programación de código abierto ampliamente utilizado para el desarrollo web. Se ejecuta en el lado del servidor, lo que significa que el código PHP se procesa en el servidor web antes de enviar la respuesta al navegador del usuario. PHP se integra fácilmente con HTML y puede generar contenido dinámico en función de la lógica del programa.

## Configuración del entorno

Para comenzar a programar en PHP, debes tener instalado un servidor web local como Apache, y PHP configurado en tu entorno. Asegúrate de tener una versión compatible de PHP instalada y configurada correctamente. Puedes verificar la instalación de PHP ejecutando el siguiente comando en tu terminal:

```shell
php --version
```

## Sintaxis básica

El código PHP se encierra entre las etiquetas `<?php` y `?>`. Aquí tienes un ejemplo básico:

```php
<?php
    // Código PHP
    echo "Hola, mundo!";
?>
```

## Variables y tipos de datos

En PHP, puedes declarar variables utilizando el símbolo `$`. No es necesario especificar el tipo de datos, ya que PHP es un lenguaje de tipado dinámico. Aquí hay algunos ejemplos:

```php
$nombre = "Juan";
$edad = 25;
$precio = 19.99;
$activo = true;
```

PHP admite diferentes tipos de datos, como cadenas de texto, enteros, números de punto flotante, booleanos, arreglos, objetos y más.

## Estructuras de control

PHP proporciona estructuras de control para tomar decisiones y repetir acciones. Algunas de las estructuras de control más comunes son:

- `if`: Verifica una condición y ejecuta un bloque de código si se cumple.
- `for`: Repite un bloque de código un número específico de veces.
- `while`: Repite un bloque de código mientras se cumpla una condición.
- `foreach`: Itera sobre los elementos de un array o una colección.

## Funciones

En PHP, puedes definir tus propias funciones para agrupar código relacionado y reutilizarlo en diferentes partes de tu programa. Aquí hay un ejemplo de cómo se define una función en PHP:

```php
function saludar($nombre) {
    echo "Hola, $nombre!";
}

saludar("Juan"); // Llama a la función e imprime "Hola

, Juan!"
```

## Trabajar con formularios

PHP es especialmente útil para trabajar con formularios web. Puedes obtener los valores enviados desde un formulario HTML utilizando la variable global `$_POST` o `$_GET`, dependiendo del método de envío utilizado. Aquí hay un ejemplo básico:

```php
<form method="POST" action="procesar.php">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre">
    
    <input type="submit" value="Enviar">
</form>
```

En el archivo "procesar.php", puedes acceder al valor enviado del campo de nombre de la siguiente manera:

```php
$nombre = $_POST['nombre'];
echo "Hola, $nombre!";
```

## Conexión a bases de datos

PHP facilita la conexión y manipulación de bases de datos. Puedes utilizar extensiones como MySQLi o PDO para interactuar con bases de datos MySQL u otras bases de datos compatibles. Aquí hay un ejemplo básico de conexión a una base de datos MySQL utilizando MySQLi:

```php
$conexion = new mysqli("localhost", "usuario", "contraseña", "basedatos");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Ejemplo de consulta
$resultado = $conexion->query("SELECT * FROM usuarios");

while ($fila = $resultado->fetch_assoc()) {
    echo $fila['nombre'];
}

$conexion->close();
```

## Recursos adicionales

- [Documentación oficial de PHP](https://www.php.net/docs.php): La documentación oficial de PHP es una excelente fuente de referencia para aprender más sobre el lenguaje y sus características.
- [w3schools PHP Tutorial](https://www.w3schools.com/php/): Un recurso en línea muy popular que proporciona tutoriales interactivos y ejemplos prácticos de PHP.
- [PHP: The Right Way](https://phptherightway.com/): Un sitio web que brinda orientación y mejores prácticas para programar en PHP de manera correcta y eficiente.

Este repaso solo cubre los conceptos básicos de PHP. Hay muchas más características y funcionalidades en PHP que puedes explorar a medida que avances en tu aprendizaje.
