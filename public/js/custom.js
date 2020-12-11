$(document).ready(function() {

    /**
     * Variable declarations
     **/

    var first = $('#first').val();
    var last = $('#last').val();
    var number = $('#number').val();
    var email = $('#email').val();
    var add1 = $('#add1').val();
    var city = $('#city').val();
    var zip = $('#zip').val();
    var paymentMode = $('#paymentMode').val();

    /**
     * Variable declarations
     **/

    const checkout = () => {
        console.log(
            first + last + number + email + add1 + city + zip + paymentMode
        );

    }


});