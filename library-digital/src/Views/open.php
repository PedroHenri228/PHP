<?php if (!empty($results)): ?>
    <h1>Detalhes do Livro</h1>
    <div>
        <strong>Título:</strong> <?php echo $results['title'] ?? 'Não disponível'; ?>
    </div>
    <div>
        <strong>Autor(es):</strong> 
        <?php 
        if (!empty($results['authors'])) {
            foreach ($results['authors'] as $author) {
                echo $author['name'] . '<br>';
            }
        } else {
            echo 'Não disponível';
        }
        ?>
    </div>
    <div>
        <strong>Data de Publicação:</strong> <?php echo $results['publish_date'] ?? 'Não disponível'; ?>
    </div>
    <div>
        <strong>Imagem da Capa:</strong> <br>
        <?php echo !empty($results['cover']) ? "<img src='{$results['cover']['medium']}' alt='Capa do Livro'>" : 'Imagem não disponível'; ?>
    </div>
<?php else: ?>
    <p>Livro não encontrado ou dados não disponíveis.</p>
<?php endif; ?>
