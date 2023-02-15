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
                                    <a href="javascript:;"></a>View Scheduled Details
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
                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                    height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                    fill="black" />
                                                <path
                                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <input type="text" id="search" data-kt-docs-table-filter="search"
                                            class="form-control form-control-solid w-250px ps-14" placeholder="Search" />
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!--begin::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">

                                        <!--begin::Filter-->
                                        <button type="button" class="btn btn-light-primary me-3"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                            data-kt-menu-flip="top-end">
                                            <!--begin::Svg Icon | path: icons/stockholm/Text/Filter.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z"
                                                            fill="#000000" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Filter
                                        </button>
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
                                                    <label class="form-label fs-5 fw-bold mb-3">Broadcast Type:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select class="form-select form-select-solid fw-bolder"
                                                        id="broadcast_type" data-kt-select2="true"
                                                        data-placeholder="Select option" data-allow-clear="true"
                                                        data-kt-customer-table-filter="month">
                                                        <option></option>
                                                        <option value="now">Now</option>
                                                        <option value="later">Later</option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Actions-->
                                                <div class="d-flex justify-content-end">
                                                    <button type="reset"
                                                        class="btn btn-white btn-active-light-primary me-2"
                                                        data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset"
                                                        onclick="clearFilter() ">Reset</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        data-kt-menu-dismiss="true" data-kt-customer-table-filter="filter"
                                                        onclick="filterData2()">Apply</button>
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Menu 1-->
                                        <!--end::Filter-->
                                    </div>
                                </div>
                            </div>
                            <div class="card-body fs-6 py-lg-5 text-gray-700">
                                <!--begin::Block-->
                                <div class=""> {{-- py-5 --}}
                                    <table class=" table table-row-bordered gy-5" id="scheduledDetailTable">
                                        <thead>
                                            <tr class="fw-bold fs-6 text-muted">
                                                <th>Id</th>
                                                <th>Template Name</th>
                                                <th>Broadcast Name</th>
                                                <th>Broadcast Type</th>
                                                <th>Scheduled Date & Time</th>
                                                <th>Created Datetime</th>
                                                <th class="text-center">Actions</th>
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
                            <button id="btnSave" onclick="scheduledDetailSubmit()" type="button" class="btn btn-lg btn-primary">
                                <label class="indicator-label">Submit</label>
                                <label class="indicator-progress">Please wait...
                                    <label class="spinner-border spinner-border-sm align-middle ms-2"></label></label>
                            </button>`
        $(document).ready(function() {
            // Initialize
            dt = $('#scheduledDetailTable').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                // fixedHeader: {
                //         header: true,
                //         headerOffset: 65,
                //         },
                order: [
                    [0, 'desc']
                ],
                ajax: {
                    url: "{{ route('scheduled_detail.index') }}",
                    data: function(d) {
                        d.broadcast_type = $('#broadcast_type').val()
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'template_name',
                        name: 'template_name'
                    },
                    {
                        data: 'broadcast_name',
                        name: 'broadcast_name'
                    },
                    {
                        data: 'broadcast_type',
                        name: 'broadcast_type'
                    },
                    {
                        data: 'scheduled_at',
                        name: 'scheduled_at',
                        class: 'text-center',
                        render: function(data) {
                            return data == null ? '-' : `${data}`;
                        }
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        searchable: false
                    },
                    {
                        class: "text-center",
                        data: '',
                        searchable: false
                    },
                ],
                columnDefs: [{
                        targets: 3,
                        data: null,
                        orderable: false,
                        class: 'text-center',
                        render: function(data, type, row) {
                            return `<span class="badge badge-success">${row.broadcast_type}</span>`;
                        }
                    },
                    {
                    targets: -1,
                    data: null,
                    orderable: false,
                    class: 'text-end',
                    render: function(data, type, row) {
                        url = "{{ route('scheduled_detail.show', ':id') }}";
                        url = url.replace(':id', row.id);
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
                                    <a href="${url}" class="menu-link px-3">View</a>
                                </div>

                                <div class="menu-item px-3" style="display:${row.broadcast_type === "Now" ? "none" : "block"}">
                                    <a onclick="editData('${row.id}')" class="menu-link px-3">Reschedule</a>
                                </div>


                                <div class="menu-item px-3">
                                    <a  onclick="sweetAlertDelete('${row.id}')" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
                                </div>
                            </div>`;
                    }
                }, ],
                aLengthMenu: [
                    [10, 25, 50, 100, 200, -1],
                    [10, 25, 50, 100, 200, "All"]
                ]
            });
            table = dt.$;
            dt.on('draw', function() {
                KTMenu.createInstances();
            });
        });

        let handleSearchDatatable = function() {
            const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
            filterSearch.addEventListener('keyup', function(e) {
                dt.search(e.target.value).draw();
            });
        }

        handleSearchDatatable();

        function sweetAlertDelete(id) {
            Swal.fire({
                title: "Are you sure you want to delete data?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                customClass: {
                    confirmButton: "btn btn-danger",
                    cancelButton: "btn btn-default"
                }
            }).then(function(result) {
                if (result.value) {
                    Swal.fire(
                        "Deleted!",
                        "Your data has been deleted.",
                        "success"
                    )
                    deleteClient(id);
                }
            });
        }

        // function addData() {

        //     $.ajax({
        //         type: 'GET',
        //         url: "{{ route('template.create') }}",
        //         success: function(result) {
        //             let drawerElement = document.querySelector("#right_modal");
        //             $("#right_modal").attr("data-kt-drawer-width", "{default:'350px', 'lg': '1140px'}");
        //             let drawer = KTDrawer.getInstance(drawerElement);
        //             $('#right_modal_header').html('Add Template');
        //             $('#right_modal_body').html(result);
        //             $('#right_modal_footer').html(_footer);
        //             drawer.toggle();

        //         }
        //     });
        // }

        function editData(id) {
            url = "{{ route('scheduled_detail.edit', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                type: 'GET',
                url: url,
                success: function(result) {
                    let drawerElement = document.querySelector("#right_modal");
                    let drawer = KTDrawer.getInstance(drawerElement);
                    $("#right_modal").attr("data-kt-drawer-width", "{default:'350px', 'lg': '400px'}");
                    $("#right_modal").attr('style', 'width: 400px  !important')
                    $('#right_modal_header').html('Rescheduled Date & Time');
                    $('#right_modal_body').html(result);
                    $('#right_modal_footer').html(_footer);
                    drawer.toggle();
                }
            });
        }

        function deleteClient(id) {
            url = "{{ route('scheduled_detail.destroy', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'DELETE',
                },
                success: function(result) {
                    dt.draw();
                }
            })
        }

        function clearFilter() {
            $('#template_status').val('');
            // $('#tag2').val([]);
            dt.draw();
        }

        function filterData2() {
            dt.draw();
        }
    </script>
@endsection('content')
