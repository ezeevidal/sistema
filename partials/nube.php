<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/nube.css">
    <title>Nube</title>
</head>
<body>
    <header>
        <h1>Nube</h1>
        <div class="search-container">
            <input type="text" id="search-bar" placeholder="Buscar archivos...">
            <button id="search-button"><i class="fas fa-search"></i></button>
        </div>
    </header>
  
    <main class="container">
        <div class="folders-panel" id="folders-panel">
            <h2>Estructura</h2>
            <div id="folder-list">
                <!-- Aquí se cargarán las carpetas con AJAX u otra lógica -->
            </div>
        </div>

        <div class="folder-contents" id="folder-contents">
            <h2>Contenido</h2>
            <!-- Contenido de la carpeta -->
        </div>
    </main>
</body>
</html>
