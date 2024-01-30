@extends('layouts.guest')

@section('section-guest')
<section class="section blog-wrap bg-gray">
	<div class="container">
		<div class="row">
            <div class="col-lg-6 col-md-6 mb-5">
				<div class="blog-item">
					<img loading="lazy" src="{{ asset('assets/images/blog/1.jpg') }}" alt="blog" class="img-fluid rounded">

					<div class="blog-item-content bg-white p-5">
						<div class="blog-item-meta bg-gray pt-2 pb-1 px-3 d-flex justify-content-center">
                            <span class="text-muted text-capitalize d-inline-block me-3"><i class="ti-pencil-alt me-2"></i>Creativity</span>
                            <span class="text-muted text-capitalize d-inline-block me-3"><i class="ti-comment me-2"></i>5 Comments</span>
                            <span class="text-muted text-capitalize d-inline-block me-3"><i class="ti-time me-1"></i> 28th January</span>
                        </div>                        

						<h3 class="mt-3 mb-3"><a href="blog-single.html">Improve design with typography?</a></h3>
						<p class="mb-4">Non illo quas blanditiis repellendus laboriosam minima animi. Consectetur accusantium
							pariatur repudiandae!</p>

						<a href="blog-single.html" class="btn btn-small btn-main btn-round-full">Learn More</a>
					</div>
				</div>
			</div>
        </div>
    </div>
</section>
@endsection