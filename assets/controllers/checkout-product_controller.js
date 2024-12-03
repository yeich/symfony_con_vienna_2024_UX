import {Controller} from "@hotwired/stimulus";

export default class extends Controller {

    static targets = ['decrease', 'quantity', 'totalprice', 'price'];

    decrease() {

        let newQuantity = parseInt(this.quantityTarget.textContent) - 1;

        this.quantityTarget.textContent = newQuantity;

        if(newQuantity === 0) {
            this.decreaseTarget.setAttribute('disabled', 'disabled');
        }

        this.updateTotalPrice();
    }

    increase() {
        this.quantityTarget.textContent = parseInt(this.quantityTarget.textContent) + 1;
        this.decreaseTarget.removeAttribute('disabled');

        this.updateTotalPrice();
    }

    connect() {
        this.quantityTarget.textContent = 0;
        this.totalpriceTarget.textContent = 0;
    }

    updateTotalPrice() {
        this.totalpriceTarget.textContent = parseInt(this.quantityTarget.textContent) * parseFloat(this.priceTarget.textContent);
    }
}