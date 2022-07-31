<template>
  <div class="checkout">
    <div v-if="loadingGif">
      <Loader></Loader>
    </div>
    <div v-if="loader">CARICAMENTO</div>
    <div v-else>
      <div class="container">
        <h1 class="p-3">
          CHECKOUT
        </h1>

        <!-- FORM GUEST -->

        <!-- DATI GUEST PER L'ACQUISTO -->
        <div class="form_guest">

          <div class="row justify-content-center">
            <div class="col col-12 col-md-6 px-5">

              <!-- guest name -->
              <div class="mb-3">
                <label
                  for="guest_name"
                  class="col-md-4 col-form-label text-md-right"
                  >Nome<span class="text-primary">*</span></label
                >

                <div>
                  <input
                    v-model="form.guest_name"
                    onkeypress="return (event.charCode >= 60 || event.charCode == 8 || event.charCode == 32)"
                    id="guest_name"
                    type="text"
                    class="form-control"
                    name="guest_name"
                    placeholder="Inserisci il tuo cognome"
                    required
                    autocomplete="guest_name"
                    autofocus
                  />
                </div>
              </div>
              <!-- guest surname -->
              <div class="mb-3">
                <label
                  for="guest_surname"
                  class="col-md-4 col-form-label text-md-right"
                  >Cognome<span class="text-primary">*</span></label
                >

                <div >
                  <input
                    v-model="form.guest_surname"
                    onkeypress="return (event.charCode >= 60 || event.charCode == 8 || event.charCode == 32)"
                    id="guest_surname"
                    type="text"
                    class="form-control"
                    name="guest_surname"
                    placeholder="Inserisci il tuo cognome"
                    required
                    autocomplete="guest_surname"
                    autofocus
                  />
                </div>
              </div>
              <!-- guest phone number -->
              <div class="mb-3">
                <label
                  for="guest_phone_number"
                  class="col-md-4 col-form-label text-md-right"
                  >Numero di Telefono <span class="text-primary">*</span></label
                >

                <div >
                  <input
                    v-model="form.guest_phone_number"
                    id="guest_phone_number"
                    onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                    type="text"
                    class="form-control"
                    name="guest_phone_number"
                    placeholder="33433333333"
                    required
                    autocomplete="guest_phone_number"
                    minlength="10"
                    maxlength="10"
                    autofocus
                  />
                </div>
              </div>
              <!-- guest e-mail -->
              <div class="mb-3">
                <label
                  for="guest_email"
                  class="col-md-4 col-form-label text-md-right"
                  >E-mail<span class="text-primary">*</span></label
                >

                <div >
                  <input
                    v-model="form.guest_email"
                    id="guest_email"
                    type="guest_email"
                    class="form-control"
                    name="guest_email"
                    placeholder="email@gmail.com"
                    required
                    autocomplete="guest_email"
                  />
                </div>
              </div>
              <!-- guest city -->
              <div class="mb-3">
                <label for="city" class="col-md-4 col-form-label text-md-right"
                  >Città</label
                >

                <div >
                  <input
                    id="city"
                    type="text"
                    class="form-control"
                    name="city"
                    value="Milano"
                    autocomplete="city"
                    autofocus
                    disabled
                  />
                </div>
              </div>
              <!-- guest zip code -->
              <div class="mb-3">
                <label
                  for="guest_zip_code"
                  class="col-md-4 col-form-label text-md-right"
                  >Cap<span class="text-primary">*</span></label
                >

                <div >
                  <input
                    v-model="form.guest_zip_code"
                    id="guest_zip_code"
                    type="text"
                    onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                    size="5"
                    class="form-control"
                    name="guest_zip_code"
                    placeholder="52100"
                    required
                    autocomplete="guest_zip_code"
                    minlength="5"
                    maxlength="5"
                    autofocus
                  />
                </div>
              </div>
              <!-- guest address -->
              <div class="mb-3">
                <label
                  for="guest_address"
                  class="col-md-4 col-form-label text-md-right"
                  >Indirizzo <span class="text-primary">*</span></label
                >

                <div >
                  <input
                    v-model="form.guest_address"
                    id="guest_address"
                    type="text"
                    class="form-control"
                    name="guest_address"
                    placeholder="Via Taldetali, 22"
                    required
                    autocomplete="guest_address"
                    autofocus
                  />
                </div>
              </div>
              <!-- guest Note -->
              <div class="mb-3">
                <label
                  for="guest_note"
                  class="col-md-4 col-form-label text-md-right"
                  >Note</label
                >
                <div >
                  <textarea
                    v-model="form.note"
                    class="form-control"
                    placeholder="Inserisci delle info utiili per il rider"
                    name="guest_note"
                    id="guest_note"
                    rows="4"
                    required
                  ></textarea>
                </div>
              </div>
            </div>

              <!-- CARRELLO -->

            <div class="col col-12 col-md-6 px-5 py-3">

              <div class="row flex-column">

                <div class="col py-2">

                  <div class="card border-0 p-3 shadow  text-start">
                    <h3 class="ps-3">Summary</h3>
                    <div class="card-body" v-for="(product, index) in restaurantCart"
                    :key="index">
                      
                      <div class="row pb-3 border-bottom">

                        <div class="col">{{product.name}}</div>
                        <div class="col">Qt. {{product.quantity}}</div>
                        <div class="col">€ {{product.total}}</div>

                      </div>

                    </div>

                    <div
                    v-show="totalPriceCart != 0"
                    class="col total-price-cart p-3 pb-0"
                    >
                      <h4>Totale: € {{ totalPriceCart }}</h4>  
                    </div>

                  </div>

                  
                </div>

                <!-- componente braintree -->
                <div class="col d-flex justify-content-center">
                  <v-braintree
                    locale="it_IT"
                    :vaultManager="true"
                    :authorization="tokenApi"
                    @success="onSuccess"
                    @error="onError"
                    @load="onLoad"
                  >
                  </v-braintree>
                </div>


              </div>

            </div>
            


          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import axios from "axios";
