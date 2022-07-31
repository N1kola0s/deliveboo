<template>
  <div class="payment-success text-white">
    <div class="content">
      <h1>Deliveboo</h1>
      <h2>Il pagamento è andato a buon fine.</h2>
      <br />
      <div>
        Riceverai presto una mail con i dati del tuo ordine.<br />
        Grazie per aver scelto Deliveboo <span class="heart">&#10084;</span>
      </div>
      <router-link class="route_link" :to="{ name: 'home' }"
        ><div class="jumbo_cta mt-4">
          <button class="btn text-white btn-lg">Inizia </button>
        </div>
        </router-link>
    </div>
    <div class="color">
      <div class="delivery flex">
        <img src="/img/logo_piccolo.png" alt="logo" />
        <p class="color_text">Ti ringrazia</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CheckoutSuccess",
};
</script>

<style lang="scss" scoped>
@import "resources/sass/_variables";

.flex{
  display: flex;
  flex-direction: column;
  align-items: center;
}
.color_text{
  font-weight: 600;
  width: 100px;
}

.payment-success {
  background: white;
  background: linear-gradient(176deg, #ff724c 21.8%, #212f35 22%);
  height: 100vh;
  padding-top: 135px;
  .content {
    text-align: center;
    max-width: 30%;
    margin: 0 auto;
    img {
      width: 30%;
      margin-bottom: 30px;
    }
    h1 {
      font-size: 40px;
    }
    & > div {
      font-size: 15px;
      margin-bottom: 30px;
      .heart {
        color: #e2484f;
      }
    }
    button {
      padding: 0.5em 1em;
      border-radius: 4px;
      color: #fff;
      font-weight: bold;
    }
  }

  .jumbo_cta {
    display: flex;
    justify-content: center;
    button {
      background-color: $btn_orange;
    }
    button:hover {
      background-color: $btn_red;
    }
  }
  .color {
    width: 80%;
    margin: 0 auto;
    margin-top: 50px;
    .delivery {
      position: relative;
      width: 16%;
      animation-name: move;
      animation-duration: 4s;
      animation-fill-mode: forwards;
      animation-timing-function: linear;
    }
  }
  @keyframes move {
    0% {
      left: 0px;
    }
    90% {
      left: 80%;
    }
    100% {
      left: 80%;
    }
  }
}

@media screen and (max-width: 822px) {
  .payment-success {
    padding-top: 90px;
    .content {
      max-width: 60%;

      h1 {
        font-size: 36px;
      }

      img {
        width: 20%;
      }
    }
  }
}

@media screen and (max-width: 548px) {
  .payment-success {
    .content {
      h1 {
        font-size: 34px;
      }

      img {
        width: 30%;
      }
    }
  }
}
</style>