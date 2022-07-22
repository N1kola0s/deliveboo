<template>
  
  <div class="home_page">
      <JumboSection />


      <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">

          <div class="col" v-for="restaurant in restaurants" :key="restaurant.id">
          
            <div class="restaurant">
              <img class="img-fluid" :src="restaurant.cover_img" :alt="restaurant.business_name">
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