@extends('layouts.app')

@section('titulo', 'Novo Funcionário')

@section('content')
<!-- End Navbar -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<p class="card-category">
						</p>
					</div>
					<div class="card-body">
						@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif
						<form method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label>Empresa</label>
								<select name="empresa_id" class="form-control selectpicker" data-style="btn btn-link">
									<option value="">Selecione uma opção</option>
									@foreach($empresas as $empresa)
									<option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Nome</label>
								<input name="nome" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label>E-mail</label>
								<input name="email" type="email" class="form-control">
							</div>
							<div class="form-group">
								<label>Telefone</label>
								<input name="telefone" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label>CPF</label>
								<input name="cpf" type="text" class="form-control">
							</div>
							<button type="submit" class="btn btn-primary">Salvar</button>
							<a href="{{ route('empresas') }}" class="btn btn-warning">Cancelar</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection