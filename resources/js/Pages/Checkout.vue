<template>
    <div class="checkout">
        <div class="container">
            <h1 class="py-3"> CHECKOUT PAGAMENTO ristorante con id {{ restaurantId }} </h1>
            <div class="row justify-content-center">
                <div class="col-7 py-2" v-for="(product, index) in restaurantCart" :key="index">
                    {{ product.name }} - € {{ product.price }} - qty: {{ product.quantity }} - total: € {{ product.total }}

                </div>

                <div v-show="totalPriceCart != 0" class="col-7 total-price-cart border-top py-2">
                    Totale: € {{ totalPriceCart }}
                </div>
            </div>
        </div>
    </div>

</template>


<script>


export default {
    name: 'Checkout',
    data() {
        return {
            restaurantId: '',
            restaurantCart: '',
            totalPriceCart: 0,
        }
    },
    methods: {
        getRestaurant() {
            axios
                .get('/api/checkout/' + this.$route.params.slug)
                .then((response) => {
                    /* console.log(response); */
                    this.restaurantId = response.data.id
                    this.cartLocalStorage()
                }).catch(e => {
                    console.error(e);
                })
        },
        // RIPRENDO I DATI DALLO STORAGE
        cartLocalStorage() {
            this.restaurantCart = JSON.parse(localStorage.getItem(this.restaurantId))
            this.getTotalPrice()
        },

        getTotalPrice() {
            let priceNotRounded = 0
            this.restaurantCart.forEach(element => {
                priceNotRounded += element.total;
            })

            this.totalPriceCart = priceNotRounded.toFixed(2)

        }
    },

    mounted() {
        this.getRestaurant()
    }
}
</script>