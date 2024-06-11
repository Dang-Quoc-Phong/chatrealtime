@extends('layouts.app')

@section('style')
<style>
    .item img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        margin-right: 5px;
        object-fit: cover; 
    }
    .item {
        display: flex;
        padding: 10px;
        align-items: center;
        background: rgb(219, 217, 217);
        border-bottom: 1px solid gray;
        position: relative;
    }
    .item:hover{
        opacity: 0.8;
    }
    .status{
        position: absolute;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: green;
        top: 5px;
    }
    .block-chat{
        width: 100%;
        height: 450px;
        border: 1px solid rgb(219, 217, 217);
        overflow: scroll;
        list-style: none;
    }
    .my-message{
        color: blue;
        text-align: right;
    }
</style>
@endsection

@section('content')
<div class="container">
    <a href="{{route('home' )}}" class="btn btn-primary">Tạo nhóm</a>
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                @foreach ($users as $user)
                    
                <div class="col-md-12">
                    <a href="{{ route('chatPrivate',  $user->id )}}" class="item" id="link_{{ $user->id}}">
                      
                            <img src="{{ $user->image}}" alt="">
                            <p>{{$user->name}}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-9">
            <ul class="block-chat">

            </ul>
            <form >
               <div class="d-flex">
                <input type="text"  class="form-control me-2" id="inputChat">
                <button type="button" class="btn btn-success" id="btnSend">Gui</button>
               </div>
            </form>
        </div>
    </div>
</div>
@endsection



@section('script')
    <script type="module">
        Echo.join('chat')
        .here(users => {
            users.forEach(item => {
                let el = document.querySelector(`#link_${item.id}`)
                let elementStatus = document.createElement('div')
                elementStatus.classList.add('status')
                if(el){
                    el.appendChild(elementStatus)
                }
            })
        })
        .joining(user => {
                 let el = document.querySelector(`#link_${user.id}`)
                let elementStatus = document.createElement('div')
                elementStatus.classList.add('status')
                if(el){
                    el.appendChild(elementStatus)
                }
        })
        .leaving(user => {
            let el = document.querySelector(`#link_${user.id}`)
            let elementStatus = el.querySelector('.status')
            if(elementStatus){
                el.removeChild(elementStatus)
            }
        })
        
        .listen('UserOnlined', event => {
        let blockChat = document.querySelector(".block-chat")
        let elementChat = document. createElement( 'li')
        elementChat.textContent = `${event.user.name}: ${event.message}`
        if(event.user.id == "{{ Auth:: user()->id }}"){
        elementChat.classList.add( 'my-message')
        }
        blockChat.appendChild(elementChat)

    })

      let  inputChat = document.querySelector("#inputChat")
      let  btnSend = document.querySelector("#btnSend")

      btnSend.addEventListener('click', function() {
        axios.post('{{ route("sendMessage")}}', {
            'message': inputChat.value
       })
       .then(data => {
        console.log(data.data.success);
        inputChat.value = ''
       })
        
      })
    </script>
@endsection


