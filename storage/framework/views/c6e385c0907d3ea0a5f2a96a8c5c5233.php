
<?php $__env->startSection('title', 'Editar Leitor'); ?>

 <?php $__env->slot('Editar Leitor', null, []); ?> 
    <?php echo $__env->yieldContent('title'); ?>
 <?php $__env->endSlot(); ?>

<?php $__env->startSection('content'); ?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="pull-up">
                <hr>
                <h1 class="text-left">Editar Leitor</h1>
                <form action="<?php echo e(route('leitores.update', $leitor->id)); ?>" method="POST" id="form-editar-leitor">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row">
                        <!-- Coluna Esquerda -->
                        <div class="col-md-6 col-left">
                            <div class="mb-3">
                                <label for="nome_completo" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nome_completo" name="nome_completo" value="<?php echo e(old('nome_completo', $leitor->nome_completo)); ?>" required>
                                <?php $__errorArgs = ['nome_completo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="numero_matricula" class="form-label">Número de Matrícula</label>
                                <input type="text" class="form-control" id="numero_matricula" name="numero_matricula" value="<?php echo e(old('numero_matricula', $leitor->numero_matricula)); ?>" required>
                                <?php $__errorArgs = ['numero_matricula'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email', $leitor->email)); ?>" required>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo e(old('telefone', $leitor->telefone ?? 'Número não informado')); ?>">
                                <?php $__errorArgs = ['telefone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Coluna Direita -->
                        <div class="col-md-6 col-right">
                            <div class="mb-3">
                                <label for="serie" class="form-label">Série</label>
                                <input type="number" class="form-control" id="serie" name="serie" value="<?php echo e(old('serie', $leitor->serie)); ?>" required>
                                <?php $__errorArgs = ['serie'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="turma" class="form-label">Turma</label>
                                <select class="form-select" id="turma" name="turma" required>
                                    <?php $__currentLoopData = range('A', 'Z'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($letra); ?>" <?php echo e(old('turma', $leitor->turma) == $letra ? 'selected' : ''); ?>><?php echo e($letra); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['turma'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="turno" class="form-label">Turno</label>
                                <select class="form-select" id="turno" name="turno" required>
                                    <option value="Matutino" <?php echo e(old('turno', $leitor->turno) == 'Matutino' ? 'selected' : ''); ?>>Matutino</option>
                                    <option value="Vespertino" <?php echo e(old('turno', $leitor->turno) == 'Vespertino' ? 'selected' : ''); ?>>Vespertino</option>
                                    <option value="Noturno" <?php echo e(old('turno', $leitor->turno) == 'Noturno' ? 'selected' : ''); ?>>Noturno</option>
                                </select>
                                <?php $__errorArgs = ['turno'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-3">
                                <label for="endereco" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo e(old('endereco', $leitor->endereco ?? 'Endereço não informado')); ?>">
                                <?php $__errorArgs = ['endereco'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    
                    <!-- Botões -->
<div class="row mt-4">
    <div class="col-md-12 d-flex justify-content-between">
        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#confirmBackModal">
            <i class="fas fa-arrow-left"></i>
        </button>
        <div>
            <button type="submit" class="btn btn-dark">Salvar</button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Excluir</button>
        </div>
    </div>
</div>
                </form>

                <!-- Modal de Exclusão -->
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                            </div>
                            <div class="modal-body">
                                Você tem certeza que deseja excluir este leitor? Esta ação não pode ser desfeita.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <form action="<?php echo e(route('leitores.destroy', $leitor->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>                                            
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Modal de Voltar -->
                <!-- Modal de Voltar -->
<div class="modal fade" id="confirmBackModal" tabindex="-1" aria-labelledby="confirmBackModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmBackModalLabel">Confirmar Voltar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                Você tem certeza que deseja voltar? As alterações não serão salvas.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a href="<?php echo e(route('detalhe-leitor', $leitor->id)); ?>" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.livros.administrador.layoutadm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\biblioteca\resources\views/pages/livros/administrador/editar-leitor.blade.php ENDPATH**/ ?>