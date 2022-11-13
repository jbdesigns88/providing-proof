    <script
      type="text/javascript"
      src="https://sandbox.web.squarecdn.com/v1/square.js"
    ></script>
    <script>


      async function initializeCard(payments) {
        const card = await payments.card();
        await card.attach('#card-container');

        return card;
      }

      async function createPayment(token) {
        const body = JSON.stringify({
          locationId,
          sourceId: token,
        });

        const paymentResponse = await fetch('/payment', {
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
        if (!window.Square) {
          throw new Error('Square.js failed to load properly');
        }
            const appId = document.getElementById('sq-app-id').value; //should get this form app config
         const locationId = document.getElementById('sq-loc-id').value;
        console.log(`The application ${appId} and location ${locationId}`)
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

        const updateDonationAmount = () =>{
            cardButton.innerText = `Donate ${formatter.format(donationAmountContainer.value)}`;
            cardButton.value = donationAmountContainer.value * 100;
        }


        const formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',
        });

        const cardButton = document.getElementById('card-button');
        cardButton.addEventListener('click', async function (event) {
          await handlePaymentMethodSubmission(event, card);
        });

        let donationAmountContainer = document.getElementById('donation');
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
 