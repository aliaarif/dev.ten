@extends('layouts.frontend')
@section('content')
<section class="w-100 head-bg p-tb-25">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="paging">
					<h1 class="h1-title"><span>FAQ</span></h1>                     
					<ul>
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><a>Faq</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

</section>
<section class="w-100 p-tb-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="faqsearch">
					<div class="search-form">
						<div align="left" class="errFaqSearch"></div>
						<form id="faqSearchForm">
							<div class="search-bx"><input type="text" placeholder="Posez votre question" name="faqSearch" id="faqSearch" class="input-search2 s-iconfaq">
								
							</div>        
							<div class="search-bx"><button id="searchBtn" type="button"  class="btn-submit s-icon3">Search</button></div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-md-8" id="faqResults">
				<div class="faq">
					
					<!--Accordion wrapper-->
					<div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">

						<div class="faq-title">
							<h2 class="h2title2">À propos de Doctolib</h2>
							@forelse($faqs as $faq)
							<!-- Accordion card -->
							<div class="card">

								<!-- Card header -->
								<div class="card-header" role="tab" id="headingTwo{{ $faq->id }}">
									<a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo{{ $faq->id }}"
										aria-expanded="false" aria-controls="collapseTwo{{ $faq->id }}">
										<p class="mb-0">{{ $faq->question }}<i class="fa fa-angle-down rotate-icon"></i></p>
									</a>
								</div>

								<!-- Card body -->
								<div id="collapseTwo{{ $faq->id }}" class="collapse" role="tabpanel" aria-labelledby="headingTwo{{ $faq->id }}"
									data-parent="#accordionEx1">
									<div class="card-body">
										<?php echo html_entity_decode($faq->question); ?>
									</div>
								</div>

							</div>
							<!-- Accordion card -->

							@empty

							No Faq Found at all

							@endforelse

						</div>
					</div>

				</div>
			</div>



			<div class="col-lg-4 col-md-4">
				<div class="contact">          
					<ul class="contact-ul">            
						<li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>Vous avez des questions ? N'hésitez pas à nous contacter</a></li>
						<li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>+867 767 2478</a></li>
						<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>xyz@xyzgmail.com</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

</section>
@endsection
@push('css')
<!-- ++++++ login form style +++++++++ -->
<link rel="stylesheet" type="text/css" href="{{  asset('frontAssets/css/headstyle.css') }}">
@endpush

@push('js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">



	$( document ).ready(function() {



		function fetchFaqResults(search){

			axios.get('/get-faqs/'+search)
			.then(function (res) {
				$('#city').html('');

			})
			.catch(function (err) {
				console.log(err);
			});
		}


		$( "#faqSearch" ).keyup(function(term) {
			var term = $('#faqSearch').val();

			if(term!=""){

				return fetchFaqResults(term); 	
			}

		});









		$('#searchBtn').on('click', function(term){
			var term = $('#faqSearch').val();
			if(term == ''){
				//e.preventDefault();
				$('#faqSearch').focus();
				// $('#errFaqSearch').html('Provide your question first');
			}else{
				return fetchFaqResults(term);
			}
		});
	});
</script>
@endpush