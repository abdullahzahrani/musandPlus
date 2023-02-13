<x-student-layout>
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
                    <a class="nav-link collapsed" href="{{route('student.ticket')}}">
                        <i class="bi bi-card-list"></i>
                        <span>Ticket</span>
                    </a>
                </li><!-- End Dashboard Nav -->


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
                                        <div class="col-lg-9 col-md-8">{{Auth::guard('student')->user()->name}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{Auth::guard('student')->user()->email}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Completed Hours</div>
                                        <div class="col-lg-9 col-md-8">{{Auth::guard('student')->user()->hours}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Current Hours</div>
                                        <div class="col-lg-9 col-md-8">{{check7(Auth::guard('student')->user()->id) }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Major</div>
                                        <div class="col-lg-9 col-md-8">{{Auth::guard('student')->user()->major}}</div>
                                    </div>


                                </div>



                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

</x-student-layout>
