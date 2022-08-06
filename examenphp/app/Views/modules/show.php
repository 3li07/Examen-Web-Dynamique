<a href="?p=modules.index" class="btn btn-primary">Liste</a>
<h2><?=$module->code_module?> : <?=$module->nom_module?></h2>
<div class="row">
    <div class="col-md-5">
        <div class="card" style="width: 25rem;">
            <div class="card-body">
                <h5 class="card-title" style="display: inline;">Duree : </h5>
                <h6 class="card-subtitle mb-2 text-muted"style="display: inline;"><em><?=$module->nombre_heure?> h</em></h6><br>
                <h5 class="card-title" style="display: inline;">Professeur : </h5>
                <h6 class="card-subtitle mb-2 text-muted"style="display: inline;"><em>Mr/Mme <?=$module->nom_prof?> <?=$module->prenom?></em></h6>
                <a href="?p=modules.cours.add&id=<?=$module->id_module?>" class="btn btn-success">Ajouter un cours</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <?= $message ?>
        <?php foreach($cours as $cour) :?>
        <div class="card">  
            <div class="card-header">
                <?=$cour->titre?>
            </div>
            <div class="card-body">
                <?=$cour->getExtr()?>
                <a href="?p=modules.cours.show&id=<?=$cour->id_cours?>" class="btn btn-secondary" style="display:inline;">Voir plus</a>
                <form action="?p=modules.cours.delete&id=<?=$cour->id_cours?>" method="POST" style="display :inline;">
                    <input type="hidden" name="id" value="<?=$cour->id_cours?>">
                    <input type="hidden" name="id_module" value="<?=$module->id_module?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div> <br>
        <?php endforeach?>
    </div>
</div>