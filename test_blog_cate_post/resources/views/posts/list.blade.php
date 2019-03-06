
@extends('posts/home')
@section('title', 'Danh sách Bài viết')
@section('content')
<a class="btn btn-primary" href="{{ route('posts.create')}}">Thêm mới</a>
     <div class="col-12">
           <div class="row">
               <div class="col-12"><h1>Danh Sách Bài viết</h1></div>
                <a class="btn btn-outline-primary" href="" data-toggle="modal" data-target="#categoryModal">
                Lọc
                </a>
               <form action="{{route('posts.fillerByCategory')}}">
                   @csrf
                  <div class="row">
                    <div class="col-12">
                       @if (Session::has('success'))
                        <p class="text-success">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            {{ Session::get('success') }}
                        </p>
                    @endif
       
                    @if(isset($total))
                            <span class="text-muted">
                          {{'Tìm thấy' . ' ' . $total . ' '. 'Danh mục:'}}
                      </span>
                    @endif
       
                    @if(isset($categoryFiller))
                         <div class="pl-5">
                         <span class="text-muted"><i class="fa fa-check" aria-hidden="true"></i>
                             {{ 'Thuộc tỉnh' . ' ' . $categoryFiller->name }}</span>
                            </div>
                    @endif
                    </div>
                  </div>
               </form>
               <div class="col-12">
                   @if (Session::has('success'))
                      <p class="text-success">
                         <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                      </p>
                   @endif
               </div>
                <div class="col-6">

            <form class="navbar-form navbar-left" action="{{route('posts.search')}}">
              @csrf
                <div class="row">

                    <div class="col-8">

                        <div class="form-group">

                            <input type="text" class="form-control" id="keyword" name="keyword"  placeholder="Search">

                        </div>

                    </div>

                    <div class="col-4">

                        <button type="submit" class="btn btn-default">Tìm kiếm</button>

                    </div>

                </div>

            </form>

          </div>
          <table class="table table-striped">
          <thead>
          <tr>
                <th scope="col">#</th>
                <th scope="col">Tiều đề</th>
                <th scope="col">Tóm tắt</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Danh mục</th>
                <th></th>
                <th></th>
          </tr>
          </thead>
          <tbody>
          @if(count($posts) == 0)
          <tr><td colspan="4">Không có dữ liệu</td></tr>
          @else
                @foreach($posts as $key => $post)
                <tr>
                      <th scope="row">{{ $post->id }}</th>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->summary }}</td>
                      <td>{{ $post->content }}</td>
                      <td><img src="{{ asset('storage/'.$post->picture) }}" width="40" height="auto"></td>
                      <td>{{ $post->category_id }}</td>
                      <td><a href="{{ route('posts.edit',$post->id)}}">sửa</a></td>
                      <td><a  class="text-danger"  href="{{ route('posts.destroy', $post->id) }}"  onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                </tr>
                @endforeach
          @endif
          </tbody>
          </table>
          <div class="col-12">{{ $posts->appends(request()->query()) }}</div>
          </div>
      </div>
      <div class="modal fade" id="categoryModal" role="dialog">
          <div class="modal-dialog modal-lg">
              <!-- Modal content-->
              <form action="{{ route('posts.fillerByCategory') }}" method="get">
                 @csrf
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                          <!--Lọc theo khóa học -->
                          <div class="select-by-program">
                              <div class="form-group row">
                                  <label class="col-sm-5 col-form-label border-right">Lọc bài viết theo danh mục</label>
                                  <div class="col-sm-7">
                                      <select class="custom-select w-100" name="category_id">
                                          <option value="">Chọn danh mục</option>
                                          @foreach($categories as $category)
                                              @if(isset($categoryFiller))
                                                  @if($category->id == $categoryFiller->id)
                                                      <option value="{{$category->id}}" selected >{{ $category->name }}</option>
                                                  @else
                                                      <option value="{{$category->id}}">{{ $category->name }}</option>
                                                  @endif
                                              @else
                                                  <option value="{{$category->id}}">{{ $category->name }}
                                                  </option>
                                              @endif
                                          @endforeach
                                      </select>
                                  </div>
                              </div>
                              <!-- </form> -->
                          </div>
                          <!--End-->
 
                      </div>
                      <div class="modal-footer">
                          <button type="submit" id="submitAjax" class="btn btn-primary" >Chọn</button>
                          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
@endsection