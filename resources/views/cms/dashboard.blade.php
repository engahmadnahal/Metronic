@extends('cms.parent')


@section('page-name',__('cms.dashboard'))
@section('main-page',__('cms.app_name'))
@section('sub-page',__('cms.dashboard'))
@section('content')
<!--begin::Dashboard-->
<!--begin::Row-->

@if (auth('admin')->check())
<div class="row">
    <div class="col-xl-3">
        <!--begin::Stats Widget 13-->
        <a href="#" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <path
                                d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                            <path
                                d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z"
                                fill="#000000"></path>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                <div class="text-inverse-danger font-weight-bolder font-size-h6 mb-2 mt-5">{{__('cms.store_number')}}
                    (1)
                </div>
                <div class="font-weight-bold text-inverse-danger font-size-sm">{{__('cms.register_today')}}
                    [2]</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Stats Widget 13-->
    </div>
    <div class="col-xl-3">
        <!--begin::Stats Widget 14-->
        <a href="#" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\User.svg--><svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path
                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path
                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                <div class="text-inverse-danger font-weight-bolder font-size-h6 mb-2 mt-5">{{__('cms.user_number')}}
                    (2)
                </div>
                <div class="font-weight-bold text-inverse-danger font-size-sm">{{__('cms.register_today')}}
                    [3]</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Stats Widget 14-->
    </div>
    <div class="col-xl-3">
        <!--begin::Stats Widget 15-->
        <a href="#" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Mail-error.svg--><svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <path
                                d="M12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.98630124,11 4.48466491,11.0516454 4,11.1500272 L4,7 C4,5.8954305 4.8954305,5 6,5 L20,5 C21.1045695,5 22,5.8954305 22,7 L22,16 C22,17.1045695 21.1045695,18 20,18 L12.9835977,18 Z M19.1444251,6.83964668 L13,10.1481833 L6.85557487,6.83964668 C6.4908718,6.6432681 6.03602525,6.77972206 5.83964668,7.14442513 C5.6432681,7.5091282 5.77972206,7.96397475 6.14442513,8.16035332 L12.6444251,11.6603533 C12.8664074,11.7798822 13.1335926,11.7798822 13.3555749,11.6603533 L19.8555749,8.16035332 C20.2202779,7.96397475 20.3567319,7.5091282 20.1603533,7.14442513 C19.9639747,6.77972206 19.5091282,6.6432681 19.1444251,6.83964668 Z"
                                fill="#000000" />
                            <path
                                d="M6.5,14 C7.05228475,14 7.5,14.4477153 7.5,15 L7.5,17 C7.5,17.5522847 7.05228475,18 6.5,18 C5.94771525,18 5.5,17.5522847 5.5,17 L5.5,15 C5.5,14.4477153 5.94771525,14 6.5,14 Z M6.5,21 C5.94771525,21 5.5,20.5522847 5.5,20 C5.5,19.4477153 5.94771525,19 6.5,19 C7.05228475,19 7.5,19.4477153 7.5,20 C7.5,20.5522847 7.05228475,21 6.5,21 Z"
                                fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                <div class="text-inverse-danger font-weight-bolder font-size-h6 mb-2 mt-5">
                    {{__('cms.contact_us_message')}} (2)</div>
                <div class="font-weight-bold text-inverse-danger font-size-sm">{{__('cms.send_today')}}
                    [4]</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Stats Widget 15-->
    </div>

    <div class="col-xl-3">
        <!--begin::Stats Widget 18-->
        <a href="#" class="card card-custom bg-dark bg-hover-state-dark card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Cart2.svg--><svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <path
                                d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path
                                d="M3.28077641,9 L20.7192236,9 C21.2715083,9 21.7192236,9.44771525 21.7192236,10 C21.7192236,10.0817618 21.7091962,10.163215 21.6893661,10.2425356 L19.5680983,18.7276069 C19.234223,20.0631079 18.0342737,21 16.6576708,21 L7.34232922,21 C5.96572629,21 4.76577697,20.0631079 4.43190172,18.7276069 L2.31063391,10.2425356 C2.17668518,9.70674072 2.50244587,9.16380623 3.03824078,9.0298575 C3.11756139,9.01002735 3.1990146,9 3.28077641,9 Z M12,12 C11.4477153,12 11,12.4477153 11,13 L11,17 C11,17.5522847 11.4477153,18 12,18 C12.5522847,18 13,17.5522847 13,17 L13,13 C13,12.4477153 12.5522847,12 12,12 Z M6.96472382,12.1362967 C6.43125772,12.2792385 6.11467523,12.8275755 6.25761704,13.3610416 L7.29289322,17.2247449 C7.43583503,17.758211 7.98417199,18.0747935 8.51763809,17.9318517 C9.05110419,17.7889098 9.36768668,17.2405729 9.22474487,16.7071068 L8.18946869,12.8434035 C8.04652688,12.3099374 7.49818992,11.9933549 6.96472382,12.1362967 Z M17.0352762,12.1362967 C16.5018101,11.9933549 15.9534731,12.3099374 15.8105313,12.8434035 L14.7752551,16.7071068 C14.6323133,17.2405729 14.9488958,17.7889098 15.4823619,17.9318517 C16.015828,18.0747935 16.564165,17.758211 16.7071068,17.2247449 L17.742383,13.3610416 C17.8853248,12.8275755 17.5687423,12.2792385 17.0352762,12.1362967 Z"
                                fill="#000000" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                <div class="text-inverse-danger font-weight-bolder font-size-h6 mb-2 mt-5">{{__('cms.products_number')}}
                    (5)</div>
                <div class="font-weight-bold text-inverse-danger font-size-sm">{{__('cms.add_today')}}
                    [4]</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Stats Widget 18-->
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <!--begin::Mixed Widget 4-->
        <div class="card card-custom bg-radial-gradient-danger gutter-b card-stretch">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title font-weight-bolder text-white">Sales Progress</h3>
                <div class="card-toolbar">

                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body d-flex flex-column p-0">
                <!--begin::Chart-->
                <div id="kt_mixed_widget_4_chart" style="height: 200px"></div>
                <!--end::Chart-->
                <!--begin::Stats-->
                <div class="card-spacer bg-white card-rounded flex-grow-1">
                    <!--begin::Row-->
                    <div class="row m-0">
                        <div class="col px-8 py-6 mr-8">
                            <div class="font-size-sm text-muted font-weight-bold">Average Sale</div>
                            <div class="font-size-h4 font-weight-bolder">$650</div>
                        </div>
                        <div class="col px-8 py-6">
                            <div class="font-size-sm text-muted font-weight-bold">Commission</div>
                            <div class="font-size-h4 font-weight-bolder">$233,600</div>
                        </div>
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row m-0">
                        <div class="col px-8 py-6 mr-8">
                            <div class="font-size-sm text-muted font-weight-bold">Annual Taxes</div>
                            <div class="font-size-h4 font-weight-bolder">$29,004</div>
                        </div>
                        <div class="col px-8 py-6">
                            <div class="font-size-sm text-muted font-weight-bold">Annual Income</div>
                            <div class="font-size-h4 font-weight-bolder">$1,480,00</div>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Stats-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Mixed Widget 4-->
    </div>
    <div class="col-xl-6">
        <!--begin::Mixed Widget 5-->
        <div class="card card-custom bg-radial-gradient-primary gutter-b card-stretch">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title font-weight-bolder text-white">Sales Progress</h3>
                <div class="card-toolbar">

                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body d-flex flex-column p-0">
                <!--begin::Chart-->
                <div id="kt_mixed_widget_5_chart" style="height: 200px"></div>
                <!--end::Chart-->
                <!--begin::Stats-->
                <div class="card-spacer bg-white card-rounded flex-grow-1">
                    <!--begin::Row-->
                    <div class="row m-0">
                        <div class="col px-8 py-6 mr-8">
                            <div class="font-size-sm text-muted font-weight-bold">Average Sale</div>
                            <div class="font-size-h4 font-weight-bolder">$650</div>
                        </div>
                        <div class="col px-8 py-6">
                            <div class="font-size-sm text-muted font-weight-bold">Commission</div>
                            <div class="font-size-h4 font-weight-bolder">$233,600</div>
                        </div>
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row m-0">
                        <div class="col px-8 py-6 mr-8">
                            <div class="font-size-sm text-muted font-weight-bold">Annual Taxes</div>
                            <div class="font-size-h4 font-weight-bolder">$29,004</div>
                        </div>
                        <div class="col px-8 py-6">
                            <div class="font-size-sm text-muted font-weight-bold">Annual Income</div>
                            <div class="font-size-h4 font-weight-bolder">$1,480,00</div>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Stats-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Mixed Widget 5-->
    </div>

