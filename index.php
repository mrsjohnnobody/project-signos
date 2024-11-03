<?php include('layouts/header.php'); ?>
<div class="container mt-5">
    <h2>Descubra seu Signo Zodiacal</h2>
    <form id="signo-form" method="POST" action="show_zodiac_sign.php">
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
            <input type="date" class="form-control" name="data_nascimento" required>
        </div>
        <button type="submit" class="btn btn-primary">Consultar</button>
    </form>
</div>
</body>
</html>
