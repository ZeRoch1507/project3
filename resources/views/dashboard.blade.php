@extends('layouts.master_backend')
@section('con')
    <div class="body-wrapper-inner">
        <div class="container-fluid py-4">
            <div class="row">
                {{-- category box --}}
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bolder">
                                            Category
                                        </p>
                                        <h5 class="font-weight-bolder">{{ $c->count() }}</h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-warning shadow-secondary text-center rounded-circle">
                                        <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end category box --}}

                {{-- menu box --}}
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                            Menu
                                        </p>
                                        <h5 class="font-weight-bolder">{{ $m->count() }}</h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-warning shadow-secondary text-center rounded-circle">
                                        <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end menu box --}}

                {{-- promotion box --}}
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                            promotion
                                        </p>
                                        <h5 class="font-weight-bolder">{{ $p->count() }}</h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-warning shadow-secondary text-center rounded-circle">
                                        <i class="fa fa-plus text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end promotion box --}}

                {{-- gallery box --}}
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                            Gallery
                                        </p>
                                        <h5 class="font-weight-bolder">{{ $g->count() }}</h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-warning shadow-secondary text-center rounded-circle">
                                        <i class="fa fa-folder text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end gallery box --}}
            </div>

            <!--chart-->
        </div>

        {{-- <div class="container-fluid">
            <!--  Row 1 -->
            <div class="row">
                <div class="col-lg-8 d-flex align-items-strech">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                <div class="mb-3 mb-sm-0">
                                    <h5 class="card-title fw-semibold">Revenue Forecast</h5>
                                </div>
                                <div>
                                    <select class="form-select">
                                        <option value="1">March 2024</option>
                                        <option value="2">April 2024</option>
                                        <option value="3">May 2024</option>
                                        <option value="4">June 2024</option>
                                    </select>
                                </div>
                            </div>
                            <div id="revenue-forecast"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-6 mb-4 pb-3">
                                        <span
                                            class="round-48 d-flex align-items-center justify-content-center rounded bg-secondary-subtle">
                                            <iconify-icon icon="solar:football-outline" class="fs-6 text-secondary">
                                            </iconify-icon>
                                        </span>
                                        <h6 class="mb-0 fs-4">New Customers</h6>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-6">
                                        <h6 class="mb-0 fw-medium">New goals</h6>
                                        <h6 class="mb-0 fw-medium">83%</h6>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100" style="height: 7px">
                                        <div class="progress-bar bg-secondary" style="width: 83%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-6 mb-4">
                                        <span
                                            class="round-48 d-flex align-items-center justify-content-center rounded bg-danger-subtle">
                                            <iconify-icon icon="solar:box-linear" class="fs-6 text-danger"></iconify-icon>
                                        </span>
                                        <h6 class="mb-0 fs-4">Total Income</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <h4>$680</h4>
                                            <span class="fs-11 text-success fw-semibold">+18%</span>
                                        </div>
                                        <div class="col-6">
                                            <div id="total-income"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    @endsection
