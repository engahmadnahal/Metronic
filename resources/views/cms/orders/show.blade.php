@extends('cms.parent')

@section('page-name', __('cms.store'))
@section('main-page', __('cms.content_management'))
@section('sub-page', __('cms.store'))
@section('page-name-small', __('cms.show'))

@section('styles')

@endsection

@section('content')
    <!--begin::Advance Table Widget 5-->
    <!--begin::Card header-->
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <!--begin::Top-->
            <div class="d-flex">
                <!--begin::Pic-->
                
                <!--end::Pic-->
                <!--begin: Info-->
                <div class="flex-grow-1">
                    <!--begin::Title-->
                    <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                        <!--begin::User-->
                        <div class="mr-3">
                            <!--begin::Name-->
                            <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                                {{$order->code}}
                            <i class="flaticon2-correct text-success icon-md ml-2"></i></a>
                            <!--end::Name-->
                            <!--begin::Contacts-->
                            <div class="d-flex flex-wrap my-2">
                                <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"></path>
                                            <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"></circle>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>{{$order->user->full_name}}</a>
                               
                                {{-- <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Marker2.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>{{$store->region->name}}</a> --}}
                            </div>
                            <!--end::Contacts-->
                        </div>
                        <!--begin::User-->
                        <!--begin::Actions-->
                        
                        <!--end::Actions-->
                    </div>
                    <!--end::Title-->
                    <!--begin::Content-->
                    {{-- <div class="d-flex align-items-center flex-wrap justify-content-between">
                        <!--begin::Description-->
                        <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">{{$store->note}}.</div>
                        <!--end::Description-->
                        <!--begin::Progress-->
                        <div class="d-flex mt-4 mt-sm-0">
                            <span class="font-weight-bold mr-4">{{__('cms.rate')}}</span>
                            <div class="progress progress-xs mt-2 mb-2 flex-shrink-0 w-150px w-xl-250px">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{$store->rate_percentage}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="font-weight-bolder text-dark ml-4">{{$store->rate_percentage}}%</span>
                        </div>
                        <!--end::Progress-->
                    </div> --}}
                    <!--end::Content-->
                </div>
                <!--end::Info-->
            </div>
            <!--end::Top-->
            <!--begin::Separator-->
            <div class="separator separator-solid my-7"></div>
            <!--end::Separator-->
            <!--begin::Bottom-->
            <div class="d-flex align-items-center flex-wrap">
               
                <!--begin: Item-->
                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                    <span class="mr-4">
                        <i class="flaticon-confetti icon-2x text-muted font-weight-bold"></i>
                    </span>
                    <div class="d-flex flex-column text-dark-75">
                        <span class="font-weight-bolder font-size-sm">{{__('cms.count_order')}}</span>
                        <span class="font-weight-bolder font-size-h5">
                        <span class="text-dark-50 font-weight-bold"></span>{{$order->orderProducts->count()}}</span>
                    </div>
                </div>
                <!--end: Item-->
                <!--begin: Item-->
                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                    <span class="mr-4">
                        <i class="flaticon-pie-chart icon-2x text-muted font-weight-bold"></i>
                    </span>
                    <div class="d-flex flex-column text-dark-75">
                        <span class="font-weight-bolder font-size-sm">{{__('cms.price')}}</span>
                        <span class="font-weight-bolder font-size-h5">
                        <span class="text-dark-50 font-weight-bold"></span>{{$order->price}}</span>
                    </div>
                </div>
                <!--end: Item-->
                <!--begin: Item-->
                {{-- <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                    <span class="mr-4">
                        <i class="flaticon-price-tag icon-2x text-muted font-weight-bold"></i>
                    </span>
                    <div class="d-flex flex-column flex-lg-fill">
                        <span class="text-dark-75 font-weight-bolder font-size-sm">{{$store->promoCode->count()}} {{__('cms.PromoCode')}}</span>
                        <a href="#promoCodes" class="text-primary font-weight-bolder">View</a>
                    </div>
                </div>
                <!--end: Item-->
                <!--begin: Item-->
                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                    <span class="mr-4">
                        <i class="flaticon-pie-chart icon-2x text-muted font-weight-bold"></i>
                    </span>
                    <div class="d-flex flex-column">
                        <span class="text-dark-75 font-weight-bolder font-size-sm">{{$store->dayWorks->count()}} {{__('cms.work_days')}}</span>
                        <a href="#dayWork" class="text-primary font-weight-bolder">View</a>
                    </div>
                </div> 
                <!--end: Item-->
                <!--begin: Item-->
                <div class="d-flex align-items-center flex-lg-fill my-1">
                    <span class="mr-4">
                        <i class="flaticon-network icon-2x text-muted font-weight-bold"></i>
                    </span>
                    <div class="symbol-group symbol-hover">
                        @foreach ($store->rates->take(5) as $user)
                        
                        <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="" data-original-title="{{$user->first_name}} {{$user->last_name}}">
                            <img alt="Pic" src="{{asset('assets/media/users/300_21.jpg')}}">
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                --}}
                <!--end: Item-->
            </div>
            <!--end::Bottom-->
        </div>
    </div>
    

    <!--end::Card header-->

    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">{{__('cms.products')}}</span>
                <span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
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
                            {{-- <th class="pl-0" style="min-width: 100px">id</th> --}}
                            <th class="pl-0" style="min-width: 100px">{{__('cms.name')}}</th>
                            <th style="min-width: 150px">{{__('cms.barcode')}}</th>
                            <th style="min-width: 150px">{{__('cms.price')}}</th>
                            <th style="min-width: 150px">{{__('cms.view')}}</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderProducts as $orderProduct)
                        <tr>
                            <td class="pl-0">
                                <a href="#"
                                    class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$orderProduct->product->product->translations->first()?->name
                                    ?? ''}}</a>
                            </td>
                            <td>
                                <a href="#"
                                    class="label label-lg label-light-success label-inline">{{$orderProduct->product->product->barcode
                                    ?? ''}}</a>
                            </td>
                            <td class="pl-0">
                                <a href="#"
                                    class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$orderProduct->product->price
                                    ?? ''}}</a>
                            </td>
                            
                            <td>
                                <span class="label label-lg label-light-info label-inline">{{$orderProduct->product->view
                                    ??'-'}}</span>
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

@endsection
