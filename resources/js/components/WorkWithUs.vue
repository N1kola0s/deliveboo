<template>
    <section class="work_with_us py-5">
        
        <div class="container my-3">

            <h2 class="display-3 pb-3 text-center">Lavora con noi</h2>

            <div class="introduction_text d-flex justify-content-center pb-3">

                <p class="lead">
                    Hai un'attività o vuoi lavorare come Driver?
                </p>
                <!-- /.lead -->

            </div>
            <!-- /.introduction_text -->

            <div class="cooperation d-flex justify-content-center my-4">

                <div class="row gy-5 gx-5">
                    
                    <div class="col col-12 col-md-6">
                        <div class="card" style="max-width: 30rem;">
                        <img src="../../img/rider01.png" class="card-img-top" alt="lavora con noi come rider">
                        <div class="card-body text-center">
                            <h4 class="card-title">Driver</h4>
                            <p class="card-text">Hai una bici o un monopattino?</p>
                            <a href="#" class="btn text-white">Lavora con noi</a>
                        </div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="col col-12 col-md-6">
                        <div class="card" style="max-width: 30rem;">
                        <img src="../../img/consegna_attivita01.png" class="card-img-top" alt="lavora con noi come attività">
                        <div class="card-body text-center">
                            <h4 class="card-title">Attività</h4>
                            <p class="card-text">Non vuoi più pensare alla consegna?</p>
                            <a href="#" class="btn text-white">Lavora con noi</a>
                        </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.cooperation -->

        </div>
        <!-- /.container -->

    </section>
    <!-- /.work_with_us -->

</template>

<script>
    export default {
        name: 'WorkWhitUs',
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="scss" scoped>
   
    @import 'resources/sass/_variables';

    section{
        background-color: $bg_light;
        color:$text_primary;

        h2{
            font-weight: 600;
        }

        .card{
            box-shadow: 0 2px 4px 0 rgb(0 0 0 / 50%);
            border-radius:20px;
            border:none;
            .card-img-top{
                border-top-left-radius: 20px;
                border-top-right-radius: 20px;
            }
            .card-body{
                h4{
                    font-weight: 600;
                    
                }
                .btn{
                    background-color: $btn_orange;
                }
                .btn:hover{
                    background-color: $btn_red;
                }
            }
        }
    }
    
</style>

