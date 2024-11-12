
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    {{-- {{dd(App\Helpers\DashboardHelper::getTrue())}} --}}
    <ul class="sidebar-nav" id="sidebar-nav">
      @foreach (App\Helpers\DashboardHelper::getMenuItems() as $item)

        {{-- هل يوجد ناف هيدينغ جديد ام لا --}}
        @isset($item['navHeading'])
          <li class="nav-heading"><span>{{$item['navHeading']}}</span></li>
          @continue
        @endisset

        <li class="nav-item">
          <a class="nav-link {{$item['active'] === true ? '' : 'collapsed'}}" data-bs-target="{{ '#' . ($item['dbsTarget'] ?? '')}}" data-bs-toggle="{{isset($item['dbsTarget']) ? 'collapse' : ''}}" href="{{$item['route']}}">
            <i class="{{$item['prefixIcon'] ?? ''}}"></i>
            
            <span>{{$item['label']}}</span>
            <i class="{{$item['sufixIcon'] ?? ''}}"></i>
          </a>
          @isset($item['items'])
            <ul id="{{$item['dbsTarget']}}" class="nav-content collapse {{$item['active'] === true ? 'show' : ''}} " data-bs-parent="#sidebar-nav">             
              @foreach ($item['items'] as $subItem)
                <li>
                  <a href="{{$subItem['route']}}" class="{{$subItem['active'] ? 'active' : ''}}">
                    <i class="{{$subItem['icon']}}"></i>
                    <span>{{$subItem['lable']}}</span>
                  </a>
                </li>
              @endforeach
            </ul>
          @endisset
        </li><!-- End Dashboard Nav -->
        
      @endforeach
    </ul>

  </aside><!-- End Sidebar-->