@extends('layouts.admin')

@section('content')
    <div>
        <h1>Dashboard</h1>
    </div>

<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-body start -->
        <div class="page-body">
            <div class="row">
                <!-- task, page, download counter  start -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h6 class="text-muted m-b-0 f-12">Total Category</h6>
                                    <h4 class="text-c-purple">{{ $category_count }}</h4>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa fa-ticket f-28" aria-hidden="true"></i>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-purple">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h6 class="text-muted m-b-0 f-12">Total Product</h6>
                                    <h4 class="text-c-purple">{{ $product_count }}</h4>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa-brands fa-product-hunt"></i>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-purple">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h6 class="text-muted m-b-0 f-12">Total User</h6>
                                    <h4 class="text-c-purple">{{ $user_count }}</h4>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa-solid fa-users"></i>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-purple">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h6 class="text-muted m-b-0 f-12">Total Contact</h6>
                                    <h4 class="text-c-purple">{{ $contact_count }}</h4>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="fa-solid fa-message"></i>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-purple">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">% change</p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="fa fa-line-chart text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 </div>
                </div>
            </div>
    </div>
                
@endsection