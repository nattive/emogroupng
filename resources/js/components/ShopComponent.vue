<template>
  <div>
    <!-- ================ category section start ================= -->
    <section class="section-margin--small mb-5">
      <div class="container">
        <div class="row">
          <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
              <div class="head">Browse Categories</div>
              <ul class="main-categories">
                <li class="common-filter">
                  <form action="#">
                    <ul>
                      <li v-for="(category, index) in categories" :key="index" class="filter-list">
                        <input class="pixel-radio" type="radio" id="men" name="brand" />
                        <label for="men">
                          {{category.categoryName}}
                          <span>(3600)</span>
                        </label>
                      </li>
                    </ul>
                  </form>
                </li>
              </ul>
            </div>
            <div class="sidebar-filter">
              <div class="top-filter-head">Product Filters</div>
              <div class="common-filter">
                <div class="head">Brands</div>
                <form action="#">
                  <ul>
                    <li v-for="(brand, index) in brands" :key="index" class="filter-list">
                      <input
                        class="pixel-radio"
                        type="radio"
                        :id="brand.brandName"
                        name="brand"
                        @click="fetchbyBrand(brand.brandName)"
                      />
                      <label :for="brand.brandName">
                        {{ brand.BrandName}}
                        <span>(29)</span>
                      </label>
                    </li>
                  </ul>
                </form>
              </div>
              <div class="common-filter">
                <div class="head">Gender</div>
                <form action="#">
                  <ul>
                    <li class="filter-list">
                      <input
                        class="pixel-radio"
                        type="radio"
                        id="Men"
                        name="gender"
                        @change="fetchbyGender('Male')"
                      />
                      <label for="Men">
                        For Men
                        <span>(29)</span>
                      </label>
                    </li>
                    <li class="filter-list">
                      <input
                        class="pixel-radio"
                        type="radio"
                        id="women"
                        name="gender"
                        @change="fetchbyGender('Female')"
                      />
                      <label for="women">
                        For Women
                        <span>(29)</span>
                      </label>
                    </li>
                    <li class="filter-list">
                      <input
                        class="pixel-radio"
                        type="radio"
                        id="unisex"
                        name="gender"
                        @change="fetchbyGender('Unisex')"
                      />
                      <label for="unisex">
                        Unisex
                        <span>(29)</span>
                      </label>
                    </li>
                  </ul>
                </form>
              </div>
            </div>
          </div>
          <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center">
              <div class="sorting mr-auto">
                <select class="form-control" v-model="count" @change="fetchProducts(count)">
                  <option selected value="8">Show 8</option>
                  <option value="12">Show 12</option>
                  <option value="all">Show all</option>
                </select>
              </div>
              <div>
                <div class="input-group filter-bar-search">
                  <input type="text" placeholder="Search" />
                  <div class="input-group-append">
                    <button type="button">
                      <i class="ti-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Filter Bar -->
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
              <div class="row">
                <div v-for="(product, index) in products" :key="index" class="col-md-4 col-lg-3">
                  <div
                    class="text-center"
                    v-if="products.length === 0"
                  >Product list is empty at this time</div>
                  <div v-else class="card text-center card-product">
                    <div class="card-product__img">
                        <a :href="'/product/'+product.name">
                      <img class="card-img" :src="'/storage/'+product.image" alt />
                      </a>
                      <ul class="card-product__imgOverlay">
                        <li>
                          <button>
                            <p style="color: white">Add to Cart</p>
                          </button>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body">
                      <!-- <p>Accessories</p> -->
                      <h4 class="card-product__title">
                        <a href="#">Quartz Belt Watch</a>
                      </h4>
                      <p class="card-product__price"> ₦{{product.amount}}</p>
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
    <!-- ================ category section end ================= -->
  </div>
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
      count: ''
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
    fetchProducts(count) {
        console.log(count);
        
      this.loadingStatus = "Loading please wait...";
      //Remove later on deployment
      if (count === 'all'){
          try {
            axios.get("/api/product").then(Response => {
              this.loadingStatus = "";
              this.products = Response.data.data;
              console.log(this.products);
            });
          } catch (error) {
            this.loadingStatus = error;
          }
      } else {
          try {
            axios.get("/api/product/" + count).then(Response => {
              this.loadingStatus = "";
              this.products = Response.data.data;
              console.log(this.products);
            });
          } catch (error) {
            this.loadingStatus = error;
          }
      }

    },
    fetchBrand() {
      //Remove later on deployment
      axios.get("/api/all/brand").then(Response => {
        this.brands = Response.data;
        console.log(this.brands);
      });
    },
    storeCheckGuestid() {
      localStorage.getItem("user_userUniqueId")
        ? console.log("Guest ID fetched")
        : localStorage.setItem("user_userUniqueId", this.guestid);
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
        this.loadingStatus = error;
      }
    },
    fetchbyGender(type) {
      //
      this.loadingStatus = "Loading please wait...";
      //Remove later on deployment
      try {
        axios.get("/api/product/byGender/" + type).then(Response => {
          this.loadingStatus = "";
          this.products = Response.data;
          console.log(this.products);
        });
      } catch (error) {
        this.loadingStatus = error;
      }
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
        this.loadingStatus = error;
      }
    }
  },
  mounted() {
    console.log("Component mounted.");
    this.fetchProducts(9);
    this.fetchBrand();
    // this.fetchAllCategories();
    /**
     *
     * Fetch categories list
     *
     */
    axios.get("/api/all/category").then(Response => {
      this.categories = Response.data;
      console.log(this.categories);
    });
  }
};
</script>
