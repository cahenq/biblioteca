
<?php $__env->startSection('title', 'Emprestar Livro'); ?>
 <?php $__env->slot('emprestar livro', null, []); ?> 
    <?php echo $__env->yieldContent('title'); ?>
 <?php $__env->endSlot(); ?>
<?php $__env->startSection('content'); ?>

<div class="container mt-7">
    <!-- Barra de busca para pesquisa de livro -->
    <div class="row">
        <div class="col-12">
            <h1 class="text-start">Emprestar Livro</h1>
        </div>
        <div class="col-12 mt-3">
            <input type="text" class="form-control" id="search-book" placeholder="Digite o nome ou código do livro">
            <button id="search-btn" class="btn btn-primary mt-2">Pesquisar</button>
        </div>
        <hr class="my-4">
    </div>

    <!-- Resultados da busca -->
    <div id="search-results" class="row mt-4">
        <!-- Exemplo de um livro encontrado -->
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Título do Livro</h5>
                    <p class="card-text">Autor: Nome do Autor</p>
                    <p class="card-text">Código: 12345</p>
                    <button class="btn btn-success" onclick="goToLoanForm(12345)">Emprestar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulário de empréstimo -->
    <div id="loan-form" class="row mt-4 d-none">
        <div class="col-12">
            <form id="loan-book-form" action="<?php echo e(route('livros.emprestar')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" id="book-code" name="book_code">

                <div class="mb-3">
                    <label for="student-id" class="form-label">Matrícula do Aluno:</label>
                    <input type="text" class="form-control" id="student-id" name="student_id" required>
                </div>

                <div class="mb-3">
                    <label for="loan-date" class="form-label">Data de Empréstimo:</label>
                    <input type="date" class="form-control" id="loan-date" name="loan_date" value="<?php echo e(date('Y-m-d')); ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="return-date" class="form-label">Data de Devolução:</label>
                    <input type="date" class="form-control" id="return-date" name="return_date" required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Emprestar</button>
                    <button type="button" class="btn btn-danger" onclick="cancelLoan()">Cancelar</button>
                    <button type="button" class="btn btn-secondary" onclick="goBackToSearch()">Voltar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    function goToLoanForm(bookCode) {
        document.getElementById('book-code').value = bookCode;
        document.getElementById('search-results').classList.add('d-none');
        document.getElementById('loan-form').classList.remove('d-none');
    }

    function cancelLoan() {
        document.getElementById('loan-book-form').reset();
        document.getElementById('loan-form').classList.add('d-none');
        document.getElementById('search-results').classList.remove('d-none');
    }

    function goBackToSearch() {
        document.getElementById('loan-form').classList.add('d-none');
        document.getElementById('search-results').classList.remove('d-none');
    }
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.livros.administrador.layoutadm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\biblioteca\resources\views/pages/livros/administrador/emprestimo-livro.blade.php ENDPATH**/ ?>