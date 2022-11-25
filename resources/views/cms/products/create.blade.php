@extends('cms.parent')

@section('page-name',__('cms.products'))
@section('main-page',__('cms.shop_content_management'))
@section('sub-page',__('cms.products'))
@section('page-name-small',__('cms.create'))

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
                <h3 class="card-title"></h3>
            </div>
            <!--begin::Form-->
            <form id="create-form">
                <div class="card-body">
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.language')}}:<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="language"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                    @foreach ($languages as $language)
                                    <option value="{{$language->id}}">{{$language->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="form-text text-muted">{{__('cms.please_select')}}
                                {{__('cms.type')}}</span>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    @empty($product)
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label class="col-3 col-form-label">{{__('cms.category')}}:<span
                                    class="text-danger">*</span></label>
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="category"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                </select>
                            </div> <span class="form-text text-muted">{{__('cms.please_select')}}
                                {{__('cms.category')}}</span>
                        </div>
                        <div class="col-lg-6">
                            <label class="col-3 col-form-label">{{__('cms.sub_category')}}:<span
                                    class="text-danger">*</span></label>
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="subCategory"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                </select>
                            </div> <span class="form-text text-muted">{{__('cms.sub_category')}}
                                {{__('cms.sub_category')}}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label class="col-3 col-form-label">{{__('cms.sub_category')}}:<span
                                    class="text-danger">*</span></label>
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="subSubCategory"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                </select>
                            </div> <span class="form-text text-muted">{{__('cms.please_select')}}
                                {{__('cms.sub_sub_categories')}}</span>
                        </div>
                        <div class="col-lg-6">
                            <label class="col-3 col-form-label">{{__('cms.trademark')}}:<span
                                    class="text-danger">*</span></label>
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="trademark"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                </select>
                            </div> <span class="form-text text-muted">{{__('cms.please_select')}}
                                {{__('cms.trademark')}}</span>
                        </div>
                    </div>









                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label class="col-3 col-form-label">{{__('cms.unit_type')}}:<span
                                    class="text-danger">*</span></label>
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="unit_id"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                </select>
                            </div> <span class="form-text text-muted">{{__('cms.please_select')}}
                                {{__('cms.unit_type')}}</span>
                        </div>
                        <div class="col-lg-6">
                            <label class="col-3 col-form-label">{{__('cms.unit_value')}}:<span
                                    class="text-danger">*</span></label>
                            <div class="dropdown bootstrap-select form-control dropup">
                                <input type="number" class="form-control" id="unit_value"
                                    placeholder="{{__('cms.unit_value')}}" />
                            </div><span class="form-text text-muted">{{__('cms.please_enter')}}
                                {{__('cms.unit_value')}}</span>
                        </div>
                    </div>



                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label class="col-3 col-form-label">{{__('cms.barcode')}}:<span
                                    class="text-danger">*</span></label>
                            <div class="dropdown bootstrap-select form-control dropup">
                                <input type="number" class="form-control" id="barcode"
                                    placeholder="{{__('cms.barcode')}}" />
                            </div><span class="form-text text-muted">{{__('cms.please_enter')}}
                                {{__('cms.barcode')}}</span>
                        </div>
                        @endempty
                        <div class="col-lg-6">
                            <label class="col-3 col-form-label">{{__('cms.name')}}:<span
                                    class="text-danger">*</span></label>
                            <div class="dropdown bootstrap-select form-control dropup">
                                <input type="text" class="form-control" id="name" placeholder="{{__('cms.name')}}" />
                            </div><span class="form-text text-muted">{{__('cms.please_enter')}}
                                {{__('cms.name')}}</span>
                        </div>
                    </div>
                    
                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.about')}}:<span
                                class="text-danger"></span></label>
                        <div class="col-9">
                            <textarea class="form-control" id="about" maxlength="1000" rows="3"
                                placeholder="{{__('cms.please_enter')}} {{__('cms.about')}}"></textarea>
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.about')}}</span>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    @empty($product)
                    <div class="row">
                        <div class="form-group col-3">
                            <label class="col-3 col-form-label">{{__('cms.image')}}:</label>
                            <div class="col-9">
                                <div class="image-input image-input-empty image-input-outline" id="kt_image_5"
                                    style="background-image: url(https://abraj.mr-dev.tech/assets/media/users/blank.png)">
                                    <div class="image-input-wrapper"></div>

                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg">
                                        <input type="hidden" name="profile_avatar_remove">
                                    </label>

                                    <span
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="cancel" data-toggle="tooltip" title=""
                                        data-original-title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>

                                    <span
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="remove" data-toggle="tooltip" title=""
                                        data-original-title="Remove avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endempty
                    <div class="separator separator-dashed my-10"></div>
                    <h3 class="text-dark font-weight-bold mb-10">{{__('cms.settings')}}</h3>
                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.active')}}</label>
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
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <button type="button" onclick="performStore({{$product->id ?? null}})"
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
    var image = new KTImageInput('kt_image_5');
    controlFormInputs(true);
    $('#language').on('change',function() {
        if('{{empty($product)}}') {
            $('#category').empty();
            $('#category').attr('disabled',true);
            $('#category').selectpicker("refresh");

            $('#subCategory').empty();
            $('#subCategory').attr('disabled',true);
            $('#subCategory').selectpicker("refresh");


             $('#subSubCategory').empty();
            $('#subSubCategory').attr('disabled',true);
            $('#subSubCategory').selectpicker("refresh");


            $('#trademark').empty();
            $('#trademark').attr('disabled',true);
            $('#trademark').selectpicker("refresh");


            $('#unit_id').empty();
            $('#unit_id').attr('disabled',true);
            $('#unit_id').selectpicker("refresh");

            $('#name').attr('disabled',true);
            $('#about').attr('disabled',true);
            $('#barcode').attr('disabled',true);
            $('#unit_value').attr('disabled',true);
            getCountries(this.value);
        }else {
            $('#name').attr('disabled',false);
            $('#about').attr('disabled',false);
            $('#barcode').attr('disabled',false);
            $('#unit_value').attr('disabled',false);
        }
    });

    $('#category').on('change',function() {
        if('{{empty($product)}}') {
            $('#subCategory').empty();
            $('#subCategory').attr('disabled',true);
            $('#subCategory').selectpicker("refresh");

            $('#name').attr('disabled',true);
            getCities($('#language').val(), this.value);
        }else {
            $('#name').attr('disabled',false);
        }
    });


    $('#subCategory').on('change',function() {
        if('{{empty($product)}}') {
            $('#subSubCategory').empty();
            $('#subSubCategory').attr('disabled',true);
            $('#subSubCategory').selectpicker("refresh");

            getSubSubCategory($('#language').val(), this.value);
        }else {
            $('#name').attr('disabled',false);
            $('#about').attr('disabled',false);
            $('#barcode').attr('disabled',false);
            $('#unit_value').attr('disabled',false);
        }
    });



        $('#subSubCategory').on('change',function() {
        if('{{empty($product)}}') {
            $('#trademark').empty();
            $('#trademark').attr('disabled',true);
            $('#trademark').selectpicker("refresh");
            
            getTrades($('#language').val());
        }else {
            $('#name').attr('disabled',false);
            $('#about').attr('disabled',false);
            $('#barcode').attr('disabled',false);
            $('#unit_value').attr('disabled',false);
        }
    });


            $('#trademark').on('change',function() {
        if('{{empty($product)}}') {
            $('#unit_id').empty();
            $('#unit_id').attr('disabled',true);
            $('#unit_id').selectpicker("refresh");
            
            getUnit($('#language').val());
        }else {
            $('#name').attr('disabled',false);
            $('#about').attr('disabled',false);
            $('#barcode').attr('disabled',false);
            $('#unit_value').attr('disabled',false);
        }
    });

// 
    function controlFormInputs(disabled) {
            $('#name').attr('disabled',disabled);
            $('#about').attr('disabled',disabled);
            $('#barcode').attr('disabled',disabled);
            $('#unit_value').attr('disabled',disabled);


        $('#category').empty();
        $('#category').attr('disabled',disabled);
        $('#category').selectpicker("refresh");

        $('#subCategory').empty();
        $('#subCategory').attr('disabled',disabled);
        $('#subCategory').selectpicker("refresh");

        $('#subSubCategory').empty();
        $('#subSubCategory').attr('disabled',disabled);
        $('#subSubCategory').selectpicker("refresh");


        $('#trademark').empty();
        $('#trademark').attr('disabled',disabled);
        $('#trademark').selectpicker("refresh");


        $('#unit_id').empty();
        $('#unit_id').attr('disabled',disabled);
        $('#unit_id').selectpicker("refresh");
    }

    function getCountries(languageId) {
        blockUI();
        axios.get(`/cms/admin/categories/translation/${languageId}`)
        .then(function (response) {
            if(response.data.categories.length != 0) {
                response.data.categories.map((category) => {
                    $('#category').append(new Option(category.name, category.category_id))
                });
                $('#category').attr('disabled',false);
                $('#category').selectpicker("refresh");
            }else {
                controlFormInputs(true);
            }
        })
        .catch(function (error) {
            toastr.error(error.response.data.message);
        })
        .then(function () {
            unBlockUI();
        });
    }

    function getCities(languageId, categoryId) {
        blockUI();
        axios.get(`/cms/admin/subCategories/translation/${languageId}/category/${categoryId}`)
        .then(function (response) {
            if(response.data.subCategories.length != 0) {                
                response.data.subCategories.map((subCategory) => {
                    console.log(response.data.subCategories);
                    $('#subCategory').append(new Option(subCategory.name, subCategory.sub_category_id))
                });
            }
            $('#subCategory').attr('disabled',response.data.subCategories.length == 0);
            $('#subCategory').selectpicker("refresh");
            // $('#name').attr('disabled',response.data.subCategories.length == 0);
        })
        .catch(function (error) {
            toastr.error(error.response.data.message);
        })
        .then(function () {
            unBlockUI();
        });
    }



        function getSubSubCategory(languageId, subCategoryId) {
        blockUI();
        axios.get(`/cms/admin/subSubCategories/translation/${languageId}/subCategory/${subCategoryId}`)
        .then(function (response) {
            if(response.data.subSubCategories.length != 0) {                
                response.data.subSubCategories.map((subSubCategory) => {
                    console.log(response.data.subSubCategories);
                    $('#subSubCategory').append(new Option(subSubCategory.name, subSubCategory.sub_sub_category_id))
                });
            }
           $('#subSubCategory').attr('disabled',response.data.subSubCategories.length == 0);
           $('#subSubCategory').selectpicker("refresh");
            // $('#name').attr('disabled',response.data.subSubCategories.length == 0);
            // $('#about').attr('disabled',response.data.subSubCategories.length == 0);
            // $('#barcode').attr('disabled',response.data.subSubCategories.length == 0);
            // $('#unit_value').attr('disabled',response.data.subSubCategories.length == 0);
        })
        .catch(function (error) {
            toastr.error(error.response.data.message);
        })
        .then(function () {
            unBlockUI();
        });
    }



        function getTrades(languageId) {
            console.log(languageId);
        blockUI();
        axios.get(`/cms/admin/tradmarks/translation/${languageId}`)
        .then(function (response) {
            if(response.data.trades.length != 0) {
                console.log(response.data.trades);
                response.data.trades.map((trade) => {
                    $('#trademark').append(new Option(trade.name, trade.trade_mark_id))
                });
                $('#trademark').attr('disabled',false);
                $('#trademark').selectpicker("refresh");
            }else {
                // controlFormInputs(true);
            }
        })
        .catch(function (error) {
            toastr.error(error.response.data.message);
        })
        .then(function () {
            unBlockUI();
        });
    }


    function getUnit(languageId) {
      console.log(languageId);
        blockUI();
        axios.get(`/cms/admin/units/translation/${languageId}`)
        .then(function (response) {
            if(response.data.units.length != 0) {
                console.log(response.data.units);
                response.data.units.map((unit) => {
                    $('#unit_id').append(new Option(unit.name, unit.unit_id))
                });
                $('#unit_id').attr('disabled',false);
                $('#unit_id').selectpicker("refresh");
              $('#name').attr('disabled',false);
              $('#about').attr('disabled',false);
              $('#barcode').attr('disabled',false);
              $('#unit_value').attr('disabled',false);
            }else {
                // controlFormInputs(true);
            }
        })
        .catch(function (error) {
            toastr.error(error.response.data.message);
        })
        .then(function () {
            unBlockUI();
        });
    }


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
    function performStore(id){
    let formData = new FormData();
    formData.append('name',document.getElementById('name').value);
    formData.append('about',document.getElementById('about').value);
    formData.append('language',document.getElementById('language').value);
    formData.append('active',document.getElementById('active').checked?1:0);
    if(id != null) {
    store('/cms/admin/products/'+id+'/translation',formData);
    }else {
    formData.append('barcode',document.getElementById('barcode').value);
    formData.append('unit_id',document.getElementById('unit_id').value);
    formData.append('unit_value',document.getElementById('unit_value').value);
    formData.append('subSubCategory',document.getElementById('subSubCategory').value);
    formData.append('trademark',document.getElementById('trademark').value);
    formData.append('image',image.input.files[0]);
    store('/cms/admin/products',formData);
    }
    }

    // function performStore(id){
    //  let formData = new FormData();
    //  formData.append('name',document.getElementById('name').value);
    //  formData.append('language',document.getElementById('language').value);
    //  formData.append('subCategory',document.getElementById('subCategory').value);

    //     if(id == null) {
    //         formData.append('image',image.input.files[0]);
    //         formData.append('icon',icon.input.files[0]);
    //         store('/cms/admin/subSubCategories',formData);
    //     }else {
    //         store('/cms/admin/subSubCategories/'+id+'/translation',formData);
    //     }
    // }
</script>
@endsection