@extends('layouts.app')

@section('style')
    
@endsection

@section('content')
<div class="container">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd">
        Tạo nhóm
      </button>
    <a href="{{route('chat' )}}" class="btn btn-primary mt-2" >Thoát chát</a>

      <div class="row">
        <div class="col-md-6">
            <p>Nhóm của bạn</p>
            @foreach ($myGroup as $value)
                    <a href="{{route('chatGroup', $value->id)}}">{{$value->name}}</a>
            @endforeach
        </div>
        <div class="col-md-6">
            <p>Nhóm bạn làm thành viên</p>
            @foreach ($myGroupNotLeader as $value)
                    <a href="{{route('chatGroup', $value->groupchatId)}}">{{$value->name}}</a>
            @endforeach
        </div>
      </div>
</div>

<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAddLabel">Tạo nhóm</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('createGroup')}}" method="post">
            @csrf
            <div class="modal-body">
               <div class="mb-3">
                    <label for="name">Tên nhóm</label>
                    <input type="text" class="form-control" id="name" name="name">
               </div>
               <div class="mb-3">
                    <label for="leader">Trưởng nhóm</label>
                    <input type="text" class="form-control" id="leader" name="leader" value="{{ Auth::user()->name}}" disabled>
               </div>

              <div class="mb-3">
                <label for="menber">Danh sách thành viên</label>
                <select class="form-control" id="menber" name="menber[]" multiple>
                    @foreach ($users as $users)
                        <option value="{{$users->id}}">{{$users->name}}</option>
                    @endforeach
                   </select>
              </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Tạo nhóm</button>
              </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')
    
@endsection
