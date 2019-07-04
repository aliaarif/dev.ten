@extends('layouts.backend')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Update {{ $user->name }}</div>

        <div class="card-body">
          <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT')


            <ul class="login-with">                

              



              @foreach($roles as $role)
              <div class="form-check">
                <input type="checkbox" name="roles[]" value="{{ $role->id }}" 
                {{ $user->hasAnyRole($role->name) ? 'checked' : '' }} >   
                <label>{{ $role->name }}</label>
              </div>
              @endforeach

              <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
