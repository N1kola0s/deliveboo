<template>
    <div class="menu-ristorante">
        <!-- Hero Image ristorante più titolo -->
        <div class="container pb-5">
            <div class="w-100">
                <!-- Nome del Ristorante -->
                <h1 class="restaurant_title">{{restaurant.business_name}}</h1>
                <!-- Immagine del ristorante -->
                <img class="img-fluid hero_restaurant"
                :src="restaurant.cover_img.includes('uploads') ? '/storage/' + restaurant.cover_img : restaurant.cover_img"
                :alt="restaurant.business_name">
            </div>
        </div>
        
      
        

        <!-- SEZIONE MENU CARRELLO -->
        <div class="container menu-carrello py-4">
        
            <div class="row row-cols-2">
              
                <!-- Lista di menù con piatti -->
                <div class="col col-12 col-lg-7 col-xl-9 m-0 flex-wrap">

                  <div v-if="antipasti.length > 0">
                    <div class="row">
                      <h1>Antipasti</h1>
                      <div :class="(product.visibility) ? '' : 'd-none'" class="col col-12 col-sm-6 col-xl-4 mb-4" v-for="product in antipasti" :key="product.id">
                        <div class="card product-card shadow border-0">
                        <img class="card-img-top product_img" :src="product.cover_img.includes('uploads') ? '/storage/' + product.cover_img : product.cover_img" :alt="product.name">
                        <div class="card-body p-0">
                         <!-- Questa condizione in cui non mostro -->
                          <div class="w-100 p-2 prod_desc_rest p-0" v-show="!showText">
                            <h4 class="card-title mb-2">{{product.name}}</h4>
                            <p class="card-text"> {{trimText(product.description)}}</p> <span @click="showText=true">Read more</span>
                            <!-- <button @click="showText=true">Prova</button> -->
                          </div>
                          <!-- Altrimenti mostro tutto il testo -->
                          <div class="overflow_trim_text prod_desc_rest p-2" v-show="showText">
                              <h4 class="card-title mb-1">{{product.name}}</h4>
                              <p class="card-text"> {{product.description}} </p> <span @click="showText=false">Read less</span>
                              <!-- <button @click="showText=false">Prova</button> -->
                          </div>
                        </div>
                        <div class="p-3 pb-4 row">
                          <div class="col-6">
                            <a class="btn btn-primary text-white rounded-pill" role="button" @click="addProduct(product)">Aggiungi</a>
                          </div>
                          <div class="col-6 d-flex align-items-center justify-content-end">
                            <h3>€ {{product.price}}</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>

                  <div v-if="sushi.length > 0">
                    <div class="row">
                      <h1>Sushi</h1>
                      <div :class="(product.visibility) ? '' : 'd-none'" class="col col-12 col-sm-6 col-xl-4 mb-4" v-for="product in sushi" :key="product.id">
                        <div class="card product-card shadow border-0">
                        <img class="card-img-top product_img" :src="product.cover_img.includes('uploads') ? '/storage/' + product.cover_img : product.cover_img" :alt="product.name">
                        <div class="card-body p-0">
                         <!-- Questa condizione in cui non mostro -->
                          <div class="w-100 p-2 prod_desc_rest p-0" v-show="!showText">
                            <h4 class="card-title mb-2">{{product.name}}</h4>
                            <p class="card-text"> {{trimText(product.description)}}</p> <span @click="showText=true">Read more</span>
                            <!-- <button @click="showText=true">Prova</button> -->
                          </div>
                          <!-- Altrimenti mostro tutto il testo -->
                          <div class="overflow_trim_text prod_desc_rest p-2" v-show="showText">
                              <h4 class="card-title mb-1">{{product.name}}</h4>
                              <p class="card-text"> {{product.description}} </p> <span @click="showText=false">Read less</span>
                              <!-- <button @click="showText=false">Prova</button> -->
                          </div>
                        </div>
                        <div class="p-3 pb-4 row">
                          <div class="col-6">
                            <a class="btn btn-primary text-white rounded-pill" role="button" @click="addProduct(product)">Aggiungi</a>
                          </div>
                          <div class="col-6 d-flex align-items-center justify-content-end">
                            <h3>€ {{product.price}}</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>

                  <div v-if="primi.length > 0">
                    <div class="row">
                      <h1>Primi</h1>
                      <div :class="(product.visibility) ? '' : 'd-none'" class="col col-12 col-sm-6 col-xl-4 mb-4" v-for="product in primi" :key="product.id">
                        <div class="card product-card shadow border-0">
                        <img class="card-img-top product_img" :src="product.cover_img.includes('uploads') ? '/storage/' + product.cover_img : product.cover_img" :alt="product.name">
                        <div class="card-body p-0">
                         <!-- Questa condizione in cui non mostro -->
                          <div class="w-100 p-2 prod_desc_rest p-0" v-show="!showText">
                            <h4 class="card-title mb-2">{{product.name}}</h4>
                            <p class="card-text"> {{trimText(product.description)}}</p> <span @click="showText=true">Read more</span>
                            <!-- <button @click="showText=true">Prova</button> -->
                          </div>
                          <!-- Altrimenti mostro tutto il testo -->
                          <div class="overflow_trim_text prod_desc_rest p-2" v-show="showText">
                              <h4 class="card-title mb-1">{{product.name}}</h4>
                              <p class="card-text"> {{product.description}} </p> <span @click="showText=false">Read less</span>
                              <!-- <button @click="showText=false">Prova</button> -->
                          </div>
                        </div>
                        <div class="p-3 pb-4 row">
                          <div class="col-6">
                            <a class="btn btn-primary text-white rounded-pill" role="button" @click="addProduct(product)">Aggiungi</a>
                          </div>
                          <div class="col-6 d-flex align-items-center justify-content-end">
                            <h3>€ {{product.price}}</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>

                  <div v-if="secondi.length > 0">
                    <div class="row">
                      <h1>Secondi</h1>
                      <div :class="(product.visibility) ? '' : 'd-none'" class="col col-12 col-sm-6 col-xl-4 mb-4" v-for="product in secondi" :key="product.id">
                        <div class="card product-card shadow border-0">
                        <img class="card-img-top product_img" :src="product.cover_img.includes('uploads') ? '/storage/' + product.cover_img : product.cover_img" :alt="product.name">
                        <div class="card-body p-0">
                         <!-- Questa condizione in cui non mostro -->
                          <div class="w-100 p-2 prod_desc_rest p-0" v-show="!showText">
                            <h4 class="card-title mb-2">{{product.name}}</h4>
                            <p class="card-text"> {{trimText(product.description)}}</p> <span @click="showText=true">Read more</span>
                            <!-- <button @click="showText=true">Prova</button> -->
                          </div>
                          <!-- Altrimenti mostro tutto il testo -->
                          <div class="overflow_trim_text prod_desc_rest p-2" v-show="showText">
                              <h4 class="card-title mb-1">{{product.name}}</h4>
                              <p class="card-text"> {{product.description}} </p> <span @click="showText=false">Read less</span>
                              <!-- <button @click="showText=false">Prova</button> -->
                          </div>
                        </div>
                        <div class="p-3 pb-4 row">
                          <div class="col-6">
                            <a class="btn btn-primary text-white rounded-pill" role="button" @click="addProduct(product)">Aggiungi</a>
                          </div>
                          <div class="col-6 d-flex align-items-center justify-content-end">
                            <h3>€ {{product.price}}</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>

                  <div v-if="contorni.length > 0">
                    <div class="row">
                      <h1>Contorni</h1>
                      <div :class="(product.visibility) ? '' : 'd-none'" class="col col-12 col-sm-6 col-xl-4 mb-4" v-for="product in contorni" :key="product.id">
                        <div class="card product-card shadow border-0">
                        <img class="card-img-top product_img" :src="product.cover_img.includes('uploads') ? '/storage/' + product.cover_img : product.cover_img" :alt="product.name">
                        <div class="card-body p-0">
                         <!-- Questa condizione in cui non mostro -->
                          <div class="w-100 p-2 prod_desc_rest p-0" v-show="!showText">
                            <h4 class="card-title mb-2">{{product.name}}</h4>
                            <p class="card-text"> {{trimText(product.description)}}</p> <span @click="showText=true">Read more</span>
                            <!-- <button @click="showText=true">Prova</button> -->
                          </div>
                          <!-- Altrimenti mostro tutto il testo -->
                          <div class="overflow_trim_text prod_desc_rest p-2" v-show="showText">
                              <h4 class="card-title mb-1">{{product.name}}</h4>
                              <p class="card-text"> {{product.description}} </p> <span @click="showText=false">Read less</span>
                              <!-- <button @click="showText=false">Prova</button> -->
                          </div>
                        </div>
                        <div class="p-3 pb-4 row">
                          <div class="col-6">
                            <a class="btn btn-primary text-white rounded-pill" role="button" @click="addProduct(product)">Aggiungi</a>
                          </div>
                          <div class="col-6 d-flex align-items-center justify-content-end">
                            <h3>€ {{product.price}}</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>

                  <div v-if="panini.length > 0">
                    <div class="row">
                      <h1>Panini</h1>
                      <div :class="(product.visibility) ? '' : 'd-none'" class="col col-12 col-sm-6 col-xl-4 mb-4" v-for="product in panini" :key="product.id">
                        <div class="card product-card shadow border-0">
                        <img class="card-img-top product_img" :src="product.cover_img.includes('uploads') ? '/storage/' + product.cover_img : product.cover_img" :alt="product.name">
                        <div class="card-body p-0">
                         <!-- Questa condizione in cui non mostro -->
                          <div class="w-100 p-2 prod_desc_rest p-0" v-show="!showText">
                            <h4 class="card-title mb-2">{{product.name}}</h4>
                            <p class="card-text"> {{trimText(product.description)}}</p> <span @click="showText=true">Read more</span>
                            <!-- <button @click="showText=true">Prova</button> -->
                          </div>
                          <!-- Altrimenti mostro tutto il testo -->
                          <div class="overflow_trim_text prod_desc_rest p-2" v-show="showText">
                              <h4 class="card-title mb-1">{{product.name}}</h4>
                              <p class="card-text"> {{product.description}} </p> <span @click="showText=false">Read less</span>
                              <!-- <button @click="showText=false">Prova</button> -->
                          </div>
                        </div>
                        <div class="p-3 pb-4 row">
                          <div class="col-6">
                            <a class="btn btn-primary text-white rounded-pill" role="button" @click="addProduct(product)">Aggiungi</a>
                          </div>
                          <div class="col-6 d-flex align-items-center justify-content-end">
                            <h3>€ {{product.price}}</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>

                  <div v-if="bevande.length > 0">
                    <div class="row">
                      <h1>Bevande</h1>
                      <div :class="(product.visibility) ? '' : 'd-none'" class="col col-12 col-sm-6 col-xl-4 mb-4" v-for="product in bevande" :key="product.id">
                        <div class="card product-card shadow border-0">
                        <img class="card-img-top product_img" :src="product.cover_img.includes('uploads') ? '/storage/' + product.cover_img : product.cover_img" :alt="product.name">
                        <div class="card-body p-0">
                         <!-- Questa condizione in cui non mostro -->
                          <div class="w-100 p-2 prod_desc_rest p-0" v-show="!showText">
                            <h4 class="card-title mb-2">{{product.name}}</h4>
                            <p class="card-text"> {{trimText(product.description)}}</p> <span @click="showText=true">Read more</span>
                            <!-- <button @click="showText=true">Prova</button> -->
                          </div>
                          <!-- Altrimenti mostro tutto il testo -->
                          <div class="overflow_trim_text prod_desc_rest p-2" v-show="showText">
                              <h4 class="card-title mb-1">{{product.name}}</h4>
                              <p class="card-text"> {{product.description}} </p> <span @click="showText=false">Read less</span>
                              <!-- <button @click="showText=false">Prova</button> -->
                          </div>
                        </div>
                        <div class="p-3 pb-4 row">
                          <div class="col-6">
                            <a class="btn btn-primary text-white rounded-pill" role="button" @click="addProduct(product)">Aggiungi</a>
                          </div>
                          <div class="col-6 d-flex align-items-center justify-content-end">
                            <h3>€ {{product.price}}</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>

                  <div v-if="fritti.length > 0">
                    <div class="row">
                      <h1>Fritti</h1>
                      <div :class="(product.visibility) ? '' : 'd-none'" class="col col-12 col-sm-6 col-xl-4 mb-4" v-for="product in fritti" :key="product.id">
                        <div class="card product-card shadow border-0">
                        <img class="card-img-top product_img" :src="product.cover_img.includes('uploads') ? '/storage/' + product.cover_img : product.cover_img" :alt="product.name">
                        <div class="card-body p-0">
                         <!-- Questa condizione in cui non mostro -->
                          <div class="w-100 p-2 prod_desc_rest p-0" v-show="!showText">
                            <h4 class="card-title mb-2">{{product.name}}</h4>
                            <p class="card-text"> {{trimText(product.description)}}</p> <span @click="showText=true">Read more</span>
                            <!-- <button @click="showText=true">Prova</button> -->
                          </div>
                          <!-- Altrimenti mostro tutto il testo -->
                          <div class="overflow_trim_text prod_desc_rest p-2" v-show="showText">
                              <h4 class="card-title mb-1">{{product.name}}</h4>
                              <p class="card-text"> {{product.description}} </p> <span @click="showText=false">Read less</span>
                              <!-- <button @click="showText=false">Prova</button> -->
                          </div>
                        </div>
                        <div class="p-3 pb-4 row">
                          <div class="col-6">
                            <a class="btn btn-primary text-white rounded-pill" role="button" @click="addProduct(product)">Aggiungi</a>
                          </div>
                          <div class="col-6 d-flex align-items-center justify-content-end">
                            <h3>€ {{product.price}}</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>

                  <div v-if="piadine.length > 0">
                    <div class="row">
                      <h1>Piadine</h1>
                      <div :class="(product.visibility) ? '' : 'd-none'" class="col col-12 col-sm-6 col-xl-4 mb-4" v-for="product in piadine" :key="product.id">
                        <div class="card product-card shadow border-0">
                        <img class="card-img-top product_img" :src="product.cover_img.includes('uploads') ? '/storage/' + product.cover_img : product.cover_img" :alt="product.name">
                        <div class="card-body p-0">
                         <!-- Questa condizione in cui non mostro -->
                          <div class="w-100 p-2 prod_desc_rest p-0" v-show="!showText">
                            <h4 class="card-title mb-2">{{product.name}}</h4>
                            <p class="card-text"> {{trimText(product.description)}}</p> <span @click="showText=true">Read more</span>
                            <!-- <button @click="showText=true">Prova</button> -->
                          </div>
                          <!-- Altrimenti mostro tutto il testo -->
                          <div class="overflow_trim_text prod_desc_rest p-2" v-show="showText">
                              <h4 class="card-title mb-1">{{product.name}}</h4>
                              <p class="card-text"> {{product.description}} </p> <span @click="showText=false">Read less</span>
                              <!-- <button @click="showText=false">Prova</button> -->
                          </div>
                        </div>
                        <div class="p-3 pb-4 row">
                          <div class="col-6">
                            <a class="btn btn-primary text-white rounded-pill" role="button" @click="addProduct(product)">Aggiungi</a>
                          </div>
                          <div class="col-6 d-flex align-items-center justify-content-end">
                            <h3>€ {{product.price}}</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>

                  <div v-if="vini.length > 0">
                    <div class="row">
                      <h1>Vini</h1>
                      <div :class="(product.visibility) ? '' : 'd-none'" class="col col-12 col-sm-6 col-xl-4 mb-4" v-for="product in vini" :key="product.id">
                        <div class="card product-card shadow border-0">
                        <img class="card-img-top product_img" :src="product.cover_img.includes('uploads') ? '/storage/' + product.cover_img : product.cover_img" :alt="product.name">
                        <div class="card-body p-0">
                         <!-- Questa condizione in cui non mostro -->
                          <div class="w-100 p-2 prod_desc_rest p-0" v-show="!showText">
                            <h4 class="card-title mb-2">{{product.name}}</h4>
                            <p class="card-text"> {{trimText(product.description)}}</p> <span @click="showText=true">Read more</span>
                            <!-- <button @click="showText=true">Prova</button> -->
                          </div>
                          <!-- Altrimenti mostro tutto il testo -->
                          <div class="overflow_trim_text prod_desc_rest p-2" v-show="showText">
                              <h4 class="card-title mb-1">{{product.name}}</h4>
                              <p class="card-text"> {{product.description}} </p> <span @click="showText=false">Read less</span>
                              <!-- <button @click="showText=false">Prova</button> -->
                          </div>
                        </div>
                        <div class="p-3 pb-4 row">
                          <div class="col-6">
                            <a class="btn btn-primary text-white rounded-pill" role="button" @click="addProduct(product)">Aggiungi</a>
                          </div>
                          <div class="col-6 d-flex align-items-center justify-content-end">
                            <h3>€ {{product.price}}</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>

                  <div v-if="birre.length > 0">
                    <div class="row">
                      <h1>Birre</h1>
                      <div :class="(product.visibility) ? '' : 'd-none'" class="col col-12 col-sm-6 col-xl-4 mb-4" v-for="product in birre" :key="product.id">
                        <div class="card product-card shadow border-0">
                        <img class="card-img-top product_img" :src="product.cover_img.includes('uploads') ? '/storage/' + product.cover_img : product.cover_img" :alt="product.name">
                        <div class="card-body p-0">
                         <!-- Questa condizione in cui non mostro -->
                          <div class="w-100 p-2 prod_desc_rest p-0" v-show="!showText">
                            <h4 class="card-title mb-2">{{product.name}}</h4>
                            <p class="card-text"> {{trimText(product.description)}}</p> <span @click="showText=true">Read more</span>
                            <!-- <button @click="showText=true">Prova</button> -->
                          </div>
                          <!-- Altrimenti mostro tutto il testo -->
                          <div class="overflow_trim_text prod_desc_rest p-2" v-show="showText">
                              <h4 class="card-title mb-1">{{product.name}}</h4>
                              <p class="card-text"> {{product.description}} </p> <span @click="showText=false">Read less</span>
                              <!-- <button @click="showText=false">Prova</button> -->
                          </div>
                        </div>
                        <div class="p-3 pb-4 row">
                          <div class="col-6">
                            <a class="btn btn-primary text-white rounded-pill" role="button" @click="addProduct(product)">Aggiungi</a>
                          </div>
                          <div class="ccol-6 d-flex align-items-center justify-content-end">
                            <h3>€ {{product.price}}</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>

                  <div v-if="pizze.length > 0">
                    <div class="row">
                      <h1>Pizze</h1>
                      <div :class="(product.visibility) ? '' : 'd-none'" class="col col-12 col-sm-6 col-xl-4 mb-4" v-for="product in pizze" :key="product.id">
                        <div class="card product-card shadow border-0">
                        <img class="card-img-top product_img" :src="product.cover_img.includes('uploads') ? '/storage/' + product.cover_img : product.cover_img" :alt="product.name">
                        <div class="card-body p-0">
                         <!-- Questa condizione in cui non mostro -->
                          <div class="w-100 p-2 prod_desc_rest p-0" v-show="!showText">
                            <h4 class="card-title mb-2">{{product.name}}</h4>
                            <p class="card-text"> {{trimText(product.description)}}</p> <span @click="showText=true">Read more</span>
                            <!-- <button @click="showText=true">Prova</button> -->
                          </div>
                          <!-- Altrimenti mostro tutto il testo -->
                          <div class="overflow_trim_text prod_desc_rest p-2" v-show="showText">
                              <h4 class="card-title mb-1">{{product.name}}</h4>
                              <p class="card-text"> {{product.description}} </p> <span @click="showText=false">Read less</span>
                              <!-- <button @click="showText=false">Prova</button> -->
                          </div>
                        </div>
                        <div class="p-3 pb-4 row">
                          <div class="col-6">
                            <a class="btn btn-primary text-white rounded-pill" role="button" @click="addProduct(product)">Aggiungi</a>
                          </div>
                          <div class="col-6 d-flex align-items-center justify-content-end">
                            <h3>€ {{product.price}}</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>

                <!-- Carrello laterale -->
                <div class="col col-12 col-lg-5 col-xl-3">
                    <!-- Card del carrello -->
                    <div class="card border-0 p-4 shadow">
                        <!-- Titolo del carrello -->
                        <h3 class="pb-3">CARRELLO</h3>
                        <!-- Carrello -->
                        <div class="container-fluid">
                            <!-- Row -->
                            <div class="row align-items-center" v-for="(product, index) in cart.products" :key="index">
                                <div class="col-12 pb-2" >

                                  <h6>{{ product.name }} </h6>
                                    
                                </div>
                                    
                                <div class="col-6 d-flex align-items-center">

                                  <button style="font-size: 16px;" class="px-2 py-0 btn btn-sm btn-outline-primary rounded-circle me-2" @click="removeQty(product)">-</button>
                                  {{ product.quantity }}
                                  <button style="font-size: 16px;" class="btn btn-sm py-0 px-2 btn-outline-primary rounded-circle ms-2" @click="addQty(product)">+</button>

                                </div>

                                <div class="col-6">
                                  € {{ product.total }}
                                </div>
                                <!-- Linea separazione -->
                                <hr class="my-3">

                            </div>
                            
                            
                            <!-- Prezzo Prodotto -->
                            <div v-show="totalPriceCart > 0" class="total-price-cart row pb-3">

                              <div class="col"><h6>Totale:</h6> </div>
                              <div class="col">€ {{ totalPriceCart }}</div>
                                 
                            </div>
                            <!-- LINK AL PAGAMENTO -->
                            <router-link :to="{ name: 'checkout', params: { 'slug': restaurant.slug } }" class="restaurant">
                              <button class="btn btn-primary btn-lg text-white">Vai al Pagamento</button>              
                            </router-link>
                            <button @click="svuotaCarrello()"  class="btn btn-danger btn-lg text-white mt-2">Svuota carrello</button>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        <footerSection></footerSection>
    </div>
