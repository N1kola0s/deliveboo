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
                <a class="btn btn-primary" role="button">+</a>
              </div>
            </div>
          </div>

          <!-- CARRELLO -->
          <div class="col-5">
            <div class="card" style="height: 200px;">
            <h3>CARRELLO</h3>
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
    }
  },

  methods: {
    getRestaurant() {
      axios
        .get('/api/' + this.$route.params.slug)
        .then((response) => {
          console.log(response);
          this.restaurant = response.data

        }).catch(e => {
          console.error(e);
        })
    }
  },

  mounted() {
    this.getRestaurant();

  }

}

</script>