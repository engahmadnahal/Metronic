@extends('cms.parent')

@section('page-name',__('cms.settings'))
@section('main-page',__('cms.content_management'))
@section('sub-page',__('cms.settings'))
@section('page-name-small',__('cms.update'))

@section('styles')

@endsection

@section('content')
<!--begin::Container-->
<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">{{__('cms.settings')}}</h3>
            </div>
            <!--begin::Form-->
            <form id="settings_form">
                <div class="card-body">
                    <h3 class="text-dark font-weight-bold mb-10">{{__('cms.website_settings')}}</h3>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.website_title')}}:</label>
                        <div class="col-9">
                            <input type="text" id="website_title" class="form-control"
                                value="{{$settings['website_title'][0]->value}}" placeholder="Enter website title" />
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.website_brief')}}:</label>
                        <div class="col-9">
                            <input type="text" id="website_brief" class="form-control"
                                value="{{$settings['website_brief'][0]->value}}" placeholder="Enter website breif" />
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <h3 class="text-dark font-weight-bold mb-10">{{__('cms.website_social_settings')}}</h3>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.facebook')}}:</label>
                        <div class="col-9">
                            <input type="url" id="facebook" class="form-control"
                                value="{{$settings['facebook'][0]->value}}" placeholder="Enter facebook link" />
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.twitter')}}:</label>
                        <div class="col-9">
                            <input type="url" id="twitter" class="form-control"
                                value="{{$settings['twitter'][0]->value}}" placeholder="Enter twitter link" />
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.linkedin')}}:</label>
                        <div class="col-9">
                            <input type="url" id="linkedin" class="form-control"
                                value="{{$settings['linkedin'][0]->value}}" placeholder="Enter Linkedin title" />
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.youtube')}}:</label>
                        <div class="col-9">
                            <input type="url" id="youtube" class="form-control"
                                value="{{$settings['youtube'][0]->value}}" placeholder="Enter website title" />
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.instagram')}}:</label>
                        <div class="col-9">
                            <input type="url" id="instagram" class="form-control"
                                value="{{$settings['instagram'][0]->value}}" placeholder="Enter website title" />
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <h3 class="text-dark font-weight-bold mb-10">{{__('cms.communication_settings')}}</h3>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.address')}}:</label>
                        <div class="col-9">
                            <input type="text" id="address" class="form-control"
                                value="{{$settings['address'][0]->value}}" placeholder="Enter address" />
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.mobile')}}:</label>
                        <div class="col-9">
                            <input type="tel" id="mobile" class="form-control" value="{{$settings['mobile'][0]->value}}"
                                placeholder="Enter mobile" />
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.second_mobile')}}:</label>
                        <div class="col-9">
                            <input type="tel" id="second_mobile" class="form-control"
                                value="{{$settings['second_mobile'][0]->value}}" placeholder="Enter secondary mobile" />
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.email')}}:</label>
                        <div class="col-9">
                            <input type="email" id="email" class="form-control" value="{{$settings['email'][0]->value}}"
                                placeholder="Enter email" />
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.phone')}}:</label>
                        <div class="col-9">
                            <input type="tel" id="phone" class="form-control" value="{{$settings['phone'][0]->value}}"
                                placeholder="Enter telephone" />
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="col-9">
                            <button type="button" onclick="performStore()"
                                class="btn btn-primary mr-2">{{__('cms.save')}}</button>
                            <button type="reset" class="btn btn-secondary">{{__('cms.cancel')}}</button>
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
<script>
    function performStore(){
        var elements = document.getElementById("settings_form").elements;
        var formData = new FormData();
        for(var i = 0 ; i < elements.length ; i++){ 
            var item = elements.item(i);
            formData.append(item.id, item.value);
        }
        console.log(formData);
        store('/cms/admin/settings',formData);
    }
</script>
@endsection