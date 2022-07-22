<template>
  
  <div class="home_page">
      <div class="p-5 bg-dark text-white">
        <div class="container">
          <h1 class="display-3">HOME PAGE</h1>
          <p class="lead">DAJE REGA</p>
          <hr class="my-2">
          <p class="lead">
            <a class="btn btn-primary btn-lg text-white" href="#" role="button">I RISTORANTO SONO QUI SOTTO</a>
          </p>
        </div>
      </div>

      <div class="container py-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">

          <div class="col" v-for="restaurant in restaurants" :key="restaurant.id">
          
            <div class="restaurant">
              <img class="img-fluid" :src="restaurant.cover_img" :alt="restaurant.business_name">
            </div>
          
          </div>

        </div>
      </div>

  </div>


</template>

<script>
export default {
  name: 'Home',
  data() {
    return {
      restaurants: '',
    }
  },
  mounted() {
    axios
    .get('/api/')
      .then((response) => {
        /* console.log(response); */
        this.restaurants = response.data.data
      }).catch(e => {
        console.error(e);
      })
  }
}
</script>