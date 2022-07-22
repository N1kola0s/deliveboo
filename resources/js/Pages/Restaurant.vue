<template>
  <div class="menu-ristorante">
    <div class="container">
      <div class="w-50">
        <img class="img-fluid"
      :src="restaurant.cover_img.includes('uploads') ? '/storage/' + restaurant.cover_img : restaurant.cover_img"
      :alt="restaurant.business_name">
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