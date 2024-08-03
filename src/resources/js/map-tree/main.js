import MapTree from './MapTree.js';

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('filters');
    const mapTree = new MapTree('map-tree-container', 'detail-box', '/quote/list', 60000);

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        mapTree.updateMapTreeWithFilters();
    });
});
