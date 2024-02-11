<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="dropdown header-profile">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                    <img style="padding: 8px;"src="{{ URL::asset('dashboard/images/profile/pic1.png') }}" width="20"
                        alt="">
                    <div class="header-info ms-3">
                        <span class="font-w600 "><b>{{ Auth::user()->email }}</b></span>
                        <small class="text-end font-w400">{{ Auth::user()->roleName }}</small>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="" class="dropdown-item ai-icon">
                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18"
                            height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span class="ms-2">Profile </span>
                    </a>
                    <a href="page-error-404.html" class="dropdown-item ai-icon" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
                            height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4">

                            </path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12">

                            </line>
                        </svg>
                        Logout
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            <span class="ms-2">Logout </span>
                        </form>
                    </a>
                </div>
            </li>
            <li class="{{ set_active(['/statistics']) }}">
                <a href="{{ route('admin.statistics') }}" class="ai-icon {{ set_active(['/']) }}" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">الاحصائيات</span>
                </a>
            </li>
            <li class="{{ set_active(['/']) }}">
                <a href="{{ route('welcome') }}" class="ai-icon {{ set_active(['/']) }}" aria-expanded="false">
                    <i class="flaticon-025-home"></i>
                    <span class="nav-text">الصفحة الرئيسية</span>
                </a>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-041-graph"></i>
                    <span class="nav-text">بيانات الموقع</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="index.html"></a></li>
                    @can('شركاء النجاح')
                        <li><a href="{{ route('admin.partners.index') }}">شركاء النجاح</a></li>
                    @endcan
                    @can('اجتماعا المجلس')
                        <li><a href="{{ route('admin.councils.index') }}">اجتماعات المجلس</a></li>
                    @endcan
                    @can('الحوكمة')
                        <li><a href="{{ route('admin.governances.index') }}">الحوكمة</a></li>
                    @endcan
                    @can('روابط صديقة')
                    <li><a href="{{ route('admin.links.index') }}">روابط صديقة</a></li>
                @endcan
                </ul>
            </li>
            @can('عارض الصور')
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-045-heart"></i>
                        <span class="nav-text">عارض الصور</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="index.html"></a></li>
                        <li><a href="{{ route('admin.sliders.index') }}">كافة العروض</a></li>
                        <li><a href="{{ route('admin.sliders.create') }}">اضافة عرض</a></li>
                    </ul>
                </li>
            @endcan
            @can('حملات العمرة')
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-022-copy"></i>
                        <span class="nav-text">حملات العمرة</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="index.html"></a></li>
                        <li><a href="{{ route('admin.muamtaris') }}">طلبات التسجيل</a></li>
                        <li><a href="{{ route('admin.umrahs.index') }}">كافة الحملات</a></li>
                        <li><a href="{{ route('admin.umrahs.create') }}">اضافة حملة</a></li>
                    </ul>
                </li>
            @endcan
            @can('الأخبار')
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-022-copy"></i>
                        <span class="nav-text">الأخبار</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="index.html"></a></li>

                        <li><a href="{{ route('admin.news.index') }}">كافة الأخبار</a></li>


                        <li><a href="{{ route('admin.news.create') }}">اضافة خبر</a></li>

                    </ul>
                </li>
            @endcan
            @can('الفعاليات')
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-086-star"></i>
                        <span class="nav-text">الفعاليات</span>
                    </a>
                    <ul aria-expanded="false">

                        <li><a href="{{ route('admin.events.index') }}">كافة الفعاليات</a></li>

                        <li><a href="{{ route('admin.events.create') }}">اضافة فعالية</a></li>

                    </ul>
                </li>
            @endcan
            @can('المشاريع')
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-043-menu"></i>
                        <span class="nav-text">المشاريع</span>
                    </a>
                    <ul aria-expanded="false">


                        <li><a href="{{ route('admin.projects.index') }}">كافة المشاريع</a></li>

                        <li><a href="{{ route('admin.projects.create') }}">اضافة مشروع</a></li>

                    </ul>
                </li>
            @endcan
            @can('ادارة المستخدمين')
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-user-9"></i>
                        <span class="nav-text">ادارة المستخدمين</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('admin.sections.index') }}">الأقسام</a></li>
                        <li><a href="{{ route('admin.roles.index') }}">الأدوار</a></li>
                        <li><a href="{{ route('admin.employees.index') }}">الموظفين</a></li>
                        <li><a href="{{ route('admin.users.index') }}">المستخدمين</a></li>
                    </ul>
                </li>
            @endcan
            @can('عن الجمعية')
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-013-checkmark"></i>
                        <span class="nav-text">عن الجمعية</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('admin.contacts.index') }}">بيانات التواصل</a></li>
                        <li><a href="{{ route('admin.videos.index') }}">قناة الجمعية</a></li>
                        <li><a href="{{ route('admin.images.index') }}">معرض الصور</a></li>
                        @can('ملف الجمعية')
                            <li><a href="{{ route('admin.charity_profile') }}">الملف التعريفي</a></li>
                        @endcan

                    </ul>
                </li>
            @endcan
            @can('الملف التعريفي')
                <li>
                    <a href="{{ route('admin.profile') }}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-user-9"></i>
                        <span class="nav-text">الملف التعريفي</span>
                    </a>

                </li>
            @endcan
        </ul>
        <div class="copyright">
            <p><strong>جمعية الدعوة بالمزاحمية</strong> © 2024 جميع حقوق النشر محفوظة</p>
            <p class="fs-12">تطوير و تصميم<span class="heart"></span> م.أحمد</p>
        </div>
    </div>
</div>
