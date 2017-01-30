@extends('layout.main')

@section('content')
  <h3><i class="fa fa-users"></i> Usuários</h3>

  @include('alert.notice')

  <div class="row mt">
      <div class="col-md-12">
          <div class="content-panel">
              <header>
                <h4 class="pull-left">Listagem dos usuários <span class="badge">lixeira</span></h4>
                <a href="{{ route('users.index') }}" class="btn btn-default pull-right"><i class="fa fa-arrow-left"></i> Voltar</a>
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
                        <tr class="danger">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>
                                <form class="form-inline" action="{{ route('users.force_delete', [$user->id]) }}" method="post">
                                  {{ method_field('DELETE') }}
                                  {{ csrf_field() }}

                                  <a href="{{ route('users.restore', [$user->id]) }}" class="btn btn-success btn-xs"><i class="fa fa-undo"></i></a>
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