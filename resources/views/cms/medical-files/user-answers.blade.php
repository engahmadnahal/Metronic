@extends('cms.parent')

@section('page-name',__('cms.medical_files'))
@section('main-page',__('cms.medical_file_management'))
@section('sub-page',__('cms.medical_files'))
@section('page-name-small',__('cms.answers'))

@section('styles')

@endsection

@section('content')
<!-- begin::Card-->
<div class="card card-custom overflow-hidden">
    <div class="card-body p-0">
        <!-- begin: Invoice-->
        <!-- begin: Invoice header-->
        <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
            <div class="col-md-9">
                <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                    <h1 class="display-4 font-weight-boldest mb-10">Medical File</h1>
                    <div class="d-flex flex-column align-items-md-end px-0">
                        <!--begin::Logo-->
                        <a href="#" class="mb-5">
                            <img src="assets/media/logos/logo-dark.png" alt="" />
                        </a>
                        <!--end::Logo-->
                        <span class="d-flex flex-column align-items-md-end opacity-70">
                            <span>Hi-Care, Physical therapy System</span>
                            <span>Gaza - Palestine</span>
                        </span>
                    </div>
                </div>
                <div class="border-bottom w-100"></div>
                <div class="d-flex justify-content-between pt-6">
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">DATE</span>
                        <span class="opacity-70">{{$userMedicalFile->created_at}}</span>
                    </div>
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">FILE NO.</span>
                        <span class="opacity-70">MF-{{$userMedicalFile->id}}</span>
                    </div>
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">PATIENT</span>
                        <span class="opacity-70">{{$userMedicalFile->user->name}}
                            <br />{{$userMedicalFile->user->birth_date}} -
                            {{$userMedicalFile->user->gender_name}}</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: Invoice header-->
        <!-- begin: Invoice body-->
        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
            <div class="col-md-9">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="pl-0 font-weight-bold text-muted text-uppercase">Question</th>
                                <th class="text-right font-weight-bold text-muted text-uppercase">Answer</th>
                                {{-- <th class="text-right font-weight-bold text-muted text-uppercase">Rate</th> --}}
                                {{-- <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Amount</th>
                                --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userMedicalFile->answers as $answer)
                            <tr class="">
                                <td class="font-weight-boldest pl-0 pt-7">{{$answer->question->question_en}}</td>
                                <td class="text-right pt-7">{{$answer->answer}}</td>
                                {{-- <td class="text-right pt-7">$40.00</td>
                                <td class="text-danger pr-0 pt-7 text-right">$3200.00</td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end: Invoice body-->
        <!-- begin: Invoice footer-->
        <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
            <div class="col-md-9">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="font-weight-bold text-muted text-uppercase">Title</th>
                                <th class="font-weight-bold text-muted text-uppercase">AGE</th>
                                <th class="font-weight-bold text-muted text-uppercase">QUESTIONS</th>
                                <th class="font-weight-bold text-muted text-uppercase">TYPE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="font-weight-bolder">
                                <td>{{$userMedicalFile->medicalFile->title}}</td>
                                <td>{{$userMedicalFile->medicalFile->age_from}} -
                                    {{$userMedicalFile->medicalFile->age_to}}</td>
                                <td>{{$userMedicalFile->medicalFile->questions_count}}</td>
                                <td class="text-danger font-size-h3 font-weight-boldest">
                                    {{$userMedicalFile->medicalFile->type}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end: Invoice footer-->
        <!-- begin: Invoice action-->
        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
            <div class="col-md-9">
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        onclick="window.print();">Download Medical File</button>
                    <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print
                        Medical File</button>
                </div>
            </div>
        </div>
        <!-- end: Invoice action-->
        <!-- end: Invoice-->
    </div>
</div>
<!-- end::Card-->
@endsection

@section('styles')

@endsection