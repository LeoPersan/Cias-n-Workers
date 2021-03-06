@extends('layouts.app')

@push('scripts')
<script type="text/javascript">
	$('button.deletar').click(function() {
		if(!confirm('Você tem certeza que deseja deletar esse funcionário?')) return false;
	});
</script>
@endpush

@section('content')
<!-- End Navbar -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h2 class="card-title float-left">Funcionários</h2>
						<p class="card-category">
							<a href="{{ route('funcionarioCreate') }}" class="btn btn-info float-right">Novo Funcionário</a>
						</p>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<form method="get" class="row">
								<div class="form-group col-5">
									<input type="text" class="form-control" name="empresa" placeholder="Filtre pela Empresa" value="{{ $empresa }}">
								</div>
								<div class="form-group col-5">
									<input type="text" class="form-control" name="funcionario" placeholder="Filtre pelo Funcionário" value="{{ $funcionario }}">
								</div>
								<div class="form-group col-2">
									<button class="btn btn-info">Pesquisar</button>
								</div>
							</form>
							<table class="table table-hover">
								<thead class="text-primary">
									<th>
										Nome
									</th>
									<th>
										E-mail
									</th>
									<th>
										Telefone
									</th>
									<th>
										CPF
									</th>
									<th>
										Empresa
									</th>
									<th>
										Editar
									</th>
									<th>
										Excluir
									</th>
								</thead>
								<tbody>
									@foreach ($funcionarios as $funcionario)
									<tr>
										<td>
											<a href="{{ route('funcionario',[$funcionario->id,$funcionario->slug]) }}">{{ $funcionario->nome }}</a>
										</td>
										<td>
											{{ $funcionario->email }}
										</td>
										<td>
											{{ $funcionario->telefone }}
										</td>
										<td>
											{{ $funcionario->cpf }}
										</td>
										<td>
											<a href="{{ route('empresa',[$funcionario->empresa->slug]) }}">{{ $funcionario->empresa->nome }}</a>
										</td>
										<td>
											<a href="{{ route('funcionarioEdit',[$funcionario->id,$funcionario->slug]) }}" class="btn btn-warning">Editar</a>
										</td>
										<td>
											<form action="{{ route('funcionarioDestroy',[$funcionario->id,$funcionario->slug]) }}" method="post">
												@csrf()
												<button class="deletar btn btn-danger" class="btn-danger">Deletar</button>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							{{ $funcionarios->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection