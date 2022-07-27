<template>

    <div class="bg-dark footer-section">

        <div class="container py-5 text-white">
                
            <div class="row">

                <div class="col-xs-12 col-md-6 col-lg-3 mb-4 flex-column">

                    <div class="card text-start p-4 card-footer">

                      <div class="card-body">

                        <h4 class="pb-3">Scopri Deliveboo</h4>

                        <ul class="footer-links list-unstyled">

                            <li class="pb-2">Investitori</li>
                            <li class="pb-2">Chi siamo</li>
                            <li class="pb-2">Ristoranti</li>
                            <li class="pb-2">Altro</li>
                            <li class="pb-2">Pressroom</li>
                            <li class="pb-2">Il nostro blog</li>
                            <li class="pb-2">Programmazione</li>
                            <li class="pb-2">Design</li>
                            <li class="pb-2">Lavora con noi</li>
                            <li class="pb-2">Diventa nostro partner</li>

                        </ul>
                        
                      </div>
                    </div>

                </div>

                <div class="col-xs-12 col-md-6 col-lg-3 mb-4  flex-column">

                    <div class="card text-start p-4 card-footer">

                      <div class="card-body">

                        <h4 class="pb-3">Note legali</h4>

                        <ul class="footer-links list-unstyled">

                            <li class="pb-2">Termini & Condizioni</li>
                            <li class="pb-2">Informativa sulla privacy</li>
                            <li class="pb-2">Cookies</li>

                        </ul>
                        
                      </div>
                    </div>

                </div>

                <div class="col-xs-12 col-md-6 col-lg-3 mb-4  flex-column">

                    <div class="card text-start p-4 card-footer">

                      <div class="card-body">

                        <h4 class="pb-3">Aiuto</h4>

                        <ul class="footer-links list-unstyled">

                            <li class="pb-2">Contatti</li>
                            <li class="pb-2">FAQ</li>
                            <li class="pb-2">Tipi di cucina</li>

                        </ul>
                        
                      </div>
                    </div>

                </div>

                <div class="col-xs-12 col-md-6 col-lg-3 mb-4  flex-column">

                    <div class="card text-start p-4 card-footer">

                      <div class="card-body">

                        <h4 class="pb-3">Porta Deliveboo con te</h4>

                        <ul class="footer-links list-unstyled">

                            <li class="pb-2">Scarica su App Store</li>
                            <li class="pb-2">Disponibile su Play Store</li>

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

<style scoped>

.card-footer{
    background-color: rgba(224, 224, 224, 0.091);
    height: 458.23px;
};

</style>