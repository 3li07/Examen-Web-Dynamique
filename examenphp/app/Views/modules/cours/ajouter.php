
<div class="row">
    <div class="col-md-2"><a href="?p=modules.show" class="btn btn-info">Retour</a></div>
    <div class="col-md-6">
    <form action="?p=modules.cours.save" method="post">
        <input type="hidden" name="id_module" value="<?=$id_module?>">
        <?= $form->input('titre','Titre du Cour','text') ?><br>
        <?= $form->input('contenu','Contenu','textarea') ?><br>
    
        <?= $form->submit('Ajouter') ?>
    </form>    
    </div>
</div>
