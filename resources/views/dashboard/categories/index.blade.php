@extends('dashboard.layout.app')
@section('content')
    <section class="section">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">تعديل صنف</h5>
              @if (Route::current()->getName() === 'categories.index')

                @include('dashboard.categories.create')

              @else

                @include('dashboard.categories.edite' , ['category' => $category ?? new App\Models\Admin\Category()])

              @endif
            </div>
          </div>

        </div>
      </div>
    </section>
    
    @if (Route::current()->getName() === 'categories.index')
      <section class="section">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">قائمة الأصناف</h5>
                <!-- Bordered Table -->
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col" class="w-25"><span>إسم الصنف</span></th>
                      <th scope="col"><span>صورة الصنف</span></th>
                      <th scope="col" class="w-25"><span></span></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($categories as $item)
                      <tr>
                        <th scope="row"><span>{{$item->id}}</span></th>
                        <td><span>{{$item->name}}</span></td>
                        <td>
                          @if ($item->squerImage)
                            <a href="{{$item->squerImage}}" target="blank">
                                <img src="{{$item->squerImage ?? ''}}" alt="Not found" class="border rounded dashboard-table-image">                                        
                            </a>
                          @else
                          <span>لا يوجد صورة</span>
                          @endif
                        </td>
                        <td>
                          <a class="btn btn-min btn-outline-primary me-4 mb-1" href="{{ route('categories.edit', $item->id) }}">
                              <i class="bi bi-pencil-square"></i>
                          </a>
                          <form action="{{ route('categories.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this item?') }}');" style="display: inline-block;">
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
                <!-- End Bordered Table -->
              </div>
            </div>
          </div>
        </div>
      </section>
    @endif
@endsection