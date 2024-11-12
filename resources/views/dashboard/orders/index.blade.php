@extends('dashboard.layout.app')
@section('content')
      <section id="products_card" class="section">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                  <h5 class="card-title">قائمة الطلبات</h5>
                </div>
                <!-- Bordered Table -->
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col"><span>مستلم الطلب</span></th>
                      <th scope="col"><span>معلومات التسليم</span></th>
                      <th scope="col"><span>ملاحظات اضافية</span></th>
                      <th scope="col"><span>تاريخ الطلب</span></th>
                      <th scope="col"><span></span></th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @forelse ($orders as $item)
                      <tr>
                        <td scope="row"><span>{{$loop->index + 1}}</span></td>

                        <td>
                          <span>{{$item->name}}</span>
                          <br>
                          <p class="badge bg-primary">{{$item->user->email}}</p>
                        </td>
                        <td>
                            <span> <i class="bi bi-geo-alt"></i> {{$item->location}}</span>
                            <p> <i class="bi bi-telephone"></i> {{$item->phone}}</p>
                        </td>
                        <td >
                            <span>{{$item->notes ?? '-'}}</span>
                        </td>
                        <td >
                            <span>{{$item->created_at}}</span>
                        </td>
                        <td>
                            <a class="btn btn-min btn-outline-primary me-4 mb-1" href="{{ route('orders.show',[ 'order' => $item->id , 'index' => $loop->index + 1]) }}">
                                <i class="bi bi-eye"></i>
                            </a>
                          {{-- <a class="btn btn-min btn-outline-primary me-4 mb-1" href="{{ route('products.edit', $item->id) }}">
                              <i class="bi bi-pencil-square"></i>
                          </a> --}}
                          <form action="{{ route('orders.destroy', $item) }}" method="POST" onsubmit="return confirm('{{ __('Are You Sure?') }}');" style="display: inline-block;">
                              @csrf
                              @method('DELETE')
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
                {{-- <bdo dir="ltr">
                  {{$products->links()}}
                </bdo> --}}
                <!-- End Bordered Table -->
               
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection