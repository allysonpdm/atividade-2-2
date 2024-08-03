<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map Tree</title>
    @vite('resources/css/map-tree.css')
    @vite('resources/css/app.css')
</head>

<body>
    <div class="filter-bar">
        <form id="filters">
            <label for="search">Buscar:</label>
            <input type="text" id="search" name="search" placeholder="Buscar...">

            <label for="sortBy">Ordenar por:</label>
            <select id="sortBy" name="sortBy">
                <option value="">Selecione</option>
                <?php foreach($fields as $key => $value): ?>
                    <option value="{{ $key }}">{{ $value }}</option>
                <?php endforeach;?>
            </select>

            <label for="sortOrder">Ordenção:</label>
            <select id="sortOrder" name="sortOrder">
                <option value="asc">Crescente</option>
                <option value="desc">Decrescente</option>
            </select>

            <label for="limit">Limite:</label>
            <input type="number" id="limit" name="limit" placeholder="10" min="1">

            <label for="page">Página:</label>
            <input type="number" id="page" name="page" placeholder="1" min="1">

            <label for="type">Type:</label>
            <select id="type" name="type">
                <option value="">Selecione</option>
                <?php foreach ($types as $key=> $description): ?>
                    <option value="{{ $key }}">{{ $description }}</option>
                <?php endforeach;?>
            </select>

            <label for="sector">Sector:</label>
            <select id="sector" name="sector">
                <option value="">Selecione</option>
                <?php foreach ($sectors as $key => $description ): ?>
                <option value="{{ $key }}">{{ $description }}</option>
                <?php endforeach;?>
            </select>

            <button type="submit">Aplicar</button>
        </form>
    </div>

    <div id="map-tree-container"></div>
    <div id="detail-box" class="detail-box"></div>
    <div id="loading-overlay" class="overlay" style="display: none;">
        <div id="loading-spinner" class="spinner"></div>
    </div>
    @vite('resources/js/map-tree/main.js')
</body>

</html>
