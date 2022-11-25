@canany(['Read-Roles','Create-Role','Read-Permissions'])
							<li class="menu-section">
								<h4 class="menu-text">{{__('cms.roles_permissions')}}</h4>
								<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
							</li>
							@canany(['Read-Roles','Create-Role'])
							<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
								<a href="javascript:;" class="menu-link menu-toggle">
									<span class="svg-icon menu-icon">
										<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Shield-thunder.svg--><svg
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path
													d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
													fill="#000000" opacity="0.3" />
												<polygon fill="#000000" opacity="0.3"
													points="11.3333333 18 16 11.4 13.6666667 11.4 13.6666667 7 9 13.6 11.3333333 13.6" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-text">{{__('cms.roles')}}</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu">
									<i class="menu-arrow"></i>
									<ul class="menu-subnav">
										<li class="menu-item menu-item-parent" aria-haspopup="true">
											<span class="menu-link">
												<span class="menu-text">{{__('cms.roles')}}</span>
											</span>
										</li>
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('roles.create')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.create')}}</span>
											</a>
										</li>
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('roles.index')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.index')}}</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							@endcanany
							@canany(['Read-Permissions'])
							<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
								<a href="javascript:;" class="menu-link menu-toggle">
									<span class="svg-icon menu-icon">
										<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Clipboard.svg--><svg
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path
													d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
													fill="#000000" opacity="0.3" />
												<path
													d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
													fill="#000000" />
												<rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2"
													rx="1" />
												<rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2"
													rx="1" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-text">{{__('cms.permissions')}}</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu">
									<i class="menu-arrow"></i>
									<ul class="menu-subnav">
										<li class="menu-item menu-item-parent" aria-haspopup="true">
											<span class="menu-link">
												<span class="menu-text">{{__('cms.permissions')}}</span>
											</span>
										</li>
										<li class="menu-item" aria-haspopup="true">
											<a href="{{route('permissions.index')}}" class="menu-link">
												<i class="menu-bullet menu-bullet-dot">
													<span></span>
												</i>
												<span class="menu-text">{{__('cms.index')}}</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							@endcanany
							@endcanany

       
       @canany(['Read-Admins', 'Create-Admin', 'Read-Users', 'Create-User'])
           <li class="menu-section">
               <h4 class="menu-text">{{ __('cms.hr') }}</h4>
               <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
           </li>
           @canany(['Read-Admins', 'Create-Admin'])
               <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                   <a href="javascript:;" class="menu-link menu-toggle">
                       <span class="svg-icon menu-icon">
                           <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Shield-user.svg--><svg
                               xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                               height="24px" viewBox="0 0 24 24" version="1.1">
                               <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                   <rect x="0" y="0" width="24" height="24" />
                                   <path
                                       d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                       fill="#000000" opacity="0.3" />
                                   <path
                                       d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                       fill="#000000" opacity="0.3" />
                                   <path
                                       d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                       fill="#000000" opacity="0.3" />
                               </g>
                           </svg>
                           <!--end::Svg Icon-->
                       </span>

                       <span class="menu-text">{{ __('cms.admins') }}</span>
                       <i class="menu-arrow"></i>
                   </a>
                   <div class="menu-submenu">
                       <i class="menu-arrow"></i>
                       <ul class="menu-subnav">
                           <li class="menu-item menu-item-parent" aria-haspopup="true">
                               <span class="menu-link">
                                   <span class="menu-text">{{ __('cms.admins') }}</span>
                               </span>
                           </li>
                           @can('Create-Admin')
                               <li class="menu-item" aria-haspopup="true">
                                   <a href="{{ route('admins.create') }}" class="menu-link">
                                       <i class="menu-bullet menu-bullet-dot">
                                           <span></span>
                                       </i>
                                       <span class="menu-text">{{ __('cms.create') }}</span>
                                   </a>
                               </li>
                           @endcan
                           @can('Read-Admins')
                               <li class="menu-item" aria-haspopup="true">
                                   <a href="{{ route('admins.index') }}" class="menu-link">
                                       <i class="menu-bullet menu-bullet-dot">
                                           <span></span>
                                       </i>
                                       <span class="menu-text">{{ __('cms.index') }}</span>
                                   </a>
                               </li>
                           @endcan
                       </ul>
                   </div>
               </li>
           @endcanany
       @endcanany



       @canany(['Read-ServiceStudio', 'Create-ServiceStudio'])
           <li class="menu-section">
               <h4 class="menu-text">{{ __('cms.content_management') }}</h4>
               <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
           </li>
           @canany(['Read-ServiceStudio', 'Create-ServiceStudio'])
               <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                   <a href="javascript:;" class="menu-link menu-toggle">
                       <span class="svg-icon menu-icon">
                           <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Shield-user.svg--><svg
                               xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                               height="24px" viewBox="0 0 24 24" version="1.1">
                               <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                   <rect x="0" y="0" width="24" height="24" />
                                   <path
                                       d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                       fill="#000000" opacity="0.3" />
                                   <path
                                       d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                       fill="#000000" opacity="0.3" />
                                   <path
                                       d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                       fill="#000000" opacity="0.3" />
                               </g>
                           </svg>
                           <!--end::Svg Icon-->
                       </span>

                       <span class="menu-text">{{ __('cms.serviceStudio') }}</span>
                       <i class="menu-arrow"></i>
                   </a>
                   <div class="menu-submenu">
                       <i class="menu-arrow"></i>
                       <ul class="menu-subnav">
                           <li class="menu-item menu-item-parent" aria-haspopup="true">
                               <span class="menu-link">
                                   <span class="menu-text">{{ __('cms.serviceStudio') }}</span>
                               </span>
                           </li>
                           @can('Create-ServiceStudio')
                               <li class="menu-item" aria-haspopup="true">
                                   <a href="{{ route('service_studios.create') }}" class="menu-link">
                                       <i class="menu-bullet menu-bullet-dot">
                                           <span></span>
                                       </i>
                                       <span class="menu-text">{{ __('cms.create') }}</span>
                                   </a>
                               </li>
                           @endcan
                           @can('Read-ServiceStudio')
                               <li class="menu-item" aria-haspopup="true">
                                   <a href="{{ route('service_studios.index') }}" class="menu-link">
                                       <i class="menu-bullet menu-bullet-dot">
                                           <span></span>
                                       </i>
                                       <span class="menu-text">{{ __('cms.index') }}</span>
                                   </a>
                               </li>
                           @endcan
                       </ul>
                   </div>
               </li>
           @endcanany
       @endcanany



       @canany(['Read-Countries', 'Create-Country', 'Update-Country', 'Delete-Country',
       'Read-Cities', 'Create-City', 'Update-City', 'Delete-City'])
           <li class="menu-section">
               <h4 class="menu-text">{{ __('cms.settings') }}</h4>
               <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
           </li>
           @canany(['Read-Countries', 'Create-Country'])
               <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                   <a href="javascript:;" class="menu-link menu-toggle">
                       <span class="svg-icon menu-icon">
                           <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Shield-user.svg--><svg
                               xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                               height="24px" viewBox="0 0 24 24" version="1.1">
                               <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                   <rect x="0" y="0" width="24" height="24" />
                                   <path
                                       d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                       fill="#000000" opacity="0.3" />
                                   <path
                                       d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                       fill="#000000" opacity="0.3" />
                                   <path
                                       d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                       fill="#000000" opacity="0.3" />
                               </g>
                           </svg>
                           <!--end::Svg Icon-->
                       </span>

                       <span class="menu-text">{{ __('cms.countries') }}</span>
                       <i class="menu-arrow"></i>
                   </a>
                   <div class="menu-submenu">
                       <i class="menu-arrow"></i>
                       <ul class="menu-subnav">
                           <li class="menu-item menu-item-parent" aria-haspopup="true">
                               <span class="menu-link">
                                   <span class="menu-text">{{ __('cms.countries') }}</span>
                               </span>
                           </li>
                           @can('Create-Country')
                               <li class="menu-item" aria-haspopup="true">
                                   <a href="{{ route('countries.create') }}" class="menu-link">
                                       <i class="menu-bullet menu-bullet-dot">
                                           <span></span>
                                       </i>
                                       <span class="menu-text">{{ __('cms.create') }}</span>
                                   </a>
                               </li>
                           @endcan
                           @can('Read-Countries')
                               <li class="menu-item" aria-haspopup="true">
                                   <a href="{{ route('countries.index') }}" class="menu-link">
                                       <i class="menu-bullet menu-bullet-dot">
                                           <span></span>
                                       </i>
                                       <span class="menu-text">{{ __('cms.index') }}</span>
                                   </a>
                               </li>
                           @endcan
                       </ul>
                   </div>
               </li>
           @endcanany

           @canany(['Read-Cities', 'Create-City'])
               <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                   <a href="javascript:;" class="menu-link menu-toggle">
                       <span class="svg-icon menu-icon">
                           <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Shield-user.svg--><svg
                               xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                               height="24px" viewBox="0 0 24 24" version="1.1">
                               <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                   <rect x="0" y="0" width="24" height="24" />
                                   <path
                                       d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                       fill="#000000" opacity="0.3" />
                                   <path
                                       d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                       fill="#000000" opacity="0.3" />
                                   <path
                                       d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                       fill="#000000" opacity="0.3" />
                               </g>
                           </svg>
                           <!--end::Svg Icon-->
                       </span>

                       <span class="menu-text">{{ __('cms.cities') }}</span>
                       <i class="menu-arrow"></i>
                   </a>
                   <div class="menu-submenu">
                       <i class="menu-arrow"></i>
                       <ul class="menu-subnav">
                           <li class="menu-item menu-item-parent" aria-haspopup="true">
                               <span class="menu-link">
                                   <span class="menu-text">{{ __('cms.cities') }}</span>
                               </span>
                           </li>
                           @can('Create-City')
                               <li class="menu-item" aria-haspopup="true">
                                   <a href="{{ route('cities.create') }}" class="menu-link">
                                       <i class="menu-bullet menu-bullet-dot">
                                           <span></span>
                                       </i>
                                       <span class="menu-text">{{ __('cms.create') }}</span>
                                   </a>
                               </li>
                           @endcan
                           @can('Read-Cities')
                               <li class="menu-item" aria-haspopup="true">
                                   <a href="{{ route('cities.index') }}" class="menu-link">
                                       <i class="menu-bullet menu-bullet-dot">
                                           <span></span>
                                       </i>
                                       <span class="menu-text">{{ __('cms.index') }}</span>
                                   </a>
                               </li>
                           @endcan
                       </ul>
                   </div>
               </li>
           @endcanany

           @canany(['Read-Regions', 'Create-Region'])
               <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                   <a href="javascript:;" class="menu-link menu-toggle">
                       <span class="svg-icon menu-icon">
                           <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Shield-user.svg--><svg
                               xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                               height="24px" viewBox="0 0 24 24" version="1.1">
                               <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                   <rect x="0" y="0" width="24" height="24" />
                                   <path
                                       d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                       fill="#000000" opacity="0.3" />
                                   <path
                                       d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                       fill="#000000" opacity="0.3" />
                                   <path
                                       d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                       fill="#000000" opacity="0.3" />
                               </g>
                           </svg>
                           <!--end::Svg Icon-->
                       </span>

                       <span class="menu-text">{{ __('cms.regions') }}</span>
                       <i class="menu-arrow"></i>
                   </a>
                   <div class="menu-submenu">
                       <i class="menu-arrow"></i>
                       <ul class="menu-subnav">
                           <li class="menu-item menu-item-parent" aria-haspopup="true">
                               <span class="menu-link">
                                   <span class="menu-text">{{ __('cms.regions') }}</span>
                               </span>
                           </li>
                           @can('Create-Region')
                               <li class="menu-item" aria-haspopup="true">
                                   <a href="{{ route('regions.create') }}" class="menu-link">
                                       <i class="menu-bullet menu-bullet-dot">
                                           <span></span>
                                       </i>
                                       <span class="menu-text">{{ __('cms.create') }}</span>
                                   </a>
                               </li>
                           @endcan
                           @can('Read-Regions')
                               <li class="menu-item" aria-haspopup="true">
                                   <a href="{{ route('regions.index') }}" class="menu-link">
                                       <i class="menu-bullet menu-bullet-dot">
                                           <span></span>
                                       </i>
                                       <span class="menu-text">{{ __('cms.index') }}</span>
                                   </a>
                               </li>
                           @endcan
                       </ul>
                   </div>
               </li>
           @endcanany
       @endcanany

       @if (auth('admin')->check())
           <li class="menu-item" aria-haspopup="true">
               <a href="{{ route('cms.profile.personal-information') }}" class="menu-link">
                   <span class="svg-icon menu-icon">
                       <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Design\Edit.svg--><svg
                           xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                           height="24px" viewBox="0 0 24 24" version="1.1">
                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                               <rect x="0" y="0" width="24" height="24" />
                               <path
                                   d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                   fill="#000000" fill-rule="nonzero"
                                   transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                               <rect fill="#000000" opacity="0.3" x="5" y="20" width="15"
                                   height="2" rx="1" />
                           </g>
                       </svg>
                       <!--end::Svg Icon-->
                   </span>
                   <span class="menu-text">{{ __('cms.edit_profile') }}</span>
               </a>
           </li>
       @endif

       <li class="menu-item" aria-haspopup="true">
           <a href="{{ route('cms.logout') }}" class="menu-link">
               <span class="svg-icon menu-icon">
                   <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Electric\Shutdown.svg--><svg
                       xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                       height="24px" viewBox="0 0 24 24" version="1.1">
                       <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <rect x="0" y="0" width="24" height="24" />
                           <path
                               d="M7.62302337,5.30262097 C8.08508802,5.000107 8.70490146,5.12944838 9.00741543,5.59151303 C9.3099294,6.05357769 9.18058801,6.67339112 8.71852336,6.97590509 C7.03468892,8.07831239 6,9.95030239 6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,9.99549229 17.0108275,8.15969002 15.3875704,7.04698597 C14.9320347,6.73472706 14.8158858,6.11230651 15.1281448,5.65677076 C15.4404037,5.20123501 16.0628242,5.08508618 16.51836,5.39734508 C18.6800181,6.87911023 20,9.32886071 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,9.26852332 5.38056879,6.77075716 7.62302337,5.30262097 Z"
                               fill="#000000" fill-rule="nonzero" />
                           <rect fill="#000000" opacity="0.3" x="11" y="3" width="2"
                               height="10" rx="1" />
                       </g>
                   </svg>
                   <!--end::Svg Icon-->
               </span>
               <span class="menu-text">{{ __('cms.logout') }}</span>
           </a>
       </li>
