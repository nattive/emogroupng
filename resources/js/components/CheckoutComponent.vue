<template>
  <!--================Checkout Area =================-->
  <section class="checkout_area section-margin--small">
    <div class="container bg-light p-4">
      <div class="billing_details">
        <div class="row">
          <div class="col-lg-8">
            <h3>Billing Details</h3>
            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
              <div class="col-md-6 form-group p_star">
                <input
                  type="text"
                  class="form-control"
                  v-model="first"
                  name="name"
                  placeholder="First name"
                />
              </div>
              <div class="col-md-6 form-group p_star">
                <input
                  type="text"
                  class="form-control"
                  v-model="last"
                  name="name"
                  placeholder="Last name"
                />
              </div>
              <div class="col-md-6 form-group p_star">
                <input
                  type="text"
                  class="form-control"
                  v-model="number"
                  name="number"
                  placeholder="Phone number"
                />
              </div>
              <div class="col-md-6 form-group p_star">
                <input
                  type="text"
                  class="form-control"
                  v-model="email"
                  name="compemailany"
                  placeholder="Email Address"
                />
              </div>
              <div class="col-md-12 form-group p_star">
                <select v-model="country_select" class="country_select">
                  <option value="Nigeria">Nigeria</option>
                  <option value="Other">Other</option>
                </select>
              </div>
              <div class="col-md-12 form-group p_star">
                <input
                  type="text"
                  class="form-control"
                  v-model="add1"
                  name="add1"
                  placeholder="Address line 01"
                />
              </div>
              <div class="col-md-12 form-group p_star">
                <input
                  type="text"
                  class="form-control"
                  v-model="city"
                  name="city"
                  placeholder="Town/City"
                />
              </div>
              <div class="col-md-12 form-group p_star">
                <select class="country_select" v-model="state_select">
                  <option value="Lagos">Lagos</option>
                  <option value="SW">State within South-West Nigeria</option>
                  <option value="SS">State within South-Soiuth Nigeria</option>
                  <option value="N">State within Borth Nigeria</option>
                </select>
              </div>
              <div class="col-md-12 form-group">
                <input
                  type="text"
                  class="form-control"
                  v-model="zip"
                  name="zip"
                  placeholder="Postcode/ZIP"
                />
              </div>
            </form>
          </div>
          <div class="col-lg-4">
            <div class="order_box">
              <h2>Your Order</h2>
              <ul class="list">
                <li v-for="(cart, index) in cartcontent" :key="index">
                  <a href="#">
                    {{cart.name}}
                    <span class="middle">x {{cart.qty}}</span>
                    <span class="last">₦{{cart.price}}</span>
                  </a>
                </li>
                <hr class="my-4" />
                <li>
                  <a href="#">
                    <h4>
                      Delivery Charge
                      <span>₦{{ formatPrice(deliveryCost)}}</span>
                    </h4>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <h4>
                      Total
                      <span>₦{{formatPrice(totalPrice)}}</span>
                    </h4>
                  </a>
                </li>
              </ul>
              <!-- <ul class="list list_2">
                            <li><a href="#">Subtotal <span>₦ {{number_format($cartitem -> subtotal) }}</span></a></li>
                            {{-- <li><a href="#">Shipping <span>Flat rate: $50.00</span></a></li> --}}
                            <li><a href="#">Total <span>₦ {{number_format($cartitem -> total) }}</span></a></li>
              </ul>-->
              <div class="payment_item">
                <div class="radion_btn">
                  <input
                    type="radio"
                    id="f-option5"
                    name="paymentMode"
                    value="cheque"
                    v-model="paymentMode"
                  />
                  <label for="f-option5">cheque payments</label>
                  <div class="check"></div>
                </div>
                <p>
                  Please send a check to Store Name, Store Street, Store Town, Store State / County,
                  Store Postcode.
                </p>
              </div>
              <div class="payment_item active">
                <div class="radion_btn">
                  <input
                    type="radio"
                    id="f-option6"
                    name="paymentMode"
                    value="paystack"
                    v-model="paymentMode"
                  />
                  <label for="f-option6">paystack</label>
                  <img src="img/product/card.jpg" alt />
                  <div class="check"></div>
                </div>
                <p>
                  Pay via paystack; you can pay with your credit card if you don’t have a paystack
                  account.
                </p>
              </div>
              <div class="creat_account">
                <input type="checkbox" id="f-option4" name="selector" value="true" v-model="TandC" />
                <label for="f-option4">I’ve read and accept the</label>
                <a href="#">terms & conditions*</a>
              </div>

              <paystack
                v-show="paystackBtn"
                :amount="totalPrice"
                :email="email"
                :paystackkey="paystackkey"
                :reference="reference"
                :callback="callback"
                :close="close"
                :embed="false"
                :class="'button button-paystack'"
              >Proceed to paystack</paystack>
              <div class="text-center" v-show="!paystackBtn">
                <button class="button button-paystack" @click.prevent="checkout">{{finalBtnText}}</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import paystack from "vue-paystack";

