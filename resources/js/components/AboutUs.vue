<template>
    <section class="about py-5">
        <h2 class="display-3 pb-3 text-center">Come ti aiutiamo</h2>

        <div class="container">

            <div class="introduction_text d-flex justify-content-center pb-3">

                <p class="lead">
                    I nostri servizi per aiutarti ad avere successo
                </p>
                <!-- /.lead -->

            </div>
            <!-- /.introduction_text -->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <div class="col" v-for="service in services" :key="service.id">
                    <div class="cards bg-white">
                        <div class="card-img-top position-relative">
                            <img :src="service.img" class="img-fluid" :alt="service.title">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                <path fill="#ffffff" fill-opacity="1" d="M0,288L1440,64L1440,320L0,320Z"></path>
                            </svg>
                        </div>
                        <!-- /.card-img-top -->
                        <div class="card-body bg-white">
                            <h4 class="card-title text-center py-2">{{ service.title }}</h4>
                            <!-- /.card-title -->
                            <p class="card-text text-start">{{ service.desc }}</p>
                            <!-- /.card-text -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-links">
                            <a href="#">Scopri di più</a>
                            <!-- /.btn -->
                        </div>
                        <!-- /.card-links -->
                    </div>
                </div>
                <!-- /.cards -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
</template>

<script>
export default {
    name: 'AboutUs',
    data() {
        return {
            services: [
                {
                    id: 1,
                    img: '/img/packaging.png',
                    title: 'Driver',
                    desc: 'Soluzioni di packaging personalizzato per qualsiasi tipo di cucina, con consegna gratuita il giorno successivo.',
                },
                {
                    id: 2,
                    img: '/img/marketing.jpg',
                    title: 'Marketing',
                    desc: "Fatti conoscere da nuovi clienti con gli strumenti promozionali dell'app.",
                },
                {
                    id: 3,
                    img: '/img/assistenza.jpg',
                    title: 'Centro assistenza',
                    desc: 'Hai delle domande? Cerca la risposta nel nostro Centro Assistenza o contattaci in chat..',
                },
            ]
        }
    },
    mounted() {
        /* Verifica in console log */
        console.log('Component mounted.')
    },
}
</script>

<style lang="scss" scoped>
@import 'resources/sass/_variables';

section {
    background-color: $bg_cian;
    color: $text_primary;

    h2 {
        font-weight: 600;
    }

    .row {

        .col {

            .cards {
                border-TOP-left-radius: 8px;
                border-TOP-right-radius: 8px;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 15px;

                transition: 0.4s;

                &:hover {
                    transform: translateY(-13px);
                    box-shadow: 0px 5px 7px 1px rgb(0 0 0 / 20%);
                }

                .card-img-top {


                    img {
                        border-radius: 10px;
                        aspect-ratio: 1.5;
                    }

                    svg {
                        position: absolute;
                        bottom: -2px;
                        left: 0;
                    }
                }

                .card-body {
                    height: 130px;
                    padding: 5px 24px;
                    border-bottom-left-radius: 10px;
                    border-bottom-right-radius: 15px;

                    p {
                        font-size: 0.8rem;
                    }

                }

                .card-links {
                    padding: 5px 24px;

                    a {
                        color: $btn_yellow;
                        text-align: left !important;
                        text-decoration: none;
                        transition: transform 0.3s padding-left 0.2s;

                        &:hover {
                            color: $btn_orange;
                            transform: scale(1.1);
                            padding-left: 15px;
                            display: block;
                        }
                    }
                }

            }

        }
    }
}
</style>
