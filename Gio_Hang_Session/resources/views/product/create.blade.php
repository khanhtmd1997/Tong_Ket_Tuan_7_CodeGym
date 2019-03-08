@extends('product/home')
@section('title', 'Thêm mới sản phẩm')
@section('content')
  <div class="col-12 col-md-12">
      <div class="row">
          <div class="col-12">
              <h1>Thêm mới sản phẩm</h1>
          </div>
          <div class="col-12">
              @if (Session::has('errors'))
                        <p class="text-success">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            {{ Session::get('errors') }}
                        </p>
            @endif
          </div>
          <div class="col-12">
              <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                      <label>Tên sản phẩm</label>
                      <input type="text" class="form-control" name="name"  placeholder="Enter name" required>
                  </div>
                  <div class="form-group">
                      <label>Ghi chú</label>
                      <input type="text" class="form-control" name="description" placeholder="Enter description" required>
                  </div>
                  <div class="form-group">
                      <label>Giá</label>
                      <input type="number" class="form-control" name="price" placeholder="Enter price"  required>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlFile1">Ảnh</label>
                    <input type="file" name="picture" class="form-control-file" required>
                  </div>
                  <div class="form-group">
                      <label>Lượt xem</label>
                      <input type="number" class="form-control" name="view_count" placeholder="Vui lòng nhập số 0" required>
                  </div>
 
                  <button type="submit" class="btn btn-primary">Thêm mới</button>
                  <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
              </form>
          </div>
      </div>
  </div>
@endsection

