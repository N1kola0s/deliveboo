<template>

  <div class="home_page">
    <JumboSection />

    <!-- RISTORANTI che poi vanno filtrati e TIPI  -->
    <div class="container py-5">

      <div class="row justify-content-center">

        <div class="col col-6 col-md-4 col-lg-2">

            <h5 class="categ_title pb-3 text-uppercase">Categorie</h5>

          <!-- TYPES -->
          <div class="categ_list label-div">
            

            <div class="p-2" v-for="(type, index) in types" :key="index">
              <label class="p-1 form-check-label position-relative ps-4" :class="{ checked: checkedTypes.includes(type.id) }" :for="type.id">{{ type.name }}
                <input type="checkbox" class="form-check-label position-absolute start-0 mt-1" :name="type" :id="type.id" :value="type.id" v-model="checkedTypes"
                  @change="searching()">
              </label>
            </div>
          </div>

        </div>

        <div class="col col-6 col-md-8 col-lg-10">

          <!-- RISTORANTI FILTRATI -->
          <div v-if="checkedTypes.length != 0" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            <div class="col" v-for="restaurant in filteredRestaurants" :key="restaurant.id">
              <div class="card">

                <router-link :to="{ name: 'restaurant', params: { 'slug': restaurant.slug } }" class="restaurant">
                  <img class="card-img-top"
                    :src="restaurant.cover_img.includes('uploads') ? '/storage/' + restaurant.cover_img : restaurant.cover_img"
                    :alt="restaurant.business_name">

                </router-link>
                  <div class="card-body">
                    <h5 class="card-title text-uppercase text-center">
                      {{restaurant.business_name}}
                    </h5>
                  </div>
              </div>
            </div>

          </div>
          <!-- RISTORANTI PRIMA CHIAMATA -->
          <div v-else class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            <div class="col" v-for="restaurant in restaurantsResponse.data" :key="restaurant.id">
              <div class="card">

                <router-link :to="{ name: 'restaurant', params: { 'slug': restaurant.slug } }" class="restaurant">
                  <img class="card-img-top"
                    :src="restaurant.cover_img.includes('uploads') ? '/storage/' + restaurant.cover_img : restaurant.cover_img"
                    :alt="restaurant.business_name">

                </router-link>
                  <div class="card-body text-center">
                    <h5 class="card-title text-uppercase">
                      {{restaurant.business_name}}
                    </h5>
                  </div>
              </div>
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

<style lang="scss" scoped>
 @import 'resources/sass/_variables';

 .categ_title, .categ_list{
  color:$text_primary;
 }

 .categ_list{
  font-size: 1rem;
 }

 .categ_title{
  font-weight: 600;
 }

.card{
  border:none;
  aspect-ratio: 2/1;
  
  .card-img-top{
    max-width:18rem;
    height: 10rem;
    border-radius: 10px;
    box-shadow: 0 2px 4px 0 rgb(0 0 0 / 50%); 
    

  }

  .card-img-top:hover{
    border-radius:25px;
    outline: transparent solid 4px;
    transition-delay: 0.1s;
  }

  .card-body{
    
      h5{
        font-weight: 600;
        font-size: 1rem;
        color:$text_primary;
      }    
  }
}


</style>