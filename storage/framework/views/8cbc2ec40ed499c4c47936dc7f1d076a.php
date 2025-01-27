
<?php $__env->startSection('title', 'Detalhes do Leitor'); ?>

 <?php $__env->slot('Cadastrar Leitor', null, []); ?> 
    <?php echo $__env->yieldContent('title'); ?>
 <?php $__env->endSlot(); ?>

<?php $__env->startSection('content'); ?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="pull-up">
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Botão de Voltar -->
                    <a href="<?php echo e(route('leitores.index')); ?>" class="btn btn-light">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <!-- Título Detalhes do Leitor -->
                    <h1 class="text-right">Detalhes do Leitor</h1>
                </div>
                
                <!-- Exibindo informações do leitor em formato somente leitura -->
                <form>
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <!-- Coluna Esquerda (Detalhes do Leitor) -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nome_completo" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nome_completo" name="nome_completo" value="<?php echo e($leitor->nome_completo); ?>" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="numero_matricula" class="form-label">Número de Matrícula</label>
                                <input type="text" class="form-control" id="numero_matricula" name="numero_matricula" value="<?php echo e($leitor->numero_matricula); ?>" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo e($leitor->email); ?>" disabled>
                            </div>
                        </div>

                        <!-- Coluna Direita (Detalhes do Leitor) -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="serie" class="form-label">Série</label>
                                <input type="text" class="form-control" id="serie" name="serie" value="<?php echo e($leitor->serie); ?>º ano" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="turma" class="form-label">Turma</label>
                                <input type="text" class="form-control" id="turma" name="turma" value="<?php echo e($leitor->turma); ?>" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="turno" class="form-label">Turno</label>
                                <input type="text" class="form-control" id="turno" name="turno" value="<?php echo e($leitor->turno); ?>" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Telefone e Endereço -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo e(preg_replace('/(\d{2})(\d{1})(\d{4})(\d{4})/', '($1) $2 $3-$4', $leitor->telefone)); ?>" disabled>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="endereco" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo e($leitor->endereco); ?>" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Botões -->
<div class="row mt-3">
    <div class="col-12 d-flex justify-content-between">
        <!-- Botão Empréstimos -->
        <a href="<?php echo e(route('emprestimo-leitor', $leitor->id)); ?>" class="btn w-45" style="background-color: #1E3A5F; color: white;">
            Empréstimos
        </a>
        <!-- Botão Histórico de Empréstimos -->
        <a href="<?php echo e(route('historico-emprestimo', $leitor->id)); ?>" class="btn w-45" style="background-color: #D3D3D3; color: black;">
            Histórico de Empréstimos
        </a>
    </div>

    <div class="col-12 mt-2">
        <!-- Botão Editar -->
        <a href="<?php echo e(route('editar-leitor', $leitor->id)); ?>" class="btn w-100 btn-dark text-white">
            Editar
        </a>
    </div>
</div>


                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.livros.administrador.layoutadm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\biblioteca\resources\views/pages/livros/administrador/detalhe-leitor.blade.php ENDPATH**/ ?>