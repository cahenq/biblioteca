<?php if (isset($component)) { $__componentOriginal1f9e5f64f242295036c059d9dc1c375c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c = $attributes; } ?>
<?php $component = App\View\Components\Layout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Layout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startSection('title', 'Catálogo'); ?>
     <?php $__env->slot('biblioteca', null, []); ?> 
        <?php echo $__env->yieldContent('title'); ?>
     <?php $__env->endSlot(); ?>

    <!-- Caixa de pesquisa e botão de filtros -->
    <div class="container-fluid px-4">
        <!-- Título da página -->
        <h1 class="mt-4" style="font-size: 24px;"><?php echo $__env->yieldContent('title'); ?></h1>

        <!-- Caixa de pesquisa -->
        <div class="p-3 rounded shadow mb-4" style="background-color: rgb(227, 224, 224);">
            <div class="d-flex align-items-center">
                <div class="input-group" style="flex-grow: 1;">
                    <span class="input-group-text bg-white text-muted" style="border: 1px solid #ced4da;"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Comece a procurar..." id="searchInput"
                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Comece a procurar...'" style="border: 1px solid #ced4da;" onkeyup="filterBooks()">
                </div>
            </div>
        </div>

        <!-- Fita do Alfabeto -->
        <div class="mb-4" style="background-color: white; padding: 10px; display: flex; justify-content: center; align-items: center; border-radius: 5px;">
            <div style="flex: 1; text-align: center;">
                <?php $__currentLoopData = range('A', 'Z'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="#" class="text-dark letter-link" style="margin: 0 5px; text-decoration: none; padding: 5px; border-radius: 5px;" onclick="filterByLetter('<?php echo e($letter); ?>')">
                        <?php echo e($letter); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <a href="#" class="text-dark letter-link" style="margin: 0 5px; text-decoration: none; padding: 5px; border-radius: 5px;" onclick="showAllBooks()">Todos</a>
            </div>
        </div>
    </div>



    
<!-- Seção de livros -->
<div class="container-fluid px-4" id="booksContainer">
    <div class="row">
        <?php $__currentLoopData = $livros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $livro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-2 mb-4 text-center book" data-letter="<?php echo e(strtoupper(substr($livro->titulo, 0, 1))); ?>">
                <div class="card" style="border: none; height: 100%;">
                    <img src="<?php echo e($livro->image_path ? asset('storage/' . $livro->image_path) : asset('images/default-image.jpg')); ?>" 
                    class="card-img-top" 
                    alt="<?php echo e($livro->titulo); ?>" 
                    style="height: 250px; object-fit: cover;">                
                    <div class="card-body" style="padding: 10px; display: flex; flex-direction: column; justify-content: space-between;">
                        <h5 class="card-title" style="font-size: 14px; font-weight: normal;"><?php echo e($livro->titulo); ?></h5>
                        <p class="card-text" style="font-size: 12px;"><?php echo e($livro->autor); ?></p>
                        <a href="<?php echo e(route('detalhe-livro', $livro->id)); ?>" class="btn btn-light" style="background-color: #d5d7da; color: #000">Detalhes</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>


<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script>
    // filtro de busca por título
    function filterBooks() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const books = document.querySelectorAll('.book');
        
        books.forEach(book => {
            const title = book.querySelector('.card-title').textContent.toLowerCase();
            if (title.includes(input)) {
                book.style.display = '';
            } else {
                book.style.display = 'none';
            }
        });
    }

    // filtro por letra inicial
    function filterByLetter(letter) {
        const books = document.querySelectorAll('.book');
        
        books.forEach(book => {
            const bookLetter = book.getAttribute('data-letter');
            if (bookLetter.startsWith(letter)) {
                book.style.display = '';
            } else {
                book.style.display = 'none';
            }
        });
    }

    // exibir todos os livros
    function showAllBooks() {
        const books = document.querySelectorAll('.book');
        books.forEach(book => {
            book.style.display = '';
        });
    }

    
    
</script>
<?php $__env->stopPush(); ?>


    <style>
        .letter-link {
            transition: background-color 0.3s, color 0.3s;
        }

        .letter-link:hover {
            background-color: #d5d7da; /* Cinza claro */
            border-radius: 5px;
            color: #000; /* Cor do texto */
        }

        /* Estilo para o campo de pesquisa */
        .input-group {
            flex-grow: 1;
            min-width: 300px; /* Largura mínima do campo de pesquisa */
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $attributes = $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $component = $__componentOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\biblioteca\resources\views/pages/livros/administrador/biblioteca.blade.php ENDPATH**/ ?>