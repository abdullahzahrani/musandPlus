<x-app-layout>
    <x-slot name="header">
        <aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{url('admin/dashboard')}}">
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
                    <a class="nav-link" href="{{url('admin/sb')}}">
                        <i class="bi bi-card-list"></i>
                        <span>Subject</span>
                    </a>
                </li>


            </ul>

        </aside><!-- End Sidebar-->

    </x-slot>

    <main id="main" class="main">
        @if(session()->get('success'))
            <div class="alert alert-danger">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="pagetitle">
            <h1>Tickets</h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="card-body py-3">

                            <table class="table table-borderless datatable">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Hours</th>
                                    <th scope="col">ClassNumber</th>
                                    <th scope="col">Instructor</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($level1 as $level1 => $key)
                                    <tr>
                                        <th scope="row">{{$level1+1}}</th>
                                        <td>{{($key->subject)}}</td>
                                        <th scope="row">{{($key->hours)}}</th>
                                        <td>{{($key->classNumber)}}</td>
                                        <th scope="row">{{ ($key->instructor)}}</th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Recent Sales -->



            </div>
        </section>

    </main><!-- End #main -->

</x-app-layout>

