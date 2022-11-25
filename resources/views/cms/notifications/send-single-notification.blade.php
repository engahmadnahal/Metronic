@extends('cms.parent')

@section('page-name','Send Notification')
@section('main-page','Notifications Management')
@section('sub-page','Notifications')
@section('page-name-small','Send Notification')

@section('styles')

@endsection

@section('content')
<!--begin::Container-->
<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Horizontal Form Layout</h3>
                {{-- <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div> --}}
            </div>
            <!--begin::Form-->
            <form id="create-form">
                <div class="card-body">
                    <h3 class="text-dark font-weight-bold mb-10">Basic Info</h3>
                    <div class="form-group row">
                        <label class="col-3 col-form-label">Users:</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="user_id"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                    @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->store_name}} - {{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="form-text text-muted">Please select user</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">Title:<span class="text-danger">*</span></label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="title" placeholder="Enter notification title" />
                            <span class="form-text text-muted">Please enter notification title</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">Sub Title:<span class="text-danger">*</span></label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="subtitle"
                                placeholder="Enter notification subtitle" />
                            <span class="form-text text-muted">Please enter notification subtitle</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">Body:<span class="text-danger">*</span></label>
                        <div class="col-9">
                            <textarea class="form-control" id="body" maxlength="150" rows="3"
                                placeholder="Enter notification body"></textarea>
                            <span class="form-text text-muted">Please enter notification body</span>
                        </div>
                    </div>

                    {{-- <div class="separator separator-dashed my-10"></div>
                    <h3 class="text-dark font-weight-bold mb-10">Schedule</h3>

                    <div class="form-group row">
                        <label class="col-3 col-form-label">Send Date:<span class="text-danger">*</span></label>
                        <div class="col-9">
                            <input type="text" class="form-control" readonly="readonly" id="send_date"
                                placeholder="Select start date">
                            <span class="form-text text-muted">Please select notification sending date</span>
                        </div>
                    </div> --}}
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <button type="button" onclick="performStore()" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>
</div>
<!--end::Container-->
@endsection

@section('scripts')
<script src="{{asset('cms/assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}"></script>
<script src="{{asset('cms/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"></script>

<script>
    var arrows;
    if (KTUtil.isRTL()) {
        arrows = {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>'
        }
    } else {
        arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    }
    $('#send_date').datepicker({
        rtl: KTUtil.isRTL(),
        orientation: "bottom left",
        todayHighlight: true,
        templates: arrows
    });

    function performStore(){
        let data = {
            user_id: document.getElementById('user_id').value,
            title: document.getElementById('title').value,
            subtitle: document.getElementById('subtitle').value,
            body: document.getElementById('body').value,
        }
        store('/cms/admin/notifications',data);
    }
</script>
@endsection