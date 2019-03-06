@extends('posts/home')

@section('title', 'Thêm mới Bài viết')


@section('content')

  <div class="row">

      <div class="col-md-12">

          <h2>Thêm mới Bài viết</h2>

      </div>

      <div class="col-md-12">

          <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">

              @csrf

              <div class="form-group">

                  <label >Tiêu đề</label>

                  <input type="text" class="form-control" name="title" required>

              </div>
              <div class="form-group">

                  <label >Tóm tắt</label>

                  <input type="text" class="form-control" name="summary" required>

              </div>

              <div class="form-group">

                  <label >Nội dung</label>

                  <textarea class="form-control" rows="3" name="content" required></textarea>

              </div>

              <div class="form-group">

                  <label for="exampleFormControlFile1">Ảnh</label>

                  <input type="file" name="picture" class="form-control-file" required>

              </div>
              <div class="form-group">

                  <label for="form-control">Danh mục</label>

                  <input type="number" name="category_id" required>

              </div>


              <button type="submit" class="btn btn-primary">Thêm mới</button>

              <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>

          </form>

      </div>

  </div>


@endsection