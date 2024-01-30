@if (Request::is('/'))
<section class="slider">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-10">
				<div class="block">
					<span class="d-block mb-3 text-white text-capitalize">Prepare for new future</span>
					<h1 class="animated fadeInUp mb-5">Our work is to <br> contribute to helping <br> your product management.</h1>
				</div>
			</div>
		</div>
	</div>
</section>
@elseif (Request::is('about-us'))
<section class="page-title bg-1">
	<div class="container">
	  <div class="row">
		<div class="col-md-12">
		  <div class="block text-center">
			<span class="text-white">About Us</span>
			<h1 class="text-capitalize mb-4 text-lg">Our Company</h1>
			<ul class="list-inline">
			  <li class="list-inline-item"><a href="{{ route('/') }}" class="text-white">Home</a></li>
			  <li class="list-inline-item"><span class="text-white">/</span></li>
			  <li class="list-inline-item text-white-50">About Us</li>
			</ul>
		  </div>
		</div>
	  </div>
	</div>
</section>
@elseif (Request::is('service'))
<section class="page-title bg-1">
	<div class="container">
	  <div class="row">
		<div class="col-md-12">
		  <div class="block text-center">
			<span class="text-white">Our services</span>
			<h1 class="text-capitalize mb-4 text-lg">What We Do</h1>
			<ul class="list-inline">
			  <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
			  <li class="list-inline-item"><span class="text-white">/</span></li>
			  <li class="list-inline-item text-white-50">Our services</li>
			</ul>
		  </div>
		</div>
	  </div>
	</div>
</section>
@elseif (Request::is('contact-us'))
<section class="page-title bg-1">
	<div class="container">
	  <div class="row">
		<div class="col-md-12">
		  <div class="block text-center">
			<span class="text-white">Contact Us</span>
			<h1 class="text-capitalize mb-4 text-lg">Get in Touch</h1>
			<ul class="list-inline">
			  <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
			  <li class="list-inline-item"><span class="text-white">/</span></li>
			  <li class="list-inline-item text-white-50">Contact Us</li>
			</ul>
		  </div>
		</div>
	  </div>
	</div>
</section>
@endif