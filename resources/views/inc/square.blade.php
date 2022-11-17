    <script
      type="text/javascript"
      src="https://sandbox.web.squarecdn.com/v1/square.js"
    ></script>
    <script>

    let amount_money;
        let appId;
         let locationId;
         let name;
         let userinfo;
         let cardButton;
         let donationAmountContainer;
      async function initializeCard(payments) {
        const card = await payments.card();
        await card.attach('#card-container');

        return card;
      }

      async function createPayment(token) {
 
        const body = JSON.stringify({
          data:{
            locationId,
          sourceId: token,
          amount:amount_money,
          name: name.value.trim()
        }
        });

        const paymentResponse = await fetch('api/payment', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body,
        });

        if (paymentResponse.ok) {
          return paymentResponse.json();
        }

        const errorBody = await paymentResponse.text();
        throw new Error(errorBody);
      }

      async function tokenize(paymentMethod) {
        const tokenResult = await paymentMethod.tokenize();
        if (tokenResult.status === 'OK') {
          return tokenResult.token;
        } else {
          let errorMessage = `Tokenization failed with status: ${tokenResult.status}`;
          if (tokenResult.errors) {
            errorMessage += ` and errors: ${JSON.stringify(
              tokenResult.errors
            )}`;
          }

          throw new Error(errorMessage);
        }
      }

      // status is either SUCCESS or FAILURE;
      function displayPaymentResults(status) {
        const statusContainer = document.getElementById(
          'payment-status-container'
        );
        if (status === 'SUCCESS') {
          statusContainer.classList.remove('is-failure');
          statusContainer.classList.add('is-success');
        } else {
          statusContainer.classList.remove('is-success');
          statusContainer.classList.add('is-failure');
        }

        statusContainer.style.visibility = 'visible';
      }

      document.addEventListener('DOMContentLoaded', async function () {
        const formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',
        });

        if (!window.Square) {
          throw new Error('Square.js failed to load properly');
        }
        donationAmountContainer = document.getElementById('donation');
        cardButton = document.getElementById('card-button');
        name = document.getElementById('name');
        userinfo = document.getElementById('username');
        updateDonationAmount()
        appId = document.getElementById('sq-app-id').value; //should get this form app config
         locationId = document.getElementById('sq-loc-id').value;
        let payments;
        try {
          payments = window.Square.payments(appId, locationId);
        } catch {
          const statusContainer = document.getElementById(
            'payment-status-container'
          );
          statusContainer.className = 'missing-credentials';
          statusContainer.style.visibility = 'visible';
          return;
        }

        let card;
        try {
          card = await initializeCard(payments);
        } catch (e) {
          console.error('Initializing Card failed', e);
          return;
        }

        // Checkpoint 2.
        async function handlePaymentMethodSubmission(event, paymentMethod) {
          event.preventDefault();

          try {
            // disable the submit button as we await tokenization and make a payment request.
            cardButton.disabled = true;
            const token = await tokenize(paymentMethod);
            const paymentResults = await createPayment(token);
            displayPaymentResults('SUCCESS');

            console.debug('Payment Success', paymentResults);
          } catch (e) {
            cardButton.disabled = false;
            displayPaymentResults('FAILURE');
            console.error(e.message);
          }
        }

        function updateDonationAmount(){
            cardButton.innerText = `Donate ${formatter.format(donationAmountContainer.value)}`;
            amount_money = donationAmountContainer.value * 100;
            cardButton.value = amount_money;
        }


 
       
        cardButton.addEventListener('click', async function (event) {
            if(name.value.length === 0 ){
                userinfo.classList.add('activate')
            return
        }
          await handlePaymentMethodSubmission(event, card);
        });

        name.addEventListener('input',(event) => {
            event.preventDefault();
            userinfo.classList.toggle('activate',name.value.length === 0);
        })
        
        
        
        
        donationAmountContainer.addEventListener('change',function(event){
            event.preventDefault();
            updateDonationAmount()
        })

        document.querySelectorAll('.donation-option').forEach(donation => {
            donation.addEventListener("click",()=>{
                donationAmountContainer.value = donation.innerText.replace('$','')
                updateDonationAmount()
            })
            
        })
      });
    </script>

    <form id="payment-form">
      <div id="card-container"></div>
      <input id="sq-app-id" type="hidden" value="{{config('services.square.app')}}" />
      <input id="sq-loc-id" type="hidden" value="{{config('services.square.location')}}" />
      <button id="card-button" class="btn btn-primary button-default" type="button">Donate $1.00</button>
    </form>
    <div id="payment-status-container"></div>
 