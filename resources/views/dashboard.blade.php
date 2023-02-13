<x-app-layout>
    <x-slot name="header">
        <aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li><!-- End Dashboard Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-menu-button-wide"></i><span>Tiket</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                        <li>
                            <a href="{{url('admin/ticket/1')}}">
                                <i class="bi bi-circle"></i><span><span class="card-title">Le 1<span> | hours ≥ 120</span></span></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/ticket/2')}}">
                                <i class="bi bi-circle"></i><span><span class="card-title">Le 2<span> | 100' ≥ 119 </span></span></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/ticket/3')}}">
                                <i class="bi bi-circle"></i><span><span class="card-title">Le 3<span> | 0 ≥ 36 &</span></span></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/ticket/4')}}">
                                <i class="bi bi-circle"></i><span><span class="card-title">Le 4<span> | 37 ≥ 98 &</span></span></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/ticket/5')}}">
                                <i class="bi bi-circle"></i><span><span class="card-title">Le 5<span> | 37 ≥ 98</span></span></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/ticket/6')}}">
                                <i class="bi bi-circle"></i><span><span class="card-title">Le 6<span> | 0 ≥ 36</span></span></span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Ticket Nav -->


                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{url('admin/ticket/7')}}">
                        <i class="bi bi-card-list"></i>
                        <span>Solved</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{url('admin/sb')}}">
                        <i class="bi bi-card-list"></i>
                        <span>Subject</span>
                    </a>
                </li>


            </ul>

        </aside><!-- End Sidebar-->
    </x-slot>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>

        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">

                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Name</div>
                                        <div class="col-lg-9 col-md-8">{{Auth::user()->name}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{Auth::user()->email}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Major</div>
                                        <div class="col-lg-9 col-md-8">{{Auth::user()->major}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Le1 | Completion by the end of the semester</div>
                                        <div class="col-lg-9 col-md-8">{{count($level1)}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Le2 | Completion by the end of the year</div>
                                        <div class="col-lg-9 col-md-8">{{count($level2)}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Le3 | new student and <span class="text-danger">requirement</span></div>
                                        <div class="col-lg-9 col-md-8">{{count($level3)}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Le4 | junior ٍstudent and <span class="text-danger">requirement</span></div>
                                        <div class="col-lg-9 col-md-8">{{count($level4)}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Le5 | junior ٍstudent</div>
                                        <div class="col-lg-9 col-md-8">{{count($level5)}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Le6 | new student</div>
                                        <div class="col-lg-9 col-md-8">{{count($level6)}}</div>
                                    </div>

                                </div>
                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

</x-app-layout>
