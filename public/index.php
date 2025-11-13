<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

// ====================
// 🔧 CONFIGURACIÓN EXTRA
// ====================

// Extiende el tiempo máximo de ejecución (2 minutos)
ini_set('max_execution_time', 120);

// Aumenta el límite de memoria si el proceso consume mucho
ini_set('memory_limit', '512M');

// Mide el tiempo de inicio del framework
define('LARAVEL_START', microtime(true));

// ====================
// 🔍 MODO MANTENIMIENTO
// ====================
if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// ====================
// 📦 AUTOLOAD DE COMPOSER
// ====================
require __DIR__ . '/../vendor/autoload.php';

// ====================
// 🚀 BOOTSTRAP LARAVEL
// ====================
/** @var Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Manejo seguro de la solicitud
try {
    $app->handleRequest(Request::capture());
} catch (Throwable $e) {
    // Si algo sale mal, mostrar un mensaje claro
    echo "<h2 style='font-family:Arial;color:red;'>⚠️ Error interno en la aplicación:</h2>";
    echo "<pre style='background:#f5f5f5;padding:10px;border-radius:5px;'>";
    echo htmlspecialchars($e->getMessage());
    echo "</pre>";
}
