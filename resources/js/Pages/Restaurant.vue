<template>
  <div class="menu-ristorante">

    <!-- IMMAGINE DATI RISTORANTE -->
    <div class="container pb-5">
      <div class="w-50">
        <img class="img-fluid"
          :src="restaurant.cover_img.includes('uploads') ? '/storage/' + restaurant.cover_img : restaurant.cover_img"
          :alt="restaurant.business_name">
      </div>

    </div>

    <!-- SEZIONE MENU CARRELLO -->
    <div class="container menu-carrello py-4">
      <div class="container-fluid">
        <div class="row">
          <!-- MENU -->
          <div class="col-7">
            <div class="row row-cols-1 row-cols-md-2 g-4">
              <div class="col" v-for="product in restaurant.products" :key="product.id">
                <img class="img-fluid w-75"
                  :src="product.cover_img.includes('uploads') ? '/storage/' + product.cover_img : product.cover_img"
                  :alt="product.name">
                <div class="card-bottom">
                  {{ product.name }}
                </div>
                <a class="btn btn-primary" role="button" @click="addProduct(product)">+</a>
              </div>
            </div>
          </div>

          <!-- CARRELLO -->
          <div class="col-5">
            <div class="card">
              <h3>CARRELLO</h3>
              <div class="container-fluid">
                <div class="row row-cols-1">
                  <div class="col" v-for="(product, index) in cart.products" :key="index">
                    {{ product.name }} - € {{ product.price }} - qty: {{ product.quantity }} - total: € {{ product.total }}
                    <button class="py-2" @click="removeQty(product)">-</button>
                    <button class="py-2" @click="addQty(product)">+</button>
                  </div>
                  <hr>
                  <div v-show="totalPriceCart > 0" class="total-price-cart">
                    Totale: € {{ totalPriceCart }}
                  </div>
                  <!-- LINK AL PAGAMENTO -->
                  <router-link :to="{ name: 'checkout', params: { 'slug': restaurant.slug } }" class="restaurant">
                    Vai al Pagamento
                  </router-link>
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
export default {
  name: 'Restaurant',
  data() {
    return {
      restaurant: '',
      quantityDefault: 1,
      cart: {
        key: "",
        products: [],
      },
      productNameClicked: '',
      totalPriceCart: 0,
    }
  },


  methods: {
    getRestaurant() {
      axios
        .get('/api/' + this.$route.params.slug)
        .then((response) => {
          /* console.log(response); */
          this.restaurant = response.data
          this.cart.key = response.data.id;

          if (!localStorage.getItem(this.cart.key)) {
            this.setLocalStorage()  // setto il local storage

          } else {
            this.cartLocalStorage()
          }
        }).catch(e => {
          console.error(e);
        })
    },
    //settare il local storage
    setLocalStorage() {
      localStorage.setItem(this.cart.key, this.cart.products)
    },

    // RIPRENDO I DATI DALLO STORAGE
    cartLocalStorage() {
      this.cart.products = JSON.parse(localStorage.getItem(this.cart.key))
      this.getTotalPrice()
    },

    addProduct(product) {
      let productName = product.name;
      let confronto = false;
      if (this.cart.products.length >= 1) {
        this.cart.products.forEach(element => {
          if (element.name === productName) {
            element.quantity++
            element.total = element.price * element.quantity;
            confronto = true
            this.sync()
          }
        })
      }

      if (confronto === false) {
        let newProduct = {
          name: product.name,
          id: product.id,
          img: product.cover_img,
          price: product.price,
          quantity: this.quantityDefault,
          total: product.price * this.quantityDefault,
        }
        this.cart.products.push(newProduct)

      }
      this.sync()
    },

    //SINCRONIZZAZIONE DATI LOCAL STORAGE
    async sync() {
      let content = JSON.stringify(this.cart.products);
      await localStorage.setItem(this.cart.key, content);

      this.getTotalPrice()
    },



    // AGGIUNTA QUANTITA' AL PRODOTTO
    addQty(product) {
      let productName = product.name;
      this.cart.products.forEach(element => {
        if (element.name === productName) {
          element.quantity++
          element.total = element.price * element.quantity;
        }
      })

      this.sync()
    },

    // RIMOZIONE QUANTITA'
    removeQty(product) {
      let productName = product.name;
      this.cart.products.forEach((element, index) => {
        if (element.name === productName) {
          if (element.quantity === 1) {
            this.cart.products.splice(index, 1)
          } else {
            element.quantity--;
            element.total = element.price * element.quantity;
            /* console.log(element.quantity, element.name) */
          }
        }

      })
      this.sync()
    },

    getTotalPrice() {
      let priceNotRounded = 0
      if (this.cart.products.length >= 1) {
        this.cart.products.forEach(element => {
          priceNotRounded += element.total;

        })
      } else {
        this.totalPriceCart = 0
      }
      /* console.log(priceNotRounded) */
      this.totalPriceCart = priceNotRounded.toFixed(2)
      /* console.log(this.totalPriceCart) */
    }
  },


  mounted() {
    this.getRestaurant();
    /*      this.cartLocalStorage(); */

  },

}

</script>

