<template>
  <div class="container-fluid">
    <section class="w3l-ecommerce-main">
      <!-- /products-->
      <div class="ecom-contenthny py-5">
        <div class="container py-lg-5">
          <h3 class="hny-title mb-0 text-center">
            Explore our <span>product</span>
          </h3>
          <!-- <p class="text-center">Handpicked Favourites just for you</p> -->
          <!-- /row-->
          <div class="ecom-products-grids row mt-lg-5 mt-3">
            <div
              v-for="(product, index) in computedProduct"
              :key="index"
              class="col-lg-3 col-6 product-incfhny mt-4"
            >
              <div class="product-grid2 transmitv">
                <div class="product-image2">
                  <a href="#">
                    <img
                      class="pic-1 img-fluid"
                      :src="'/storage/' + product.image"
                    />
                    <img
                      class="pic-2 img-fluid"
                      :src="'/storage/' + product.image"
                    />
                  </a>
                  <!-- <ul class="social">
                  <li>
                    <a href="#" data-tip="Quick View"
                      ><span class="fa fa-eye"></span
                    ></a>
                  </li>

                  <li>
                    <a href="#" data-tip="Add to Cart"
                      ><span class="fa fa-shopping-bag"></span
                    ></a>
                  </li>
                </ul> -->
                  <div class="transmitv single-item">
                    <button
                      @click="addCart(product.id, product.prize, product.name)"
                      type="submit"
                      class="transmitv-cart ptransmitv-cart add-to-cart"
                    >
                      Add to Cart
                    </button>
                  </div>
                </div>
                <div class="product-content">
                  <h3 class="title">
                    <a :href="'product/' + product.name">{{ product.name }} </a>
                  </h3>
                  <span class="price">{{ product.name }}</span>
                </div>
              </div>
            </div>
          </div>
          <!-- //row-->
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { Carousel, Slide } from "vue-carousel";

export default {
  props: ["guestid", "categories"],
  data() {
    return {
      products: [],
      brands: [],
      loadingStatus: "",
    };
  },
  components: {
    Carousel,
    Slide,
  },
  computed: {
    computedProduct: function () {
      if (this.categories && this.categories[0].products) {
        return this.categories[0].products;
      } else {
        return this.products;
      }
    },
    productCategory: function () {
      if (this.categories && this.categories[0].products) {
        return this.categories[0].categoryName + " " + "Products";
      } else {
        return "Our store";
      }
    },
  },
  methods: {
    addCart(productId, amount, productName) {
      this.showDismissibleAlert = false;
      this.alertMessage = "Adding to Cart";
      console.log("Adding to Cart" + this.guestid);
      axios
        .post(`/add/cart`, {
          id: productId,
          qty: 1,
          amount: amount,
          qtyValue: "Single",
          name: productName,
          guestid: this.guestid,
        })
        .then((response) => {
          console.log(response.data);
          this.alertMessage = response.data.msg;
        })
        .catch((err) => {
          console.log({ message: "An Error occured: ", errors: err });
        });
      this.showDismissibleAlert = true;
    },
    fetchProducts() {
      this.loadingStatus = "Loading please wait...";
      //Remove later on deployment
      try {
        axios.get("/api/product").then((Response) => {
          this.loadingStatus = "";
          this.products = Response.data.data;
          console.log(this.products);
        });
      } catch (error) {
        this.loadingStatus = error;
      }
    },
    fetchBrand() {
      //Remove later on deployment
      axios.get("/api/all/brand").then((Response) => {
        this.brands = Response.data;
        console.log(this.brands);
      });
    },
    storeCheckGuestid() {
      localStorage.getItem("user_userUniqueId")
        ? console.log("Guest ID fetched")
        : localStorage.setItem("user_userUniqueId", this.guestid);
    },
  },
  mounted() {
    console.log("Component mounted.");
    this.fetchProducts();
    this.fetchBrand();
    this.storeCheckGuestid();
  },
};
</script>
