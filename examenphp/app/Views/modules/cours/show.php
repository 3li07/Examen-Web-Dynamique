<h2><?=$module->code_module?> : <?=$module->nom_module?></h2>
<h3><?=$cour->titre?></h3>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <?=$cour->contenu?><br>
        <a href="?p=modules.show&id=<?=$cour->id_module?>" class="btn btn-secondary">Precedent</a>
        <a href="?p=modules.cours.edit&id=<?=$cour->id_cours?>" class="btn btn-warning">Modifier</a>
        <form action="?p=modules.cours.delete&id=<?=$cour->id_cours?>" method="POST" style="display :inline;">
            <input type="hidden" name="id" value="<?=$cour->id_cours?>">
            <input type="hidden" name="id_module" value="<?=$module->id_module?>">            
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
        <a href="?p=modules.commentaires.add" class="btn btn-info">Commenter</a>
    </div>
    <div class="col-md-3"></div>
</div>