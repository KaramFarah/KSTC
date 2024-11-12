@extends('dashboard.layout.app')
@section('content')
@if(auth()->user()->isAdmin)              
  <section class="section">
    <div class="row">
      <div class="col">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">تعديل صور السلايدر</h5>

            <!-- General Form Elements -->
            <form method="POST" action="{{route('slider.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label"><span>الصورة الأولى</span></label>
                <div class="col-sm-10">
                  <input class="form-control" name="slide1" type="file" id="formFile">
                  @error('slide1')
                    <div class="error-msg mt-1">رجاءً أدخل صورة من نوع <bdo dir="ltr">JPG / PNG</bdo> بحجم أقل من  <bdo dir="ltr">2Mb</bdo> </div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label"><span>الصورة الثانية</span></label>
                <div class="col-sm-10">
                  <input class="form-control" name="slide2" type="file" id="formFile">
                  @error('slide2')
                    <div class="error-msg mt-1">رجاءً أدخل صورة من نوع <bdo dir="ltr">JPG / PNG</bdo> بحجم أقل من  <bdo dir="ltr">2Mb</bdo> </div>
                  @enderror
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
@endif
  
  
@endsection