@extends('layout.main')

@section('content')
  <h3><i class="fa fa-users"></i> Usuários</h3>

  @include('alert.validate')

  <div class="row mt">
  	<div class="col-lg-12">
        <div class="form-panel">
        	  <h4 class="mb">Altere os dados do usuários cadastrado</h4>
            <form action="{{ route('users.update', [$user->id]) }}" class="form-horizontal style-form" method="post">
              {{ method_field('PUT') }}
              {{ csrf_field() }}

              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nome</label>
                  <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Senha</label>
                  <div class="col-sm-10">
                      <input type="password" name="password" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Atualizar</button>
                  <a href="{{ route('users.index') }}" class="btn btn-default">Cancelar</a>
                </div>
              </div>
            </form>
        </div>
  	</div><!-- col-lg-12-->
  </div><!-- /row -->
@endsection