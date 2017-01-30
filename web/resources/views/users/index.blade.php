@extends('layout.main')

@section('content')
  <h3><i class="fa fa-users"></i> Usuários</h3>

  @if (session()->has('notice'))
    <div class="alert alert-{{ session('notice')['alert'] }}">
      <p>{{ session('notice')['message'] }}</p>
    </div>
  @endif

  <div class="row mt">
      <div class="col-md-12">
          <div class="content-panel">
              <h4>Listagem dos usuários cadastrados na base de dados</h4>
              <hr>
              <table class="table table-striped table-advance table-hover">
                  <thead>
                    <tr>
                        <th># ID</th>
                        <th><i class="fa fa-user"></i> Nome</th>
                        <th><i class="fa fa-envelope"></i> Email</th>
                        <th><i class=" fa fa-edit"></i> Criado em</th>
                        <th><i class=" fa fa-edit"></i> Atualizado em</th>
                        <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                      <tr>
                          <td>{{ $user->id }}</td>
                          <td><a href="{{ route('users.edit', [$user->id]) }}">{{ $user->name }}</a></td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->created_at }}</td>
                          <td>{{ $user->updated_at }}</td>
                          <td>
                              <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                              <a class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
          </div><!-- /content-panel -->
      </div><!-- /col-md-12 -->
  </div><!-- /row -->
@endsection