</div>

<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{__('cms.last_stores_register')}}</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">{{__('cms.more_than')}} 4+
                {{__('cms.stores')}}</span>
        </h3>

    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-0 pb-3">
        <div class="tab-content">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                    <thead>
                        <tr class="text-left text-uppercase">
                            <th style="min-width: 250px" class="pl-7">
                                <span class="text-dark-75">{{__('cms.name')}}</span>
                            </th>
                            <th style="min-width: 100px">{{__('cms.category')}}</th>
                            <th style="min-width: 100px">{{__('cms.mobile')}}</th>
                            <th style="min-width: 100px">{{__('cms.type')}}</th>
                            <th style="min-width: 130px">{{__('cms.country')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($stores as $store)
                        <tr>
                            <td class="pl-0 py-8">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50 symbol-light mr-4">
                                        <span class="symbol-label">
                                            <img src="{{Storage::url($store->logo)}}" class="h-75 align-self-end"
                                                alt="">
                                        </span>
                                    </div>
                                    <div>
                                        <a href="#"
                                            class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$store->name}}</a>
                                        <span class="text-muted font-weight-bold d-block">{{$store->email}}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span
                                    class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$store->storeCategory->title
                                    ?? '-'}}</span>
                            </td>
                            <td>
                                <span
                                    class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$store->mobile}}</span>
                            </td>
                            <td>
                                <span
                                    class="text-dark-75 font-weight-bolder d-block font-size-lg">{{__('cms.'.$store->type)}}</span>
                            </td>
                            <td>
                                <span
                                    class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$store->region->country->name
                                    ?? '-'}}</span>
                            </td>

                        </tr>
                        @endforeach --}}

                    </tbody>
                </table>
            </div>
            <!--end::Table-->
        </div>
    </div>
    <!--end::Body-->
