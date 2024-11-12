@extends('dashboard.layout.app')
@section('content')
  
<section class="section">
  <div class="row">
    <div class="col">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">إضافة صنف</h5>

          <!-- General Form Elements -->
          <form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label"><span>إسم الصنف</span></label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputNumber" class="col-sm-2 col-form-label"><span>صورة الصنف</span></label>
              <div class="col-sm-10">
                <input class="form-control" name="photo" type="file" id="formFile">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-success"><span>حفظ</span></button>
              </div>
            </div>

          </form><!-- End General Form Elements -->

        </div>
      </div>

    </div>
  </div>
</section>

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
  
@endsection