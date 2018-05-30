@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="container">
  <div class="row">
    <div class="col s12">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="#" class="breadcrumb">Dashboard</a>
            <a href="{{ route('users') }}" class="breadcrumb">Users</a>
          </div>
        </div>
      </nav>
      <div class="card">
        <div class="card-content">
          <p><a class="waves-effect waves-light btn" href="#modal1">Create new users <i class="material-icons left">add</i></a></p>
          <br />
          <span class="card-title">Users</span>
            <table class="striped">
              <tr>
                <td>Name</td>
                <td>E-mail</td>
              </tr> 
              @foreach($users as $item)
              <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
              </tr>
              @endforeach
            </table>
            {{ $users->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <h4>Modal Header</h4>
    <p>A bunch of text</p>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
  </div>
</div>
@endsection

@push('js')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
</script>
@endpush