
<?php $__env->startSection('title', 'Lista de Alunos'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <a href="<?php echo e(route('cadastrar-leitor')); ?>" class="btn btn-dark">
        <i class="fas fa-arrow-left text-white"></i>
    </a>
    <form action="<?php echo e(route('leitores.index')); ?>" method="GET" class="w-50 d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Pesquisar por nome ou matrícula" value="<?php echo e(request('search')); ?>">
        <button type="submit" class="btn btn-primary">Pesquisar</button>

        <!-- Ícone de filtro que abre o dropdown -->
        <div class="dropdown ms-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-filter"></i> Filtros
            </button>
            <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                <li><a class="dropdown-item" href="<?php echo e(route('leitores.index', ['search' => request('search'), 'order' => 'alphabetical'])); ?>">Ordenar Alfabéticamente</a></li>
                <li><a class="dropdown-item" href="<?php echo e(route('leitores.index', ['search' => request('search'), 'order' => 'recent'])); ?>">Mais Recente</a></li>
                <li><a class="dropdown-item" href="<?php echo e(route('leitores.index', ['search' => request('search'), 'order' => 'oldest'])); ?>">Mais Antigo</a></li>
            </ul>
        </div>
    </form>
</div>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nome Completo</th>
            <th>Número de Matrícula</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $leitores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leitor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($leitor->nome_completo); ?></td>
                <td><?php echo e($leitor->numero_matricula); ?></td>
                <td>
                    <a href="<?php echo e(route('detalhe-leitor', $leitor->id)); ?>" class="btn btn-light">
                        <i class="fas fa-ellipsis-h"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<div class="d-flex justify-content-center">
    <?php echo e($leitores->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Lista de Alunos'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <a href="<?php echo e(route('cadastrar-leitor')); ?>" class="btn btn-dark">
        <i class="fas fa-arrow-left text-white"></i>
    </a>
    <form action="<?php echo e(route('leitores.index')); ?>" method="GET" class="w-50 d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Pesquisar por nome ou matrícula" value="<?php echo e(request('search')); ?>">
        <button type="submit" class="btn btn-primary">Pesquisar</button>

        <!-- Ícone de filtro que abre o dropdown -->
        <div class="dropdown ms-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-filter"></i> Filtros
            </button>
            <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                <li><a class="dropdown-item" href="<?php echo e(route('leitores.index', ['search' => request('search'), 'order' => 'alphabetical'])); ?>">Ordenar Alfabéticamente</a></li>
                <li><a class="dropdown-item" href="<?php echo e(route('leitores.index', ['search' => request('search'), 'order' => 'recent'])); ?>">Mais Recente</a></li>
                <li><a class="dropdown-item" href="<?php echo e(route('leitores.index', ['search' => request('search'), 'order' => 'oldest'])); ?>">Mais Antigo</a></li>
            </ul>
        </div>
    </form>
</div>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nome Completo</th>
            <th>Número de Matrícula</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $leitores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leitor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($leitor->nome_completo); ?></td>
                <td><?php echo e($leitor->numero_matricula); ?></td>
                <td>
                    <a href="<?php echo e(route('detalhe-leitor', $leitor->id)); ?>" class="btn btn-light">
                        <i class="fas fa-ellipsis-h"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<div class="d-flex justify-content-center">
    <?php echo e($leitores->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.livros.administrador.layoutadm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('pages.livros.administrador.layoutadm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\biblioteca\resources\views/pages/livros/administrador/alunos.blade.php ENDPATH**/ ?>