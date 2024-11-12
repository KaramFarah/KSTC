<div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label"><span>إسم الصنف</span></label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control" value="{{isset($category) ? $category->name : ''}}">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputNumber" class="col-sm-2 col-form-label"><span>صورة الصنف</span></label>
    <div class="col-sm-10">
      <input class="form-control" name="photo" type="file" id="formFile" value="{{isset($category) ? $category->originalImage : ''}}">
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-success"><span>حفظ</span></button>
    </div>
  </div>