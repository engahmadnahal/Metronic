@extends('cms.parent')

@section('page-name',__('cms.users'))
@section('main-page',__('cms.hr'))
@section('sub-page',__('cms.users'))
@section('page-name-small',__('cms.index'))

@section('styles')

@endsection

@section('content')
<!--begin::Advance Table Widget 5-->
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{__('cms.users')}}</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">Manage system users</span>
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
                        <th style="min-width: 120px">{{__('cms.name')}}</th>
                        <th style="min-width: 150px">{{__('cms.location')}}</th>
                        <th style="min-width: 130px">{{__('cms.experiences')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="pl-0">
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->full_name ??
                                '-'}}</span>
                            <span class="text-muted font-weight-bold">{{$user->id_number}}</span>
                        </td>
                       <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->governorate_name}}</span>
                            <span class="text-muted font-weight-bold">{{$user->region_name}}</span>
                        </td>
                        <td class="pr-0">
                            <a href="#"
                                class="btn btn-light-primary font-weight-bolder font-size-sm">({{$user->experiences_count}})
                            </a>
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>
<!--end::Advance Table Widget 5-->
@endsection

@section('scripts')
<script src="{{asset('assets/js/pages/widgets.js')}}"></script>
<script>
    function performDestroy(id,reference) {
        confirmDestroy('/cms/admin/users', id, reference);
    }
</script>
@endsection