@extends('frontend.layouts.app')


@section('title')
    Team
@endsection


@section('content')
    <main class="overflow-hidden">
        <!-- inner home -->
        <div class="inner_home" style="background-image: url({{ asset('frontend/img/bannr-img.jpg') }});">
            <div class="container">
                <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                <h2>Our Scholar</h2>
            </div>
        </div>
        <!-- team_area -->
        <div class="team_area pt_70 pb_50">
            <div class="container">
                <div class="heading text-center">
                    <img src="{{ asset('frontend/img/heading-img.png') }}" alt="icon">
                    <p>Meet Our Professional Team Members</p>
                    <h2>Team Member</h2>
                </div>
                <div class="row mt_50">
                    @foreach ($teams as $team)
                        <div class="col-lg-4 col-md-6 mt_50">
                            <div class="team-two__item">
                                <div class="team-two__image">
                                    <img src="{{ asset('storage/'. $team->image) }}" alt="eduact">
                                </div>
                                <div class="team-two__content">
                                    <h3 class="team-two__title">
                                        <a href="javascript:void(0);">{{ $team->name }}</a>
                                    </h3>
                                    <span class="team-two__designation">Email: {{ $team->email }}</span>
                                    <span class="team-two__designation">{{ $team->designation }}</span>
                                    <div class="team-two__social">
                                        <a href="{{ $team->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                        <a href="{{ $team->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="{{ $team->twitter }}"><i class="fab fa-twitter"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
