<template>
  <section class="ftco-section mb-5">
    <div class="container">
      <div class="-intro pb-60px">
        <p>Filter by categories</p>
        <h2>
          Browse
          <span class="section-intro__style">Product</span>
        </h2>
      </div>
      <div class="section row">
        <div class="col-xl-3 col-lg-4 col-md-5 ftco-animate">
          <div class="sidebar-categories">
            <div class="head">Browse Categories</div>
            <ul class="main-categories">
              <li class="common-filter">
                <form action="#">
                  <ul>
                    <li class="filter-list">
                      <input class="pixel-radio" type="radio" id="men" name="brand" />
                      <label for="men">Men</label>
                    </li>
                    <li class="filter-list">
                      <input class="pixel-radio" type="radio" id="Women" name="brand" />
                      <label for="Women">Women</label>
                    </li>
                    <li class="filter-list">
                      <input class="pixel-radio" type="radio" id="Unisex" name="brand" />
                      <label for="Unisex">Unisex</label>
                    </li>
                    <!-- Bramd Listing -->
                    <li v-for="(brand, index) in brands" :key="'0'+index" class="filter-list">
                      <input
                        class="pixel-radio"
                        type="radio"
                        :id="'brand'+index"
                        name="brand"
                        @change="fetchbyBrand(brand.BrandName)"
                      />
                      <label :for="'brand'+index">{{brand.BrandName}}</label>
                    </li>
                    <!-- Brand List End -->
                    <!-- Category List End -->
                    <li v-for="(category, index) in categories" :key="index" class="filter-list">
                      <input
                        class="pixel-radio"
                        type="radio"
                        :id="'category'+index"
                        name="brand"
                        @change="fetchbyCategory(category.categoryName)"
                      />
                      <label :for="'category'+index">
                        {{category.categoryName}}
                        <span>(3600)</span>
                      </label>
                    </li>
                    <!-- Category List End -->
                  </ul>
                </form>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7 ftco-animate">
          <!-- End Filter Bar -->
          <!-- Start Best Seller -->
          <section class="section p-1 lattest-product-area pb-40 category-list">
            <div class="row">
              <div
                class="col-md-4 col-lg-3"
                v-for="(product, index) in products"
                :key="'product'+index"
              >
                <div class="card text-center card-product">
                  <div class="card-product__img">
                    <img class="card-img" :src="'/storage/'+ product.image" :alt="product.name" />
                    <ul class="card-product__imgOverlay">
                      <li>
                        <button>
                          <i class="fa fa-search"></i>
                        </button>
                      </li>
                      <li>
                        <button>
                          <i class="fa fa-shopping-cart"></i>
                        </button>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <!-- <p>Accessories</p> -->
                    <h4 class="card-product__title">
                      <a href="#">{{product.name}}</a>
                    </h4>
                    <p class="card-product__price">₦{{product.amount}}</p>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- End Best Seller -->
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { Carousel, Slide } from "vue-carousel";

export default {
  props: ["guestid"],
  data() {
    return {
      products: [],
      brands: [],
      categories: [],
      loadingStatus: "",
      error: ""
    };
  },
  components: {
    Carousel,
    Slide
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
      this.loadingStatus = "Loading please wait...";
      this.error = null;
      //Remove later on deployment
      try {
        axios.get("/api/product/" + 8).then(Response => {
          this.loadingStatus = "";
          this.products = Response.data.data;
          console.log(this.products);
        });
      } catch (error) {
        this.error = error;
        this.loadingStatus = "An error occured";
      }
    },
    fetchBrand() {
      //Remove later on deployment
      axios
        .get("/api/all/brand")
        .then(Response => {
          this.brands = Response.data;
          console.log(this.brands);
        })
        .catch(error => {
          this.error = error;
          this.loadingStatus = "An error occured";
        });
    },
    fetchCategories() {
      //Remove later on deployment
      axios
        .get("/api/all/category")
        .then(Response => {
          this.categories = Response.data;
          console.log(this.categories);
        })
        .catch(error => {
          this.error = error;
          this.loadingStatus = "An error occured";
        });
    },
    storeCheckGuestid() {
      localStorage.getItem("user_userUniqueId")
        ? console.log("Guest ID fetched")
        : localStorage.setItem("user_userUniqueId", this.guestid);
    },
    fetchbyCategory(type) {
      //
      this.loadingStatus = "Loading please wait...";
      //Remove later on deployment
      try {
        axios.get("/api/product/byCategory/" + type).then(Response => {
          this.loadingStatus = "";
          this.products = Response.data;
          console.log(this.products);
        });
      } catch (error) {
        this.error = error;
        this.loadingStatus = "An error occured";
      }
    },
    fetchbyBrand(type) {
      //
      this.loadingStatus = "Loading please wait...";
      //Remove later on deployment
      try {
        axios.get("/api/product/byBrand/" + type).then(Response => {
          this.loadingStatus = "";
          this.products = Response.data;
          console.log(this.products);
        });
      } catch (error) {
        this.error = error;
        this.loadingStatus = "An error occured";
      }
    }
  },
  mounted() {
    console.log("Component mounted.");
    this.fetchProducts();
    this.fetchBrand();
    this.storeCheckGuestid();
    this.fetchCategories();
  }
};
</script>
