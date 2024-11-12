
<div class="row mb-3">
  <label for="name" class="col-sm-2 col-form-label"><span>إسم المنتج</span></label>
  <div class="col-sm-10">
    <input id="name" type="text" name="name" class="form-control has-validation" value="{{isset($product) ? ($product->name ?? '') : ''}}"  >

  </div>
</div>

<div class="row mb-3">
  <label class="col-sm-2 col-form-label"><span>الصنف</span></label>
  <div class="col-sm-10">
    
    <select name="category_id" class="form-select" aria-label="Default select example"  >
      @foreach ($categories as $item)
      @isset($product->category)
      
        <option @selected($item->id == $product->category->id ) value="{{$item->id}}"><span>{{$item->name}}</span></option>
      @else
        <option value="{{$item->id}}"><span>{{$item->name}}</span></option>
      @endisset
      @endforeach
    </select>
  </div>
</div>

<div class="row mb-3">
  <label for="inputText" class="col-sm-2 col-form-label"><span>الوصف</span></label>
  <div class="col-sm-10">
    <input id="validationCustom05" type="text" name="description" class="form-control has-validation" value="{{isset($product) ? ($product->description ?? '') : ''}}"  >

  </div>
</div>
<div class="row mb-3">
  <label for="origin" class="col-sm-2 col-form-label"><span>بلد المنشأ</span></label>
  <div class="col-sm-10">
    <input id="origin" type="text" name="origin" class="form-control has-validation" value="{{isset($product) ? ($product->origin ?? '') : ''}}">
  </div>
</div>


<div class="row mb-3">
  <label for="inputText" class="col-sm-2 col-form-label"><span>السعر</span></label>
  <div class="col">
    <input type="text" name="price" class="form-control" value="{{isset($product) ? ($product->price ?? '') : ''}}"  >
    @error('price')
      <span class="error-msg">يجب أن يكون السعر رقماً</span>
    @enderror
  </div>
  <div class="col-2">
    <div>
      <select name="price_by" class="form-select" aria-label="Default select example"  >
        @foreach ($priceTypes as $key => $item)
          <option @selected($key == $product->price_by ) value="{{$key}}"><span>{{$item}}</span></option>
        @endforeach
      </select>
    </div>
  </div>
</div>

<div class="row mb-3">
  <label for="discount" class="col-sm-2 col-form-label"><span>إضافة حسم</span></label>
  <div class="col-sm-10">
    <input class="form-control" name="discount" type="number" id="discount" value="{{isset($product) ? $product->discount : ''}}">
    @error('discount')
      <span class="error-msg">يجب أن يكون الحسم رقماً أصغر من 100</span>
    @enderror
  </div>
</div>

<div class="row mb-3">
  <label for="inputNumber" class="col-sm-2 col-form-label"><span>صورة المنتج</span></label>
  <div class="col-sm-10">
    <input class="form-control" name="photo" type="file" id="formFile" value="{{isset($product) ? $product->originalImage : ''}}">
  </div>
</div>

<!-- KEY : DROPZONE starts -->
{{-- @include('dashboard.partials.image-input' , ['mainPhotoFlag' => true]) --}}

{{-- var filename = ''
if (file.hasOwnProperty('upload')) {
    filename = file.upload.filename;
} else {
    filename = file.name;
}
$.ajax({
    type: 'DELETE',
    url: "{{ route('deleteMedia') }}",
    headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    data: {
        filename: fileNewName,
    },
    sucess: function(data) {
        console.log('removed success: ' + data);
    }
}); --}}
<!-- KEY : DROPZONE ends -->

<div class="row mb-3">
  <div class="col-sm-10">
    <button id="submit-all" class="btn btn-success"><span>حفظ</span></button>
  </div>
</div>

