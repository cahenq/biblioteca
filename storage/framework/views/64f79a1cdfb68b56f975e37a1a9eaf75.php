<?php $__env->startSection('title', 'Adicionar Livro'); ?>
 <?php $__env->slot('adicionar livro', null, []); ?> 
    <?php echo $__env->yieldContent('title'); ?>
 <?php $__env->endSlot(); ?>
<?php $__env->startSection('content'); ?>

<div class="container mt-7">
    <!-- Usando um row do Bootstrap para alinhar tudo -->
    <div class="row">
        <div class="col-12">
            <!-- Alinhando o título à esquerda -->
            <h1 class="text-start">Adicionar Livro</h1>
        </div>
        <!-- Linha horizontal cinza abaixo do título -->
        <hr>
    </div>

    <!-- Seção para entrada manual de informações, alinhada à esquerda -->
    <div id="manual-section" class="form-section mt-4">
        <h2>Livro</h2>

        <form id="add-book-form" action="<?php echo e(route('livros.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="mb-3">
                <label for="title" class="form-label">Título:</label>
                <input type="text" class="form-control" id="title" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Autor:</label>
                <input type="text" class="form-control" id="author" name="autor" required>
                <div id="authorHelp" class="form-text">Separe os autores com vírgula. (ex: Clarice Lispector, Machado de Assis).</div>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label for="editora" class="form-label">Editora:</label>
                <input type="text" class="form-control" id="editora" name="editora" required>
            </div>
            <div class="mb-3">
                <label for="publication-date" class="form-label">Data de Publicação</label>
                <input type="date" class="form-control" name="publicacao_data" required>

            </div>            
            
            <div class="mb-3">
                <div class="row g-3">
                    <div class="col">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" class="form-control" id="isbn" name="isbn" pattern="\d{13}" required>
                        <div id="isbnHelp" class="form-text">Apenas números. 13 dígitos.</div>
                    </div>
                    <div class="col">
                        <label for="localization" class="form-label">Localização</label>
                        <input type="text" class="form-control" id="localization" name="localizacao" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row g-3">
                    <div class="col">
                        <label for="pages" class="form-label">Páginas</label>
                        <input type="number" class="form-control" id="pages" name="paginas" placeholder="Páginas" aria-label="Páginas" required>
                    </div>
                    <div class="col">
                        <label for="genre" class="form-label">Gênero</label>
                        <select class="form-select" id="genre" name="genero" aria-label="Gênero" required>
                            <optgroup label="Ficção">
                                <option>Romance</option>
                                <option>Fantasia</option>
                                <option>Ficção Científica</option>
                                <option>Distopia</option>
                                <option>Aventura</option>
                                <option>Mistério/Detetive</option>
                                <option>Suspense/Thriller</option>
                                <option>Terror/Horror</option>
                                <option>Ficção Histórica</option>
                                <option>Ficção Especulativa</option>
                                <option>Realismo Mágico</option>
                                <option>Chick-lit</option>
                                <option>Young Adult (YA)</option>
                                <option>New Adult (NA)</option>
                                <option>Steampunk</option>
                                <option>Cyberpunk</option>
                                <option>Fanfiction</option>
                            </optgroup>
                            <optgroup label="Não-Ficção">
                                <option>Biografia/Autobiografia</option>
                                <option>Memórias</option>
                                <option>Ensaios</option>
                                <option>Livros de Autoajuda</option>
                                <option>Desenvolvimento Pessoal</option>
                                <option>Livros de Negócios</option>
                                <option>Espiritualidade/Religião</option>
                                <option>História</option>
                                <option>Filosofia</option>
                                <option>Ciência/Divulgação Científica</option>
                                <option>Psicologia</option>
                                <option>Política</option>
                                <option>Sociologia</option>
                                <option>Viagens</option>
                            </optgroup>
                            <optgroup label="Poesia">
                                <option>Poemas Líricos</option>
                                <option>Épicos</option>
                                <option>Haikais</option>
                                <option>Spoken Word</option>
                            </optgroup>
                            <optgroup label="Drama">
                                <option>Peças de Teatro</option>
                                <option>Roteiros</option>
                            </optgroup>
                            <optgroup label="Outros">
                                <option>Graphic Novels/Quadrinhos</option>
                                <option>Mangás</option>
                                <option>Contos/Crônicas</option>
                                <option>Antologias</option>
                                <option>Livros Infantis</option>
                                <option>Livros Didáticos</option>
                                <option>Guias/Tutoriais</option>
                                <option>Literatura Erótica</option>
                                <option>Sátira/Paródia</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="col">
                        <label for="language" class="form-label">Idioma</label>
                        <select class="form-select" id="language" name="idioma" aria-label="Idioma" required>
                            <option>Português</option>
                            <option>Inglês</option>
                            <option>Espanhol</option>
                            <option>Francês</option>
                            <option>Alemão</option>
                            <option>Italiano</option>
                            <option>Japonês</option>
                            <option>Chinês</option>
                            <option>Coreano</option>
                            <option>Russo</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3 mt-4">
                <div id="imageHelp" class="form-text">Carregue arquivos jpg, png ou jpeg. 20 MB no máximo.</div>
                <label for="image_path" id="image-label" class="btn btn-dark w-100 mb-3">
                    <i class="bi bi-image me-2"></i> Imagem da Capa
                </label>
                <input type="file" class="form-control d-none" id="image_path" name="image_path" accept="image/*">
                
                <button type="submit" class="btn btn-success w-100">Salvar</button>
            </div>
        </form>
        
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        // Mudar a cor do botão de imagem quando um arquivo é carregado
        document.getElementById('image_path').addEventListener('change', function() {
            const label = document.getElementById('image-label');
            if (this.files && this.files.length > 0) {
                label.classList.remove('btn-dark');
                label.classList.add('btn-secondary'); // cinza escuro
            } else {
                label.classList.remove('btn-secondary');
                label.classList.add('btn-dark'); // preto
            }
        });

        // Validar formulário e destacar campos vazios
        document.getElementById('add-book-form').addEventListener('submit', function(event) {
            let isValid = true;
            const requiredFields = this.querySelectorAll('[required]');

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.livros.administrador.layoutadm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\biblioteca\resources\views/pages/livros/administrador/adicionar-livro.blade.php ENDPATH**/ ?>