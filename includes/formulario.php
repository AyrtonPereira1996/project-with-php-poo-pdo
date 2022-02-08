<main>

<section>
    <a href="index.php">
     <button class="btn btn-success">
        Voltar
     </button>
    </a>
</section>

<h2 class="my-3"><?=TITLE?></h2>

<form action="" method="post">
    <div class="my-3">
        <label for="">Titulo da vaga</label>
        <input type="text" class="form-control" name="titulo" value="<?=$obVaga->titulo?>">
    </div>

    <div class="my-3">
        <label for="">Descrição</label>
        <textarea type="text" class="form-control" name="descricao"><?=$obVaga->descricao?></textarea>
    </div>

    <div class="my-3">
        <label for="">Status</label>
        <div class="form-check form-check-inline">
            <label for="">
            <input class="" type="radio" name="activo" value="s" checked>
            Activo   
        </label>
        </div>

        <div class="form-check form-check-inline">
            <label for="">
            <input class="" type="radio" name="activo" value="n" <?=$obVaga->ativo == 'n' ? 'checked':''?>>
            Inactivo    
        </label> 
        </div>

        <div class="my-3">
        <button type="submit" class="btn btn-success">
Enviar
        </button>
        </div>

    </div>
</form>



</main>