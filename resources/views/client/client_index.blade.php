@extends('layouts.main')

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Row-->
                <div class="row gy-5 g-xl-10">
                    <div class="col-xl-12 mb-5 mb-xl-10">
                        <!--begin::Card-->
                        <div class="card card-docs mb-2">
                            <div class="p-10 pb-0" style="display: none;">
                                <!--begin::Heading-->
                                <h1 class="anchor fw-bolder mb-5" id="zero-configuration">
                                    <a href="javascript:;"></a>Clients
                                </h1>
                            </div>
                            <!--begin::Card header-->
                            <div class="card-header mt-xxl-2">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                                  rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"/>
                                            <path
                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                fill="black"/>
                                        </svg>
                                    </span>
                                        <!--end::Svg Icon-->
                                        <input type="text" id="search" data-kt-docs-table-filter="search"
                                               class="form-control form-control-solid w-250px ps-14"
                                               placeholder="Search"/>
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!--begin::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">

                                        <!--begin::Filter-->
                                        <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                            <!--begin::Svg Icon | path: icons/stockholm/Text/Filter.svg-->
                                            <span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z" fill="#000000" />
														</g>
													</svg>
												</span>
                                            <!--end::Svg Icon-->Filter</button>
                                        <!--begin::Menu 1-->
                                        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                            <!--begin::Header-->
                                            <div class="px-7 py-5">
                                                <div class="fs-4 text-dark fw-bolder">Filter Options</div>
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Separator-->
                                            <div class="separator border-gray-200"></div>
                                            <!--end::Separator-->
                                            <!--begin::Content-->
                                            <div class="px-7 py-5">
                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fs-5 fw-bold mb-3">Month:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-customer-table-filter="month">
                                                        <option></option>
                                                        <option value="aug">August</option>
                                                        <option value="sep">September</option>
                                                        <option value="oct">October</option>
                                                        <option value="nov">November</option>
                                                        <option value="dec">December</option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fs-5 fw-bold mb-3">Payment Type:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Options-->
                                                    <div class="d-flex flex-column flex-wrap fw-bold" data-kt-customer-table-filter="payment_type">
                                                        <!--begin::Option-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                                            <input class="form-check-input" type="radio" name="payment_type" value="all" checked="checked" />
                                                            <span class="form-check-label text-gray-600">All</span>
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin::Option-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                                            <input class="form-check-input" type="radio" name="payment_type" value="visa" />
                                                            <span class="form-check-label text-gray-600">Visa</span>
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin::Option-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                                            <input class="form-check-input" type="radio" name="payment_type" value="mastercard" />
                                                            <span class="form-check-label text-gray-600">Mastercard</span>
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin::Option-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="radio" name="payment_type" value="american_express" />
                                                            <span class="form-check-label text-gray-600">American Express</span>
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                    <!--end::Options-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Actions-->
                                                <div class="d-flex justify-content-end">
                                                    <button type="reset" class="btn btn-white btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Reset</button>
                                                    <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true" data-kt-customer-table-filter="filter">Apply</button>
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Menu 1-->
                                        <!--end::Filter-->


                                        <!--begin::Add customer-->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" title=""
                                                onclick="addClient()" data-bs-original-title="Add Client">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                            <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                                  transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                  fill="black"></rect>
                                        </svg>
                                    </span>
                                            <!--end::Svg Icon-->Add Client
                                        </button>
                                        <!--end::Add customer-->
                                    </div>
                                </div>
                            </div>
                            <div class="card-body fs-6 py-lg-5 text-gray-700">
                                <!--begin::Block-->
                                <div class=""> {{--py-5--}}
                                    <table class=" table table-row-bordered gy-5" id="clientTable">
                                        <thead>
                                        <tr class="fw-bold fs-6 text-muted">
                                            <th>Client</th>
                                            <th>Contact Person</th>
                                            <th>Last Login</th>
                                            <th>Created at</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody class="fw-bold text-gray-600">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--end::Card Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>

    <script type="text/javascript">

        let _footer = `<button type="button" id="right_modal_close" class="btn btn-light me-3">Discard</button>
                            <button id="submitbutton" type="button" onclick="clientSubmit()" class="btn btn-lg btn-primary">
                                <label class="indicator-label">Submit</label>
                                <label class="indicator-progress">Please wait...
                                    <label class="spinner-border spinner-border-sm align-middle ms-2"></label></label>
                            </button>`

        $(document).ready(function () {
            // Initialize
            dt = $('#clientTable').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                // fixedHeader: {
                //         header: true,
                //         headerOffset: 65,
                //         },
                // order: [[0, 'desc']],
                ajax: {
                    url: "{{ route('client.index') }}",
                    data: function (d) {
                    }
                },
                columns: [
                    {data: 'user.name', name: 'user.name'},
                    {data: 'contact_person', name: 'contact_person'},
                    {data: 'user.last_login', name: 'user.last_login', searchable: false},
                    {data: 'created_at', name: 'created_at', searchable: false},
                    {data: '', searchable: false},
                ],
                columnDefs: [
                    {
                        targets: 0,
                        orderable: false,
                        class: 'd-flex align-items-center',
                        render: function (data, type, row) {
                            profilePic = "{{asset('/profile/::PROFILEPIC')}}";
                            profilePic = profilePic.replace('::PROFILEPIC', row.user.profile_picture);
                            return `
                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                    <a href="#">
                                        <div class="symbol-label">
                                            <img src="${profilePic}" alt="${row.user.name}" class="w-100" />
                                        </div>
                                    </a>
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-gray-800 text-hover-primary mb-1">${row.user.name}</a>
                                    <span>${row.user.email}</span>
                                </div>
                            `;
                        }
                    },
                    {
                        targets: -1,
                        data: null,
                        orderable: false,
                        class: 'text-end',
                        render: function (data, type, row) {
                            return `
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                            <span class="svg-icon svg-icon-5 m-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                </svg>
                            </span>
                            </a>
                            <div class=" menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <a onclick="editClient('${row.client_id}')" class="menu-link px-3">Edit</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a  onclick="sweetAlertDelete('${row.client_id}')" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
                                </div>
                            </div>
                            `;
                        }
                    },
                ],
                aLengthMenu: [
                    [10, 25, 50, 100, 200, -1],
                    [10, 25, 50, 100, 200, "All"]
                ]
            });
            table = dt.$;
            dt.on('draw', function () {
                KTMenu.createInstances();
            });
        });

        var handleSearchDatatable = function () {
            const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
            filterSearch.addEventListener('keyup', function (e) {
                dt.search(e.target.value).draw();
            });
        }

        handleSearchDatatable();

        function sweetAlertDelete(id) {
            Swal.fire({
                title: "Are you sure you want to delete client?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                customClass: {
                    confirmButton: "btn btn-danger",
                    cancelButton: "btn btn-default"
                }
            }).then(function (result) {
                if (result.value) {
                    Swal.fire(
                        "Deleted!",
                        "Your Client has been deleted.",
                        "success"
                    )
                    deleteClient(id);
                }
            });
        }

        function addClient() {

            $.ajax({
                type: 'GET',
                url: "{{route('client.create')}}",
                success: function (result) {
                    let drawerElement = document.querySelector("#right_modal");
                    let drawer = KTDrawer.getInstance(drawerElement);
                    $('#right_modal_header').html('Add Client');
                    $('#right_modal_body').html(result);
                    $('#right_modal_footer').html(_footer);
                    drawer.toggle();
                }
            });
        }

        function editClient(id) {
            url = "{{route('client.edit',':id')}}";
            url = url.replace(':id', id);
            $.ajax({
                type: 'GET',
                url: url,
                success: function (result) {
                    let drawerElement = document.querySelector("#right_modal");
                    let drawer = KTDrawer.getInstance(drawerElement);

                    $('#right_modal_header').html('Edit Client');
                    $('#right_modal_body').html(result);
                    $('#right_modal_footer').html(_footer);
                    drawer.toggle();
                }
            });
        }

        function deleteClient(id) {
            url = "{{route('client.destroy',':id')}}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'DELETE',
                },
                success: function (result) {
                    dt.draw();
                }
            })
        }

    </script>

@endsection('content')
