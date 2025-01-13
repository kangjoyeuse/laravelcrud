@extends('structure.master')

@section('title', 'Dashboard')

@section('content')
    <div class="page-content">
        <!-- Section for Summary Stats -->
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <!-- ... other cards ... -->

                    <!-- Administrator Card -->
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-xxl-7">
                                        <h6 class="text-muted font-semibold">Role</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ... rest of the content ... -->
            </div>

            <!-- Profil Section -->
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="https://via.placeholder.com/150" alt="User Avatar">
                            </div>
                            <div class="ms-3 name">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ... rest of the content ... -->
        </section>
    </div>

    <!-- ... Chart.js Script ... -->
@endsection
