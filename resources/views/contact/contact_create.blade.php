@if(!isset($client->id))
    <form id="client_from" class="form" method="POST" action="{{ route('client.store') }}">
        @else
            <form id="client_from" class="form" method="POST" action="{{ route('client.update',$client->id) }}">
                @method("PUT")
                <input hidden name="user_id" value="{{$client->user->id}}"/>
                @endif
                @csrf
                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true"
                     data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                     data-kt-scroll-dependencies="#kt_modal_add_user_header"
                     data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                    <div class="fv-row mb-7">
                        <label class="required fw-bold fs-6 mb-2">Official Whats App Number</label>
                        <input type="text" name="name"
                               value="{{isset($client->client_name) ? $client->client_name : '919975754734'}}"
                               class="form-control form-control-solid mb-3 mb-lg-0" disabled
                               placeholder="Please Enter your Name here." required/>
                    </div>
                    <div class="fv-row mb-7">
                        <label class=" fw-bold fs-6 mb-2">Contact Full Name</label>
                        <input type="email" name="email" value="{{isset($client->email) ? $client->email : ''}}"
                               class="form-control form-control-solid mb-3 mb-lg-0"
                               placeholder="Enter Name"/>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="fv-row mb-7">
                                <label class="fw-bold fs-6 mb-2">Contact Number</label>
                                <select class="form-select" data-control="select2" data-placeholder="Select an option">
                                    <option></option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="fv-row mb-7">
                                <label class="fw-bold fs-6 mb-2"></label>
                                <input type="text" name="contact_no"
                                       value="{{isset($client->contact_number) ? $client->contact_number : ''}}"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="Enter WhatsApp Number"/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="text-center pt-15">

                </div>
            </form>
