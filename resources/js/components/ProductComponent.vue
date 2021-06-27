<template>
  <div class="container">
    <section class="blog-banner-area" id="blog">
      <div class="container h-100">
        <div class="blog-banner">
          <div class="text-center">
            <h1>{{productname}}</h1>
            <nav aria-label="breadcrumb" class="banner-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{productname}}</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ end banner area ================= -->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
      <div class="container">
        <div class="row s_product_inner">
          <div class="col-lg-6">
            <div class="single-prd-item">
              <img class="img-fluid" :src="productimage" alt />
            </div>
            <!-- <div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
            </div>-->
          </div>
          <div class="col-lg-5 offset-lg-1">
            <div class="s_product_text">
              <h3>{{this.productname}}</h3>
              <h2>₦{{init__price * init_qty}}</h2>
              <ul class="list">
                <li class="mt-4">
                  <a class="active" href="#">
                    <span>Category</span> : Household
                  </a>
                </li>
                <li class="mt-4">
                  <a href="#">
                    <span>Availibility</span> : In Stock
                  </a>
                </li>
              </ul>
              <div class="product_count mt-4">
                <label for="qty">Quantity:</label>
                <button class="increase items-count" type="button">
                  <i class="ti-angle-left"></i>
                </button>
                <input
                  type="number"
                  v-model="init_qty"
                  title="Quantity:"
                  min="0"
                  class="input-text qty"
                />
                <button class="reduced items-count" type="button">
                  <i class="ti-angle-right"></i>
                </button>
                <a class="button__qty__select" href="#" @click.prevent="addCart()">{{cart__message}}</a>
              </div>
              <div class="d-flex">
                <a
                  @click.prevent="()=>qtySpec = 'Single'"
                  :class="this.qtySpec === 'Single' ? 'button__qty__selected' : 'button__qty__select'"
                  style="border-top-left-radius: 0;border-top-right-radius: 0;border-bottom-right-radius: 0"
                >Single</a>
                <a
                  @click.prevent="()=>qtySpec = 'Dozen'"
                  :class="this.qtySpec === 'Dozen' ? 'button__qty__selected' : 'button__qty__select'"
                  href
                  style="border-radius: 0"
                >Dozen</a>
                <a
                  @click.prevent="()=>qtySpec = 'Carton'"
                  :class="this.qtySpec === 'Carton' ? 'button__qty__selected' : 'button__qty__select'"
                  href
                  style="border-top-left-radius: 0;border-bottom-left-radius: 0;border-bottom-right-radius: 0"
                >Carton</a>
              </div>
              <div class="mt-4 d-none"
              :class="proceedCart ? 'd-flex' : 'd-none'"
              >
                <a :href='"/cart"'  class="button__qty__select">Proceed to cart</a>
                <a :href='"/checkout"' class="button__qty__select">Proceed to checkout</a>
              </div>
              <div class="card_area d-flex align-items-center">
                <a class="icon_btn" href="#">
                  <i class="lnr lnr lnr-diamond"></i>
                </a>
                <a class="icon_btn" href="#">
                  <i class="lnr lnr lnr-heart"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
      <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a
              class="nav-link"
              id="home-tab"
              data-toggle="tab"
              href="#home"
              role="tab"
              aria-controls="home"
              aria-selected="true"
            >Description</a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="profile-tab"
              data-toggle="tab"
              href="#profile"
              role="tab"
              aria-controls="profile"
              aria-selected="false"
            >Specification</a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="contact-tab"
              data-toggle="tab"
              href="#contact"
              role="tab"
              aria-controls="contact"
              aria-selected="false"
            >Prices</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
            <p v-html="productdescription"></p>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <h5>Brand</h5>
                    </td>
                    <td>
                      <h5>{{brand}}</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Gender Specification</h5>
                    </td>
                    <td>
                      <h5>{{productgenderspecification}}</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Category</h5>
                    </td>
                    <td>
                      <h5>{{productgenderspecification}}</h5>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <h5>Single</h5>
                    </td>
                    <td>
                      <h5>₦{{productamount}}</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Dozen</h5>
                    </td>
                    <td>
                      <h5>₦{{productpack}}</h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Carton prize</h5>
                    </td>
                    <td>
                      <h5>₦{{productpack}}</h5>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Product Description Area =================-->
  </div>
</template>

<script>
export default {
  data() {
    return {
      cart__message: "Add to Cart",
      qtySpec: "Single",
      init_qty: 1,
      prod__price: 0,
      proceedCart: false
    };
  },
  props: [
    "brand",
    "productid",
    "productbrand_id",
    "productdescription",
    "productgenderspecification",
    "productimage",
    "productname",
    "productpack",
    "productstock",
    "productamount",
    'productcarton'
  ],
  computed: {
    // get only
    init__price: function() {
      if (this.qtySpec === "Single") {
        return this.productamount;
      } else if (this.qtySpec === "Dozen") {
        return this.productpack;
      } else if (this.qtySpec === "Carton") {
        return this.productcarton;
      } else {
         return this.productamount;
      }
    }
    // both get and set
  },
  methods: {
    addCart() {
      this.showDismissibleAlert = false;
      this.cart__message = "Adding to Cart";
      axios
        .post(`/add/cart`, {
          id: this.productid,
          qty: this.init_qty,
          qtyValue: this.qtySpec,
          name: this.productname,
          amount: this.init__price
        })
        .then(response => {
          console.log(response.data);
          this.cart__message = response.data.msg;
        })
        .catch(err => {
          this.cart__message = "An Error occured";
          console.log({ message: "An Error occured: ", errors: err });
        })
        .finally(()=>{
          this.showDismissibleAlert = true;
          this.proceedCart= true
        })
    }
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
