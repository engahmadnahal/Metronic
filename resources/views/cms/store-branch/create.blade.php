@extends('cms.parent')

@section('page-name', __('cms.StoreBranch'))
@section('main-page', __('cms.content_management'))
@section('sub-page', __('cms.StoreBranch'))
@section('page-name-small', __('cms.create'))

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
                            {{ __('cms.create') }}
                        @else
                            {{ __('cms.add_trans') }}
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
                        <div class="form-group row mt-4">
                            <label class="col-3 col-form-label">{{ __('cms.language') }}:<span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <div class="dropdown bootstrap-select form-control dropup">
                                    <select class="form-control selectpicker" data-size="7" id="language"
                                        title="Choose one of the following..." tabindex="null" data-live-search="true">
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="form-text text-muted">{{ __('cms.please_select') }}
                                    {{ __('cms.type') }}</span>
                            </div>
                        </div>





                        @empty($storeBranch)

                        
                            <div class="separator separator-dashed my-10"></div>
                            <x-input id="name" type="text" name="{{ __('cms.name') }}" />
                            <x-input id="mobile" type="text" name="{{ __('cms.mobile') }}" />
                            <x-input id="email" type="text" name="{{ __('cms.email') }}" />
                            <x-input id="password" type="text" name="{{ __('cms.password') }}" />


{{--                             
                            <div class="form-group row mt-4">
                                <label class="col-3 col-form-label">{{ __('cms.store') }}:<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <div class="dropdown bootstrap-select form-control dropup">
                                        <select class="form-control selectpicker" data-size="7" id="store"
                                            title="Choose one of the following..." tabindex="null" data-live-search="true">
                                             @foreach ($regions as $r)
                                            <option value="{{ $r->id }}">{{ $r->name }}</option>
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
                                            <input type="checkbox" checked="checked" id="active">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </div>

                        
                    @else
                        <x-input id="name" type="text" name="{{ __('cms.name') }}" />
                    @endempty

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-3">

                            </div>
                            <div class="col-9">
                                <button type="button" onclick="performStore({{ $storeBranch->id ?? null }})"
                                    class="btn btn-primary mr-2">{{ __('cms.save') }}</button>
                                <button type="reset" class="btn btn-secondary">{{ __('cms.cancel') }}</button>
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
        var image = new KTImageInput('kt_image_5');
        controlFormInputs(true);
        $('#language').on('change', function() {
            // getDataForLang(this.value);
            controlFormInputs(this.value == -1);
        });

        function controlFormInputs(disabled) {
            $('#name').attr('disabled', disabled);
            $('#mobile').attr('disabled', disabled);
            $('#email').attr('disabled', disabled);
            $('#password').attr('disabled', disabled);
            // $('#store').attr('disabled', disabled);
        }

        function getDataForLang(lang) {
            blockUI();
            axios.post('/cms/admin/store_branches/data-for-lang', {
                lang_id: lang
            }).then(function(response) {
                console.log(response.data.data);
                if (response.data.data.stores.length != 0) {
                    response.data.data.stores.map((store) => {
                        $('#store').append(new Option(store.name, store.store_id));
                        $('#store').selectpicker("refresh");
                    });

                } else {
                    controlFormInputs(true);
                }
                

            }).catch(function(error) {});
            unBlockUI();
        }


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
        function performStore(id) {

            let days = $('input[type=checkbox]:checked').map(function(i, e) {
                return e.value;
            }).get().filter(function(e) {
                return e != 'on';
            });


            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('language', document.getElementById('language').value);
            @empty($storeBranch)

                formData.append('mobile', document.getElementById('mobile').value);
                formData.append('email', document.getElementById('email').value);
                formData.append('password', document.getElementById('password').value);
                // formData.append('store', document.getElementById('store').value);
                formData.append('active', document.getElementById('active').checked);
            @endempty

            if (id == null) {
                store('/cms/admin/store_branches', formData);
            } else {
                store('/cms/admin/store_branches/' + id + '/translation', formData);
            }
        }
    </script>
@endsection
