@extends('layouts.app')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col">
            <h2>İzin Yönetimi</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Ana Sayfa</a></li>
                <li class="breadcrumb-item active"><strong>İzinler</strong></li>
            </ol>
        </div>

    </div>
     <div class="wrapper wrapper-content">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{route('admin.exper.permission.save')}}">
                    @csrf
                    <div class="form-group">
                        <input name="id" value="{{$user->id}}" type="hidden"/>
                        <ul class="list-group">
                            @foreach($roles as $role)
                                <li class="list-group-item"><input type="radio" name="roles" @if($user->roles->first()->id === $role->id) checked @endif value="{{$role->id}}"/> {{$role->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Kaydet</button>
                    </div>
                </form>

            </div>
        </div>

    </div>

@endsection
