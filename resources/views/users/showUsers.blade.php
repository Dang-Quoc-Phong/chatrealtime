@extends('layouts.app')

@section('style')
    <style>
        .img-users{
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd">Them moi</button>
   <table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Image</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
     <tbody id="tbody">
      @foreach ($users as $key => $user)
      <tr id="row_{{$user->id}}">
          <td>{{$key + 1}}</td>

          <td>{{$user->name}}</td>
          <td>
             <img src=" {{$user->image}}" class="img-users" alt="">
          </td>
          <td>{{$user->email}}</td>
          <td>
              <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit"
              data-id='{{ $user->id}}'>Sua</button>
              <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete"
              data-id='{{ $user->id}}' >Xoa</button>
          </td>
      </tr>
  @endforeach
     </tbody>
   </table>
</div>
<!-- Them moi -->
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" id="name" placeholder="Name..." class="form-control">
          </div>
          <div class="mb-3">
            <label for="image">Image</label>
            <input type="text" id="image" placeholder="Image..."  class="form-control">
          </div>
          <div class="mb-3">
            <label for="email">Email</label>
            <input type="text" id="email" placeholder="Email..."  class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Dong</button>
          <button type="button" class="btn btn-primary" id="btnAddUser">The moi</button>
        </div>
      </div>
    </div>
</div>



<!-- Chinh sua -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditLabel">Chinh Sua</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="userIdUp">
          <div class="mb-3">
            <label for="nameUp">Name</label>
            <input type="text" id="nameUp" placeholder="Name..." class="form-control">
          </div>
          <div class="mb-3">
            <label for="imageUp">Image</label>
            <input type="text" id="imageUp" placeholder="Image..."  class="form-control">
          </div>
          <div class="mb-3">
            <label for="emailUp">Email</label>
            <input type="text" id="emailUp" placeholder="Email..."  class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Dong</button>
          <button type="button" class="btn btn-primary" id="btnUpdateUser">Chinh sua</button>
        </div>
      </div>
    </div>
</div>




<!-- xoa -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalDeleteLabel">Xac nhan xoa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <p >Ban co muon xoa hay khong</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Dong</button>
          <button type="button" class="btn btn-danger" id="btnDeleteUser">Xac nhan xoa</button>
        </div>
      </div>
    </div>
</div>





@endsection

@section('script')
    <script type="module">
    // Them moi
    let name = document.querySelector("#name")
    let image = document.querySelector("#image")
    let email = document.querySelector("#email")

    function refresh() {
        name:  name.value = ''
       image:  image.value = ''
        email: email.value = ''
    }
        let btnAddUser = document.querySelector("#btnAddUser")
        btnAddUser. addEventListener('click', function() {
            axios.post('{{ route("postAddUser") }}', {
                name: name.value,
                image: image.value,
                email: email.value
            })
            .then((data) => {
                console.log(data);
                let modalAdd = document.querySelector('#modalAdd')
                let close = modalAdd.querySelector('.btn-close')
                close.click()
                refresh()

                
            })
        })
        
        // Chinh sua
        function refreshFormUpdate() {
        nameUp:  name.value = ''
        imageUp:  image.value = ''
        emailUp: email.value = ''
    }
        let nameUp = document.querySelector("#nameUp")
        let imageUp = document.querySelector("#imageUp")
        let emailUp = document.querySelector("#emailUp")
        // Khi modal edit duoc show
    var modalEdit = document.getElementById('modalEdit')
    modalEdit.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var id = button.getAttribute('data-id')
        axios.post('{{route("postDetailUser")}}', {
          id
        })
        .then(data => {
          nameUp.value = data.data.name
          imageUp.value = data.data.image
          emailUp.value = data.data.email
          userIdUp.value = id
        })
})
    let btnUpdateUser = document.querySelector('#btnUpdateUser')
    btnUpdateUser.addEventListener('click', function() {
      axios.post('{{ route("postUpdateUser") }}', {
                name: nameUp.value,
                image: imageUp.value,
                email: emailUp.value,
                id: userIdUp.value
            })
            .then((data) => {
                console.log(data);
                let modalEdit = document.querySelector('#modalEdit')
                let close = modalEdit.querySelector('.btn-close')
                close.click()
                refreshFormUpdate()

                
            })
    })


    // xoa
    var idDelete
    var modalDelete = document.getElementById('modalDelete')
    modalDelete.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
       idDelete = button.getAttribute('data-id')

     
})

    let btnDeleteUser = document.querySelector("#btnDeleteUser")
    btnDeleteUser.addEventListener('click', function() {
      axios.post('{{route("postDeleteUser")}}', {
        id: idDelete
      })
      .then(data => {
        console.log(data);
                let modalDelete = document.querySelector('#modalDelete')
                let close = modalDelete.querySelector('.btn-close')
                close.click()
               

      })
    })



    // lang nghe event
    Echo.channel('users')
      .listen('UserCreated', event => {
        console.log(event.user);
         let UI = `
         <tr id="row_${event.user.id}">
          <td></td>

          <td>${event.user.name}</td>
          <td>
             <img src=" ${event.user.image}" class="img-users" alt="">
          </td>
          <td>${event.user.email}</td>
          <td>
              <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit"
              data-id='${event.user.id}'>Sua</button>
              <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete"
              data-id='${event.user.id}' >Xoa</button>
          </td>
      </tr>
          `
          let tbody = document.querySelector('#tbody')
          tbody.insertAdjacentHTML("afterbegin", UI)
      })
      .listen('UserUpdated', event => {
        let tr = document.querySelector(`tr#row_${event.user.id}` )
        let UI = `
        
          <td></td>

          <td>${event.user.name}</td>
          <td>
             <img src=" ${event.user.image}" class="img-users" alt="">
          </td>
          <td>${event.user.email}</td>
          <td>
              <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit"
              data-id='${event.user.id}'>Sua</button>
              <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete"
              data-id='${event.user.id}' >Xoa</button>
          </td>
     
          `
          tr.innerHTML  = UI
      })
        .listen('UserDeleted', event => {
        let tr = document.querySelector(`tr#row_${event.user.id}` )
          tr.remove()
        })
    </script>
@endsection