export default {
  props: ["total", "cartcontent"],
  data() {
    return {
      first: "",
      last: "",
      number: "",
      email: "",
      add1: "",
      city: "",
      zip: "",
      paymentMode: "paystack",
      paystack: false,
      country_select: "",
      state_select: "",
      TandC: "",
      deliveryCharge: 0,
      paystackkey: "pk_test_a33279264c8e338b29e2f5b15e98552a0f06b985"
    };
  },
  components: {
    paystack
  },
  computed: {
    paystackBtn() {
      if (this.paymentMode === "paystack") {
        return true;
      }
      return false;
    },
    reference() {
      let text = "";
      let possible =
        "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

      for (let i = 0; i < 10; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));

      return text + this.first;
    },
    checkoutValidated: function() {
      if (this.TandC !== "" && this.paymentMode !== "") {
        return true;
      }
      return false;
    },
    finalLink: function() {
      switch (this.paymentMode) {
        case "cheque":
          return "/thankYou";
          break;
        case "paystack":
          return "/thankYou";
          break;
        default:
          return "#";
          break;
      }
    },
    finalBtnText: function() {
      switch (this.paymentMode) {
        case "cheque":
          return "Pay Later via cheque";
          break;
        case "paystack":
          return "Proceed to paystack";
          break;
        default:
          return "Choose Payment Method";
          break;
      }
    },
    confirmPayment: function() {
      if (this.paymentMode === "paystack") {
        return true;
      }
      return false;
    },
    totalPrice: function() {
      return Number(this.total) + this.deliveryCost;
    },
    deliveryCost: function() {
      switch (this.state_select) {
        case "Lagos":
          return 1000;
          break;
        case "SW":
          return 2000;
          break;
        case "SS":
          return 3000;
          break;
        case "N":
          return 5000;
          break;
        default:
          return 0;
          break;
      }
      return this.state_select === "";
    }
  },
  methods: {
    callback: function(response) {
      console.log(response);
    },
    close: function() {
      console.log("Payment closed");
    },
    formatPrice(value) {
      let val = (value / 1).toFixed(2).replace(",", ".");
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
    checkout() {
      if (this.checkoutValidated === true) {
        let customerData = {
          firstname: this.first,
          lastname: this.last,
          phone: this.number,
          emailaddress: this.email,
          streetaddress: this.add1,
          towncity: this.city,
          postcodezip: this.zip,
          country: this.country_select,
          Appartment: this.state_select,
        };
        let CartDetails = {
          confirmPayment: this.confirmPayment,
          paymentMode: this.paymentMode,
          CheckOutTotal: this.totalPrice,
          deliveryCharge: this.deliveryCost,
          transactionRef: this.reference,
          cartContent: this.cartcontent,
          confirmPayment: false
        };
        axios.post("/checkout", { customerData, CartDetails }).then(response => {
          console.log(response);
        });
      } else {
        console.log("error");
      }
    }
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
