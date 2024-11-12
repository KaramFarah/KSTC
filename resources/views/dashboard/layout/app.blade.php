<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('dashboard.layout.dashboard-styles')
</head>

<body>


    @include('dashboard.layout.header')

    @include('dashboard.layout.sidebar')

    <main id="main" class="main">
      
      @isset($pageTitle)
        <div class="pagetitle">
          <h1>{{$pageTitle['title'] ?? 'No Title'}}</h1>
          <nav>
            <ol class="breadcrumb">
              @foreach ($pageTitle['bread_crumbs'] as $item)
                <li class="breadcrumb-item"><a href="{{$item['link']}}">{{$item['title']}}</a></li>
              @endforeach
            </ol>
          </nav>
        </div><!-- End Page Title -->
      @endisset

      @session('success')
        @include('dashboard.partials.alert' , ['type' => 'success' , 'icon' => 'check-circle'])  
      @endsession

      @session('danger')
        @include('dashboard.partials.alert' , ['type' => 'danger' , 'icon' => 'exclamation-octagon']) 
      @endsession

      @session('info')
        @include('dashboard.partials.alert' , ['type' => 'info' , 'icon' => 'info-circle']) 
      @endsession

      @yield('content')
      
    </main>

    @include('dashboard.layout.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

   
    @include('dashboard.layout.dashboar-scripts')
</body>

</html>