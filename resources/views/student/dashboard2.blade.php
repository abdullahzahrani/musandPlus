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
                    <a class="nav-link " href="{{route('student.ticket')}}">
                        <i class="bi bi-card-list"></i>
                        <span>Ticket</span>
                    </a>
                </li><!-- End Dashboard Nav -->


            </ul>

        </aside><!-- End Sidebar-->
    </x-slot>

    <main id="main" class="main">
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            @endif
                @if(session()->get('wrong'))
                    <div class="alert alert-danger">
                        {{ session()->get('wrong') }}
                    </div>
                @endif
        <div class="pagetitle">
            <h1>Add Ticket</h1>

        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            <form action="{{url('/student/store')}}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <!-- <label class="col-sm-2 col-form-label">Select</label> -->
                                    <div class="col-sm-10">
                                        <select class="form-control" id="exampleFormControlSelect1" name="subject" required>
                                            @foreach($mts as $mt)
                                                <option value="{{$mt->subject}}|{{$mt->hours}}|{{$mt->id}}">{{$mt->subject}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <!-- <label class="col-sm-2 col-form-label">Select</label> -->
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example"  name="reasonTicket" required>
                                            <option value="لم استطع التسجيل">لم استطع التسجيل</option>
                                            <option value="الشعبة مغلقة">الشعبة مغلقة</option>
                                            <option value="طالب خريج">طالب خريج</option>
                                            <option value="تجاوز الحد الاعلي">تجاوز الحد الاعلي</option>
                                            <option value="تجاوز الحد الاعلي - طالب خريج">تجاوز الحد الاعلي - طالب خريج</option>
                                            <option value="تجاوز متطلب - طالب خريج">تجاوز متطلب - طالب خريج</option>
                                            <option value="تجاوز متطلب - مشروع تخرج 1">تجاوز متطلب - مشروع تخرج 1</option>
                                            <option value="عدم تجاوز الحد الادني للساعات">عدم تجاوز الحد الادني للساعات</option>
                                            <option value="تعارض وقت المحاضرة">تعارض وقت المحاضرة</option>
                                            <option value="تعارض وقت المحاضرة - طالب خريج">تعارض وقت المحاضرة - طالب خريج</option>
                                            <option value="تعارض وقت الامتحان">تعارض وقت الامتحان</option>
                                            <option value="تعارض وقت الامتحان - طالب خريج">تعارض وقت الامتحان - طالب خريج</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <!-- <label for="inputPassword" class="col-sm-2 col-form-label">Textarea</label> -->
                                    <div class="col-sm-10">
                                       <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                 name="noteTicket" required></textarea>
                                    </div>
                                </div>

                                <input type="checkbox" id="sure" name="sure" required>
                                <label for="vehicle1">By check this, you confirm that you provide us real information</label><br>
                                <div class="row mb-3">
                                    <!-- <label class="col-sm-2 col-form-label">Submit</label>
                                    <div class="col-sm-10"> -->
                                    <div class="col-sm-10"><button type="submit" class="btn btn-primary">Submit</button></div>                  </div>
                            </form>  </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>

            </div>
        </section>

    </main><!-- End #main -->
</x-student-layout>
