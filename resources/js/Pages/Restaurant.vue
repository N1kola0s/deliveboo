<template>
    <div class="menu-ristorante">
        <!-- Hero Image ristorante più titolo -->
        <div class="container pb-5">
            <div class="w-100">
                <!-- Nome del Ristorante -->
                <h1 class="restaurant_title">{{restaurant.business_name}}</h1>
                <!-- Immagine del ristorante -->
                <img class="img-fluid hero_restaurant"
                :src="restaurant.cover_img.includes('uploads') ? '/storage/' + restaurant.cover_img : restaurant.cover_img"
                :alt="restaurant.business_name">
            </div>
        </div>

        <!-- SEZIONE MENU CARRELLO -->
        <div class="container menu-carrello py-4">
            <div class="row h-100 p-0 m-0">
                <!-- Lista di piatti -->
                <div class="col-9 flex_start_restaurant gx-1 m-0 h-100 flex-wrap">
                    <!-- Questo è quello da ciclare -->
                    <!-- /.product_restaurant -->
                    <div class="product_restaurant col-auto" v-for="product in restaurant.products" :key="product.id">
                        <!-- Immagine del piatto -->
                        <div class="col-12 h-50 p-0">
                            <img class="product_image_restaurant" :src="product.cover_img.includes('uploads') ? '/storage/' + product.cover_img : product.cover_img" :alt="product.name">
                        </div>
                        <!-- Descrizione del piatto -->
                        <div class="col-12 h-25 p-0">
                            <!-- Nome piatto -->
                            <h4 class="text-black mb-0 p-1">{{product.name}}</h4>
                            <!-- Prezzo -->
                            <p class="text-black p-1 mb-0">Prezzo : {{product.price}} €</p>
                            <!-- Descrizione -->
                            <p class="text-black p-1 mb-0">Descrizione : {{product.description}}</p>
                        </div>
                        <!-- Button per aggiungi al carrello -->
                        <div class="col-12 h-25 flex_end_restaurant pb-3 p-0">
                            <a class="btn btn-primary" role="button" @click="addProduct(product)">Aggiungi</a>
                        </div>
                    </div>
                </div>
                <!-- Carrello laterale -->
                <div class="col-3 bordo_visibile">
                    <!-- Card del carrello -->
                    <div class="card">
                        <!-- Titolo del carrello -->
                        <h3>CARRELLO</h3>
                        <!-- Carrello -->
                        <div class="container-fluid">
                            <!-- Row -->
                            <div class="row row-cols-1">
                                <div class="col" v-for="(product, index) in cart.products" :key="index">
                                    {{ product.name }} - € {{ product.price }} - qty: {{ product.quantity }} - total: € {{ product.total }}
                                    <button class="py-2" @click="removeQty(product)">-</button>
                                    <button class="py-2" @click="addQty(product)">+</button>
                                </div>
                            </div>
                            <!-- Linea separazione -->
                            <hr>
                            <!-- Prezzo Prodotto -->
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



                <!-- <div class="row row-cols-3 row-cols-xxl-3 bordo_visibile row-cols-md-2 g-4">
                    <div class="col bordo_visibile h-100" v-for="product in restaurant.products" :key="product.id"> -->
                        <!-- Immagine profilo -->
                        <!-- <img :src="product.cover_img.includes('uploads') ? '/storage/' + product.cover_img : product.cover_img" :alt="product.name">
                        <div class="card-bottom">
                            {{ product.name }}
                        </div>
                        <a class="btn btn-primary" role="button" @click="addProduct(product)">+</a>
                    </div>
                </div>
            </div> -->



        </div>
    </div>
</template>

<style lang="scss" scoped>
/* Immagine profilo Ristorante */

.product_image_restaurant,
.hero_restaurant {
    object-fit: cover;
    object-position: center center;
}

.hero_restaurant {
    width: 100%;
    height: 500px;
}

/* Questo è il titolo del ristorante */
.restaurant_title {
    font-size: 40px;
    color:black;
    margin-top:1rem;
}

/* Questa è la singola card */
.product_restaurant {
    width: 300px;
    margin-left: 15px;
    height: 500px;
    border-radius: 25px;
    color: #fff;
    border: 0.5px solid rgb(10, 10, 10);
    box-shadow: 0 0 10px solid rgb(10, 10, 10);
}

.bordo_visibile {
    border: 2px solid black;
}

.flex_start_restaurant {
    display: flex;
    justify-content: flex-start;
    align-items: center;
}

.flex_end_restaurant {
    display: flex;
    justify-content: center;
    align-items: flex-end;
}

/* Immagine del singolo prodotto */
.product_image_restaurant {
    width: 100%;
    height: 100%;
    border-top-left-radius: 25px;
    border-top-right-radius: 25px;
}

</style>


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


