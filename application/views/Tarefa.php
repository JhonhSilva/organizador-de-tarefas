	<div class="span9">
					<div class="content">

						<div class="module message">
							<div class="module-head">
								<h3>Task Management Tool</h3>
							</div>
							<div class="module-option clearfix">
								<div class="pull-left">
									Filter : &nbsp;
									<div class="btn-group">
										<button class="btn">All</button>
										<button class="btn dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu">
											<li><a href="#">All</a></li>
											<li><a href="#">In Progress</a></li>
											<li><a href="#">Done</a></li>
											<li class="divider"></li>
											<li><a href="#">New task</a></li>
											<li><a href="#">Overdue Task</a></li>
										</ul>
									</div>
								</div>
								<div class="pull-right">
									<a href="#" class="btn btn-primary">Create Task</a>
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
										</tr>
										<?php if (empty($tarefas)) : ?>
											<tr class="task">
    											<td class="cell-icon"></td>
    											<td class="cell-title"><div>Nenhuma tarefa encontrada</div></td>
    											<td class="cell-status hidden-phone hidden-tablet"></td>
    											<td class="cell-time align-right"></td>
    										</tr>
                                        <?php endif; ?>
                                        <?php foreach ($tarefas as $tarefa) : ?>
                                            <tr class="task <?php echo $tarefa['status_id'] == 1 ? 'resolved' : '' ?>">
                                                
                                                <td class="cell-icon" style="width: 20px"><a href="<?= base_url('tarefa/atualizar/') . $tarefa['tarefa_id'] . '/' . $tarefa['status_id'] ?>" class="" title="Atualizar"><span data-feather="edit"></span>
                                                    <i class="icon-checker high"></i>
                                                     </a>
                                                </td>
    											<td class="cell-title"><div> <?= $tarefa['tarefa_descricao'] ?></div></td>
    											<td class="cell-title">
    											    <?php if ($tarefa['status_id'] == '2') { ?>
    											         <b class="alert alert-info">
    											         Pendente
    											         </b>
    											    <?php } else { ?>
    											        <b class="alert alert-success">
    											            Concluida
    											        </b>
    											        <?php } ?>
    											 </td>
    											<td class="cell-time align-right"><?= $tarefa['tarefa_data_termino'] ?></td>
										    </tr>
                                        <?php endforeach; ?>
									</tbody>
								</table>


							</div>
							<div class="module-foot">
							</div>
						</div>
						
					</div><!--/.content-->
				</div><!--/.span9-->


<script>
function editData(id)
{
    $("#id").val(id);
    document.frmEdit.submit();    
}
</script>