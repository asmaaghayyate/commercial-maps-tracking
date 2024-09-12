<!DOCTYPE html>
<html lang="en" class="light scroll-smooth group" data-layout="vertical" data-sidebar="light" data-sidebar-size="sm"
    data-mode="light" data-topbar="light" data-skin="default" data-navbar="sticky" data-content="fluid" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>@yield('title') | Gestion Devis fiduciairebrighten</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="Themesdesign" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/LOGO-win.webp') }}">

    @include('layouts.head-css')
    <!-- Styles -->
    @livewireStyles
</head>

@include('layouts.body')

<div class="group-data-[sidebar-size=sm]:min-h-sm group-data-[sidebar-size=sm]:relative">
    <!-- sidebar -->
    @include('layouts.sidebar')
    <!-- topbar -->
    @include('layouts.topbar')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        <!-- page wrapper -->
        @include('layouts.page-wrapper')

        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            @if (session()->has('success'))
                <div class="flex flex-col gap-3">
                    <div
                        class="relative p-3 pr-12 text-sm text-green-500 border border-t-2 border-transparent rounded-md bg-green-50 border-t-green-300 dark:bg-green-400/20 dark:border-t-green-500/50">
                        <button
                            class="absolute top-0 bottom-0 right-0 p-3 text-green-200 transition hover:text-green-500 dark:text-green-400/50 dark:hover:text-green-500"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" data-lucide="x" class="h-5 lucide lucide-x">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg></button>
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <!-- content -->
            @yield('content')
        </div>
    </div>
    <!-- End Page-content -->
    <!-- footer -->
    @include('layouts.footer')
</div>
</div>
<!-- end main content -->
@stack('modals')
@yield('scripts')
@include('layouts.customizer')
@include('layouts.vendor-scripts')

@livewireScripts
</body>

</html>
