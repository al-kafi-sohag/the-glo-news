@extends('frontend.layouts.app')

@section('title', 'About Us')

@push('css')
@endpush

@section('content')
    <div class="container">
        <div class="row gx-4 align-items-center d-flex justify-content-between mt-5">
            <div class="col-md-5 order-2 order-md-1">
                <div class="mt-5 mt-md-0">
                    <span class="text-muted">Our Story</span>
                    <h2 class="display-5 fw-bold">About Us</h2>
                    <p class="lead">
                        The Reporter 24 is a truly professional news portal committed to objective journalism. Headquartered in Bangladesh, the site has an international footprint focussing on the latest and breaking news across the globe.
                    </p>
                </div>
            </div>
            <div class="col-md-6 offset-md-1 order-1 order-md-2">
                <div class="row gx-2 gx-lg-3">
                    <div class="col-6">
                        <div class="mb-2"><img class="img-fluid rounded-3"
                                src="https://freefrontend.dev/assets/square.png"></div>
                    </div>
                    <div class="col-6">
                        <div class="mb-2"><img class="img-fluid rounded-3"
                                src="https://freefrontend.dev/assets/square.png"></div>
                    </div>
                    <div class="col-6">
                        <div class="mb-2"><img class="img-fluid rounded-3"
                                src="https://freefrontend.dev/assets/square.png"></div>
                    </div>
                    <div class="col-6">
                        <div class="mb-2"><img class="img-fluid rounded-3"
                                src="https://freefrontend.dev/assets/square.png"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center text-center mb-2 mb-lg-4 mt-5">
            <div class="col-12 col-lg-8 col-xxl-7 text-center mx-auto">
                <h2 class="display-5 fw-bold">Our Team</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($our_members as $member)
            <div class="col-md-4">

                <div class="card text-center mb-3 mt-5">

                    <div class="card-body p-0 pb-4">
                        <div class="mb-4"><img class="img-fluid" src="https://freefrontend.dev/assets/rectangle-wide.png">
                        </div>
                        <h5 class="fw-bold">{{ $member->name }}</h5>
                        <div class="text-muted">{{ $member->type() }}</div>
                        <div class="d-flex justify-content-center mt-4">
                            <a href=""><i class="fa-brands fa-linkedin fs-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-md-4">
                <div class="card text-center mb-3">
                    <div class="card-body p-0 pb-4">
                        <div class="mb-4"><img class="img-fluid" src="https://freefrontend.dev/assets/rectangle-wide.png">
                        </div>
                        <h5 class="fw-bold">John Doe</h5>
                        <div class="text-muted">
                            Programmer
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <a href="" class="me-4"><i class="fa-brands fa-facebook"></i></a>
                            <a href="" class="me-4"><i class="fa-brands fa-twitter"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center mb-3">
                    <div class="card-body p-0 pb-4">
                        <div class="mb-4"><img class="img-fluid" src="https://freefrontend.dev/assets/rectangle-wide.png">
                        </div>
                        <h5 class="fw-bold">John Doe</h5>
                        <div class="text-muted">
                            Programmer
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <a href="" class="me-4"><i class="fa-brands fa-facebook"></i></a>
                            <a href="" class="me-4"><i class="fa-brands fa-twitter"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

@push('link_script')
@endpush

@push('script')
@endpush
