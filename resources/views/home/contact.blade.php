@extends('layouts.master')

@section('content')
    
	<div class="all-title-box">
		<div class="container text-center">
			<h1>Contact<span class="m_1">Lorem Ipsum dolroin gravida nibh vel velit.</span></h1>
		</div>
	</div>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                <h3>{{session()->get('success')}}</h3>
            </div>
        @endif
    <div id="support" class="section wb">
        <div class="container-fulid">
            <div class="section-title text-center">
                <h3>Need Help? Sure we are Online!</h3>
                <p class="lead">Let us give you more details about the special offer website you want us. Please fill out the form below. <br>We have million of website owners who happy to work with us!</p>
            </div><!-- end title -->
            
            <div class="row">
                <div class="col-xl-6 col-md-12 col-sm-12">
                    <div class="contact_form">
                        <div id="message"></div>
                        <form id="contactform" class="" action="{{route('contact.envoyer')}}" method="post" name="contactform" method="post">
                            @csrf
                            <fieldset class="row row-fluid">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="first_name" id="first_name" value="{{old('first_name') ?? ''}}" class="form-control mb-3 @error('first_name') is-invalid @enderror " placeholder="Nom">
                                        @error('first_name')
                                            <div class="invalid-feedback">
                                            <h6 class="text-danger">{{$errors->first('first_name')}}</h6>
                                            </div>
                                        @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="last_name" id="last_name" value="{{old('last_name') ?? ''}}" class="form-control mb-3 @error('last_name') is-invalid @enderror "  placeholder="Prénom">
                                         @error('last_name')
                                            <div class="invalid-feedback">
                                            <h6 class="text-danger">{{$errors->first('last_name')}}</h6>
                                            </div>
                                        @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="email" id="email" value="{{old('email') ?? ''}}" class="form-control mb-3 @error('email') is-invalid @enderror " placeholder="votre email">
                                        @error('email')
                                            <div class="invalid-feedback">
                                            <h6 class="text-danger">{{$errors->first('email')}}</h6>
                                            </div>
                                        @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="phone" id="phone" value="{{old('phone') ?? ''}}" class="form-control mb-3 @error('phone') is-invalid @enderror " placeholder="votre numero de téléphone">
                                         @error('phone')
                                            <div class="invalid-feedback">
                                            <h6 class="text-danger">{{$errors->first('phone')}}</h6>
                                            </div>
                                        @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea value="{{old('comments') ?? ''}}" class="form-control mb-3 @error('comments') is-invalid @enderror " name="comments" id="comments" rows="6" placeholder="votre message..."></textarea>
                                        @error('comments')
                                            <div class="invalid-feedback">
                                            <h6 class="text-danger">{{$errors->first('comments')}}</h6>
                                            </div>
                                        @enderror
                                </div>
                                <div class="text-center pd">
                                    <button type="submit" value="SEND" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">SEND MESSAGE</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div><!-- end col -->
				<div class="col-xl-6 col-md-12 col-sm-12">
					<div class="map-box">
						<div id="custom-places" class="small-map"></div>
					</div>
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
@endsection