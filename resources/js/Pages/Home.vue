<template>

  <div class="home_page">
    <JumboSection />

    <!-- RISTORANTI che poi vanno filtrati e TIPI  -->
    <div class="container py-5">

      <!-- TYPES -->
      <div class="label-div d-flex">

        <div class="p-2" v-for="(type, index) in types" :key="index">
          <label class="p-1" :class="{ checked: checkedTypes.includes(type.id) }" :for="type.id">{{ type.name }}
            <input type="checkbox" :name="type" :id="type.id" :value="type.id" v-model="checkedTypes"
              @change="searching()">
          </label>
        </div>
      </div>

      <!-- RISTORANTI FILTRATI -->
      <div v-if="checkedTypes.length != 0" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
        <div class="col" v-for="restaurant in filteredRestaurants" :key="restaurant.id">
          <router-link :to="{ name: 'restaurant', params: { 'slug': restaurant.slug } }" class="restaurant">
            <img class="img-fluid"
              :src="restaurant.cover_img.includes('uploads') ? '/storage/' + restaurant.cover_img : restaurant.cover_img"
              :alt="restaurant.business_name">
          </router-link>
        </div>

      </div>
      <!-- RISTORANTI PRIMA CHIAMATA -->
      <div v-else class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
        <div class="col" v-for="restaurant in restaurantsResponse.data" :key="restaurant.id">
          <router-link :to="{ name: 'restaurant', params: { 'slug': restaurant.slug } }" class="restaurant">
            <img class="img-fluid"
              :src="restaurant.cover_img.includes('uploads') ? '/storage/' + restaurant.cover_img : restaurant.cover_img"
              :alt="restaurant.business_name">
          </router-link>
        </div>
      </div>

      <!-- PAGINAZIONE -->
      <div v-if="checkedTypes.length != 0" class="py-2 justify-content-center">
        <nav aria-label="Page navigation" class="py-5">
          <ul class="pagination justify-content-center">
            <li class="page-item" v-if="pagination.current > 1">
              <a class="page-link" aria-label="Previous" @click.prevent="searching(pagination.current - 1)">
                <span aria-hidden="true">&laquo;</span>
                <span class="visually-hidden">Previous</span>
              </a>
            </li>

            <li :class="{ 'page-item': true, 'active': page == pagination.current }"
              v-for="(page, index) in pagination.maxPages" :key="index">

              <a class="page-link" @click.prevent="getRestaurants(page)">
                {{ page }}
              </a>
            </li>

            <li class="page-item" v-if="pagination.current < pagination.maxPages">
              <a class="page-link" aria-label="Next" @click.prevent="searching(pagination.current + 1)">
                <span aria-hidden="true">&raquo;</span>
                <span class="visually-hidden">Next</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>

      <div v-else class="py-2 justify-content-center">
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
      checkedTypes: [],
      filteredRestaurants: [],

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
          /* console.log(response); */
          this.types = response.data

        }).catch(e => {
          console.error(e);
        })
    },
    searching(restaurantPage) {
      if (!this.checkedTypes.length == 0) {
        axios
          .get(`/api/restaurants/filter`,
            {
              params: {
                type: this.checkedTypes,
                page: restaurantPage,
              }
            })
          .then(response => {
            console.log(response.data);
            this.filteredRestaurants = response.data.data;
            this.pagination = {
              current: response.data.current_page,
              maxPages: response.data.last_page
            }

          })
          .catch(e => {
            console.error(e);
          })
      } else {
        this.filteredRestaurants = [];
      }
    },
  },
  mounted() {
    this.getRestaurants(1);
    this.getTypes();
  }
}
</script>