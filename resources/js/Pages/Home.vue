<template>

  <div class="home_page">
    <JumboSection />

    <!-- RISTORANTI che poi vanno filtrati e TIPI  -->
    <div class="container py-5">
      <div class="types py-3">
        <a class="mx-2 my-1 btn btn-primary" v-for="type in types" :key="type.id">
          {{ type.name }}
        </a>
      </div>

      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">

        <div class="col" v-for="restaurant in restaurantsResponse.data" :key="restaurant.id">

          <router-link :to="{name: 'restaurant', params: {'slug': restaurant.slug}}" class="restaurant"> 
            <img class="img-fluid"
              :src="restaurant.cover_img.includes('uploads') ? '/storage/' + restaurant.cover_img : restaurant.cover_img"
              :alt="restaurant.business_name">
          </router-link>

        </div>

      </div>

      <!-- PAGINAZIONE -->
      <div class="py-2 justify-content-center">
        <nav aria-label="Page navigation" class="py-5">
          <ul class="pagination justify-content-center">
            <li class="page-item" v-if="restaurantsResponse.current_page > 1">
              <a class="page-link" aria-label="Previous"
                @click.prevent="getRestaurants(restaurantsResponse.current_page - 1)">
                <span aria-hidden="true">&laquo;</span>
                <span class="visually-hidden">Previous</span>
              </a>
            </li>

            <li :class="{ 'page-item': true, 'active': page == restaurantsResponse.current_page }"
              v-for="page in restaurantsResponse.last_page" :key="page.index">

              <a class="page-link" @click.prevent="getRestaurants(page)">
                {{ page }}
              </a>
            </li>

            <li class="page-item" v-if="restaurantsResponse.current_page < restaurantsResponse.last_page">
              <a class="page-link" aria-label="Next"
                @click.prevent="getRestaurants(restaurantsResponse.current_page + 1)">
                <span aria-hidden="true">&raquo;</span>
                <span class="visually-hidden">Next</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <WorkWithUs />
    <AboutUs />
    <FooterSection />

  </div>


</template>


<script>
import JumboSection from '../components/JumboSection.vue';
import AboutUs from '../components/AboutUs.vue';
import WorkWithUs from '../components/WorkWithUs.vue';
import FooterSection from '../components/FooterSection.vue';

export default {
  name: 'Home',
  components: {
    JumboSection,
    AboutUs,
    WorkWithUs,
    FooterSection
  },
  data() {
    return {
      /* restaurants: '', */ // senza paginazione
      restaurantsResponse: '', // per paginazione
      types: '',
      
    }
  },
  methods: {
    getRestaurants(restaurantPage) {
      axios
        .get('/api/restaurants', {
          params: {
            page: restaurantPage,
          }
        })
        .then((response) => {
          /* console.log(response); */
          /* this.restaurants = response.data.data */ // senza paginazione
          this.restaurantsResponse = response.data // con paginazione
        }).catch(e => {
          console.error(e);
        })
    },
    getTypes() {
      axios
        .get('/api/types')
        .then((response) => {
          console.log(response);
          this.types = response.data

        }).catch(e => {
          console.error(e);
        })
    }
  },
  mounted() {
    this.getRestaurants(1);
    this.getTypes();
  }
}
</script>