</template>

<style lang="scss" scoped>
/* Immagine profilo Ristorante */

.product_image_restaurant,
.hero_restaurant {
  object-fit: cover;
  object-position: center center;
}

.overflow_trim_text {
    overflow-y: scroll;
    height: 150px;
}
.overflow_trim_text::-webkit-scrollbar {
  width: 6px;
}
.overflow_trim_text::-webkit-scrollbar-track {
    background-color: transparent;
}
.overflow_trim_text::-webkit-scrollbar-thumb {
    background-color: #3490dc;    /* color of the scroll thumb */
    border-radius: 20px;       /* roundness of the scroll thumb */
    border: 0.5px solid #3490dc;  /* creates padding around scroll thumb */
}
.prod_desc_rest span{
    color: rgba(10, 113, 230, 0.8);
    cursor: pointer;
    text-decoration: underline;
}

.hero_restaurant {
  width: 100%;
  height: 500px;
}

/* Questo è il titolo del ristorante */
.restaurant_title {
  font-size: 40px;
  color: black;
  margin-top: 1rem;
}

/* Questa è la singola card */

.product-card {
  height: 488px;
  border-radius: 25px;
}

.bordo_visibile {
  border: 2px solid black;
}

.flex_start_restaurant {
  display: flex;
  justify-content: flex-start;
  align-items: center;
}

