<body>
	
	<script>
		function Validate() {
			if (document.getElementById('inputPassword').value === document.getElementById('inputPassword2').value)
				return true;
			else
				alert('Senhas não são iguais!')
				return false;
		}
	</script>
	
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="index.html">
			  		Organizador de Tarefas
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						<li><a href="<?= base_url('usuario/logar') ?>">
                        Login
                        </a></li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form class="form-vertical" method="POST" action="<?= base_url('usuario/cadastrar') ?>" onsubmit="return Validate()">
						<div class="module-head">
							<h3>Cadastrar Usuário</h3>
						</div>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="email" id="inputEmail" name="login" placeholder="Login" required>
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
									<button type="submit" value="Entrar" class="btn btn-primary pull-right">Cadastrar</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->