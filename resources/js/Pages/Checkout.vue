<template>
  <div class="checkout">
    <div v-if="loader">CARICAMENTO</div>
    <div v-else>
      <div class="container">
        <h1 class="py-3">
          CHECKOUT PAGAMENTO ristorante con id {{ restaurantId }}
        </h1>
        <div class="row justify-content-center">
          <div
            class="col-7 py-2"
            v-for="(product, index) in restaurantCart"
            :key="index"
          >
            {{ product.name }} - € {{ product.price }} - qty:
            {{ product.quantity }} - total: € {{ product.total }}
          </div>

          <div
            v-show="totalPriceCart != 0"
            class="col-7 total-price-cart border-top py-2"
          >
            Totale: € {{ totalPriceCart }}
          </div>
        </div>

        <!-- componente braintree -->
        <div class="col-4">
          <v-braintree
            locale="it_IT"
            :vaultManager="true"
            :authorization="tokenApi"
            @success="onSuccess"
            @error="onError"
            @load="onLoad"
          >
            <!-- bottone custom -->
            <template v-slot:button="slotProps">
              <v-btn class="submit" @click="slotProps.submit">
                <svg
                  height="24"
                  width="24"
                  viewBox="0 0 24 24"
                  class="ccl-0f24ac4b87ce1f67 ccl-ed34b65f78f16205"
                >
                  <path
                    d="M18 9H20V21H4V9H6C6 5.69158 8.69158 3 12 3C15.3084 3 18 5.69158 18 9ZM6 19H18V11H6V19ZM8 9H16C16 6.79442 14.2056 5 12 5C9.79442 5 8 6.79442 8 9ZM11.5 16V14H12.5V16H11.5Z"
                  ></path>
                </svg>
                Ordina per la consegna
              </v-btn>
            </template>
          </v-braintree>
        </div>

        {{form}}

        <!-- errore -->
        <p v-if="error">
          {{ error }}
        </p>
      </div>
    </div>
  </div>
</template>


<script>
import axios from "axios";
export default {
  name: "Checkout",

  data() {
    return {
      restaurantId: "",
      restaurantCart: "",
      totalPriceCart: 0,
      tokenApi: "",
      loader: true,
      disableBuyButton: true,
      loadingPayment: true,
      form: {
        token: '',
        product: ''
      }
    };
  },

  methods: {
    getRestaurant() {
      axios
        .get("/api/checkout/" + this.$route.params.slug)
        .then((response) => {
          console.log(response);
          this.restaurantId = response.data.id;
          this.cartLocalStorage();
        })
        .catch((e) => {
          console.error(e);
        });
    },

    // RIPRENDO I DATI DALLO STORAGE
    cartLocalStorage() {
      this.restaurantCart = JSON.parse(localStorage.getItem(this.restaurantId));
      this.getTotalPrice();
    },

    getTotalPrice() {
      let priceNotRounded = 0;
      this.restaurantCart.forEach((element) => {
        priceNotRounded += element.total;
      });

      this.totalPriceCart = priceNotRounded.toFixed(2);
    },
    async generateKey() {
      await axios
        .get("http://127.0.0.1:8000/api/orders/generate")
        .then((res) => {
          this.tokenApi = res.data.token;
          console.log(this.tokenApi);
          (this.loader = false), (this.loadingPayment = true);
        })
        .catch((err) => {
          console.log(err);
        });
    },

    onLoad() {
      alert("sta caricando");
      this.disableBuyButton = false;
    },

    onSuccess(payload) {
      let token = payload.nonce;
      this.loader = false;
      // Do something great with the nonce...
    },
    onError(error) {
      let message = error.message;
      if (message === "No payment method is available.") {
        this.error = "Seleziona un metodo di pagamento";
      } else {
        this.error = message;
      }
    },
    paymentOnSuccess (nonce) {
      // alert(nonce);
      this.form.token = nonce
      this.buy()
    },
    // eslint-disable-next-line node/handle-callback-err
    paymentOnError (error) {
    },

    async buy () {
      this.disableBuyButton = true
      this.loadingPayment = true
      try {
        await axios
        .post('/api/orders/make/payment', { ...this.form })
        this.$router.push({ path: '/checkout/thankyou' })
      } catch (error) {
        this.disableBuyButton = false
        this.loadingPayment = false
      }
    }

  },

  mounted() {
    this.generateKey();
    this.getRestaurant();
    this.form.product = this.restaurantId
  },
};
</script>

<style scoped lang="scss">
.submit {
  text-transform: lowercase;
  align-items: center;
  width: 100%;
  background-color: greenyellow;
  color: #fff;
  svg {
    fill: currentColor;
    width: 20px;
    height: 20px;
    margin-right: 8px;
  }
}
</style>