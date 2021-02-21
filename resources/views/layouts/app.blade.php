@extends('layouts.base')

@section('body')
    @yield('content')

    @isset($slot)
        <div
            class="flex h-screen bg-gray-50 dark:bg-gray-900"
            :class="{ 'overflow-hidden': isSideMenuOpen}"
        >
            <x-part.sidebar-desktop />

            <x-part.sidebar-mobile />

            <div class="flex flex-col flex-1">
                <x-part.header />

                <main class="h-full pb-16 overflow-y-auto">
                    {{ $slot }}
                </main>
            </div>
        </div>
    @endisset
@endsection
