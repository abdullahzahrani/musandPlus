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
                    <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-menu-button-wide"></i><span>Tiket</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">

                        <li>
                            <a href="{{url('admin/ticket/1')}}" @if($id==1)class="active"@endif>
                                <i class="bi bi-circle"></i><span><span class="card-title">Le 1<span> | hours ≥ 120</span></span></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/ticket/2')}}" @if($id==2)class="active"@endif>
                                <i class="bi bi-circle"></i><span><span class="card-title">Le 2<span> | 100' ≥ 119 </span></span></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/ticket/3')}}" @if($id==3)class="active"@endif>
                                <i class="bi bi-circle"></i><span><span class="card-title">Le 3<span> | 0 ≥ 36 &</span></span></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/ticket/4')}}" @if($id==4)class="active"@endif>
                                <i class="bi bi-circle"></i><span><span class="card-title">Le 4<span> | 37 ≥ 98 &</span></span></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/ticket/5')}}" @if($id==5)class="active"@endif>
                                <i class="bi bi-circle"></i><span><span class="card-title">Le 5<span> | 37 ≥ 98</span></span></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/ticket/6')}}" @if($id==6)class="active"@endif>
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
        @if(session()->get('success'))
            <div class="alert alert-danger">
                {{ session()->get('success') }}
            </div>
        @endif
            @if(session()->get('wrong'))
                <div class="alert alert-danger">
                    {{ session()->get('wrong') }}
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
                                    <th scope="col">Name</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Hours</th>
                                    <th scope="col">Current Hours</th>
                                    <th scope="col">#Requirement</th>
                                    <th scope="col">Note  Ticket</th>
                                    <th scope="col">Reason Ticket</th>
                                    <th scope="col">Is_completed ?</th>
                                    <th scope="col" colspan="2">Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($level1 as $level1 => $key)
                                <tr>
                                    <th scope="row">{{$level1+1}}</th>
                                    <td>{{($key->getUser->name)}}</td>
                                    <th scope="row">{{($key->getUser->id)}}</th>
                                    <td>{{($key->subject)}}</td>
                                    <th scope="row" style="color: blue"><a href="{{route('admin.trs',['id'=>$key->user_id])}}"> {{ check6($key->getUser->id)}}</a></th>
                                    <th scope="row"><a style="color: blue" href="{{route('admin.hours',['id'=>$key->user_id,'sub'=>$key->subject])}}">{{check7($key->user_id)}}</a></th>

                                    <th scope="row">{{($key->requirement)}}</th>
                                    <td>{{($key->reasonTicket)}}</td>
                                    <td>{{($key->noteTicket)}}</td>

                                    @if(chech3($key->subject,$key->user_id) =='no')
                                    <td><a href="{{route('admin.trs',['id'=>$key->user_id,'sub'=>$key->subject])}}">
                                            <span class="badge bg-danger">No</span></a></td>
                                    @else
                                        <td><a href="{{route('admin.trs',['id'=>$key->user_id,'sub'=>$key->subject])}}">
                                                <span class="badge bg-success">Yes</span></a></td></a></td>
                                    @endif
                                    <td>  <form action="{{ route('admin.accept', $key->id)}}" method="post">
                                        @csrf
                                       <button class="badge bg-success border-0" style="font-size:1.1rem"><i class="bi bi-check"></i></button></form></td>
                                    <td>
                                        <form action="{{url('admin/softDell/'.$key->id)}}" method="post">
                                            @csrf
                                            <button class="badge bg-danger border-0" style="font-size:1.1rem"><i class="bi bi-x"></i></button>  </form>
                                    </td>
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

