<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="src/public/sass/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:wght@300;400;500;600&family=Sora:wght@100..800&display=swap"
        rel="stylesheet">
</head>

<body>

    <?php if (!empty($results['results'])): ?>
        <ul>
            <?php foreach ($results['results'] as $book): ?>
                <?php $bookDetails = $book['book_details'][0] ?>
                <?php $isbn = $book['isbns'][0] ?>
                <li>
                    <strong>Título:</strong> <?= htmlspecialchars($bookDetails['title'] ?? 'Sem título') ?><br>
                    <strong>Autor:</strong> <?= htmlspecialchars($bookDetails['author'] ?? 'Desconhecido') ?><br>
                    <strong>Descrição:</strong> <?= htmlspecialchars($bookDetails['description'] ?? 'Desconhecido') ?><br>
                    <a href="http://localhost:8080/library-digital/books/<?= htmlspecialchars($isbn['isbn13']) ?> ">Ver
                        Livro</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Nenhum livro encontrado.</p>
    <?php endif; ?>
</body>

</html>