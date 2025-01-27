

<?php $__env->startSection('title', 'Detalhes do Livro'); ?>
 <?php $__env->slot('detalhes do livro', null, []); ?> 
    <?php echo $__env->yieldContent('title'); ?>
 <?php $__env->endSlot(); ?>
<?php $__env->startSection('content'); ?>

<div class="container mt-7">
    <!-- Usando um row do Bootstrap para alinhar tudo -->
    <div class="row">
        <div class="col-12">
            <!-- Alinhando o título à esquerda -->
            <h1 class="text-start">Detalhes do Livro</h1>
        </div>
        <!-- Linha horizontal cinza abaixo do título -->
        <hr>
    </div>

    <!-- Seção para exibição dos detalhes do livro -->
    <div id="details-section" class="form-section mt-4">
        <h2>Informações do Livro</h2>

        <form id="book-details-form" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Título:</label>
                <input type="text" class="form-control" id="title" name="titulo" value="<?php echo e($livro->titulo); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Autor:</label>
                <input type="text" class="form-control" id="author" name="autor" value="<?php echo e($livro->autor); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="5" readonly><?php echo e($livro->descricao); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="editora" class="form-label">Editora:</label>
                <input type="text" class="form-control" id="editora" name="editora" value="<?php echo e($livro->editora); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="publication-date" class="form-label">Data de Publicação</label>
                <input type="text" class="form-control" id="publication-date" value="<?php echo e($livro->publicacao_data ? \Carbon\Carbon::parse($livro->publicacao_data)->format('d/m/Y') : 'Data não informada'); ?>" readonly>

            </div>
                        
            <div class="mb-3">
                <div class="row g-3">
                    <div class="col">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo e($livro->isbn); ?>" readonly>
                    </div>
                    <div class="col">
                        <label for="localization" class="form-label">Localização</label>
                        <input type="text" class="form-control" id="localization" name="localizacao" value="<?php echo e($livro->localizacao); ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row g-3">
                    <div class="col">
                        <label for="pages" class="form-label">Páginas</label>
                        <input type="text" class="form-control" id="pages" name="paginas" value="<?php echo e($livro->paginas); ?>" readonly>
                    </div>
                    <div class="col">
                        <label for="genre" class="form-label">Gênero</label>
                        <input type="text" class="form-control" id="genre" name="genero" value="<?php echo e($livro->genero); ?>" readonly>
                    </div>
                    <div class="col">
                        <label for="language" class="form-label">Idioma</label>
                        <input type="text" class="form-control" id="language" name="idioma" value="<?php echo e($livro->idioma); ?>" readonly>
                    </div>
                </div>
            </div>
            <!-- Botão de imagem com cor inicial cinza escuro -->
            <div class="mb-3 mt-4">
                <div id="imageHelp" class="form-text">Imagem da Capa do Livro</div>
                <label for="image_path" id="image-label" class="btn btn-secondary w-100 mb-3" data-bs-toggle="modal" data-bs-target="#imageModal">
                    <i class="bi bi-image me-2"></i> Imagem da Capa
                </label>
                <!-- Modal para exibir a imagem -->
                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel">Imagem da Capa do Livro</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex justify-content-center">
                                <?php if($livro->image_path): ?>
                                    <img src="<?php echo e(asset('storage/' . $livro->image_path)); ?>" alt="Capa do Livro" class="img-fluid">
                                <?php else: ?>
                                    <p>Imagem não disponível</p>
                                <?php endif; ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
<!-- Botões Editar, Excluir, Voltar -->
<div class="d-flex gap-3 mt-4">
    <!-- Botão Editar -->
    <a href="<?php echo e(route('editar-livro', $livro->id)); ?>" class="btn btn-dark text-white">Editar</a>
    

    <!-- Botão Voltar -->
    <a href="<?php echo e(route('biblioteca')); ?>" class="btn btn-primary">Voltar</a>
</div>


                    </form>
                </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.livros.administrador.layoutadm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\biblioteca\resources\views/pages/livros/administrador/detalhe-livro.blade.php ENDPATH**/ ?>