</div>
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{__('cms.last_user_register')}}</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">{{__('cms.more_than')}} 4+
                {{__('cms.users')}}</span>
        </h3>

    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-0 pb-3">
        <div class="tab-content">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                    <thead>
                        <tr class="text-left text-uppercase">
                            <th style="min-width: 250px" class="pl-7">
                                <span class="text-dark-75">{{__('cms.name')}}</span>
                            </th>
                            <th style="min-width: 100px">{{__('cms.type')}}</th>
                            <th style="min-width: 100px">{{__('cms.phone')}}</th>
                            <th style="min-width: 100px">{{__('cms.gender')}}</th>
                            <th style="min-width: 130px">{{__('cms.birth_date')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($users as $user)
                        <tr>
                            <td class="pl-0 py-8">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50 symbol-light mr-4">
                                        <span class="symbol-label">
                                            <img src="{{Storage::url($user->image)}}" class="h-75 align-self-end"
                                                alt="">
                                        </span>
                                    </div>
                                    <div>
                                        <a href="#"
                                            class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                            {{$user->first_name}} {{$user->last_name}}</a>
                                        <span class="text-muted font-weight-bold d-block">{{$user->email}}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span
                                    class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->account_type}}</span>
                            </td>
                            <td>
                                <span
                                    class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->phone_number}}</span>
                            </td>
                            <td>
                                <span
                                    class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->gender_key}}</span>
                            </td>
                            <td>
                                <span
                                    class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->birth_date}}</span>
                            </td>

                        </tr>
                        @endforeach --}}

                    </tbody>
                </table>
            </div>
            <!--end::Table-->
        </div>
    </div>
    <!--end::Body-->
</div>

<!--end::Row-->
@endif
<!--end::Dashboard-->
@endsection