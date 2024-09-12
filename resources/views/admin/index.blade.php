@extends('admin.layouts.master')

@section('title', 'Home Page')


@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hi, welcome back!</h2>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->

    <div class="container-fluid">
        <div class="row row-sm">
            <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                <div class="card bg-primary-gradient text-white ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="icon1 mt-2 text-center">
                                    <i class="fa-solid fa-user-tie tx-40"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-0 text-center">
                                    <span>
                                        <a class="text-white" >
                                            Employees
                                        </a>
                                    </span>
                                    <h2 class="text-white mb-0">4</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                <div class="card bg-danger-gradient text-white">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="icon1 mt-2 text-center">
                                    <i class="fe fe-users tx-40"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-0 text-center">
                                    <span>
                                        <a href="#"
                                            class="text-white">
                                            Stagiaires
                                        </a>
                                    </span>
                                    <h2 class="text-white mb-0">2</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                <div class="card bg-warning-gradient text-white">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="icon1 mt-2 text-center">
                                    <i class="fa-solid fa-user-large-slash tx-40"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-0 text-center">
                                    <span>
                                        <a href="#" class="text-white">
                                            Abandone
                                        </a>
                                    </span>
                                    <h2 class="text-white mb-0">2</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                <div class="card bg-success-gradient text-white">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="icon1 mt-2 text-center">
                                    <i class="fa-solid fa-building-user tx-40"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-0 text-center">
                                    <span class="text-white">Departement</span>
                                    <h2 class="text-white mb-0">5</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- row opened -->
    <div class="row row-sm row-deck">
        <div class="col-md-12 col-lg-6 col-xl-6">
            <div class="card card-table-two">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-1">Stagiares List</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                {{-- <span class="tx-12 tx-muted mb-3 ">This is your most recent earnings for today's date.</span> --}}
                <div class="table-responsive country-table">
                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                            <tr>
                                <th class="wd-lg-25p">Name</th>
                                <th class="wd-lg-25p tx-right">Phone</th>
                                <th class="wd-lg-25p tx-right">H Date</th>
                                <th class="wd-lg-25p tx-right">Type</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @forelse ($listOfData['stagiareList'] as $item)
                                <tr>
                                    <td>{{ $item->full_name }}</td>
                                    <td class="tx-right tx-medium tx-inverse">{{ $item->phone }}</td>
                                    <td class="tx-right tx-medium tx-inverse">{{ $item->date_debut }}</td>
                                    <td class="tx-right tx-medium tx-inverse">
                                        {{ $item->ContratType->name ? $item->ContratType->name : '' }}</td>
                                </tr>
                            @empty
                                <p>no data found</p>
                            @endforelse
                        </tbody> --}}
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-6">
            <div class="card card-table-two">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-1">Employee List</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                {{-- <span class="tx-12 tx-muted mb-3 ">This is your most recent earnings for today's date.</span> --}}
                <div class="table-responsive country-table">
                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                            <tr>
                                <th class="wd-lg-25p">Name</th>
                                <th class="wd-lg-25p tx-right">Phone</th>
                                <th class="wd-lg-25p tx-right">H Date</th>
                                <th class="wd-lg-25p tx-right"></th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @forelse ($listOfData['employeesList'] as $item)
                                <tr>
                                    <td>{{ $item->full_name }}</td>
                                    <td class="tx-right tx-medium tx-inverse">{{ $item->phone }}</td>
                                    <td class="tx-right tx-medium tx-inverse">{{ $item->date_debut }}</td>
                                    <td class="tx-right tx-medium tx-inverse">
                                        {{ $item->ContratType->name ? $item->ContratType->name : '' }}</td>
                                </tr>
                            @empty
                                <p>no data found</p>
                            @endforelse
                        </tbody> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->


    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-4 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header pb-1">
                    <h3 class="card-title mb-2">Recent 5 Employees</h3>
                </div>
                <div class="card-body p-0 customers mt-1">
                    {{-- <div class="list-group list-lg-group list-group-flush">
                        @forelse ($listOfData['recentEmployees'] as $item)
                            <div class="list-group-item list-group-item-action" href="#">
                                <div class="media mt-0">
                                    <img class="avatar-lg rounded-circle mr-3 my-auto"
                                        @if ($item->sexe != 'homme') src="https://cricclubs.com/documentsRep/profilePics/default-female-Image.jpg"
                                    @else
                                    src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQN6DYPQY4MejnXbsptT3GFyfhoWkIeHgV1iEJeYMa8lhj_opZE" @endif
                                        alt="Image description">
                                    <div class="media-body">
                                        <div class="d-flex align-items-center">
                                            <div class="mt-0">
                                                <h5 class="mb-1 tx-15">{{ $item->full_name }}</h5>
                                                <p class="mb-0 tx-13 text-success">{{ optional($item->ContratType)->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header pb-1">
                    <h3 class="card-title mb-2">Recent 5 Tasks</h3>
                </div>
                <div class="card-body p-0 customers mt-1">
                    {{-- <div class="list-group list-lg-group list-group-flush">
                        @forelse ($listOfData['recentTasks'] as $item)
                            <div class="list-group-item list-group-item-action" href="#">
                                <div class="media mt-0">
                                    <div class="media-body">
                                        <div class="d-flex align-items-center">
                                            <div class="mt-0">
                                                <h5 class="mb-1 tx-15">{{ $item->name }}</h5>
                                                <div>

                                                    <p class="mb-0 tx-13 "><span class="text-success">By
                                                            {{ $item->employee->full_name }} |
                                                        </span>{{ $item->date_debut }} -> {{ $item->date_fin }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header pb-1">
                    <h3 class="card-title mb-2">Recent 5 Bloc Note</h3>
                </div>
                <div class="card-body p-0 customers mt-1">
                    {{-- <div class="list-group list-lg-group list-group-flush">
                        @forelse ($listOfData['recentNotes'] as $item)
                            <div class="list-group-item list-group-item-action" href="#">
                                <div class="media mt-0">
                                    <div class="media-body">
                                        <div class="d-flex align-items-center">
                                            <div class="mt-0">
                                                <h5 class="mb-1 tx-15">{{ $item->date }}</h5>
                                                <p class="mb-0 tx-13 text-success">
                                                    {{ Str::limit($item->description, 25, '...') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8 col-xl-8">
            <div class="card card-table-two">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-1">Employees Status Of This Month</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                {{-- <span class="tx-12 tx-muted mb-3 ">This is your most recent earnings for today's date.</span> --}}
                <div class="table-responsive country-table">
                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                            <tr>
                                <th class="wd-lg-25p">Name</th>
                                <th class="wd-lg-25p tx-right">Phone</th>
                                <th class="wd-lg-25p tx-right">departement</th>
                                <th class="wd-lg-25p tx-right">Late Count</th>
                                <th class="wd-lg-25p tx-right">Absenc Count</th>
                                <th class="wd-lg-25p tx-right"></th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @forelse ($listOfData['employeesCountLateAbsence'] as $item)
                                <tr>
                                    <td>{{ $item['employee']->firstname }}</td>
                                    <td class="tx-right tx-medium tx-inverse">{{ $item['employee']->phone }}</td>
                                    <td class="tx-right tx-medium tx-inverse">{{ $item['employee']->departement->name }}
                                    </td>
                                    <td class="tx-right tx-medium tx-inverse">{{ $item['late_count'] }}</td>
                                    <td class="tx-right tx-medium tx-inverse">{{ $item['absence_count'] }}</td>
                                    <td class="">
                                        <a href="{{ route('admin.employees.show', $item['employee']->id) }}"
                                            class="btn btn-success btn-sm">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <p>no data found</p>
                            @endforelse
                        </tbody> --}}
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="main-calendar" id="calendar"></div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- row close -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-6">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Line Chart
                    </div>
                    <p class="mg-b-20">Basic Charts Of Valex template.</p>
                    <div class="morris-wrapper-demo" id="chartOne"></div>
                </div>
            </div>
        </div><!-- col-6 -->
        <div class="col-md-6">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Stacked Bar Chart
                    </div>
                    <p class="mg-b-20">Basic Charts Of Valex template.</p>
                    <div class="morris-wrapper-demo" id="chartTwo"></div>
                </div>
            </div>
        </div><!-- col-6 -->
    </div>
    <!-- /row -->

@endsection

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales', 'Expenses'],
                ['2013', 1000, 400],
                ['2014', 1170, 460],
                ['2015', 660, 1120],
                ['2016', 1030, 540]
            ]);

            var options = {
                title: 'Company Performance',
                hAxis: {
                    title: 'Year',
                    titleTextStyle: {
                        color: '#333'
                    }
                },
                vAxis: {
                    minValue: 0
                }
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chartOne'));
            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales', 'Expenses'],
                ['2004', 1000, 400],
                ['2005', 1170, 460],
                ['2006', 660, 1120],
                ['2007', 1030, 540]
            ]);

            var options = {
                title: 'Company Performance',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('chartTwo'));

            chart.draw(data, options);
        }
    </script>
    <!--Internal App calendar js -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {

            });
            calendar.render();
        });
    </script>
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
@endsection
