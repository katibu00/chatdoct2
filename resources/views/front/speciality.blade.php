@extends('front.layouts.master')
@section('PageTitle', 'Doctors')
@section('css')
    <style>
        .flag-icon {
            width: 20px;
            height: 15px;
            margin-right: 5px;
        }

        .card {
            border: 1px solid #e5e5e5;
            border-radius: 10px;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.2rem;
        }

        .card-text {
            font-size: 1rem;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid" style="margin-top: 100px;">
        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <!-- Search Bar -->
                        <div class="input-group mb-3">
                            <input id="doctorSearchInput" type="text" class="form-control" placeholder="Search by Doctor Name"
                                aria-label="Search by Doctor Name" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="searchButton"><i class="fas fa-search"></i></button>
                        </div>
                        <!-- Clear Filter Button -->
                        <div class="d-grid gap-2 mb-3">
                            <button id="clearFilterBtn" class="btn btn-outline-secondary" type="button">Clear Filter</button>
                        </div>
                        <!-- Gender Filter Card -->
                        <div class="card mb-3">
                            <div class="card-header">
                                Filter by Gender
                            </div>
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Male" id="male"
                                        name="gender">
                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Female" id="female"
                                        name="gender">
                                    <label class="form-check-label" for="female">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- Languages Filter Card -->
                        <div class="card mb-3">
                            <div class="card-header">
                                Filter by Languages
                            </div>
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="English" id="english"
                                        name="languages">
                                    <label class="form-check-label" for="english">
                                        English
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Hausa" id="hausa"
                                        name="languages">
                                    <label class="form-check-label" for="hausa">
                                        Hausa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Fulani" id="fulani"
                                        name="languages">
                                    <label class="form-check-label" for="fulani">
                                        Fulani
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Pidgin" id="pidgin"
                                        name="languages">
                                    <label class="form-check-label" for="pidgin">
                                        Pidgin
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Igbo" id="igbo"
                                        name="languages">
                                    <label class="form-check-label" for="igbo">
                                        Igbo
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- State Filter Card -->
                        <div class="card mb-3">
                            <div class="card-header">
                                Filter by State
                            </div>
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="abuja" id="abuja"
                                        name="city">
                                    <label class="form-check-label" for="abuja">
                                        Abuja
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="kano" id="kano"
                                        name="city">
                                    <label class="form-check-label" for="kano">
                                        Kano
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="kaduna" id="kaduna"
                                        name="city">
                                    <label class="form-check-label" for="kaduna">
                                        Kaduna
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="lagos" id="lagos"
                                        name="city">
                                    <label class="form-check-label" for="lagos">
                                        Lagos
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- Price Filter Card -->
                        <div class="card mb-3">
                            <div class="card-header">
                                Filter by Consultation Fee
                            </div>
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="less-than-1000"
                                        id="less-than-1000" name="price">
                                    <label class="form-check-label" for="less-than-1000">
                                        Less than ₦1000
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1000-3000" id="1000-3000"
                                        name="price">
                                    <label class="form-check-label" for="1000-3000">
                                        ₦1000 - ₦3000
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="3000-5000" id="3000-5000"
                                        name="price">
                                    <label class="form-check-label" for="3000-5000">
                                        ₦3000 - ₦5000
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="above-5000" id="above-5000"
                                        name="price">
                                    <label class="form-check-label" for="above-5000">
                                        Above ₦5000
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Content Area -->
            <div class="col-md-9">
                <div class="row">

                    @foreach ($doctors as $user)
                        <div class="col-md-12 doctor-card" data-gender="{{ $user->sex }}"
                            data-languages="{{ implode(', ', explode(',', $user->languages)) }}"
                            data-city="{{ $user->address }}" data-price="{{ $user->chat_rate }}">

                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <a href="{{ route('doctors.details', $user->id) }}" class="card-img-link">
                                            <img @if ($user->picture == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{ $user->picture }}" @endif
                                                height="250" class="card-img rounded" alt="{{ $user->first_name }}">
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <a href="{{ route('doctors.details', $user->id) }}"
                                                class="card-title-link">
                                                <h5 class="card-title">Dr.
                                                    {{ $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name }}
                                                </h5>
                                            </a>
                                            @php
                                                $datas = $user->speciality;
                                                $data = explode(',', $datas);
                                            @endphp
                                            <!-- Specialities -->
                                            <div class="icon-label-value">
                                                <i class="fas fa-heart"></i>
                                                <span class="label">Specialities:</span>
                                                <span class="value">
                                                    @foreach ($data as $dat)
                                                        {{ $dat }}@if (!$loop->last)
                                                            ,
                                                        @endif
                                                    @endforeach
                                                </span>
                                            </div>
                                            @php
                                                $datas = $user->languages;
                                                $data = explode(',', $datas);
                                            @endphp
                                            <!-- Languages Spoken -->
                                            <div class="icon-label-value">
                                                <i class="fas fa-flag flag-icon"></i>
                                                <span class="label">Languages Spoken:</span>
                                                <span class="value">
                                                    @foreach ($data as $dat)
                                                        {{ $dat }}@if (!$loop->last)
                                                            ,
                                                        @endif
                                                    @endforeach
                                                </span>
                                            </div>

                                            <!-- Prices Range -->
                                            <div class="icon-label-value">
                                                <i class="fas fa-comments"></i>
                                                <span class="label">Chat Price:</span>
                                                <span class="value">₦{{ number_format($user->chat_rate, 0) }}</span>
                                            </div>

                                            <div class="icon-label-value">
                                                <i class="fas fa-video"></i>
                                                <span class="label">Video Call Price:</span>
                                                <span class="value">₦{{ number_format($user->video_rate, 0) }}</span>
                                            </div>

                                            <!-- About Doctor -->
                                            <h6 class="card-subtitle mb-2 mt-3 text-muted">About Doctor</h6>
                                            <p class="card-text">
                                                {{ Illuminate\Support\Str::limit($user->about, 100, $end = '...') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach





                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function() {
          
            $('#clearFilterBtn').click(function () {
        // Uncheck all checkboxes
        $('input[type="checkbox"]').prop('checked', false);

        // Trigger the filter function
        filterDoctors();
    });

    $('#searchButton').click(function () {
        // Get the search input value
        var searchTerm = $('#doctorSearchInput').val().toLowerCase();

        // Show all doctors initially
        $('.doctor-card').show();

        // Hide doctors that do not match the search term
        $('.doctor-card').each(function () {
            var card = $(this);
            var doctorName = card.find('.card-title').text().toLowerCase();

            if (!doctorName.includes(searchTerm)) {
                card.hide();
            }
        });
    });

            function filterDoctors() {
                // Get selected values from checkboxes
                var genderFilters = getSelectedValues('gender');
                var languageFilters = getSelectedValues('languages');
                var cityFilters = getSelectedValues('city');
                var priceFilters = getSelectedValues('price');

                // Show all doctors initially
                $('.doctor-card').show();

                // Hide doctors that do not match the selected filters
                $('.doctor-card').each(function() {
                    var card = $(this);
                    var genderMatch = genderFilters.length === 0 || genderFilters.includes(card.data(
                        'gender'));
                    var languageMatch = languageFilters.length === 0 || containsAny(card.data('languages')
                        .split(','), languageFilters);
                    var cityMatch = cityFilters.length === 0 || cityFilters.includes(card.data('city'));
                    var priceMatch = priceFilters.length === 0 || checkPriceRange(card.data('price'),
                        priceFilters);

                    if (!(genderMatch && languageMatch && cityMatch && priceMatch)) {
                        card.hide();
                    }
                });
            }

            function containsAny(sourceArray, targetArray) {
                return sourceArray.some(value => targetArray.includes(value.trim()));
            }

            function checkPriceRange(doctorPrice, priceFilters) {
                doctorPrice = parseFloat(doctorPrice); 

                for (var i = 0; i < priceFilters.length; i++) {
                    var range = priceFilters[i].split('-');
                    var lowerBound = 1000;
                    var upperBound = 5000;
                    if (priceFilters[i].startsWith('less-than-') && doctorPrice < lowerBound) {
                        return true;
                    } else if (priceFilters[i].startsWith('above-') && doctorPrice > upperBound) {
                        return true;
                    } else if (!priceFilters[i].startsWith('less-than-') && !priceFilters[i].startsWith('above-') &&
                        lowerBound <= doctorPrice && doctorPrice <= upperBound) {
                        return true;
                    }
                }
                return false;
            }


            function getSelectedValues(checkboxName) {
                return $('input[name="' + checkboxName + '"]:checked').map(function() {
                    return this.value;
                }).get();
            }

            // Attach event handlers to checkboxes
            $('input[name="gender"]').change(filterDoctors);
            $('input[name="languages"]').change(filterDoctors);
            $('input[name="city"]').change(filterDoctors);
            $('input[name="price"]').change(filterDoctors);
        });
    </script>
@endsection
