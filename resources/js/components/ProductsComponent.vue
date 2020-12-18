<template>
  <div class=" container mt-4 mb-4">
    <div class="section-intro pb-60px">
      <!-- <p>Featured</p> -->
      <h2>
        <!-- Products -->
        <span class="section-intro__style">{{productCategory}}</span>
      </h2>
    </div>
    
    <div class="card card-body">
    <div class="section row ftco-animate">
      <p class="text-center">{{loadingStatus}}</p>
      <!-- <carousel :perPageCustom="[[768, 4], [1024, 5]]" :autoplay="true" :navigationEnabled="false"> -->
        <div v-for="(product, index) in computedProduct" :key="index" class="col-md-3 col-sm-6">
          <div class="card text-center card-product">
            <div class="card-product__img">
              <img class="card-img" :src="'/storage/'+product.image" alt />
              <ul class="card-product__imgOverlay">
                <li>
                  <button @click="addCart(product.id, product.amount, product.name)">
                    <i class="fa fa-shopping-cart"></i>
                  </button>
                </li>
                <li>
                  <button>
                    <i class="fa fa-heart"></i>
                  </button>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <p>Accessories</p>
              <h4 class="card-product__title">
                <a :href="'/product/'+product.name">{{product.name}}</a>
              </h4>
              <p class="card-product__price">₦{{product.amount}}</p>
            </div>
          </div>
        </div>
      <!-- </carousel> -->
    </div>
    </div>
  </div>
</template>

<script>
import { Carousel, Slide } from "vue-carousel";

export default {
  props: ['guestid', 'categories'],
  data() {
    return {
      products: [],
      brands: [],
      loadingStatus: ""
    };
  },
  components: {
    Carousel,
    Slide
  },
  computed: {
    computedProduct: function(){
      if (this.categories && this.categories[0].products) {
        return this.categories[0].products;
      } else {
        return this.products
      }
    },
     productCategory: function(){
      if (this.categories && this.categories[0].products) {
        return this.categories[0].categoryName;
      } else {
        return "Our store"
      }
    }
  },
  methods: {
     addCart(productId, amount, productName) {
      this.showDismissibleAlert = false;
      this.alertMessage = "Adding to Cart";
       console.log( "Adding to Cart" + this.guestid);
      axios
        .post(`/add/cart`, {
          id: productId,
          qty: 1,
          amount: amount,
          qtyValue: "Single",
          name: productName,
          guestid: this.guestid
        })
        .then(response => {
          console.log(response.data);
          this.alertMessage = response.data.msg;
        })
        .catch(err => {
          console.log({ message: "An Error occured: ", errors: err });
        });
      this.showDismissibleAlert = true;
    },
    fetchProducts() {
      this.loadingStatus ="Loading please wait..."
      //Remove later on deployment
      try {
        axios.get("/api/product").then(Response => {
          this.loadingStatus =""
          this.products = Response.data.data;
          console.log(this.products);
          
        })
      } catch (error) {
        this.loadingStatus = error
      }
    },
    fetchBrand() {
      //Remove later on deployment
      axios.get("/api/all/brand").then(Response => {
        this.brands = Response.data;
        console.log(this.brands);
      });
    },
    storeCheckGuestid(){
      localStorage.getItem('user_userUniqueId') ? console.log("Guest ID fetched"):
      localStorage.setItem("user_userUniqueId", this.guestid)
    }

  },
  mounted() {
    console.log("Component mounted.");
    this.fetchProducts();
    this.fetchBrand();
    this.storeCheckGuestid();
    
  }
};
</script>
