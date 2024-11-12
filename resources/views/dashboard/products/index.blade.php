@extends('dashboard.layout.app')
@section('content')
    <section class="section">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">إضافة منتجات</h5>
              @if (Route::current()->getName() === 'products.index')

                @include('dashboard.products.create')

              @else

                @include('dashboard.products.edite' , ['category' => $category ?? new App\Models\Admin\Category()])

              @endif
            </div>
          </div>

        </div>
      </div>
    </section>
    
    @if (Route::current()->getName() === 'products.index')
      <section id="products_card" class="section">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                  <h5 class="card-title">قائمة المنتجات</h5>
                  <div>
                    <form method="GET" action="{{route('products.index')}}" action="input-form">
                      
                      <div class="d-flex align-items-center">
                        <button type="submit" style="border-bottom-left-radius: 0px; border-top-left-radius: 0px;" class="btn btn-primary"><i class="bi bi-search"></i></button>
                        
                        <input name="search" value="{{request()->search ?? ''}}" style="border-bottom-right-radius: 0px; border-top-right-radius: 0px;" class="form-control" placeholder="البحث عن منتج" type="text">
                      </div>
                    </form>
                  </div>
                  <div>
                    <a class="btn {{request()->category == 1 ? 'btn-success' : 'btn-secondary'}} " href="{{route('products.index') . '#products_card'}}">الكل</a>
                    <a class="btn {{request()->category == 1 ? 'btn-success' : 'btn-secondary'}} " href="{{route('products.index') . '?category=1' . '#products_card'}}">خضار</a>
                    <a class="btn {{request()->category == 2 ? 'btn-success' : 'btn-secondary'}} " href="{{route('products.index') . '?category=2' . '#products_card'}}">فواكه</a>
                    <a class="btn {{request()->category == 3 ? 'btn-success' : 'btn-secondary'}} " href="{{route('products.index') . '?category=3' . '#products_card'}}">مسبق التقطيع</a>
                    <a class="btn {{request()->category == 4 ? 'btn-success' : 'btn-secondary'}} " href="{{route('products.index') . '?category=4' . '#products_card'}}">معلب</a>
                  </div>
                </div>
                <!-- Bordered Table -->
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col"><span>النوع</span></th>
                      <th scope="col" class="w-50"><span>معلومات المنتج</span></th>
                      <th scope="col"><span>السعر</span></th>
                      <th scope="col"><span>صورة المنتج</span></th>
                      <th scope="col"><span></span></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($products as $item)
                      <tr>
                        <th scope="row"><span>{{$loop->index + 1}}</span></th>
                        <td><span>{{$item->category->name ?? '-'}}</span></td>
                        <td>
                          <strong>{{$item->name}}</strong>
                          <p class="mt-3">{{$item->description}}</p>
                          <div class="mt-3"><p>{!! $item->origin ? '<strong class="badge bg-primary">' . $item->origin . '</strong>' :  '<span class="error-msg">لا يوجد معلومات عن مصدر المنتج</span>' !!}</p></div>
                          
                        </td>
                        <td>
                          <bdo dir="ltr">{{$item->price}} {{' / '}} {{ $item->priceType}}</bdo>
                          <div class="mt-3">
                            {{-- ?? '<span class="error-msg"> ' . $item->discountPrice . ' </span>' --}}
                            @if ($item->discount == 0 || !isset($item->discount))
                              <span class="error-msg">{{$item->discountPrice}}</span>
                            @else
                              <div>
                                خصم {{$item->discount}}%
                              </div>
                              <div class="d-flex">

                                <span style="color:green" class="me-4">{{$item->discountPrice}}</span>
                                <s style="color: red">{{$item->price}}</s>
                              </div>
                            @endif
                            {{-- {!! $item->discount == 0 ? '<span class="error-msg"> ' . $item->discountPrice . ' </span>' : '<span class="success-msg"> ' . $item->discountPrice . ' </span>' !!}  --}}
                          </div>
                        </td>
                        <td >
                          @if ($item->originalImage)
                            <a href="{{$item->originalImage}}" target="blank">
                                <img src="{{$item->originalImage ?? ''}}" alt="Not found" class="border rounded dashboard-table-image">                                        
                            </a>
                          @else
                          <span>لا يوجد صورة</span>
                          @endif
                        </td>
                        <td>
                          <a class="btn btn-min btn-outline-primary me-4 mb-1" href="{{ route('products.edit', $item->id) }}">
                              <i class="bi bi-pencil-square"></i>
                          </a>
                          <form action="{{ route('products.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this item?') }}');" style="display: inline-block;">
                              <input type="hidden" name="_method" value="DELETE">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <button type="submit" class="btn btn-mini btn-outline-danger"><i class="bi bi-trash"></i></button>
                          </form>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <th scope="row"><span>لا يوجد أصناف</span></th>
                      </tr>
                    @endforelse
                  </tbody>
                  
                </table>
                <bdo dir="ltr">
                  {{$products->links()}}
                </bdo>
                <!-- End Bordered Table -->
               
              </div>
            </div>
          </div>
        </div>
      </section>
    @endif
@endsection