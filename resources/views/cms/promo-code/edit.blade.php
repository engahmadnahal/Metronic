@extends('cms.parent')

@section('page-name',__('cms.payments'))
@section('main-page',__('cms.content_management'))
@section('sub-page',__('cms.payments'))
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
                <h3 class="card-title"> {{__('cms.update')}} </h3>
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
                   

                    <x-input id="ratio" type="number" name="{{ __('cms.ratio') }}" value="{{$promoCode->ratio}}"/>
                    <x-input id="all_beneficiaries" type="number" name="{{ __('cms.all_beneficiaries') }}" value="{{$promoCode->all_beneficiaries}}"/>
                    {{-- <x-input id="current_beneficiaries" type="number" name="{{ __('cms.current_beneficiaries') }}" value="{{$promoCode->current_beneficiaries}}"/> --}}
                    <x-input id="start_date" type="date" name="{{ __('cms.start_date') }}" value="{{$promoCode->start_date}}"/>
                    <x-input id="end_date" type="date" name="{{ __('cms.end_date') }}" value="{{$promoCode->end_date}}"/>

                   
                    
                        <div class="separator separator-dashed my-10"></div>
                        <h3 class="text-dark font-weight-bold mb-10">{{__('cms.settings')}}</h3>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">{{__('cms.active')}}</label>
                            <div class="col-3">
                                <span class="switch switch-outline switch-icon switch-success">
                                    <label>
                                        <input type="checkbox" @checked($promoCode->status) id="active">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>

                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <button type="button" onclick="performUpdate()"
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
    function performUpdate(){

        let data = {
            ratio : document.getElementById('ratio').value,
            all_beneficiaries : document.getElementById('all_beneficiaries').value,
            // current_beneficiaries : document.getElementById('current_beneficiaries').value,
            start_date : document.getElementById('start_date').value,
            end_date : document.getElementById('end_date').value,
            active : document.getElementById('active').checked,
        };
        update('/cms/admin/promo_codes/{{$promoCode->id}}', data, '/cms/admin/promo_codes');
    }
</script>
@endsection