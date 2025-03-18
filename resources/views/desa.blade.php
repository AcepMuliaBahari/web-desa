@extends('components.layout')

@section('content')
    <!-- News & Events Section -->
    <section class="py-4 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-8">
                @include('components.home.news')
                @include('components.home.events')
            </div>
        </div>
    </section>
    @include('components.home.hero')
    @include('components.home.welcome')
    @include('components.home.organization')
    @include('components.home.population')
    @include('components.home.explore')
    
    @include('components.scripts.animation')
@endsection

