@extends('cms.parent')

@section('page-name',__('cms.products'))
@section('main-page',__('cms.shop_content_management'))
@section('sub-page',__('cms.products'))
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
                <h3 class="card-title"></h3>

            </div>
            <!--begin::Form-->
            <form id="create-form">
                <div class="card-body">

                    @empty($product)
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.language')}}:<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="language"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                    @foreach ($languages as $language)
                                    <option value="{{$language->id}}" @selected($productTranslataion->language_id ==
                                        $language->id)>{{$language->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="form-text text-muted">{{__('cms.please_select')}}
                                {{__('cms.type')}}</span>
                        </div>
                    </div>
                    @endempty

                    <div class="separator separator-dashed my-10"></div>
                    {{-- @empty($productTranslataion)
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.country')}}:<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="country"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                </select>
                            </div>
                            <span class="form-text text-muted">{{__('cms.please_select')}}
                                {{__('cms.type')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.city')}}:<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="city"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                </select>
                            </div>
                            <span class="form-text text-muted">{{__('cms.please_select')}}
                                {{__('cms.type')}}</span>
                        </div>
                    </div>

                    @endempty --}}
                    
                    @empty($product)
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.name')}}:</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control" id="name" placeholder="{{__('cms.name')}}"
                                value="{{$productTranslataion->name}}" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.name')}}</span>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.about')}}:<span
                                class="text-danger"></span></label>
                        <div class="col-9">
                            <textarea class="form-control" id="about" maxlength="1000" rows="3"
                                placeholder="{{__('cms.please_enter')}} {{__('cms.about')}}">{{$productTranslataion->about}}</textarea>
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.about')}}</span>
                        </div>
                    </div>

                    @endempty







                    @empty($productTranslataion)
                    {{-- Edit Product --}}

                    {{-- <div class="form-group row">
                        <div class="col-lg-6">
                            <label class="col-3 col-form-label">{{__('cms.category')}}:<span
                                    class="text-danger">*</span></label>
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="category"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                    <option value="{{$cat->language_id}}" @checked($cat->language_id == $product->)>{{$cat->name}}</option>
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
                    </div> --}}

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label class="col-3 col-form-label">{{__('cms.sub_category')}}:<span
                                    class="text-danger">*</span></label>
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7" id="subSubCategory"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                    @foreach ($subSubCat as $s)
                                        <option value="{{$s->sub_sub_category_id}}" @selected($s->sub_sub_category_id == $product->sub_sub_category_id)>{{$s->name}}</option>
                                    @endforeach
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
                                    @foreach ($treadMark as $t)
                                        <option value="{{$t->trade_mark_id}}" @selected($t->trade_mark_id == $product->trade_mark_id)>{{$s->name}}</option>
                                    @endforeach
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
                                    @foreach ($units as $u)
                                        <option value="{{$u->unit_id}}" @selected($u->unit_id == $product->unit_id)>{{$u->name}}</option>
                                    @endforeach
                                </select>
                            </div> <span class="form-text text-muted">{{__('cms.please_select')}}
                                {{__('cms.unit_type')}}</span>
                        </div>
                        <div class="col-lg-6">
                            <label class="col-3 col-form-label">{{__('cms.unit_value')}}:<span
                                    class="text-danger">*</span></label>
                            <div class="dropdown bootstrap-select form-control dropup">
                                <input type="number" class="form-control" id="unit_value"
                                    placeholder="{{__('cms.unit_value')}}" value="{{$product->unit_value}}"/>
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
                                    placeholder="{{__('cms.barcode')}}" value="{{$product->barcode}}"/>
                            </div><span class="form-text text-muted">{{__('cms.please_enter')}}
                                {{__('cms.barcode')}}</span>
                        </div>

                        
                        
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-3">
                            <label class="col-3 col-form-label">{{__('cms.image')}}:</label>
                            <div class="col-9">
                                <div class="image-input image-input-empty image-input-outline" id="kt_image_5"
                                    style="background-image: url({{Storage::url($product->image)}})">
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

                    <div class="separator separator-dashed my-10"></div>
                    <h3 class="text-dark font-weight-bold mb-10">{{__('cms.settings')}}</h3>
                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.active')}}</label>
                        <div class="col-3">
                            <span class="switch switch-outline switch-icon switch-success">
                                <label>
                                    <input type="checkbox" @checked($product->active) id="active">
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
                            <button type="button" onclick="performEdit()"
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
    var icon = new KTImageInput('kt_image_6');
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
  

    function performEdit(){

        // Edit Products

        @empty($productTranslataion)
           let formData = new FormData();
           formData.append('_method','put');
           formData.append('active',document.getElementById('active').checked?1:0);
           formData.append('subSubCategory',document.getElementById('subSubCategory').value);
           formData.append('trademark',document.getElementById('trademark').value);
           formData.append('unit_id',document.getElementById('unit_id').value);
           formData.append('unit_value',document.getElementById('unit_value').value);
           formData.append('barcode',document.getElementById('barcode').value);
           formData.append('image',image.input.files[0]);
           store('/cms/admin/products/{{$product->id}}', formData,'/cms/admin/products');
       @endempty



       // Edit Trans
        @empty($product)
            blockUI();
            let formData = new FormData();
            formData.append('name',document.getElementById('name').value);
            formData.append('about',document.getElementById('about').value);
            formData.append('language',document.getElementById('language').value);
            formData.append('_method','put');
            // formData.append('active',document.getElementById('active').checked?1:0);
            // formData.append('image',image.input.files[0]);
            store('/cms/admin/products/translations/{{$productTranslataion->id}}', formData,'/cms/admin/products');
        @endempty
  }
</script>
@endsection