import Loader from "../components/Loader.vue";
export default {
  name: "Checkout",
  components: {
    Loader,
  },

  data() {
    return {
      tokenApi: "",
      restaurantId: "",
      restaurantCart: "",
      totalPriceCart: 0,
      loader: true,
      disableBuyButton: true,
      loadingPayment: true,
      loadingGif: false,
      form: {
        token: "",
        restaurantId: "",
        products: [],
        guest_name: "",
        guest_surname: "",
        guest_phone_number: "",
        guest_email: "",
        guest_city: "Milano",
        guest_zip_code: "",
        guest_address: "",
        note: "",
        total_price: "",
        status: "false",
      },
    };
  },

  mounted() {
    this.generateKey();
    this.getRestaurant();
  },

  methods: {
    getRestaurant() {
      axios
        .get("/api/checkout/" + this.$route.params.slug)
        .then((response) => {
          this.restaurantId = response.data.restaurant.id;
          this.form.restaurantId = response.data.restaurant.id;
          console.log(this.restaurantId);
          this.cartLocalStorage();
        })
        .catch((e) => {
          console.error(e);
        });
    },

    // RIPRENDO I DATI DALLO STORAGE
    cartLocalStorage() {
      let cart = JSON.parse(localStorage.getItem(this.restaurantId));
      this.restaurantCart = cart;

      this.getTotalPrice();
      this.getFormData(cart);
    },

    getTotalPrice() {
      let priceNotRounded = 0;
      this.restaurantCart.forEach((element) => {
        priceNotRounded += element.total;
      });
      this.form.total_price = priceNotRounded.toFixed(2);
      this.totalPriceCart = priceNotRounded.toFixed(2);
    },

    getFormData(products) {
      products.forEach((product) => {
        this.form.products.push({
          product_id: product.id,
          quantity: product.quantity,
        });
      });
    },

    async generateKey() {
      await axios
        .get("http://127.0.0.1:8000/api/orders/generate")
        .then((res) => {
          this.tokenApi = res.data.token;
          /* console.log(this.tokenApi); */
          (this.loader = false), (this.loadingPayment = true);
        })
        .catch((err) => {
          console.log(err);
        });
    },

    onLoad() {
      /* alert("sta caricando"); */
      this.disableBuyButton = false;
    },

    onSuccess(payload) {
      let token = payload.nonce;
      this.form.token = token;
      this.loader = false;
      this.loadingGif = true;
      this.buy();

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

    async buy() {
      /* console.log(this.form) */
      await axios
        .post("http://127.0.0.1:8000/api/orders/make/payment", { ...this.form })
        .then((response) => {
          console.log("Successfully uploaded: ", response);
          localStorage.removeItem(this.restaurantId);
          setTimeout(function() {
             this.$router.push('/checkout/:slug/thankyou');
          }.bind(this), 4000);
        })
        .catch((err) => {
          console.error("error occurred: ", err);
        });
    },
  },
};
</script>

<style scoped lang="scss">
.submit {
  text-transform: lowercase;
  align-items: center;
  margin-bottom: 10px;
  padding: 5px 10px;
  width: 100%;
  background-color: green;
  color: #fff;

  svg {
    fill: currentColor;
    width: 20px;
    height: 20px;
    margin-right: 8px;
  }
}
</style>