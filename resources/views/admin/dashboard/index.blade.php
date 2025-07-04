@extends('admin.layouts.app')

@section('styles')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.36.3/apexcharts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endsection

@section('toolbar')
<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Dashboard</h1>
            {{-- <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="../../demo1/dist/index.html"
                        class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Utilities</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Modals</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">General</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Invite Friends</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb--> --}}
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            {{-- <div class="m-0">
                <!--begin::Menu toggle-->
                <a href="#"
                    class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder"
                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                    <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <path
                                d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Filter
                </a>
                <!--end::Menu toggle-->
                <!--begin::Menu 1-->
                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px"
                    data-kt-menu="true" id="kt_menu_6244761e325a6">
                    <!--begin::Header-->
                    <div class="px-7 py-5">
                        <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Menu separator-->
                    <div class="separator border-gray-200"></div>
                    <!--end::Menu separator-->
                    <!--begin::Form-->
                    <div class="px-7 py-5">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Status:</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div>
                                <select class="form-select form-select-solid"
                                    data-kt-select2="true" data-placeholder="Select option"
                                    data-dropdown-parent="#kt_menu_6244761e325a6"
                                    data-allow-clear="true">
                                    <option></option>
                                    <option value="1">Approved</option>
                                    <option value="2">Pending</option>
                                    <option value="2">In Process</option>
                                    <option value="2">Rejected</option>
                                </select>
                            </div>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Member Type:</label>
                            <!--end::Label-->
                            <!--begin::Options-->
                            <div class="d-flex">
                                <!--begin::Options-->
                                <label
                                    class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox"
                                        value="1" />
                                    <span class="form-check-label">Author</span>
                                </label>
                                <!--end::Options-->
                                <!--begin::Options-->
                                <label
                                    class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox"
                                        value="2" checked="checked" />
                                    <span class="form-check-label">Customer</span>
                                </label>
                                <!--end::Options-->
                            </div>
                            <!--end::Options-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Notifications:</label>
                            <!--end::Label-->
                            <!--begin::Switch-->
                            <div
                                class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value=""
                                    name="notifications" checked="checked" />
                                <label class="form-check-label">Enabled</label>
                            </div>
                            <!--end::Switch-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="d-flex justify-content-end">
                            <button type="reset"
                                class="btn btn-sm btn-light btn-active-light-primary me-2"
                                data-kt-menu-dismiss="true">Reset</button>
                            <button type="submit" class="btn btn-sm btn-primary"
                                data-kt-menu-dismiss="true">Apply</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Menu 1-->
            </div> --}}
            <!--end::Filter menu-->
            <!--begin::Secondary button-->
            <!--end::Secondary button-->
            <!--begin::Primary button-->
            {{-- <a href="../../demo1/dist/.html" class="btn btn-sm btn-primary"
                data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create</a> --}}
            <!--end::Primary button-->
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->
@endsection

@section('content')
    <!--begin::Row-->
    <div class="row gy-5 g-xl-8" style="margin-bottom: 20px">
        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::Mixed Widget 2-->
            <div class="card card-xl-stretch" style=" min-height: 450px; color: #000">
                <!--begin::Header-->
                <div class="card-header border-0  py-5">
                    <h3 class="card-title fw-bolder"><i class="fa-solid fa-suitcase" style="margin-right: 10px; color: #000;"></i> Cartera Vencida</h3>
                    {{-- <div class="card-toolbar">
                        <!--begin::Menu-->
                        <button type="button"
                            class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color- border-0 me-n3"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="5" y="5" width="5" height="5" rx="1"
                                            fill="currentColor" />
                                        <rect x="14" y="5" width="5" height="5" rx="1"
                                            fill="currentColor" opacity="0.3" />
                                        <rect x="5" y="14" width="5" height="5" rx="1"
                                            fill="currentColor" opacity="0.3" />
                                        <rect x="14" y="14" width="5" height="5" rx="1"
                                            fill="currentColor" opacity="0.3" />
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--begin::Menu 3-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                            data-kt-menu="true">
                            <!--begin::Heading-->
                            <div class="menu-item px-3">
                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                    Payments</div>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Create Invoice</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link flex-stack px-3">Create Payment
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="Specify a target name for future usage and reference"></i></a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Generate Bill</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                                <a href="#" class="menu-link px-3">
                                    <span class="menu-title">Subscription</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <!--begin::Menu sub-->
                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Plans</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Billing</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Statements</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content px-3">
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input w-30px h-20px" type="checkbox" value="1"
                                                    checked="checked" name="notifications" />
                                                <!--end::Input-->
                                                <!--end::Label-->
                                                <span class="form-check-label text-muted fs-6">Recuring</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu sub-->
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3 my-1">
                                <a href="#" class="menu-link px-3">Settings</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu 3-->
                        <!--end::Menu-->
                    </div> --}}
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body p-0 d-flex justify-content-center align-items-center text-center">
                    <!--begin::Chart-->
                    {{-- <div class="mixed-widget-2-chart card-rounded-bottom bg-danger" data-kt-color="danger"
                        style="height: 450px"></div> --}}
                        <div id="chartCarteraVencida" style="height: 350px;"></div>
                    <!--end::Chart-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 2-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::List Widget 5-->
            <div class="card card-xl-stretch" style="min-height: 450px;">
                <!--begin::Header-->
                <div class="card-header align-items-center border-0">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="fw-bolder mb-2" style="color: #000"><i class="fa-solid fa-user" style="margin-right: 10px; color:#000;"></i> Principales Morosos</span>
                        {{-- <span class="text-muted fw-bold fs-7">890,344 Sales</span> --}}
                    </h3>
                    {{-- <div class="card-toolbar">
                        <!--begin::Menu-->
                        <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                    viewBox="0 0 24 24">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="5" y="5" width="5" height="5"
                                            rx="1" fill="currentColor" />
                                        <rect x="14" y="5" width="5" height="5"
                                            rx="1" fill="currentColor" opacity="0.3" />
                                        <rect x="5" y="14" width="5" height="5"
                                            rx="1" fill="currentColor" opacity="0.3" />
                                        <rect x="14" y="14" width="5" height="5"
                                            rx="1" fill="currentColor" opacity="0.3" />
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                            id="kt_menu_6244763d95a3a">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Menu separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Menu separator-->
                            <!--begin::Form-->
                            <div class="px-7 py-5">
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold">Status:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <div>
                                        <select class="form-select form-select-solid" data-kt-select2="true"
                                            data-placeholder="Select option" data-dropdown-parent="#kt_menu_6244763d95a3a"
                                            data-allow-clear="true">
                                            <option></option>
                                            <option value="1">Approved</option>
                                            <option value="2">Pending</option>
                                            <option value="2">In Process</option>
                                            <option value="2">Rejected</option>
                                        </select>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold">Member Type:</label>
                                    <!--end::Label-->
                                    <!--begin::Options-->
                                    <div class="d-flex">
                                        <!--begin::Options-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                            <span class="form-check-label">Author</span>
                                        </label>
                                        <!--end::Options-->
                                        <!--begin::Options-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="2"
                                                checked="checked" />
                                            <span class="form-check-label">Customer</span>
                                        </label>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Options-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold">Notifications:</label>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value=""
                                            name="notifications" checked="checked" />
                                        <label class="form-check-label">Enabled</label>
                                    </div>
                                    <!--end::Switch-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2"
                                        data-kt-menu-dismiss="true">Reset</button>
                                    <button type="submit" class="btn btn-sm btn-primary"
                                        data-kt-menu-dismiss="true">Apply</button>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Menu 1-->
                        <!--end::Menu-->
                    </div> --}}
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-5">
                    <!--begin::Timeline-->
                    {{-- <div class="timeline-label">
                        <!--begin::Item-->
                        <div class="timeline-item">
                            <!--begin::Label-->
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">08:42</div>
                            <!--end::Label-->
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-warning fs-1"></i>
                            </div>
                            <!--end::Badge-->
                            <!--begin::Text-->
                            <div class="fw-mormal timeline-content text-muted ps-3">Outlines
                                keep you honest. And keep structure</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="timeline-item">
                            <!--begin::Label-->
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">10:00</div>
                            <!--end::Label-->
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-success fs-1"></i>
                            </div>
                            <!--end::Badge-->
                            <!--begin::Content-->
                            <div class="timeline-content d-flex">
                                <span class="fw-bolder text-gray-800 ps-3">AEOL meeting</span>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="timeline-item">
                            <!--begin::Label-->
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">14:37</div>
                            <!--end::Label-->
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-danger fs-1"></i>
                            </div>
                            <!--end::Badge-->
                            <!--begin::Desc-->
                            <div class="timeline-content fw-bolder text-gray-800 ps-3">Make
                                deposit
                                <a href="#" class="text-primary">USD 700</a>. to ESL
                            </div>
                            <!--end::Desc-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="timeline-item">
                            <!--begin::Label-->
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">16:50</div>
                            <!--end::Label-->
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-primary fs-1"></i>
                            </div>
                            <!--end::Badge-->
                            <!--begin::Text-->
                            <div class="timeline-content fw-mormal text-muted ps-3">Indulging in
                                poorly driving and keep structure keep great</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="timeline-item">
                            <!--begin::Label-->
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">21:03</div>
                            <!--end::Label-->
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-danger fs-1"></i>
                            </div>
                            <!--end::Badge-->
                            <!--begin::Desc-->
                            <div class="timeline-content fw-bold text-gray-800 ps-3">New order
                                placed
                                <a href="#" class="text-primary">#XF-2356</a>.
                            </div>
                            <!--end::Desc-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="timeline-item">
                            <!--begin::Label-->
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">16:50</div>
                            <!--end::Label-->
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-primary fs-1"></i>
                            </div>
                            <!--end::Badge-->
                            <!--begin::Text-->
                            <div class="timeline-content fw-mormal text-muted ps-3">Indulging in
                                poorly driving and keep structure keep great</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="timeline-item">
                            <!--begin::Label-->
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">21:03</div>
                            <!--end::Label-->
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-danger fs-1"></i>
                            </div>
                            <!--end::Badge-->
                            <!--begin::Desc-->
                            <div class="timeline-content fw-bold text-gray-800 ps-3">New order
                                placed
                                <a href="#" class="text-primary">#XF-2356</a>.
                            </div>
                            <!--end::Desc-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="timeline-item mb-9">
                            <!--begin::Label-->
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">10:30</div>
                            <!--end::Label-->
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-success fs-1"></i>
                            </div>
                            <!--end::Badge-->
                            <!--begin::Text-->
                            <div class="timeline-content fw-mormal text-muted ps-3">Finance KPI
                                Mobile app launch preparion meeting</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Item-->
                    </div> --}}
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-300 align-middle">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="sorting_disabled" rowspan="1" colspan="1">Representante</th>
                                    <th class="sorting_disabled text-center" rowspan="1" colspan="1">Unidad</th>
                                    <th class="sorting_disabled text-center" rowspan="1" colspan="1">Celular</th>
                                    {{-- <th class="sorting_disabled" rowspan="1" colspan="1">Correo</th> --}}
                                    <th class="min-w-70px text-end sorting_disabled" rowspan="1" colspan="1">Total</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody style="padding:0px; margin:0px; text-align: center; color: #a1a5b7" id="tablaMorososBody">
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Timeline-->
                    {{-- <div id="chartPrincipalesMorosos" style="height: 350px;"></div> --}}
                </div>
                <!--end: Card Body-->
            </div>
            <!--end: List Widget 5-->
        </div>
    </div>
    <!--end::Row-->
    <!--begin::Row-->
    <!--end::Row-->
    <div class="row gy-5 g-xl-8" style="margin-bottom: 20px">
        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::Mixed Widget 2-->
            <div class="card card-xl-stretch" style=" min-height: 450px; color: #000">
                <!--begin::Header-->
                <div class="card-header border-0  py-5">
                    <h3 class="card-title fw-bolder"><i class="fa-solid fa-money-bill-trend-up" style="margin-right: 10px; color: #000;"></i> Ingreso del Mes</h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0">
                    <!--begin::Chart-->
                        <div id="chartIngresosMes" style="height: 350px;"></div>
                    <!--end::Chart-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 2-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::List Widget 5-->
            <div class="card card-xl-stretch" style="min-height: 450px;">
                <!--begin::Header-->
                <div class="card-header align-items-center border-0">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="fw-bolder mb-2" style="color: #000"> <i class="fa-solid fa-wallet" style="margin-right: 10px; color: #000;"></i>  Egresos del Mes</span>
                        {{-- <span class="text-muted fw-bold fs-7">890,344 Sales</span> --}}
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-5">
                    <!--end::Timeline-->
                    <div id="chartEgresosMes" style="height: 350px;"></div>
                </div>
                <!--end: Card Body-->
            </div>
            <!--end: List Widget 5-->
        </div>
    </div>
    <!--begin::Row-->
    <div class="row gy-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xl-12">
            <!--begin::List Widget 2-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0">
                    <h3 class="card-title fw-bolder text-dark"><i class="fa-solid fa-magnifying-glass" style="margin-right: 10px; color: #000;"></i>Busqueda</h3>
                    <div class="card-toolbar">
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-2">
                    <!--begin::Item-->
                    <div class="d-flex justify-content-center mb-7">
                        {{-- <div class="mb-3 mx-1">
                            <label for="mes" class="form-label">Fecha Inicio</label>
                            <input type="date" id="fecha_inicio" name="fecha_inicio" value="{{$fecha_inicio}}" class="form-control form-control-sm w-100">
                        </div> --}}

                            <!-- Selector de año -->
                        {{-- <div class="mb-3 mx-0">
                            <label for="anio" class="form-label">Fecha Fin</label>
                            <input type="date" id="fecha_fin" name="fecha_fin" value="{{$fecha_actual}}" max="{{\Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control form-control-sm w-100">
                        </div> --}}
                        <div class="mb-3 mx-3 my-8">
                            <button id="buscar" class="btn btn-primary btn-sm"><i class="fa-solid fa-magnifying-glass" style="color: #fff;"></i> Buscar</button>
                        </div>
                    </div>
                    {{-- <div class="mb-3 mx-3">
                            <button id="buscar" class="btn btn-primary btn-sm"><i class="fa-solid fa-magnifying-glass" style="color: #fff;"></i> Buscar</button>
                        </div> --}}
                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget 2-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        {{-- <div class="col-xl-7">
            <!--begin::List Widget 6-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0">
                    <h3 class="card-title fw-bolder text-dark"><i class="fa-solid fa-money-bill-wave" style="margin-right: 10px; color: #000;"></i> Forma de pagos por ingresos</h3>
                    <div class="card-toolbar">
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0">
                    <div id="chartFormadePagoIngreso" style="height: 350px;"></div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget 6-->
        </div> --}}
    </div>

    <div class="row g-5 g-xl-8" style="margin-bottom: 20px">
        <div class="col-xl-6">
            <!--begin::List Widget 6-->
            <div class="card card-xl-stretch mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0">
                    <h3 class="card-title fw-bolder text-dark"><i class="fa-solid fa-money-bill-wave" style="margin-right: 10px; color: #000;"></i> Forma de pagos por ingresos</h3>
                    <div class="card-toolbar">
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0">
                    <div id="chartFormadePagoIngreso" style="height: 350px;"></div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget 6-->
        </div>
        <div class="col-xl-6">
            <!--begin::Mixed Widget 2-->
            <div class="card card-xl-stretch" style=" min-height: 450px; color: #000">
                <!--begin::Header-->
                <div class="card-header border-0  py-5">
                    <h3 class="card-title fw-bolder"><i class="fa-solid fa-money-bill-trend-up" style="margin-right: 10px; color: #000;"></i> Formas de pagos por egresos</h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0">
                    <!--begin::Chart-->
                        <div id="chartFormaDePagoEgreso" style="height: 350px;"></div>
                    <!--end::Chart-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 2-->
        </div>
    </div>
    <!--end::Row-->
    <!--begin::Row-->
    <div class="row g-5 g-xl-8" style="margin-bottom: 20px">
        <!--begin::Col-->
        {{-- <div class="col-xl-6">
            <!--begin::Mixed Widget 2-->
            <div class="card card-xl-stretch" style=" min-height: 450px; color: #000">
                <!--begin::Header-->
                <div class="card-header border-0  py-5">
                    <h3 class="card-title fw-bolder"><i class="fa-solid fa-money-bill-trend-up" style="margin-right: 10px; color: #000;"></i> Formas de pagos por egresos</h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0">
                    <!--begin::Chart-->
                        <div id="chartFormaDePagoEgreso" style="height: 350px;"></div>
                    <!--end::Chart-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 2-->
        </div> --}}
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-12">
            <!--begin::Mixed Widget 2-->
            <div class="card card-xl-stretch" style=" min-height: 450px; color: #000">
                <!--begin::Header-->
                <div class="card-header border-0  py-5">
                    <h3 class="card-title fw-bolder"><i class="fa-solid fa-landmark" style="margin-right: 10px; color: #000;"></i> Cajas o Bancos</h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0">
                    <!--begin::Chart-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-300 align-middle">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="sorting_disabled" rowspan="1" colspan="1">Caja o Banco</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1">Saldo Contable</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1">Saldo Conciliado</th>
                                    {{-- <th class="sorting_disabled" rowspan="1" colspan="1">Correo</th> --}}
                                    {{-- <th class="min-w-70px text-end sorting_disabled" rowspan="1" colspan="1">Total</th> --}}
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody style="padding:0px; margin:0px; text-align: center; color: #a1a5b7" id="tablaCajaBancos">
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Chart-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 2-->
        </div>
        <!--end::Col-->
    </div>
    
    <div class="row g-5 g-xl-8" style="margin-bottom: 20px">
        <!--begin::Col-->
        <div class="col-xl-12">
            <!--begin::Mixed Widget 2-->
            <div class="card card-xl-stretch" style=" min-height: 450px; color: #000">
                <!--begin::Header-->
                <div class="card-header border-0  py-5">
                    <h3 class="card-title fw-bolder"><i class="fa-solid fa-money-bill-trend-up" style="margin-right: 10px; color: #000;"></i> Total de ingresos por día</h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0">
                    <!--begin::Chart-->
                        <div id="chartTotalIngresoPorDia" style="height: 350px;"></div>
                    <!--end::Chart-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 2-->
        </div>
    </div>

    <div class="row g-5 g-xl-8" style="margin-bottom: 20px">
        <!--begin::Col-->
        <div class="col-xl-12">
            <!--begin::Mixed Widget 2-->
            <div class="card card-xl-stretch" style=" min-height: 450px; color: #000">
                <!--begin::Header-->
                <div class="card-header border-0  py-5">
                    <h3 class="card-title fw-bolder"><i class="fa-solid fa-money-bill-trend-up" style="margin-right: 10px; color: #000;"></i> Total de egresos por día</h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0">
                    <!--begin::Chart-->
                        <div id="chartTotalDeEgresosPorDia" style="height: 350px;"></div>
                    <!--end::Chart-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 2-->
        </div>
    </div>
@endsection

@section('modals')
@endsection

@push('scripts')
@endpush
