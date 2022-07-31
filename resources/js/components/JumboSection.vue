<template>
  <section class="jumbo">
    <div class="container text-white">
      <div class="row">
        <div class="col-12 col-sm-7">

            <div class="jumbo_title">
                <h1 class="display-3 text-uppercase">
                <span class="title_delive">delive</span
                ><span class="title_boo">boo</span>
                </h1>
                <img class="jumbo_hat" src="img/chef_hat.png" alt="chef_hat" />
            </div>
            <!-- /.jumbo_title -->
            
            <div class="jumbo_cta mt-4">
                <a
                class="btn text-white btn-lg"
                href="#Jumbo action link"
                role="button"
                >Inizia</a
                >
            </div>
            <!-- /.jumbo_cta -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-5">
          <div class="jumbo_rider_image d-flex justify-content-start">
            <img
              class="jumbo_rider"
              src="img/jumbo_rider.png"
              alt="jumbo_rider"
            />
          </div>
          <!-- /.jumbo_rider_image -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->  
    </div>
    <!-- /.container -->
  </section>
</template>

<script>
export default {
  name: "JumboSection",
};
</script>

<style lang="scss" scoped>
 @import 'resources/sass/_variables';
.jumbo {
  height: 260px;
  background-image: url(/img/jumbo_xs_bg02.png);
  background-repeat: no-repeat;
  background-position: top center;
  background-size: cover;

  .container {
    display: flex;
    justify-content: center;

    .jumbo_title {
      position: relative;

      h1 {
        padding-top: 55px;
        font-weight: 800;
        font-style: italic;
        font-size: 48px;

        .title_delive {
          color: #ff7300;
        }
        .title_boo {
          color: #75c7fb;
        }
      }
      .jumbo_hat {
        display: none;
      }
    }

    .jumbo_cta{

        display:flex;
        justify-content: center;
        a{
            background-color:$btn_orange;      
        }
        a:hover{
            background-color: $btn_red;
        }
    }

    .col-sm-5 {
      display: none;
    }

  }
}

@media screen and (min-width: 576px) {
  .jumbo {
    height: 260px;
    background-image: url(/img/jumbo_bg02.png);
    background-repeat: no-repeat;
    background-position: top center;
    background-size: cover;

    .container {
      .jumbo_title {

        h1 {
          padding-top: 92px;
          font-weight: 800;
          font-style: italic;
          font-size: 63px;
        }
        .jumbo_hat {
          display: block;
          position: absolute;
          right: 55px;
          top: 43px;
          width: 90px;
        }
      }

      .jumbo_cta{
        display:block;
      }
      .col-sm-5 {
        display: block;
        .jumbo_rider {
          width: 260px;
        }
      }
    }
  }
}

@media screen and (min-width: 768px) {
  .jumbo {
    height: 380px;
    
    .container {
      .jumbo_title {

        h1 {
          padding-top: 147px;
          font-weight: 800;
          font-style: italic;
          font-size: 75px;

        }
        .jumbo_hat {
          position: absolute;
          right: 115px;
          top: 90px;
          width: 105px;
        }
      }

      .col-sm-5 {
        display: block;
        .jumbo_rider {
          width: 400px;
        }
      }
    }
  }
}

@media screen and (min-width: 992px) {
  .jumbo {
    height: 455px;

    .container {
      .jumbo_title {

        h1 {
          padding-top: 163px;
          font-weight: 800;
          font-style: italic;
          font-size: 109px;
        }
        .jumbo_hat {
          position: absolute;
          right: 127px;
          top: 79px;
          width: 155px;
        }
      }
      .jumbo_cta{
        font-weight: 600;
        a{
            width: 135px;
        }
      }

      .col-sm-5 {
        display: block;
        .jumbo_rider {
          width: 480px;
        }
      }
    }
  }
}

@media screen and (min-width: 1200px) {
  .jumbo {
    height: 520px;
    .container {
      .jumbo_title {

        h1 {
          padding-top: 175px;
          font-weight: 800;
          font-style: italic;
          font-size: 120px;
        }
        .jumbo_hat {
          position: absolute;
          right: 195px;
          top: 86px;
          width: 165px;
        }
      }

      .col-sm-5 {
        display: block;
        .jumbo_rider {
          width: 560px;
        }
      }
    }
  }
}

@media screen and (min-width: 1400px) {
  .jumbo {
    height: 520px;
    .container {
      .jumbo_title {
        h1 {
          padding-top: 144px;
          font-weight: 800;
          font-style: italic;
          font-size: 140px;
        }
        .jumbo_hat {
          position: absolute;
          right: 220px;
          top: 38px;
          width: 195px;
        }
      }

      .col-sm-5 {
        display: block;
        .jumbo_rider {
          width: 560px;
        }
      }
    }
  }
}
</style>
