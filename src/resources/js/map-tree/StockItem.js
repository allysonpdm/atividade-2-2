export default class StockItem {
    constructor(stock, totalVolume, totalStocks, container, detailBox) {
        this.stock = stock;
        this.totalVolume = totalVolume;
        this.totalStocks = totalStocks;
        this.container = container;
        this.detailBox = detailBox;

        this.createStockItem();
    }

    proporcaoNodoEmRelacaoAoVolume() {
        return (this.stock.volume / this.totalVolume) * 100;
    }

    larguraNodo() {
        if(this.totalStocks <= 250){
            return this.proporcaoNodoEmRelacaoAoVolume();
        }
        return this.proporcaoNodoEmRelacaoAoVolume() * 10;
    }

    alturaNodo() {
        const alturaJanela = window.innerHeight;
        if(this.totalStocks <= 250){
            return alturaJanela;
        }
        return alturaJanela / 8;
    }

    createStockItem() {

        const largura = this.larguraNodo();
        const altura = this.alturaNodo();

        const div = document.createElement('div');
        div.className = 'stock-item';

        const intensity = Math.abs(this.stock.change) / 10;
        const color = this.stock.change < 0 ? `rgba(255, 0, 0, ${intensity})` : `rgba(0, 255, 0, ${intensity})`;
        div.style.backgroundColor = color;

        div.style.width = `${largura}%`;
        div.style.height = `${altura}px`;

        const img = document.createElement('img');
        img.src = this.stock.logo;
        div.appendChild(img);

        div.addEventListener('mouseover', this.showDetail.bind(this));
        div.addEventListener('mousemove', this.moveDetail.bind(this));
        div.addEventListener('mouseout', this.hideDetail.bind(this));

        this.container.appendChild(div);
    }

    showDetail(e) {
        const changeColor = this.stock.change < 0 ? 'red' : 'green';
        const arrowDirection = this.stock.change < 0 ? 'fa-arrow-down' : 'fa-arrow-up';
        this.detailBox.innerHTML = `
            <h3><b>${this.stock.name}</b> - ${this.stock.stock}</h3>
            <ul>
                <li><b>Preço de fechamento:</b> R$ ${this.stock.close.toFixed(2)}</li>
                <li><b>Variação:</b> <i class="fas ${arrowDirection}" style="color: ${changeColor};"></i> <span style="color: ${changeColor}">${this.stock.change.toFixed(2)}%</span></li>
                <li><b>Volume:</b> ${this.stock.volume}</li>
                <li><b>Capitalização de mercado:</b> ${this.stock.market_cap?.toFixed(2) ?? 0}</li>
            </ul>
        `;
        this.detailBox.style.display = 'block';
        this.detailBox.style.left = `${e.pageX + 10}px`;
        this.detailBox.style.top = `${e.pageY + 10}px`;
    }

    moveDetail(e) {
        const detailBoxWidth = this.detailBox.offsetWidth;
        const pageWidth = window.innerWidth;

        let left = e.pageX + 5;
        let top = e.pageY + 5;

        if (left + detailBoxWidth > pageWidth) {
            left = pageWidth - detailBoxWidth - 5;
        }

        this.detailBox.style.left = `${left}px`;
        this.detailBox.style.top = `${top}px`;
    }

    hideDetail() {
        this.detailBox.style.display = 'none';
    }
}
