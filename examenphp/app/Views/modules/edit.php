
<div class="row">
    <div class="col-md-2"><a href="?p=modules.index" class="btn btn-info">Retour</a></div>
    <div class="col-md-6">
    <form action="?p=modules.validate" method="post">
        <input type="hidden" name="id" value="<?=$id?>">
        <?= $form->input('code_module','Code Module','text') ?>
        <?= $form->input('nom_module','Nom du Module','text') ?>
        <?= $form->input('nombre_heure','Nombre d\'heure','number') ?>
        <?= $form->select('id_prof', 'Professeur', $professeurs)?><br>
    
        <?= $form->submit('Sauvgarder') ?>
    </form>    
    </div>
</div>
