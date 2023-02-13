<x-student-layout>
    <x-slot name="header">
        <aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('student.dashboard')}}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li><!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <i class="bi bi-card-list"></i>
                        <span>Ticket</span>
                    </a>
                </li><!-- End Dashboard Nav -->


            </ul>

        </aside><!-- End Sidebar-->
    </x-slot>

    <main id="main" class="main">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="pagetitle">
            <h1>Dashboard</h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">


                        <div class="card-body">

                            <h5 class="card-title">Recent Tecket <span>| Today</span></h5>
                            <a href="{{ route('student.add')}}" class="btn btn-primary ">Add Ticket</a><br><br>
                            <table class="table table-borderless datatable">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Note of Ticket</th>
                                    <th scope="col">Reason Ticket</th>
                                    <th scope="col">Class Number</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subs as $level=>$stock)
                                <tr>
                                    <th scope="row"><a href="#">#{{$level+1}}</a></th>
                                    <td>{{$stock->subject}}</td>
                                    <td>{{$stock->reasonTicket}}</td>
                                    <td>{{$stock->noteTicket}}</td>

                                    <td>{{$stock->classNumber}}</td>
                                    @if($stock->status == 'تحت المراجعة')
                                        <td><span class="badge bg-warning">Pending</span></td>
                                    @endif
                                    @if($stock->status == 'accepted')
                                        <td><span class="badge bg-success">Approved</span></td>
                                    @endif
                                    @if($stock->status == 'rejected')
                                        <td><span class="badge bg-danger">Rejected</span></td>
                                    @endif
                                    <td>
                                        @if($stock->deleted_at ==null)
                                        <form action="{{ route('student.delete', $stock->id)}}" method="post">
                                            @csrf    @method('DELETE')
                                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </form>
                                        @endif
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

</x-student-layout>
