#!/bin/bash

# Ruta de origen: tu proyecto actual (carpeta donde ejecutas el script)
SOURCE_DIR=/Users/markcode/DevTraining/php_backend_laravel

# Ruta de destino: htdocs de XAMPP
TARGET_DIR="/Applications/XAMPP/xamppfiles/htdocs/php_backend_laravel"

echo "🚀 Iniciando sincronización..."
echo "Origen: $SOURCE_DIR"
echo "Destino: $TARGET_DIR"

# Copiar y reemplazar carpetas y archivos
rsync -av --delete "$SOURCE_DIR/" "$TARGET_DIR/"

echo "✅ Sincronización completada."