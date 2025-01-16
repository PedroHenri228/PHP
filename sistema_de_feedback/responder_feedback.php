<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f1f1f1;
        }

        .container {
            background-color: white;
        }
    </style>
</head>

<body>

    <nav class="navbar bg-body-tertiary fixed-top mb-5">
        <div class="container-fluid">
            <h1 class="text-center">Administração dos Feedbacks</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <?php
    $conn = new mysqli('bfde230a740d', 'phpuser', 'phppass', 'feedback_db');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['admin_response'])) {
        $admin_response = $_POST['admin_response'];

        $feedback_id = $_POST['feedback_id'];
        $update_sql = "UPDATE feedback SET admin_response = '$admin_response' WHERE id = $feedback_id";
        $conn->query($update_sql);
    }


    $sql = "SELECT * FROM feedback";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?><div class="container p-5">
                <div class="ro p-5">
                    <div class="col">
                        <table class="table table-sm">
                            <thead class="table-light">
                                <td>Nome</td>
                                <td>CPF</td>
                                <td>Email</td>
                                <td>Telefone</td>
                                <td>Serviço concluído</td>
                                <td>Atendimento cordial</td>
                                <td>Satisfação</td>
                                <td>Recomendaria</td>
                                <td>Comentários adicionais</td>
                                <td>Resposta do Administrador</td>
                                <td>Ações</td>
                            </thead>
                            <tbody>
                                <td><?php echo $row["nome"];  ?></td>
                                <td><?php echo $row["cpf"];  ?></td>
                                <td><?php echo $row["email"];  ?></td>
                                <td><?php echo $row["telefone"];  ?></td>
                                <td><?php echo $row["service_completed"];  ?></td>
                                <td><?php echo $row["service_cordial"];  ?></td>
                                <td><?php echo $row["satisfaction"];  ?></td>
                                <td><?php echo $row["recommend"];  ?></td>
                                <td><?php echo $row["additional_comments"];  ?></td>
                                <td><?php echo $row["admin_response"];  ?></td>
                                <td>
                                    <form action='responder_feedback.php' method='post'>
                                        <input type='hidden' name='feedback_id' value='<?php echo $row["id"] ?>'>
                                        <textarea name='admin_response' placeholder='Responda ao feedback'></textarea><br>
                                        <button type="submit" class="btn btn-outline-primary">Responder</button>
                                    </form>
                                </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    <?php
        }
    } else {
        echo "Nenhum feedback encontrado.";
    }

    $conn->close();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>