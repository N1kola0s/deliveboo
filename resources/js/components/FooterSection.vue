<template>

    <div class="bg-dark footer-section">

        <div class="container py-5 text-white">

            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">

                <div class="col">

                    <div class="card text-start p-4 card-footer">

                        <div class="card-body">

                            <h5 class="pb-3">Scopri Deliveboo</h5>

                            <ul class="footer-links list-unstyled">

                                <li class="pb-2"><a href="#" class="footer_link">Investitori</a></li>
                                <li class="pb-2"><a href="#" class="footer_link">Chi siamo</a> </li>
                                <li class="pb-2"><a href="#" class="footer_link">Ristoranti</a></li>
                                <li class="pb-2"><a href="#" class="footer_link">Altro</a></li>
                                <li class="pb-2"><a href="#" class="footer_link">Pressroom</a></li>
                                <li class="pb-2"><a href="#" class="footer_link">Il nostro blog</a></li>
                                <li class="pb-2"><a href="#" class="footer_link">Programmazione</a></li>
                                <li class="pb-2"><a href="#" class="footer_link">Design</a></li>
                                <li class="pb-2"><a href="#" class="footer_link">Lavora con noi</a></li>
                                <li class="pb-2"><a href="#" class="footer_link">Diventa nostro partner</a></li>

                            </ul>

                        </div>
                    </div>

                </div>

                <div class="col">

                    <div class="card text-start p-4 card-footer">

                        <div class="card-body">

                            <h5 class="pb-3">Note legali</h5>

                            <ul class="footer-links list-unstyled">

                                <li class="pb-2"><a href="#" class="footer_link">Termini & Condizioni</a></li>
                                <li class="pb-2"><a href="#" class="footer_link">Informativa sulla privacy</a></li>
                                <li class="pb-2"><a href="#" class="footer_link">Cookies</a></li>

                            </ul>

                        </div>
                    </div>

                </div>

                <div class="col">

                    <div class="card text-start p-4 card-footer">

                        <div class="card-body">

                            <h5 class="pb-3">Aiuto</h5>

                            <ul class="footer-links list-unstyled">

                                <li class="pb-2"><a href="#" class="footer_link">Contatti</a></li>
                                <li class="pb-2"><a href="#" class="footer_link">FAQ</a></li>
                                <li class="pb-2"><a href="#" class="footer_link">Tipi di cucina</a></li>

                            </ul>

                        </div>
                    </div>

                </div>

                <div class="col">

                    <div class="card text-start p-4 card-footer">

                        <div class="card-body">

                            <h5 class="pb-3">Porta Deliveboo con te</h5>

                            <ul class="footer-links list-unstyled">

                                <li class="pb-4 scarica_apple"></li>
                                <li class="pb-4 scarica_google"></li>


                            </ul>

                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="credits text-muted pb-5 text-center">

            &copy; Delevoped by Team 1 | Boolean

        </div>

    </div>

</template>

<script>

export default {
    name: 'FooterSection',
    mounted() {
        console.log('Component mounted.')
    }
}
</script>

<style lang="scss" scoped>
@import 'resources/sass/_variables';

.col {
    transition: 0.5s;

    .card-footer {
        background-color: rgba(224, 224, 224, 0.091);
        height: 100%;
        transition: transform 0.6s;

        li.pb-2 {
            a {
                text-decoration: none;
                color: white;

            }

            &:hover a{
                color: $btn_orange;

            }

        }

        .scarica_apple {
            cursor: pointer;
            width: 135px;
            height: 40px;
            display: inline-block;
            text-indent: -9999px;
            background-repeat: no-repeat;
            background-size: 270px 40px;
            background-image: url('https://consumer-component-library.roocdn.com/26.7.4/static/images/app-store-badges-it.svg');

        }

        .scarica_google {
            cursor: pointer;
            width: 135px;
            height: 40px;
            display: inline-block;
            text-indent: -9999px;
            background-position: -135px 0;
            background-repeat: no-repeat;
            background-size: 270px 40px;
            background-image: url('https://consumer-component-library.roocdn.com/26.7.4/static/images/app-store-badges-it.svg');

        }

    }

}
</style>