<template>
    <div :class="about_container">
        <!-- sottotitolo di sezione -->
        <h5>Testimonial</h5>
        <!-- Titolo di sezione -->
        <h2>Perchè ci scelgono</h2>
        <!-- Row Principale -->
        <div :class="about_principal_row">
            <!-- Container delle cards -->
            <div :class="cards_container">
                <!-- Tre semplici Card -->
                <div :class="row_cards">
                    <!-- Queste 3 sono dinamiche -->
                    <div :class="dynamic_card" v-for="(element, index) in dynamic_component" :key="index">
                        <!-- Testimonianza -->
                        <p>{{element.paragrafo}}</p>
                        <!-- Foto profilo -->
                        <img class="img_testimonial" :src="element.img" alt="element.desc">
                        <!-- Nome profilo -->
                        <h5 class="pt-2">{{element.nome_utente}}</h5>
                    </div>
                </div>
                <!-- NON CANCELLATEMI -->
                <!-- Questa card da generare dinamicamente e con slider (è il mio Slideshow container). Sarà un componente -->
                <!-- <div class="row w-100 h-75 m-0 border_try flex_cent_about">
                    <div class="mySlides fade">
                        <div class="text">Caption Text</div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'AboutUs',
        data() {
            return {
                /* Classi dinamiche */
                about_container : "container flex_cent container-sm container-md container-lg container-xl text-center",
                about_principal_row : "row about_us_cont row-cols-xxl-1 row-cols-xl-1 row-cols-lg-1 row-cols-lg-1  flex_cent_about p-0",
                cards_container : "col-xxl-11 col-xl-11 col-lg-11 col-md-11 col-sm-11 text-center  h-100 p-0",
                row_cards : "row row-cols-xxl-3 row-cols-xl-3 row-cols-lg-3 row-cols-md-1 row-cols-sm-1 w-100 h-100 m-0 flex_cent_about flex-xxl-nowrap flex-xl-nowrap flex-lg-nowrap flex-md-wrap",
                dynamic_card : "col-4 h-100 p-2  d-flex flex-column justify-content-center align-items-center",
                dynamic_component :
                [
                    /* Primo oggetto */
                    {
                        paragrafo : "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint omnis rem debitis, dignissimos porro, voluptatum aperiam aliquid impedit deleniti aspernatur eaque eveniet culpa quaerat dolor!",
                        img: "https://picsum.photos/100/100",
                        desc: "Utente",
                        nome_utente : "Maria"
                    },
                    /* Primo oggetto */
                    {
                        paragrafo : "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint omnis rem debitis, dignissimos porro, voluptatum aperiam aliquid impedit deleniti aspernatur eaque eveniet culpa quaerat dolor!",
                        img: "https://picsum.photos/100/100",
                        desc: "Utente",
                        nome_utente : "Antonietta"
                    },
                    /* Primo oggetto */
                    {
                        paragrafo : "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint omnis rem debitis, dignissimos porro, voluptatum aperiam aliquid impedit deleniti aspernatur eaque eveniet culpa quaerat dolor!",
                        img: "https://picsum.photos/100/100",
                        desc: "Utente",
                        nome_utente : "Luigi"
                    },
                ],
            }
        },
        mounted() {
            /* Verifica in console log */
            console.log('Component mounted.')
        },
    }
</script>

<style lang="scss" scoped>
/* Classe bordo per verifica */
.border_try {
    border: 1px solid rgb(100, 70, 70);
}
.about_us_cont {
    height: 500px;
}
/* Costante display flex che si ripete */
.flex_cent_about {
    display: flex;
    justify-content: center;
    align-items: center;
}

.img_testimonial {
    width: 100px;
    height: 100px;
    border-radius: 50px;
    background-color: gray;
}

/* Media Queries per sistemare cards */
@media screen and (max-width: 991.98px) {

.about_us_cont {
    height: 1300px;
}

.col-4 {
    height: 350px !important;
}

}

</style>
