<x-layout>
  <x-slot name="content"> 
    <div class="container py-5">

      <div class="row g-5">
        <div class="col-md-7 col-lg-8">
          <h3 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-light bg-dark p-2" style="border-radius: 5px">Donate</span>
            <span class="donation-option badge main-bg rounded-pill button-default">$25.00</span>
            <span class="donation-option badge main-bg rounded-pill button-default">$50.00</span>
            <span class="donation-option badge main-bg rounded-pill button-default">$75.00</span>
            <span class="donation-option badge main-bg rounded-pill button-default">$100.00</span> 
          </h3>
          <div class="row">
            <label for="donation" class=""> <h4>Other Amount<h4></label>
              <input id="donation" class="form-control col-md-8" type="number" min="0.01" step="0.01" max="2500" value="1.00" />

          </div>
          <h4 class="mb-3 mt-3">User Information</h4>
          <form class="needs-validation" novalidate="">
            <div class="row g-3">
              <div id="username" class="col-12">
                <label for="name" class="form-label">Name <span class="text-danger">(required*)</span></label>
                <input type="text" class="form-control" id="name" placeholder="" value="" required="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                <div class="invalid-feedback">
                  Valid name is required.
                </div>
              </div>
  
          
     
  
              <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com">
              </div>
  
              @include('inc.square')
  

  

          </form>
        </div>
      </div>

    </div>
    

  </x-slot>
</x-layout>