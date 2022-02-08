<main>


    <h2 class="my-3">Exclusão de vaga</h2>

    <form action="" method="post">
        <div class="my-3">
            <p>Você desejar mesmo excluir a vaga <strong> <?=$obVaga->titulo?> </strong></p>
        </div>

        <div class="my-3">
            <a href="index.php">
                <button type="button" class="btn btn-primary">
                    Cancelar
                </button>
            </a>

            <button type="submit" name="excluir" class="btn btn-danger">
                Excluir
            </button>
        </div>

    </form>



</main>
