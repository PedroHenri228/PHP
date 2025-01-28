<?php $this->layout('master') ?>

<h1>Contato</h1>

<form action="/contact" method="post">

    <input type="text" name="name" placeholder="name">
    <input type="text" name="email" placeholder="email">
    <button type="submit">Enviar</button>
</form>