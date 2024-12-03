import {Controller} from "@hotwired/stimulus";

const COUPONS = {
    'BF2024': 10,
    'SYMCON': 50
}

export default class extends Controller {

    static targets = ['price', 'coupon', 'discount'];
    static outlets = ['checkout-product'];

    connect() {
        this.priceTarget.textContent = 0;
    }

    update() {

        let totalQuantity = 0;
        let totalPrice = 0;

        this.checkoutProductOutlets.forEach(product => {
            totalQuantity += parseInt(product.quantityTarget.textContent);
            totalPrice += parseInt(product.quantityTarget.textContent) * parseFloat(product.priceTarget.textContent);
        });

        let discount = this.getDiscount(totalPrice);

        this.priceTarget.innerHTML = `${discount > 0 ? ` <s>(${totalPrice} €)</s><br/>` : ''}${totalPrice - discount} €`;

        if(totalQuantity > 0) {
            this.couponTarget.removeAttribute('disabled');
        } else {
            this.couponTarget.setAttribute('disabled', 'disabled');
            this.discountTarget.closest('tr').style.display = 'none';
        }
    }

    getDiscount(totalPrice) {

        let discount = 0;

        if(this.couponTarget.value in COUPONS) {
            discount = ((totalPrice / 100 ) * COUPONS[this.couponTarget.value]);

            this.discountTarget.textContent = `${discount}%`;
            this.discountTarget.closest('tr').style.display = 'table-row';
            this.couponTarget.setAttribute('aria-invalid', false);
        } else {
            this.discountTarget.closest('tr').style.display = 'none';

            if(this.couponTarget.value.length > 0) {
                this.couponTarget.setAttribute('aria-invalid', true);
            }
        }

        return discount;
    }
}