.flex_end_restaurant {
  display: flex;
  justify-content: center;
  align-items: flex-end;
}

/* Immagine del singolo prodotto */
.product_img {
  width: 100%;
  height: 250px;
  border-top-left-radius: 25px;
  border-top-right-radius: 25px;
  object-fit: cover;
}
</style>


<script>
import FooterSection from '../components/FooterSection.vue';
export default {
  name: "Restaurant",
  components: {
    FooterSection
  },
  data() {
    return {
      antipasti: [],
      sushi: [],
      primi: [],
      secondi: [],
      contorni: [],
      panini: [],
      bevande: [],
      fritti: [],
      piadine: [],
      vini: [],
      birre: [],
      pizze: [],
      restaurant: "",
      quantityDefault: 1,
      showText: false,
      cart: {
        key: "",
        products: [],
      },
      productNameClicked: "",
      totalPriceCart: 0,
    };
  },

  methods: {
    getRestaurant() {
      axios
        .get("/api/" + this.$route.params.slug)
        .then((response) => {
          /* console.log(response); */
          this.restaurant = response.data.restaurant;
          this.piatti = response.data.products;

          this.cart.key = response.data.restaurant.id;

          this.prodotti = response.data.products.forEach((element) => {
            if (element.category_id == 1) {
              this.antipasti.push(element);
            }
            if (element.category_id == 2) {
              this.sushi.push(element);
            }
            if (element.category_id == 3) {
              this.primi.push(element);
            }
            if (element.category_id == 4) {
              this.secondi.push(element);
            }
            if (element.category_id == 5) {
              this.contorni.push(element);
            }
            if (element.category_id == 6) {
              this.panini.push(element);
            }
            if (element.category_id == 7) {
              this.bevande.push(element);
            }
            if (element.category_id == 8) {
              this.fritti.push(element);
            }
            if (element.category_id == 9) {
              this.piadine.push(element);
            }
            if (element.category_id == 10) {
              this.vini.push(element);
            }
            if (element.category_id == 11) {
              this.birre.push(element);
            }
            if (element.category_id == 12) {
              this.pizze.push(element);
            }
          });

          if (!localStorage.getItem(this.cart.key)) {
            this.setLocalStorage(); // setto il local storage
          } else {
            this.cartLocalStorage();
          }
        })
        .catch((e) => {
          console.error(e);
        });
    },
    //settare il local storage
    setLocalStorage() {
      localStorage.setItem(this.cart.key, this.cart.products);
    },

    // RIPRENDO I DATI DALLO STORAGE
    cartLocalStorage() {
      this.cart.products = JSON.parse(localStorage.getItem(this.cart.key));
      this.getTotalPrice();
    },

    addProduct(product) {
      let productName = product.name;
      let confronto = false;
      if (this.cart.products.length >= 1) {
        this.cart.products.forEach((element) => {
          if (element.name === productName) {
            element.quantity++;
            element.total = element.price * element.quantity;
            confronto = true;
            this.sync();
          }
        });
      }

      if (confronto === false) {
        let newProduct = {
          name: product.name,
          id: product.id,
          img: product.cover_img,
          price: product.price,
          quantity: this.quantityDefault,
          total: product.price * this.quantityDefault,
        };
        this.cart.products.push(newProduct);
      }
      this.sync();
    },

    //SINCRONIZZAZIONE DATI LOCAL STORAGE
    async sync() {
      let content = JSON.stringify(this.cart.products);
      localStorage.setItem(this.cart.key, content);

      this.getTotalPrice();
    },

    // AGGIUNTA QUANTITA' AL PRODOTTO
    addQty(product) {
      let productName = product.name;
      this.cart.products.forEach((element) => {
        if (element.name === productName) {
          element.quantity++;
          element.total = element.price * element.quantity;
        }
      });

      this.sync();
    },

    // RIMOZIONE QUANTITA'
    removeQty(product) {
      let productName = product.name;
      this.cart.products.forEach((element, index) => {
        if (element.name === productName) {
          if (element.quantity === 1) {
            this.cart.products.splice(index, 1);
          } else {
            element.quantity--;
            element.total = element.price * element.quantity;
            /* console.log(element.quantity, element.name) */
          }
        }
      });
      this.sync();
    },

    getTotalPrice() {
      let priceNotRounded = 0;
      if (this.cart.products.length >= 1) {
        this.cart.products.forEach((element) => {
          priceNotRounded += element.total;
        });
      } else {
        this.totalPriceCart = 0;
      }
      /* console.log(priceNotRounded) */
      this.totalPriceCart = priceNotRounded.toFixed(2);
      /* console.log(this.totalPriceCart) */
    },

    /* Trim Text per ridurre quantità del testo */
    trimText(text) {
        /* Condizione se testo di content va oltre i 75 caratteri */
        if(text.length > 75) {
            return text.slice(0, 75) + '...'
        }
        return text;
    },

     svuotaCarrello(){
      this.cart.products = []
      localStorage.removeItem(this.restaurantId)
      this.totalPriceCart = 0
    } 

  },

  mounted() {
    this.getRestaurant();
    /*      this.cartLocalStorage(); */
  },
};
</script>


