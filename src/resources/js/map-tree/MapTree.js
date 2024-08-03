import StockItem from './StockItem.js';

export default class MapTree {
    constructor(containerId, detailBoxId, endpoint, refreshInterval) {
        this.container = document.getElementById(containerId);
        this.detailBox = document.getElementById(detailBoxId);
        this.endpoint = endpoint;
        this.refreshInterval = refreshInterval;
        this.loadingOverlay = document.getElementById('loading-overlay');

        this.init();
    }

    getFilters() {
        const form = document.getElementById('filters');
        const formData = new FormData(form);
        const filters = {};

        formData.forEach((value, key) => {
            if (value.trim() !== '') {
                filters[key] = value;
            }
        });

        return filters;
    }

    async fetchData(filters = {}) {
        const query = new URLSearchParams(filters).toString();
        const url = `${this.endpoint}?${query}`;


        this.loadingOverlay.style.display = 'flex';
        document.body.classList.add('loading');
        const response = await fetch(url);
        const data = await response.json();
        this.loadingOverlay.style.display = 'none';
        document.body.classList.remove('loading');

        return data;
    }

    async updateMapTreeWithFilters() {
        const filters = this.getFilters();
        const data = await this.fetchData(filters);
        const totalVolume = data.stocks.reduce((sum, stock) => sum + stock.volume, 0);
        const totalStocks = data.stocks.length;

        this.container.innerHTML = '';

        data.stocks.forEach(stock => {
            new StockItem(stock, totalVolume, totalStocks, this.container, this.detailBox);
        });
    }

    init() {
        this.updateMapTreeWithFilters();
        setInterval(() => this.updateMapTreeWithFilters(), this.refreshInterval);
    }
}
