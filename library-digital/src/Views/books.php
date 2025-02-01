<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
</head>
<body>
    
    <?php if (!empty($results['results'])): ?>
        <ul>
            <?php foreach ($results['results'] as $book): ?>
                <?php $bookDetails = $book['book_details'][0]?>
                <?php $isbn = $book['isbns'][0]?>
                <li>
                    <strong>Título:</strong> <?= htmlspecialchars($bookDetails['title'] ?? 'Sem título') ?><br>
                    <strong>Autor:</strong> <?= htmlspecialchars($bookDetails['author'] ?? 'Desconhecido') ?><br>
                    <strong>Descrição:</strong> <?= htmlspecialchars($bookDetails['description'] ?? 'Desconhecido') ?><br>
                    <a href="http://localhost:8080/library-digital/books/<?= htmlspecialchars($isbn['isbn13']) ?> ">Ver Livro</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Nenhum livro encontrado.</p>
    <?php endif; ?>
</body>
</html>
