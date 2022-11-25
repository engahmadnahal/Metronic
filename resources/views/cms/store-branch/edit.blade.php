@extends('cms.parent')

@section('page-name', __('cms.StoreBranch'))
@section('main-page', __('cms.content_management'))
@section('sub-page', __('cms.StoreBranch'))
@section('page-name-small', __('cms.update'))

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
                    <h3 class="card-title">
                        @empty($storeBranch)
                            {{ __('cms.update') }}
                        @else
                            {{ __('cms.update_trans') }}
                        @endempty
                    </h3>
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
                        @empty($storeBranch)
                            <div class="form-group row mt-4">
                                <label class="col-3 col-form-label">{{ __('cms.language') }}:<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <div class="dropdown bootstrap-select form-control dropup">
                                        <select class="form-control selectpicker" data-size="7" id="language"
                                            title="Choose one of the following..." tabindex="null" data-live-search="true">
                                            @foreach ($languages as $language)
                                                <option value="{{ $language->id }}" @selected($language->id == $storeBranchTranslations->language_id)>
                                                    {{ $language->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <span class="form-text text-muted">{{ __('cms.please_select') }}
                                        {{ __('cms.language') }}</span>
                                </div>
                            </div>
                        @endempty


                        @empty($storeBranch)

                            <x-input id="name" type="text" name="{{ __('cms.name') }}"
                                value="{{ $storeBranchTranslations->name }}" />
                            
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-3">

                                    </div>
                                    <div class="col-9">
                                        <button type="button" onclick="performUpdate()"
                                            class="btn btn-primary mr-2">{{ __('cms.save') }}</button>
                                        <button type="reset" class="btn btn-secondary">{{ __('cms.cancel') }}</button>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="separator separator-dashed my-10"></div>
                            <x-input id="mobile" type="text" name="{{ __('cms.mobile') }}" value="{{$storeBranch->mobile}}"/>
                            <x-input id="email" type="text" name="{{ __('cms.email') }}" value="{{$storeBranch->email}}"/>

                            {{-- <div class="form-group row mt-4">
                                <label class="col-3 col-form-label">{{ __('cms.store') }}:<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <div class="dropdown bootstrap-select form-control dropup">
                                        <select class="form-control selectpicker" data-size="7" id="store"
                                            title="Choose one of the following..." tabindex="null" data-live-search="true">
                                            @foreach ($stores as $store)
                                            <option value="{{ $store->id }}" @selected($store->id == $storeBranch->store_id)>{{ $store->nameStore }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <span class="form-text text-muted">{{ __('cms.please_select') }}
                                        {{ __('cms.store') }}</span>
                                </div>
                            </div> --}}

                          


                            <div class="separator separator-dashed my-10"></div>
                            <h3 class="text-dark font-weight-bold mb-10">{{ __('cms.settings') }}</h3>

                           
                            <div class="form-group row">
                                <label class="col-3 col-form-label">{{ __('cms.active') }}</label>
                                <div class="col-3">
                                    <span class="switch switch-outline switch-icon switch-success">
                                        <label>
                                            <input type="checkbox" @checked(!$storeBranch->blocked) id="active">
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
                                    <button type="button" onclick="performUpdateStore()"
                                        class="btn btn-primary mr-2">{{ __('cms.save') }}</button>
                                    <button type="reset" class="btn btn-secondary">{{ __('cms.cancel') }}</button>
                                </div>
                            </div>
                        </div>

                    @endempty


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
        var image = new KTImageInput('kt_image_5');

        function blockUI() {
            KTApp.blockPage({
                overlayColor: 'blue',
                opacity: 0.1,
                state: 'primary' // a bootstrap color
            });
        }

        function unBlockUI() {
            KTApp.unblockPage();
        }
    </script>
    <script>
        @empty($storeBranch)
            function performUpdate() {

                let data = {
                    name: document.getElementById('name').value,
                    language: document.getElementById('language').value,
                    
                };

                update('/cms/admin/store_branches/translations/{{ $storeBranchTranslations->id }}', data, '/cms/admin/store_branches');
            }
        @else
            var image = new KTImageInput('kt_image_5');
            controlFormInputs(true);
            

            function blockUI() {
                KTApp.blockPage({
                    overlayColor: 'blue',
                    opacity: 0.1,
                    state: 'primary' // a bootstrap color
                });
            }

            function unBlockUI() {
                KTApp.unblockPage();
            }

            function performUpdateStore() {

                let days = $('input[type=checkbox]:checked').map(function(i, e) {
                    return e.value;
                }).get().filter(function(e) {
                    return e != 'on';
                });


                let formData = new FormData();
                formData.append('mobile', document.getElementById('mobile').value);
                formData.append('email', document.getElementById('email').value);
                formData.append('store', document.getElementById('store').value);
                formData.append('active', document.getElementById('active').checked);
                formData.append('_method', 'put');

                store('/cms/admin/store_branches/{{$storeBranch->id}}', formData);
            }
        @endempty
    </script>
@endsection
