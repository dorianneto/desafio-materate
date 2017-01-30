@extends('layout.main')

@section('content')
  <h3><i class="fa fa-users"></i> Usuários</h3>

  @include('alert.notice')

  <div class="row mt">
      <div class="col-md-12">
          <div class="content-panel">
              <header>
                <h4 class="pull-left">Listagem dos usuários</h4>
                <a href="{{ route('users.trash') }}" class="btn btn-default pull-right"><i class="fa fa-trash-o"></i> Lixeira</a>
                <div class="clearfix"></div>
              </header>
              <hr>
              <div class="table-responsive">
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
                                <form class="form-inline" action="{{ route('users.destroy', [$user->id]) }}" method="post">
                                  {{ method_field('DELETE') }}
                                  {{ csrf_field() }}

                                  <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                  <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
                                </form>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
              </div>
          </div><!-- /content-panel -->
      </div><!-- /col-md-12 -->
  </div><!-- /row -->
@endsection