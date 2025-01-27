<section style="background-image: url('{{ $bgImage }}'); background-repeat: no-repeat; background-size: cover;">
    <div class="container-lg">
      <div class="row">
        <div class="col-lg-6 pt-5 mt-5">
          <h2 class="display-1 ls-1">
            <span class="fw-bold text-primary">{{config("app.name")}}</span> Foods at your <span class="fw-bold">Doorsteps</span>
          </h2>
          <p class="fs-4">{{ $subheading }}</p>
          <div class="d-flex gap-3">
            <a href="{{ $shoppingLink }}" class="btn btn-primary text-uppercase fs-6 rounded-pill px-4 py-3 mt-3">Start Shopping</a>
            <a href="{{ $joinLink }}" class="btn btn-dark text-uppercase fs-6 rounded-pill px-4 py-3 mt-3">Join Now</a>
          </div>
          <div class="row my-5">
            <x-welcome-page.info-card value="14k+" label="Product Varieties" />
            <x-welcome-page.info-card value="50k+" label="Happy Customers" />
            <x-welcome-page.info-card value="10+" label="Store Locations" />
          </div>
        </div>
      </div>

      <div class="row row-cols-1 row-cols-sm-3 row-cols-lg-3 g-0 justify-content-center">
        <x-welcome-page.feature-card bgColor="bg-primary" icon="#fresh" title="Fresh from farm" description="Lorem ipsum dolor sit amet, consectetur adipi elit." />
        <x-welcome-page.feature-card bgColor="bg-secondary" icon="#{{config("app.name")}}" title="100% {{config("app.name")}}" description="Lorem ipsum dolor sit amet, consectetur adipi elit." />
        <x-welcome-page.feature-card bgColor="bg-danger" icon="#delivery" title="Free delivery" description="Lorem ipsum dolor sit amet, consectetur adipi elit." />
      </div>
    </div>
  </section>
