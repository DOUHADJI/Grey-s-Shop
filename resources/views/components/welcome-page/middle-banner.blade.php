<section class="py-3">
    <div class="container-lg">
      <div class="row">
        <div class="col-md-12">

          <div class="banner-blocks">

            <!-- Composant Bannière 1 -->
            <x-welcome-page.middle-banner-ad-first
              image="{{asset('images/banner-ad-1.jpg')}}"
              title="Articles en vente"
              description="Réduction jusqu'à 30%"
              buttonText="Acheter maintenant"
              bgColor="bg-info"
            />

            <!-- Composant Bannière 2 -->
            <x-welcome-page.middle-banner-ad-second
              image="{{asset('images/banner-ad-2.jpg')}}"
              title="Offre promotionnelles"
              description="Réduction jusqu'à 50%"
              buttonText="Acheter maintenant"
              bgColor="bg-success-subtle"
            />

            <!-- Composant Bannière 3 -->
            <x-welcome-page.middle-banner-ad-third
              image="{{asset('images/banner-ad-3.png')}}"
              title="Coupons de réduction"
              description="Réduction jusqu'à 40%"
              buttonText="Acheter maintenant"
              bgColor="bg-danger"
            />

          </div>
          <!-- / Banner Blocks -->

        </div>
      </div>
    </div>
  </section>

