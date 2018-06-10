	<div class="span9">
					<div class="content">

						<div class="module message">
							<div class="module-head">
								<h3>Controle de tarefas</h3>
							</div>
							<div class="module-option clearfix">
								<div class="pull-left">
									Filtro : &nbsp;
									<div class="btn-group">
										<button class="btn">Todas</button>
										<button class="btn dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu">
											<li><a <a href="<?= base_url('tarefa/filtrar/') . 0 ?>">Todas</a></li>
											<li><a <a href="<?= base_url('tarefa/filtrar/') . 1 ?>">Em Progresso</a></li>
											<li><a <a href="<?= base_url('tarefa/filtrar/') . 2 ?>">Feitas</a></li>
										</ul>
									</div>
								</div>
								<div class="pull-right">
									<a href="#" class="btn btn-primary">Criar Tarefa</a>
								</div>
							</div>
							<div class="module-body table">				

								<table class="table table-message">
									<tbody>
										<tr class="heading">
											<td class="cell-icon"></td>
											<td class="cell-title">Tarefas</td>
											<td class="cell-status hidden-phone hidden-tablet">Status</td>
											<td class="cell-time align-right">Data de Entrega</td>
											<td class="cell-time align-right">Deletar Tarefa</td>
										</tr>
										<?php if ($tarefas[0]['total'] == 0) { ?>
											<tr class="task">
    											<td class="cell-icon" style="width: 20px"></td>
    											<td class="cell-title"><div>Nenhuma tarefa encontrada</div></td>
    											<td class="cell-status hidden-phone hidden-tablet"></td>
    											<td class="cell-time align-right"></td>
    										</tr>
                                        <?php } else { ?>
                                        <?php foreach ($tarefas as $tarefa) : ?>
                                            <tr class="task <?php echo $tarefa['status_id'] == 1 ? 'resolved' : '' ?>">
                                                
                                                <td class="cell-icon" style="width: 20px"><a href="<?= base_url('tarefa/atualizar/') . $tarefa['tarefa_id'] . '/' . $tarefa['status_id'] ?>" class="" title="Atualizar"><span data-feather="edit"></span>
                                                    <i class="icon-checker high"></i>
                                                     </a>
                                                </td>
    											<td class="cell-title"><div> <?= $tarefa['tarefa_descricao'] ?></div></td>
    											<td class="cell-title">
    											    <?php if ($tarefa['status_id'] == '2') { ?>
    											         <b class="btn alert-info">
    											         Pendente
    											         </b>
    											    <?php } else { ?>
    											        <b class="btn alert-success">
    											            Concluida
    											        </b>
    											        <?php } ?>
    											 </td>
    											<td class="cell-time align-right"><?= $tarefa['tarefa_data_termino'] ?></td>
    											<td class="cell-time align-right">
    											    <p  id="delete-btn" class="" title="Atualizar">
                                                        X    
                                                    </p>
    											</td>
										    </tr>
                                        <?php endforeach; }  ?>
									</tbody>
								</table>


							</div>
							<div class="module-foot">
							</div>
						</div>
						
					</div><!--/.content-->
				</div><!--/.span9-->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
   document.getElementById("delete-btn").addEventListener("click", function (event)
            {
                swal({
                    title: "Você deseja deletar a tarefa?",
                    text: "Você não pode recuperar uma tarefa deletada!",
                    icon: "warning",
                    buttons: {
                        cancel: {
                            visible: true,
                            text: "Não, desejo voltar!",
                            closeModal: false,
                        },
                        confirm: {
                            text: "Sim, delete!",
                            className: "doit",
                            closeModal: false,
                        },
                    },
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("!", "Sua tarefa foi deletada", "success")
                                .then(() => {
                                    window.location.href = "<?= base_url('tarefa/deletar/') . $tarefa['tarefa_id'] ?>";
                                });
                    } else {
                          swal("Cancelado", "Sua tarefa está a salvo :)", "error");
                    }
                });
            });
</script>