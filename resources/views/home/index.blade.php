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
                <p style="text-align:justify">Aide à domicile, employé de maison ou de ménage, ... Il procède à l'entretien ménager du domicile d'un ou plusieurs particuliers, selon les instructions de la personne ou de la structure employeuse. Il peut effectuer des travaux de grand nettoyage occasionnels ou des activités de services et d'accompagnement auprès de publics (enfants, personnes âgées, ...), peut coordonner
                   l'activité du personnel de maison. Il exerce au domicile d'un ou plusieurs particuliers.</p>



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
              <h3 class="text-black">créer un compte en fonction du profil demandé</h3>
              {{-- <p class="text-black">lorem ipsum est, en im lorem ipsum est, en imlorem ipsum est, en imlorem ipsum est, en im.</p> --}}
            </div>
          </div>

          <div class="col-md-4 text-center">
            <div class="pr-5 second-step">
              <span class="text-black">02.</span>
              <span class="custom-icon flaticon-coin text-black"></span>
              <h3 class="text-dark">créer des offres ou faire des demandes de prestations de services</h3>
              {{-- <p class="text-black">lorem ipsum est, en im lorem ipsum est, en imlorem ipsum est, en im lorem ipsum est, en im</p> --}}
            </div>
          </div>

          <div class="col-md-4 text-center">
            <div class="pr-5">
              <span class="text-black">03.</span>
              <span class="custom-icon flaticon-home text-black"></span>
              <h3 class="text-dark">postuler à une demande ou offre et recevoir des notification par mail et sms</h3>
              {{-- <p class="text-black">lorem ipsum est, en im hlorem ipsum est, en imlorem ipsum est, en imlorem ipsum est, en im .</p> --}}
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection