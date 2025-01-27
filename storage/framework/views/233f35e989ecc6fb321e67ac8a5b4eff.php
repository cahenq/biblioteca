
<?php $__env->startSection('title', 'Editar Livro'); ?>
<?php $__env->startSection('content'); ?>

<div class="container mt-7">
    <h1 class="text-start">Editar Livro</h1>
    <hr>

    <!-- Formulário de edição -->
    <form action="<?php echo e(route('atualizar-livro', $livro->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Título -->
        <div class="mb-3">
            <label for="title" class="form-label">Título:</label>
            <input type="text" class="form-control" id="title" name="titulo" value="<?php echo e($livro->titulo); ?>">
        </div>

        <!-- Autor -->
        <div class="mb-3">
            <label for="author" class="form-label">Autor:</label>
            <input type="text" class="form-control" id="author" name="autor" value="<?php echo e($livro->autor); ?>">
        </div>

        <!-- Descrição -->
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="5"><?php echo e($livro->descricao); ?></textarea>
        </div>

        <!-- Editora -->
        <div class="mb-3">
            <label for="editora" class="form-label">Editora:</label>
            <input type="text" class="form-control" id="editora" name="editora" value="<?php echo e($livro->editora); ?>">
        </div>

        <!-- Data de Publicação -->
        <div class="mb-3">
            <label for="publication-date" class="form-label">Data de Publicação:</label>
            <input type="date" class="form-control" id="publication-date" name="publicacao_data" value="<?php echo e($livro->publicacao_data); ?>">
        </div>

        <!-- ISBN e Localização -->
        <div class="row g-3">
            <div class="col">
                <label for="isbn" class="form-label">ISBN:</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo e($livro->isbn); ?>">
            </div>
            <div class="col">
                <label for="localizacao" class="form-label">Localização:</label>
                <input type="text" class="form-control" id="localizacao" name="localizacao" value="<?php echo e($livro->localizacao); ?>">
            </div>
        </div>

        <!-- Páginas, Gênero e Idioma -->
        <div class="row g-3 mt-3">
            <div class="col">
                <label for="pages" class="form-label">Páginas:</label>
                <input type="number" class="form-control" id="pages" name="paginas" value="<?php echo e($livro->paginas); ?>">
            </div>
            <div class="col">
                <label for="genre" class="form-label">Gênero</label>
                <select class="form-select" id="genre" name="genero" aria-label="Gênero">
                    <optgroup label="Ficção">
                        <option <?php echo e($livro->genero == 'Romance' ? 'selected' : ''); ?>>Romance</option>
                        <option <?php echo e($livro->genero == 'Fantasia' ? 'selected' : ''); ?>>Fantasia</option>
                        <option <?php echo e($livro->genero == 'Ficção Científica' ? 'selected' : ''); ?>>Ficção Científica</option>
                        <option <?php echo e($livro->genero == 'Distopia' ? 'selected' : ''); ?>>Distopia</option>
                        <option <?php echo e($livro->genero == 'Aventura' ? 'selected' : ''); ?>>Aventura</option>
                        <option <?php echo e($livro->genero == 'Mistério/Detetive' ? 'selected' : ''); ?>>Mistério/Detetive</option>
                        <option <?php echo e($livro->genero == 'Suspense/Thriller' ? 'selected' : ''); ?>>Suspense/Thriller</option>
                        <option <?php echo e($livro->genero == 'Terror/Horror' ? 'selected' : ''); ?>>Terror/Horror</option>
                        <option <?php echo e($livro->genero == 'Ficção Histórica' ? 'selected' : ''); ?>>Ficção Histórica</option>
                        <option <?php echo e($livro->genero == 'Ficção Especulativa' ? 'selected' : ''); ?>>Ficção Especulativa</option>
                        <option <?php echo e($livro->genero == 'Realismo Mágico' ? 'selected' : ''); ?>>Realismo Mágico</option>
                        <option <?php echo e($livro->genero == 'Chick-lit' ? 'selected' : ''); ?>>Chick-lit</option>
                        <option <?php echo e($livro->genero == 'Young Adult (YA)' ? 'selected' : ''); ?>>Young Adult (YA)</option>
                        <option <?php echo e($livro->genero == 'New Adult (NA)' ? 'selected' : ''); ?>>New Adult (NA)</option>
                        <option <?php echo e($livro->genero == 'Steampunk' ? 'selected' : ''); ?>>Steampunk</option>
                        <option <?php echo e($livro->genero == 'Cyberpunk' ? 'selected' : ''); ?>>Cyberpunk</option>
                        <option <?php echo e($livro->genero == 'Fanfiction' ? 'selected' : ''); ?>>Fanfiction</option>
                    </optgroup>
                    <optgroup label="Não-Ficção">
                        <option <?php echo e($livro->genero == 'Biografia/Autobiografia' ? 'selected' : ''); ?>>Biografia/Autobiografia</option>
                        <option <?php echo e($livro->genero == 'Memórias' ? 'selected' : ''); ?>>Memórias</option>
                        <option <?php echo e($livro->genero == 'Ensaios' ? 'selected' : ''); ?>>Ensaios</option>
                        <option <?php echo e($livro->genero == 'Livros de Autoajuda' ? 'selected' : ''); ?>>Livros de Autoajuda</option>
                        <option <?php echo e($livro->genero == 'Desenvolvimento Pessoal' ? 'selected' : ''); ?>>Desenvolvimento Pessoal</option>
                        <option <?php echo e($livro->genero == 'Livros de Negócios' ? 'selected' : ''); ?>>Livros de Negócios</option>
                        <option <?php echo e($livro->genero == 'Espiritualidade/Religião' ? 'selected' : ''); ?>>Espiritualidade/Religião</option>
                        <option <?php echo e($livro->genero == 'História' ? 'selected' : ''); ?>>História</option>
                        <option <?php echo e($livro->genero == 'Filosofia' ? 'selected' : ''); ?>>Filosofia</option>
                        <option <?php echo e($livro->genero == 'Ciência/Divulgação Científica' ? 'selected' : ''); ?>>Ciência/Divulgação Científica</option>
                        <option <?php echo e($livro->genero == 'Psicologia' ? 'selected' : ''); ?>>Psicologia</option>
                        <option <?php echo e($livro->genero == 'Política' ? 'selected' : ''); ?>>Política</option>
                        <option <?php echo e($livro->genero == 'Sociologia' ? 'selected' : ''); ?>>Sociologia</option>
                        <option <?php echo e($livro->genero == 'Viagens' ? 'selected' : ''); ?>>Viagens</option>
                    </optgroup>
                    <optgroup label="Outros">
                        <option <?php echo e($livro->genero == 'Graphic Novels/Quadrinhos' ? 'selected' : ''); ?>>Graphic Novels/Quadrinhos</option>
                        <option <?php echo e($livro->genero == 'Mangás' ? 'selected' : ''); ?>>Mangás</option>
                        <option <?php echo e($livro->genero == 'Contos/Crônicas' ? 'selected' : ''); ?>>Contos/Crônicas</option>
                        <option <?php echo e($livro->genero == 'Antologias' ? 'selected' : ''); ?>>Antologias</option>
                        <option <?php echo e($livro->genero == 'Livros Infantis' ? 'selected' : ''); ?>>Livros Infantis</option>
                        <option <?php echo e($livro->genero == 'Livros Didáticos' ? 'selected' : ''); ?>>Livros Didáticos</option>
                        <option <?php echo e($livro->genero == 'Guias/Tutoriais' ? 'selected' : ''); ?>>Guias/Tutoriais</option>
                        <option <?php echo e($livro->genero == 'Literatura Erótica' ? 'selected' : ''); ?>>Literatura Erótica</option>
                        <option <?php echo e($livro->genero == 'Sátira/Paródia' ? 'selected' : ''); ?>>Sátira/Paródia</option>
                    </optgroup>
                </select>
            </div>
            
            <div class="col">
                <label for="language" class="form-label">Idioma</label>
                <select class="form-select" id="language" name="idioma" aria-label="Idioma">
                    <option <?php echo e($livro->idioma == 'Português' ? 'selected' : ''); ?>>Português</option>
                    <option <?php echo e($livro->idioma == 'Inglês' ? 'selected' : ''); ?>>Inglês</option>
                    <option <?php echo e($livro->idioma == 'Espanhol' ? 'selected' : ''); ?>>Espanhol</option>
                    <option <?php echo e($livro->idioma == 'Francês' ? 'selected' : ''); ?>>Francês</option>
                    <option <?php echo e($livro->idioma == 'Alemão' ? 'selected' : ''); ?>>Alemão</option>
                    <option <?php echo e($livro->idioma == 'Italiano' ? 'selected' : ''); ?>>Italiano</option>
                    <option <?php echo e($livro->idioma == 'Japonês' ? 'selected' : ''); ?>>Japonês</option>
                    <option <?php echo e($livro->idioma == 'Chinês' ? 'selected' : ''); ?>>Chinês</option>
                    <option <?php echo e($livro->idioma == 'Coreano' ? 'selected' : ''); ?>>Coreano</option>
                    <option <?php echo e($livro->idioma == 'Russo' ? 'selected' : ''); ?>>Russo</option>
                </select>
            </div>
            

        <!-- Imagem da Capa -->
        <div class="mb-3 mt-4">
            <label class="form-label">Imagem da Capa Atual:</label>
            <div class="mb-3">
                <img src="<?php echo e(asset('storage/' . $livro->image_path . '?v=' . time())); ?>" alt="Capa do Livro" class="img-thumbnail w-25">

            </div>
            <label for="image_path" id="image-label" class="btn btn-dark w-100 mb-3">
                <i class="bi bi-image me-2"></i> Alterar Imagem da Capa
            </label>
            <input type="file" class="form-control d-none" id="image_path" name="image_path" accept="image/*">

        <!-- Botão Salvar -->
        <div class="d-flex gap-3 mt-4">
            <button type="submit" class="btn btn-dark text-white">Salvar</button>
            <!-- Botão de Voltar -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmBackModal">
                Voltar
            </button>
        </div>
        
        <!-- Modal de Confirmação de Voltar -->
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
                        <!-- Link para voltar para a página de detalhes -->
                        <a href="<?php echo e(route('detalhe-livro', $livro->id)); ?>" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
        
    </form>

    <!-- Botão para acionar o modal de exclusão -->
    <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
        Excluir
    </button>

    <!-- Modal de Confirmação de Exclusão -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    Você tem certeza que deseja excluir este livro? Esta ação não pode ser desfeita.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <!-- Formulário de Exclusão -->
                    <form action="<?php echo e(route('excluir-livro', $livro->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.getElementById('image_path').addEventListener('change', function() {
        const label = document.getElementById('image-label');
        if (this.files && this.files.length > 0) {
            label.classList.remove('btn-dark');
            label.classList.add('btn-secondary'); // altera para cinza escuro quando uma imagem for selecionada
        } else {
            label.classList.remove('btn-secondary');
            label.classList.add('btn-dark'); // volta para o preto caso nenhuma imagem seja selecionada
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.livros.administrador.layoutadm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\biblioteca\resources\views/pages/livros/administrador/editar-livro.blade.php ENDPATH**/ ?>