@extends('cms.parent')

@section('page-name',__('cms.governorates'))
@section('main-page',__('cms.content_management'))
@section('sub-page',__('cms.governorates'))
@section('page-name-small',__('cms.index'))

@section('styles')

@endsection

@section('content')
<!--begin::Advance Table Widget 5-->
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{__('cms.governorates')}}</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">--</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-0">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_2">
                <thead>
                    <tr class="text-uppercase">
                        <th style="min-width: 50px">{{__('cms.code')}}</th>
                        <th style="min-width: 160px">{{__('cms.name')}}</th>
                        <th style="min-width: 160px">{{__('cms.experiences')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($governorates as $governorate)
                    <tr>
                        <td class="pl-0">
                            <div>
                                <span
                                    class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$governorate->code}}</span>
                                {{-- <span class="text-muted font-weight-bold d-block">{{$governorate->mobile}}</span> --}}
                            </div>
                        </td>
                        <td class="pl-3">
                            <div>
                                <span
                                    class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$governorate->name}}</span>
                                {{-- <span class="text-muted font-weight-bold d-block">{{$governorate->content}}</span> --}}
                            </div>
                        </td>
                        <td class="pr-0">
                            <a href="#"
                                class="btn btn-light-primary font-weight-bolder font-size-sm">({{$governorate->experiences_count}})</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--end::Table-->
        <div class="row">
            <div class="text-center">
                <ul>
                    {{-- {{$governorates->links()}} --}}
                </ul>
            </div>
        </div>
    </div>
    <!--end::Body-->

</div>
<!--end::Advance Table Widget 5-->
@endsection

@section('scripts')
<script src="{{asset('assets/js/pages/widgets.js')}}"></script>
@endsection