@extends('front.layouts.master')
@section('PageTitle','Speciality')
@section('content')


<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <div class="row gutter-40 col-mb-80">
                <!-- Post Content
                ============================================= -->
                <div class="postcontent col-lg-9 order-lg-last">
                    <!-- Posts
                    ============================================= -->
                    <div id="posts" class="row gutter-40 mb-0">

                        @forelse ($doctors as $doctor)
                        <div class="entry col-12">
                            <div class="grid-inner row">
                                <div class="col-lg-4">
                                    <a href="demos/travel/images/hotels/1.jpg" data-lightbox="image"><img @if($doctor->picture == 'default.png') src="/uploads/default.png" @else src="/uploads/avatar/{{$doctor->picture}}" @endif alt="Doctor Image"></a>
                                </div>
                                <div class="col-lg col-md-8 mt-4 mt-lg-0">
                                    <div class="entry-title title-sm">
                                        <h2><a href="blog-single.html">Dr. {{$doctor->first_name}} {{$doctor->middle_name}} {{$doctor->last_name}}</a></h2>
                                    </div>
                                    <div class="entry-meta">
                                        <ul>
                                            <li  class="badge bg-info text-dark mb-2 fw-normal px-2 py-1">{{ $doctor->rank}}</li>
                                            <li><i class="icon-line-map"></i> {{$doctor->experience}}+ Years Experience</li>
                                            <li><i class="icon-star3"></i><a href="#"> 24</a></li>
                                        </ul>
                                    </div>
                                    @php
                                        $datas = $doctor->languages; 
                                        $data = explode(',', $datas);

                                        $special_array = $doctor->speciality; 
                                        $specialities = explode(',', $special_array); 
                                    @endphp
                                    <div class="entry-content">
                                        <p class="mb-0">Specialities:
                                            @foreach ($specialities as $speciality)
                                            <span class="badge bg-success">{{$speciality}}</span>
                                           @endforeach
                                        </p>
                                        <p class="mb-0">Languages:
                                            @foreach ($data as $dat)
                                            <span class="badge bg-primary">{{$dat}}</span>
                                           @endforeach
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-auto col-md-4 mt-4 mt-lg-0 text-start text-md-center">
                                    <div class="hotel-price">
                                        <i class="icon-chat-2 mx-1">&nbsp;</i>&#x20A6;{{number_format($doctor->chat_rate,0)}}
                                    </div>
                                    <div class="hotel-price">
                                        <i class="icon-video1 mx-1">&nbsp;</i>&#x20A6;{{number_format($doctor->video_rate,0)}}
                                    </div>
                                    <a href="{{route('doctors.details',$doctor->number)}}"class="button button-rounded mt-4 mx-0">Book Now</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="style-msg errormsg">
                            <div class="sb-msg"><i class="icon-remove"></i><strong>Oh snap!</strong> No doctor found in this speciality. Please choose another speciality and try again.</div>
                        </div>
                        @endforelse
                      

                    </div>

                    <ul class="pagination my-0">
                       {{ $doctors->appends(request()->input())->links() }}
                    </ul>

                </div>

                <!-- Sidebar
                ============================================= -->
                <div class="sidebar col-lg-3">
                    <div class="sidebar-widgets-wrap">

 

                        <div class="widget clearfix">

                            <h4>Consultation Fee</h4>

                            <div>
                                <input id="checkbox-1" class="checkbox-style" name="checkbox" type="checkbox">
                                <label for="checkbox-1" class="checkbox-style-2-label checkbox-small">Free</label>
                            </div>
                            <div>
                                <input id="checkbox-2" class="checkbox-style" name="checkbox" type="checkbox">
                                <label for="checkbox-2" class="checkbox-style-2-label checkbox-small">&#x20A6;500 - &#x20A6;1,000</label>
                            </div>
                            <div>
                                <input id="checkbox-3" class="checkbox-style" name="checkbox" type="checkbox">
                                <label for="checkbox-3" class="checkbox-style-2-label checkbox-small">&#x20A6;1,000 - &#x20A6;1,500</label>
                            </div>
                            <div>
                                <input id="checkbox-4" class="checkbox-style" name="checkbox" type="checkbox">
                                <label for="checkbox-4" class="checkbox-style-2-label checkbox-small">&#x20A6;1,500 - &#x20A6;2,000</label>
                            </div>

                        </div>

                       

                        <div class="widget clearfix">

                            <h4>Languages</h4>

                            <div>
                                <input id="checkbox1-2" class="checkbox-style" name="checkbox-1" type="checkbox">
                                <label for="checkbox1-2" class="checkbox-style-2-label checkbox-small">English</label>
                            </div>
                            <div>
                                <input id="checkbox1-3" class="checkbox-style" name="checkbox-1" type="checkbox">
                                <label for="checkbox1-3" class="checkbox-style-2-label checkbox-small">Hausa</label>
                            </div>
                            <div>
                                <input id="checkbox1-4" class="checkbox-style" name="checkbox-1" type="checkbox">
                                <label for="checkbox1-4" class="checkbox-style-2-label checkbox-small">Yoruba</label>
                            </div>
                            <div>
                                <input id="checkbox1-5" class="checkbox-style" name="checkbox-1" type="checkbox">
                                <label for="checkbox1-5" class="checkbox-style-2-label checkbox-small">Igbo</label>
                            </div>
                            <div>
                                <input id="checkbox1-6" class="checkbox-style" name="checkbox-1" type="checkbox">
                                <label for="checkbox1-6" class="checkbox-style-2-label checkbox-small">Fulfulde</label>
                            </div>
                            <div>
                                <input id="checkbox1-7" class="checkbox-style" name="checkbox-1" type="checkbox">
                                <label for="checkbox1-7" class="checkbox-style-2-label checkbox-small">Kanuri</label>
                            </div>
                            <div>
                                <input id="checkbox1-8" class="checkbox-style" name="checkbox-1" type="checkbox">
                                <label for="checkbox1-8" class="checkbox-style-2-label checkbox-small">Pidgin English</label>
                            </div>
                           

                        </div>


                        <div class="widget clearfix">

                            <h4>Gender</h4>

                            <div>
                                <input id="checkbox-1" class="checkbox-style" name="checkbox" type="checkbox">
                                <label for="checkbox-1" class="checkbox-style-2-label checkbox-small">Male</label>
                            </div>
                            <div>
                                <input id="checkbox-2" class="checkbox-style" name="checkbox" type="checkbox">
                                <label for="checkbox-2" class="checkbox-style-2-label checkbox-small">Female</label>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section><!-- #content end -->

@endsection