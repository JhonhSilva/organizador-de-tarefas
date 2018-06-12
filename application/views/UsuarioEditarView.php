<body>
		<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="/usuario/tarefas">
			  		Organizador de Tarefas
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						<li><a href="<?= base_url('usuario/tarefas') ?>">
                        Cancelar
                        </a></li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->

	<?php
	?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form class="form-vertical" id="formCadastro" method="POST" action="<?= base_url('usuario/editar') ?>" onsubmit="return Validate()">
						<div class="module-head">
							<h3>Cadastrar Usuário</h3>
						</div>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" id="inputNome" name="nome" placeholder="Nome" value="<?= $nome ?>" required>
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="email" id="inputEmail" name="email" placeholder="Email" value="<?= $email ?>" readonly required>
									<?php
										 $error = $this->session->flashdata('msgErro');
										 echo isset($error) ?
								        "<div>
								          $error
								        </div>" : 
								        "";
									?>
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="password" id="inputPassword" name="senha" placeholder="Senha" required>
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="password" id="inputPassword2" name="senha2" placeholder="Confirme a senha" required>
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" value="Entrar" class="btn btn-primary pull-right">Salvar</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->


	<script>
	
		$('#formCadastro').submit(function() {
		    if (validate()) {
		    	return true; // return false to cancel form action
		    } else {
		    	return false;
		    }
		});
		
		function Validate() {
			if (document.getElementById('inputPassword').value === document.getElementById('inputPassword2').value)
				return true;
			else
				alert('Senhas não são iguais!')
				return false;
		}
	</script>