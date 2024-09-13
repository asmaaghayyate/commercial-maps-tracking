@extends('admin.layouts.master')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

@section('title', 'Create Client')


@section('content')
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    Create A Command
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.command.store') }}" method="POST">
                    @csrf
                    <div class="row row-sm">

                        <div class="col-12">
                            <div class="form-group mg-b-0">
                                <label class="form-label">Map Link : </label>
                                <div class="input-group">
                                    <input id="map-link" class="form-control"
                                        placeholder="Enter user Map Link to extract latitude and longitude" />
                                    <button type="button" class="btn btn-primary" onclick="extractCoordinates()">Extract
                                        Coordinates</button>
                                </div>
                                @error('map_link')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label">Longitude: <span class="tx-danger">*</span></label>
                                <input id="longitude" class="form-control" name="longitude" placeholder="Enter longitude"
                                    required value="{{ old('longitude') }}" type="text" />
                                @error('longitude')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mg-b-0">
                                <label class="form-label">Latitude: <span class="tx-danger">*</span></label>
                                <input id="latitude" class="form-control" name="latitude" placeholder="Enter latitude"
                                    required value="{{ old('latitude') }}" type="text" />
                                @error('latitude')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mg-b-0">
                                <label class="form-label">Place Name:</label>
                                <input id="place-name" class="form-control" placeholder="Place name will be displayed here"
                                    name="destination_name" />
                            </div>
                        </div>
                        <div id="map" style="height: 400px; width: 100%; margin-top: 20px;"></div>

                        <script>
                            let map, marker;

                            function initMap(lat = 33.5946062, lng = -7.6065406) {
                                if (map) {
                                    // Clear the existing map and marker
                                    map.remove();
                                }

                                // Initialize the map
                                map = L.map('map').setView([lat, lng], 13);

                                // Add a tile layer (Map tiles from OpenStreetMap)
                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                }).addTo(map);

                                // Add a marker
                                marker = L.marker([lat, lng], {
                                    draggable: true
                                }).addTo(map);

                                // Update latitude and longitude inputs when the marker is dragged
                                marker.on('dragend', function(e) {
                                    const position = e.target.getLatLng();
                                    document.getElementById('latitude').value = position.lat;
                                    document.getElementById('longitude').value = position.lng;
                                });
                                fetchPlaceName(lat, lng);
                            }


                            function extractCoordinates() {
                                const mapLink = document.getElementById('map-link').value;

                                // Regular expression to extract latitude and longitude
                                const regex = /@(-?\d+\.\d+),(-?\d+\.\d+)/;
                                const match = mapLink.match(regex);

                                if (match) {
                                    const latitude = parseFloat(match[1]);
                                    const longitude = parseFloat(match[2]);
                                    // Set the values in the respective input fields
                                    document.getElementById('latitude').value = latitude;
                                    document.getElementById('longitude').value = longitude;

                                    // Initialize or update the map with the new coordinates
                                    initMap(latitude, longitude);
                                    etchPlaceName(lat, lng);
                                } else {
                                    alert('Invalid map link. Please ensure it contains latitude and longitude.');
                                }
                            }

                            function fetchPlaceName(lat, lng) {
                                fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`)
                                    .then(response => response.json())
                                    .then(data => {
                                        const placeName = data.display_name || 'Place name not found';
                                        document.getElementById('place-name').value = placeName;
                                    })
                                    .catch(error => {
                                        console.error('Error fetching place name:', error);
                                        document.getElementById('place-name').value = 'Error fetching place name';
                                    });
                            }

                            // Initialize map with default coordinates
                            document.addEventListener('DOMContentLoaded', function() {
                                initMap();
                            });
                        </script>

                        <div class="col-12">
                            <button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">
                                Validate Form
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
