@extends('admin.layouts.master')

@section('title', 'Command Details')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@section('content')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/
                    Profile</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-info btn-icon mr-2"><i class="mdi mdi-filter-variant"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-danger btn-icon mr-2"><i class="mdi mdi-star"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-warning  btn-icon mr-2"><i class="mdi mdi-refresh"></i></button>
            </div>
            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-primary">14 Aug 2019</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                        id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate"
                        data-x-placement="bottom-end">
                        <a class="dropdown-item" href="#">2015</a>
                        <a class="dropdown-item" href="#">2016</a>
                        <a class="dropdown-item" href="#">2017</a>
                        <a class="dropdown-item" href="#">2018</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="row row-sm">
                <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                    <div class="card ">
                        <div class="card-body">
                            <div class="counter-status d-flex md-mb-0">
                                <div class="counter-icon bg-primary-transparent">
                                    <i class="icon-layers text-primary"></i>
                                </div>
                                <div class="ml-auto">
                                    <h5 class="tx-13">Orders</h5>
                                    <h2 class="mb-0 tx-22 mb-1 mt-1">1,587</h2>
                                    <p class="text-muted mb-0 tx-11"><i
                                            class="si si-arrow-up-circle text-success mr-1"></i>increase</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                    <div class="card ">
                        <div class="card-body">
                            <div class="counter-status d-flex md-mb-0">
                                <div class="counter-icon bg-danger-transparent">
                                    <i class="icon-paypal text-danger"></i>
                                </div>
                                <div class="ml-auto">
                                    <h5 class="tx-13">Revenue</h5>
                                    <h2 class="mb-0 tx-22 mb-1 mt-1">46,782</h2>
                                    <p class="text-muted mb-0 tx-11"><i
                                            class="si si-arrow-up-circle text-success mr-1"></i>increase</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                    <div class="card ">
                        <div class="card-body">
                            <div class="counter-status d-flex md-mb-0">
                                <div class="counter-icon bg-success-transparent">
                                    <i class="icon-rocket text-success"></i>
                                </div>
                                <div class="ml-auto">
                                    <h5 class="tx-13">Product sold</h5>
                                    <h2 class="mb-0 tx-22 mb-1 mt-1">1,890</h2>
                                    <p class="text-muted mb-0 tx-11"><i
                                            class="si si-arrow-up-circle text-success mr-1"></i>increase</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="tabs-menu ">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs profile navtab-custom panel-tabs">
                            <li class="active">
                                <a href="#home" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i
                                            class="las la-user-circle tx-16 mr-1"></i></span> <span class="hidden-xs">ABOUT
                                        ME</span> </a>
                            </li>
                            <li class="">
                                <a href="#profile" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i
                                            class="las la-images tx-15 mr-1"></i></span> <span
                                        class="hidden-xs">GALLERY</span> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content border-left border-bottom border-right border-top-0 p-4">


                        <div class="tab-pane active" id="home">
                            <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
                            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                            <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
                            <link rel="stylesheet"
                                href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />

                            <div id="map" style="height: 400px; width: 100%; margin-top: 20px;"></div>

                            <script>
                                let map, destinationMarker, currentLocationMarker, routeControl;


                                function getDestination() {
                                    console.log({{ $destinationArray['latitude'] }});

                                    return {
                                        latitude: {{ $destinationArray['latitude'] }},
                                        longitude: {{ $destinationArray['longitude'] }}
                                    };
                                }

                                async function fetchLatestLocation(commandId, fallbackLatitude, fallbackLongitude) {
                                    console.log('Fetching location for Command ID:', commandId);
                                    try {
                                        const response = await fetch(`/api/getLatestLocation/${commandId}`);
                                        if (!response.ok) throw new Error('Network response was not ok');

                                        const data = await response.json();
                                        console.log("Data from API is:", data);

                                        // Ensure that latestDetail is not null and has latitude and longitude
                                        if (data.latestDetail) {
                                            return {
                                                latitude: data.latitude,
                                                longitude: data.longitude
                                            };
                                        } else {
                                            console.error(
                                                'Latest detail does not contain valid latitude and longitude, using fallback values.');
                                            return {
                                                latitude: fallbackLatitude,
                                                longitude: fallbackLongitude
                                            }; // Use fallback if API data is not valid
                                        }
                                    } catch (error) {
                                        console.error('Error fetching location:', error);
                                        return {
                                            latitude: fallbackLatitude,
                                            longitude: fallbackLongitude
                                        }; // Use fallback if there's an error
                                    }
                                }

                                Pusher.logToConsole = false;

                                var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
                                    cluster: 'eu'
                                });

                                var channel = pusher.subscribe('admin');
                                channel.bind('new_location_' + {{ $command->id }}, function() {
                                   
                                    const commandId = {{ $command->id }};
                                    initMap(commandId);
                                });
                                async function initMap(commandId) {
                                    const destination = getDestination();
                                    const details = await fetchLatestLocation(commandId, destination.latitude, destination.longitude);
                                    if (!details || !destination) {
                                        console.error('Location details are missing.');
                                        return; // Exit if details or destination are not available
                                    }

                                    if (!map) {
                                        map = L.map('map').setView([details.latitude, details.longitude], 13);
                                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                        }).addTo(map);
                                    } else {
                                        map.setView([details.latitude, details.longitude], 13); // Update view if map exists
                                    }

                                    const destinationIcon = L.icon({
                                        iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-icon-2x.png', // Destination marker (larger)
                                        iconSize: [25, 41],
                                        iconAnchor: [12, 41]
                                    });
                                    const currentLocationIcon = L.icon({
                                        iconUrl:"{{ asset('images/image2.png')}}", // Current location marker (default)
                                        iconSize: [36, 43],
                                        iconAnchor: [12, 41]
                                    });

                                    if (destinationMarker) {
                                        map.removeLayer(destinationMarker);
                                    }
                                    if (currentLocationMarker) {
                                        map.removeLayer(currentLocationMarker);
                                    }
                                    if (routeControl) {
                                        routeControl.remove(); // Remove existing route if it exists
                                    }


                                    // Add markers using custom icons
                                    destinationMarker = L.marker([destination.latitude, destination.longitude], {
                                        icon: destinationIcon
                                    }).addTo(map).bindPopup('Destination');

                                    currentLocationMarker = L.marker([details.latitude, details.longitude], {
                                        icon: currentLocationIcon
                                    }).addTo(map).bindPopup('Current Location');

                                    // Route between markers
                                    if (destination.latitude && details.latitude) {
                                        routeControl = L.Routing.control({
                                            waypoints: [
                                                L.latLng(details.latitude, details.longitude),
                                                L.latLng(destination.latitude, destination.longitude)
                                            ],
                                            routeWhileDragging: true,
                                            createMarker: function() {
                                                return null; // Prevent creating markers for route points
                                            }
                                        }).addTo(map);
                                    }
                                }

                                document.addEventListener('DOMContentLoaded', function() {
                                    const commandId = {{ $command->id }};
                                    initMap(commandId);
                                });
                            </script>

                        </div>


                        
                        <div class="tab-pane" id="profile">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="border p-1 card thumb">
                                        <a href="#" class="image-popup" title="Screenshot-2"> <img
                                                src="../../assets/img/photos/7.jpg" class="thumb-img"
                                                alt="work-thumbnail"> </a>
                                        <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>Photography</small></p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class=" border p-1 card thumb">
                                        <a href="#" class="image-popup" title="Screenshot-2"> <img
                                                src="../../assets/img/photos/8.jpg" class="thumb-img"
                                                alt="work-thumbnail"> </a>
                                        <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>Photography</small></p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class=" border p-1 card thumb">
                                        <a href="#" class="image-popup" title="Screenshot-2"> <img
                                                src="../../assets/img/photos/9.jpg" class="thumb-img"
                                                alt="work-thumbnail"> </a>
                                        <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>Photography</small></p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class=" border p-1 card thumb  mb-xl-0">
                                        <a href="#" class="image-popup" title="Screenshot-2"> <img
                                                src="../../assets/img/photos/10.jpg" class="thumb-img"
                                                alt="work-thumbnail"> </a>
                                        <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>Photography</small></p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class=" border p-1 card thumb  mb-xl-0">
                                        <a href="#" class="image-popup" title="Screenshot-2"> <img
                                                src="../../assets/img/photos/6.jpg" class="thumb-img"
                                                alt="work-thumbnail"> </a>
                                        <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>Photography</small></p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class=" border p-1 card thumb  mb-xl-0">
                                        <a href="#" class="image-popup" title="Screenshot-2"> <img
                                                src="../../assets/img/photos/5.jpg" class="thumb-img"
                                                alt="work-thumbnail"> </a>
                                        <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>Photography</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="settings">
                            <form role="form">
                                <div class="form-group">
                                    <label for="FullName">Full Name</label>
                                    <input type="text" value="John Doe" id="FullName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="email" value="first.last@example.com" id="Email"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Username">Username</label>
                                    <input type="text" value="john" id="Username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input type="password" placeholder="6 - 15 Characters" id="Password"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="RePassword">Re-Password</label>
                                    <input type="password" placeholder="6 - 15 Characters" id="RePassword"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="AboutMe">About Me</label>
                                    <textarea id="AboutMe" class="form-control">Loren gypsum dolor sit mate, consecrate disciplining lit, tied diam nonunion nib modernism tincidunt it Loretta dolor manga Amalia erst volute. Ur wise denim ad minim venial, quid nostrum exercise ration perambulator suspicious cortisol nil it applique ex ea commodore consequent.</textarea>
                                </div>
                                <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
