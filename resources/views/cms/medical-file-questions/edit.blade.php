@extends('cms.parent')

@section('page-name',__('cms.admins'))
@section('main-page',__('cms.hr'))
@section('sub-page',__('cms.admins'))
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
                <h3 class="card-title">{{__('cms.update')}}</h3>
                {{-- <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div> --}}
            </div>
            <!--begin::Form-->
            <form>
                <div class="card-body">
                    <h3 class="text-dark font-weight-bold mb-10">{{__('cms.info')}}</h3>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.question')}}: (En)</label>
                        <div class="col-4">
                            <input type="text" class="form-control" id="question_en"
                                placeholder="{{__('cms.question')}}" value="{{$question->question_en}}" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.question')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.question')}}: (Ar)</label>
                        <div class="col-4">
                            <input type="text" class="form-control" id="question_ar"
                                placeholder="{{__('cms.question')}}" value="{{$question->question_ar}}" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.question')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-10">
                        <label class="col-3 col-form-label">{{__('cms.type')}}:</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="option option-plain">
                                        <span class="option-control">
                                            <span class="radio radio-brand">
                                                <input type="radio" name="answer_type" value="YesOrNo"
                                                    @if($question->answer_type == 'YesOrNo') checked="checked" @endif>
                                                <span></span>
                                            </span>
                                        </span>
                                        <span class="option-label">
                                            <span class="option-head">
                                                <span class="option-title">Yes/No Question</span>
                                            </span>
                                            <span class="option-body">Question with two options (Yes/No)</span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-lg-4">
                                    <label class="option option-plain">
                                        <span class="option-control">
                                            <span class="radio radio-brand">
                                                <input type="radio" name="answer_type" value="Essay"
                                                    @if($question->answer_type == 'Essay') checked="checked" @endif>
                                                <span></span>
                                            </span>
                                        </span>
                                        <span class="option-label">
                                            <span class="option-head">
                                                <span class="option-title">Essay</span>
                                            </span>
                                            <span class="option-body">Allowing the respondent to provide answer in
                                                detail</span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-lg-4">
                                    <label class="option option-plain">
                                        <span class="option-control">
                                            <span class="radio radio-brand">
                                                <input type="radio" name="answer_type" value="Rate"
                                                    @if($question->answer_type == 'Rate') checked="checked" @endif>>
                                                <span></span>
                                            </span>
                                        </span>
                                        <span class="option-label">
                                            <span class="option-head">
                                                <span class="option-title">Rate</span>
                                            </span>
                                            <span class="option-body">Allowing the respondent to answer a rated
                                                value</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="separator separator-dashed my-10"></div>
                    <h3 class="text-dark font-weight-bold mb-10">{{__('cms.details')}}</h3>
                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.required')}}</label>
                        <div class="col-3">
                            <span class="switch switch-outline switch-icon switch-success">
                                <label>
                                    <input type="checkbox" @if($question->required) checked="checked" @endif
                                    id="required">
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
    function performEdit(){
        let data = {
            question_en: document.getElementById('question_en').value,
            question_ar: document.getElementById('question_ar').value,
            answer_type: document.querySelector('input[name="answer_type"]:checked').value,
            required: document.getElementById('required').checked,
        }
        update('/cms/admin/medical-files/{{$medicalFile->id}}/questions/{{$question->id}}', data, '/cms/admin/medical-files');
    }
</script>
@endsection