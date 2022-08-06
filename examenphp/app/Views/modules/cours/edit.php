
<div class="row">
    <div class="col-md-2"><a href="?p=modules.cours.show&id=<?=$_GET['id']?>" class="btn btn-info">Retour</a></div>
    <div class="col-md-6">
    <form action="?p=modules.cours.validate" method="post">
        <input type="hidden" name="id" value="<?=$_GET['id']?>"><br>
        <?= $form->input('titre','Titre du Cour','text') ?><br>
        <?= $form->input('contenu','Contenu','textarea') ?><br>
    
        <?= $form->submit('Sauvgarder') ?>
    </form>    
    </div>
</div>
