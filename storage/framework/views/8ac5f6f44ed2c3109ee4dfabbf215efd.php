
<?php $__env->startSection('title', 'Empréstimo de Livro'); ?>
<?php $__env->startSection('content'); ?>

<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-6 text-left">Empréstimo de Livro</h1>

    <!-- Formulário de pesquisa -->
    <form action="<?php echo e(route('emprestimos.buscar-livro')); ?>" method="GET" class="d-flex w-100 mb-5">
        <input 
            type="text" 
            name="query" 
            class="form-control me-1" 
            placeholder="Pesquisar por ISBN ou Título" 
            value="<?php echo e(request('query')); ?>"
        >
        <button 
            type="submit" 
            class="btn btn-dark text-white"
        >
            Pesquisar
        </button>

        <!-- Ícone de filtro que abre o dropdown -->
        <div class="dropdown ms-3">
            <button 
                class="btn btn-secondary dropdown-toggle" 
                type="button" 
                id="filterDropdown" 
                data-bs-toggle="dropdown" 
                aria-expanded="false"
            >
                <i class="fas fa-filter"></i> Filtros
            </button>
            <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                <li><a class="dropdown-item" href="<?php echo e(route('emprestimos.pesquisa-livro', ['query' => request('query'), 'status' => ''])); ?>">Todos</a></li>
                <li><a class="dropdown-item" href="<?php echo e(route('emprestimos.pesquisa-livro', ['query' => request('query'), 'status' => 'disponível'])); ?>">Disponíveis</a></li>
                <li><a class="dropdown-item" href="<?php echo e(route('emprestimos.pesquisa-livro', ['query' => request('query'), 'status' => 'indisponível'])); ?>">Indisponíveis</a></li>
            </ul>
        </div>
    </form>
    
    <!-- Lista de livros -->
    <div class="space-y-2">
        <?php $__empty_1 = true; $__currentLoopData = $livros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $livro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="card-emprestimo">
            <!-- Capa -->
            <img 
                src="<?php echo e($livro->image_path ? asset('storage/' . $livro->image_path) : asset('images/default-image.jpg')); ?>"
                alt="capa do livro" 
                class="w-24 h-32 object-cover rounded-md"
            >

            <!-- Detalhes -->
            <div class="details ml-6 flex-grow">
                <h2 class="text-xl font-semibold"><?php echo e($livro->titulo); ?></h2>
                <p class="text-gray-600">Autor: <?php echo e($livro->autor); ?></p>
                <p class="text-sm text-gray-500 mt-2">Status: 
                    <span class="<?php echo e($livro->status === 'Disponível' ? 'text-green-600' : 'text-red-600'); ?>">
                        <?php echo e($livro->status); ?>

                    </span>
                </p>
            </div>

            <!-- Botão de empréstimo -->
            <div>
                <?php if($livro->status === 'Disponível'): ?>
                <a 
                    href="<?php echo e(route('livros.emprestar', $livro->id)); ?>" 
                    class="button-emprestimo available text-decoration-none"
                >
                    Emprestar
                </a>
                <?php else: ?>
                <button 
                    type="button" 
                    onclick="livroIndisponivelModal()" 
                    class="button-emprestimo unavailable"
                >
                    Indisponível
                </button>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-center text-gray-500">Nenhum livro encontrado.</p>
        <?php endif; ?>
    </div>

    <!-- Paginação -->
    <div class="mt-6">
        <?php echo e($livros->links()); ?>

    </div>
</div>

<!-- Modal de aviso -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function livroIndisponivelModal() {
        Swal.fire({
            icon: 'error',
            title: 'livro indisponível',
            text: 'este livro não está disponível para empréstimo no momento.',
            confirmButtonText: 'voltar',
            timer: 3000 // fechar após 3 segundos
        });
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.livros.administrador.layoutadm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\biblioteca\resources\views/pages/livros/administrador/pesquisa-livro.blade.php ENDPATH**/ ?>