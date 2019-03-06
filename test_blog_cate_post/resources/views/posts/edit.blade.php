@extends('posts/home')

@section('title', 'Cập nhật Bài viết')


@section('content')

  <div class="row">

      <div class="col-md-12">

          <h2>Cập nhật Bài viết</h2>

      </div>

      <div class="col-md-12">

          <form method="post" action="" enctype="multipart/form-data">

              @csrf

              <div class="form-group">

                  <label>Tiêu đềc</label>

                  <input type="text" class="form-control" name="title" value="{{ $post->title }}" required>

              </div>
              <div class="form-group">

                  <label>Tóm tắt</label>

                  <input type="text" class="form-control" name="summary" value="{{ $post->summary }}" required>

              </div>

              <div class="form-group">

                  <label>Nội dung</label>

                  <textarea class="form-control" rows="3" name="content"  required>{{ $post->content }}</textarea>

              </div>

              <div class="form-group">

                  <label>Ảnh</label>

                  <input type="file" name="picture" class="form-control-file" >

              </div>
               <div class="form-group">

                  <label>Danh mục</label>
                  <input type="text" class="form-control" name="category_id" value="{{ $post->category_id }}" required>
            

                 <!--  <textarea class="form-control" rows="3" name="content"  required>{{ $post->category_id }}</textarea> -->

              </div>


              <button type="submit" class="btn btn-primary">Chỉnh sửa</button>

              <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>

          </form>

      </div>

  </div>


@endsection