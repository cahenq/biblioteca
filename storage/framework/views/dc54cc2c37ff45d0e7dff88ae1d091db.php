<?php $__env->startSection('title', 'Cadastrar Leitor'); ?>

 <?php $__env->slot('Cadastrar Leitor', null, []); ?> 
    <?php echo $__env->yieldContent('title'); ?>
 <?php $__env->endSlot(); ?>

<?php $__env->startSection('content'); ?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Caixa de pull-up -->
            <div class="pull-up">
                <hr>
                <h1 class="text-left">Cadastrar Leitor</h1>
                <!-- Dividindo o formulário em duas colunas -->
                <form action="<?php echo e(route('leitores.store')); ?>" method="POST" id="form-cadastro-leitor">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <!-- Coluna Esquerda -->
                        <div class="col-md-6 col-left">
                            <div class="mb-3">
                                <label for="nome_completo" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nome_completo" name="nome_completo" value="<?php echo e(old('nome_completo')); ?>" required>
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
                                <input type="text" class="form-control" id="numero_matricula" name="numero_matricula" value="<?php echo e(old('numero_matricula')); ?>" required>
                                <?php $__errorArgs = ['numero_matricula'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                                    <div class="text-danger"><?php echo e($message); ?></div>  <!-- Exibe a mensagem personalizada -->
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
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
                        </div>
                
                        <!-- Coluna Direita -->
                        <div class="col-md-6 col-right">
                            <div class="mb-3">
                                <label for="serie" class="form-label">Série</label>
                                <input type="number" class="form-control" id="serie" name="serie" value="<?php echo e(old('serie')); ?>" required>
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
                                        <option value="<?php echo e($letra); ?>" <?php echo e(old('turma') == $letra ? 'selected' : ''); ?>><?php echo e($letra); ?></option>
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
                                    <option value="Matutino" <?php echo e(old('turno') == 'Matutino' ? 'selected' : ''); ?>>Matutino</option>
                                    <option value="Vespertino" <?php echo e(old('turno') == 'Vespertino' ? 'selected' : ''); ?>>Vespertino</option>
                                    <option value="Noturno" <?php echo e(old('turno') == 'Noturno' ? 'selected' : ''); ?>>Noturno</option>
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
                        </div>
                    </div>
                
                    <!-- Telefone e Endereço -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo e(old('telefone')); ?>">
                            </div>
                        </div>
                
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="endereco" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo e(old('endereco')); ?>">
                            </div>
                        </div>
                    </div>
                
                    <!-- Botões -->
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn custom-btn mt-3">Cadastrar</button>
                            <a href="<?php echo e(route('leitores.index')); ?>" class="btn btn-dark mt-3">Alunos</a>
                        </div>
                    </div>
                </form>
                
                
<?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('form-cadastro-leitor').addEventListener('submit', function(event) {
            const inputs = document.querySelectorAll('#form-cadastro-leitor .form-control');
            let isValid = true;

            inputs.forEach(input => {
                if (!input.value) {
                    isValid = false;
                    input.classList.add('border-danger');
                } else {
                    input.classList.remove('border-danger');
                }
            });

            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.livros.administrador.layoutadm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\biblioteca\resources\views/pages/livros/administrador/cadastrar-usuario.blade.php ENDPATH**/ ?>