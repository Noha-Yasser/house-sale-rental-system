<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment</title>
  <link rel="stylesheet" href="css/payment.css">
</head>
<body>


  <!-- Payment Box -->
  <div class="payment-wrapper" id="paymentWrapper">
    <div class="payment-card">
      <h1>Payment</h1>

      <form>
        <!-- Payment Method -->
        <div class="input-box">
          <label for="pay-way">Payment Way :</label>
          <select required id="pay-way">
            <option value="">Select Payment Method</option>
            <option value="paypal">PayPal</option>
            <option value="visa">Visa</option>
          </select>
        </div>

        <!-- Name -->
        <div class="input-box">
          <label for="name">Name : </label>
          <input type="text" placeholder="Full Name" required id="name">
        </div>

        <!-- Email -->
        <div class="input-box">
          <label for="email">Email : </label>
          <input type="email" placeholder="Email" required id="email">
        </div>

        <!-- Card Number -->
        <div class="input-box">
              <label for="card-no">Card Number : </label>
          <input type="text" placeholder="Card Number" required id="card-no">
        </div>
        <!-- payment money -->
        <div class="input-box">
              <label for="how-much">How Much will pay ? </label>
          <input type="number" placeholder="enter it in Dollar" required id="how-much">
        </div>

        <button class="pay-btn" onclick="paymentDone()">Pay Now</button>
      </form>
    </div>
  </div>

  <div id="paymentDone"   style="display:none;">
    <h1>you have Successfully paid</h1>
  </div>

<script>
  function paymentDone(){
      document.getElementById("paymentDone").style.display = "block";
    }

</script>
</body>
</html>