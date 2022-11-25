@extends('cms.parent')

@section('page-name',__('cms.order'))
@section('main-page',__('cms.shop_content_management'))
@section('sub-page',__('cms.order'))
@section('page-name-small',__('cms.index'))

@section('styles')

@endsection

@section('content')
<!--begin::Advance Table Widget 5-->
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{__('cms.order')}}</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
        </h3>
        @can('Create-Order')
        <div class="card-toolbar">
{{-- 
                <a href="{{route('tradmarks.exportExcel')}}"
                class="btn btn-info font-weight-bolder font-size-sm mr-2">{{__('cms.export_excel')}}</a> --}}
        </div>
        @endcan
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-0">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_2">
                <thead>
                    <tr class="text-uppercase">
                        {{-- <th class="pl-0" style="min-width: 100px">id</th> --}}
                        <th class="pl-0" style="min-width: 100px">{{__('cms.code')}}</th>
                        <th style="min-width: 150px">{{__('cms.user_name')}}</th>
                        <th style="min-width: 150px">{{__('cms.date')}}</th>
                        <th style="min-width: 150px">{{__('cms.count_order')}}</th>
                        <th style="min-width: 150px">{{__('cms.status')}}</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $order)
                    <tr>
                    
                        <td class="pl-0">
                            <a href="{{route('orders.show',$order->code)}}"
                                class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$order->code
                                ?? ''}}</a>
                        </td>
                        <td>
                            <a href="#" class="label label-lg label-light-success label-inline">{{$order->user->full_name
                                ?? ''}}</a>
                        </td>
                        <td>
                            <span
                                class="label label-lg label-light-info label-inline">{{$order->created_at->format('Y-m-d')}}</span>
                        </td>
                        <td>
                            <span
                                class="label label-lg label-light-info label-inline">{{$order->orderProducts->count()}}</span>
                        </td>
                      
                        <td>
                            <span
                                class="label label-lg @if($order->status == 'complete') label-light-success @else label-light-warning @endif label-inline">{{$order->status}}</span>
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

</script>
@endsection