<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container"><a class="navbar-brand d-inline-flex" href="{{ route('/') }}"><img class="d-inline-block"
                src="{{ asset('assets/img/logo.png') }}" alt="logo" style="width: 50px;" /><span
                class="text-1000 fs-3 fw-bold ms-2 text-gradient">FOODlama</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon">
            </span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 my-2 mt-lg-0" id="navbarSupportedContent">
            <div class="mx-auto pt-5 pt-lg-0 d-block d-lg-none d-xl-block">
                <p class="mb-0 fw-bold text-lg-center">Deliver to:
                    <i class="fas fa-map-marker-alt text-warning mx-2"></i>
                    <span class="fw-normal">Current Location </span><span>Mirpur 1 Bus Stand, Dhaka</span>
                </p>
            </div>
            <form class="d-flex mt-4 mt-lg-0 ms-lg-auto ms-xl-0">
                <div class="input-group-icon pe-2"><i class="fas fa-search input-box-icon text-primary"></i>
                    <input class="form-control border-0 input-box bg-100" type="search" placeholder="Search Food"
                        aria-label="Search" />
                </div>
                <button class="btn btn-white shadow-warning text-warning" type="submit"> <i
                        class="fas fa-user me-2"></i>Login</button>
            </form>
        </div>
    </div>
</nav>
<section class="py-5 overflow-hidden bg-primary" id="home">
    <div class="container">
        <div class="row flex-center">
            <div class="col-md-5 col-lg-6 order-0 order-md-1 mt-8 mt-md-0"><a class="img-landing-banner" href="#!"><img
                        class="img-fluid" src="{{ asset('assets/img/gallery/hero-header.png') }}"
                        alt="hero-header" /></a></div>
            <div class="col-md-7 col-lg-6 py-8 text-md-start text-center">
                <h1 class="display-1 fs-md-5 fs-lg-6 fs-xl-8 text-light">Are you starving?</h1>
                <h1 class="text-800 mb-5 fs-4">Within a few clicks, find meals that<br class="d-none d-xxl-block" />are
                    accessible near you</h1>
                <div class="card w-xxl-75">
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active mb-3" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                    aria-selected="true"><i class="fas fa-motorcycle me-2"></i>Delivery</button>
                                <button class="nav-link mb-3" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                    aria-selected="false"><i class="fas fa-shopping-bag me-2"></i>Pickup</button>
                            </div>
                        </nav>
                        <div class="tab-content mt-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <form class="row gx-2 gy-2 align-items-center">
                                    <div class="col">
                                        <div class="input-group-icon"><i
                                                class="fas fa-map-marker-alt text-danger input-box-icon"></i>
                                            <label class="visually-hidden" for="inputDelivery">Address</label>
                                            <input class="form-control input-box form-foodwagon-control"
                                                id="inputDelivery" type="text" placeholder="Enter Your Address" />
                                        </div>
                                    </div>
                                    <div class="d-grid gap-3 col-sm-auto">
                                        <button class="btn btn-danger" type="submit">Find Food</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <form class="row gx-4 gy-2 align-items-center">
                                    <div class="col">
                                        <div class="input-group-icon"><i
                                                class="fas fa-map-marker-alt text-danger input-box-icon"></i>
                                            <label class="visually-hidden" for="inputPickup">Address</label>
                                            <input class="form-control input-box form-foodwagon-control"
                                                id="inputPickup" type="text" placeholder="Enter Your Address" />
                                        </div>
                                    </div>
                                    <div class="d-grid gap-3 col-sm-auto">
                                        <button class="btn btn-danger" type="submit">Find Food</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
