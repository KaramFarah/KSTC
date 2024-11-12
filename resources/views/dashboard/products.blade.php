@extends('dashboard.layout.app')
@section('content')
@if(auth()->user()->isAdmin)      
  <section class="section">
    <div class="row">
      <div class="col">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">إضافة منتج</h5>

            <!-- General Form Elements -->
            <form>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"><span>الصنف</span></label>
                <div class="col-sm-10">
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label"><span>الوصف</span></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label"><span>الوزن</span></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label"><span>السعر</span></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label"><span>صورة المنتج</span></label>
                <div class="col-sm-10">
                  <input class="form-control" type="file" id="formFile">
                </div>
              </div>
              <div class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0"><span>منتج مميز ؟</span></legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                  </div>
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