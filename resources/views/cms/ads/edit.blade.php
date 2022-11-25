@extends('cms.parent')

@section('page-name',__('cms.ads'))
@section('main-page',__('cms.content_management'))
@section('sub-page',__('cms.ads'))
@section('page-name-small',__('cms.update'))

@section('styles')

@endsection

@section('content')
<!--begin::Container-->
<div class="row">
    <div class="col-lg-12">
       {{-- {{dd(isset($data['country']));}} --}}
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">@empty($adsTranslations) {{__('cms.update')}} @else {{__('cms.add_trans')}} @endempty </h3>
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
                    @empty($ads)
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.language')}}:<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="language"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                    @foreach ($languages as $language)
                                            <option value="{{$language->id}}" @selected($language->id == $adsTranslations->language_id)>{{$language->name}}</option>
                                      
                                    @endforeach
                                </select>
                            </div>
                            <span class="form-text text-muted">{{__('cms.please_select')}}
                                {{__('cms.type')}}</span>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    
                    <x-input id="title" type="text" name="{{ __('cms.name') }}" value="{{$adsTranslations->title}}"/>
                    
                    @else


                    <x-input id="start_date" type="date" name="{{ __('cms.start_date') }}"  value="{{$ads->start_date}}"/>
                    <x-input id="end_date" type="date" name="{{ __('cms.end_date') }}"  value="{{$ads->end_date}}"/>

                        <x-input id="start_time" type="time" name="{{ __('cms.start_time') }}" value="{{$ads->start_time}}"/>
                        <x-input id="end_time" type="time" name="{{ __('cms.end_time') }}"  value="{{$ads->end_time}}"/>

                    <x-input id="href" type="text" name="{{ __('cms.href') }}"  value="{{$ads->href}}"/>


                        <div class="form-group col-3">
                            <label class="col-3 col-form-label">{{ __('cms.image') }}:</label>
                            <div class="col-9">
                                <div class="image-input image-input-empty image-input-outline" id="kt_image_5"
                                    style="background-image: url({{Storage::url($ads->logo)}})">
                                    <div class="image-input-wrapper"></div>
    
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="logo" id="logo" accept=".png, .jpg, .jpeg">
                                        <input type="hidden" name="profile_avatar_remove">
                                    </label>
    
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="cancel" data-toggle="tooltip" title=""
                                        data-original-title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
    
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="remove" data-toggle="tooltip" title=""
                                        data-original-title="Remove avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </div>


                    <div class="separator separator-dashed my-10"></div>
                    <h3 class="text-dark font-weight-bold mb-10">{{__('cms.settings')}}</h3>

                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.active')}}</label>
                        <div class="col-3">
                            <span class="switch switch-outline switch-icon switch-success">
                                <label>
                                    <input type="checkbox" @checked($ads->active) id="active">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                @endempty
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            @empty($ads)
                            <button type="button" onclick="performEdit()"
                                class="btn btn-primary mr-2">{{__('cms.save')}}</button>
                                @else
                                <button type="button" onclick="performEditAds()"
                                    class="btn btn-primary mr-2">{{__('cms.save')}}</button>
                            @endempty
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
   

    

    function blockUI () {
        KTApp.blockPage({
            overlayColor: 'blue',
            opacity: 0.1,
            state: 'primary' // a bootstrap color
        });
    }

    function unBlockUI () {
        KTApp.unblockPage();
    }

</script>
<script>
    @empty($ads)
    function performEdit(){
        blockUI();
        let data = {
            language: document.getElementById('language').value,
            title: document.getElementById('title').value,
        }
        update('/cms/admin/ads/translations/{{$adsTranslations->id}}', data, '/cms/admin/ads');
    }
    @else

    function performEditAds(){

    let formData = new FormData();
    formData.append('href',document.getElementById('href').value);
    formData.append('start_date',document.getElementById('start_date').value);
    formData.append('end_date',document.getElementById('end_date').value);
    formData.append('start_time',document.getElementById('start_time').value);
        formData.append('end_time',document.getElementById('end_time').value);

    formData.append('logo',document.getElementById('logo').files[0]);
    formData.append('active',document.getElementById('active').checked);
    formData.append('_method','put');
        
        store('/cms/admin/ads/{{$ads->id}}',formData);
    }

    @endempty

    
</script>
@endsection