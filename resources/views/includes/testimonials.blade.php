<div class="site-section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <h2 class="section-heading"><strong>Testimonials</strong></h2>
          <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
        </div>
      </div>
      <div class="row">

        @foreach ($test as $t)
            
        <div class="col-lg-4 mb-4 mb-lg-0">
          <div class="testimonial-2">
            <blockquote class="mb-4">
              <p>{{ $t->content }}</p>
            </blockquote>
            <div class="d-flex v-card align-items-center">
              <img src="{{ asset('assets/images/'.$t->image) }}" alt="Image" class="img-fluid mr-3">
              <div class="author-name">
                <span class="d-block">{{ $t->name }}</span>
                <span>{{ $t->position }}</span>
              </div>
            </div>
          </div>
        </div>
        
        @endforeach


        </div>

      </div>
    </div>
  </div>

  <div class="site-section bg-primary py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7 mb-4 mb-md-0">
          <h2 class="mb-0 text-white">What are you waiting for?</h2>
          <p class="mb-0 opa-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
        </div>
        <div class="col-lg-5 text-md-right">
          <a href="#" class="btn btn-primary btn-white">Rent a car now</a>
        </div>
      </div>
    </div>
  </div>
