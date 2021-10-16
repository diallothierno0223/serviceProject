@extends('layouts.master')

@section('content')
<br>
<section class="site-section" id="about-section">

      <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-3 text-black" >BIENVENUE CHEZ VOUS </h2>
            </div>
            </div>
        <div class="row large-gutters">
          <div class="col-lg-6 mb-5">

              <div >
                  <div><img src="{{asset('style/images/service1.jpg')}}" alt="Free website template " class="img-fluid"></div>
                 
                </div>

          </div>
          <div class="col-lg-6 ml-auto">

            <h2 class="section-title mb-3">Aide aux mises en relations dans le domaine du service domestique</h2>
                <p class="lead">Particulier et prestataire</p>
                <p style="text-align:justify">Le lorem ipsum est, en imprimerie, une suite de mots sans 
                signification utilisée à titre provisoire pour calibrer une mise en page, le teLe lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.
                xte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.
            </p>



          </div>
        </div>
      </div>
    </section>
    
   <section  >
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-3 text-black" >Comment Cela Fonctionne</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 text-center">
            <div class="pr-5 first-step">
              <span class="text-black">01.</span>
              <span class="custom-icon flaticon-house text-black"></span>
              <h3 class="text-black">lorem ipsum est, en im.</h3>
              <p class="text-black">lorem ipsum est, en im lorem ipsum est, en imlorem ipsum est, en imlorem ipsum est, en im.</p>
            </div>
          </div>

          <div class="col-md-4 text-center">
            <div class="pr-5 second-step">
              <span class="text-black">02.</span>
              <span class="custom-icon flaticon-coin text-black"></span>
              <h3 class="text-dark">lorem ipsum est, en im.</h3>
              <p class="text-black">lorem ipsum est, en im lorem ipsum est, en imlorem ipsum est, en im lorem ipsum est, en im</p>
            </div>
          </div>

          <div class="col-md-4 text-center">
            <div class="pr-5">
              <span class="text-black">03.</span>
              <span class="custom-icon flaticon-home text-black"></span>
              <h3 class="text-dark">lorem ipsum est, en im</h3>
              <p class="text-black">lorem ipsum est, en im hlorem ipsum est, en imlorem ipsum est, en imlorem ipsum est, en im .</p>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection