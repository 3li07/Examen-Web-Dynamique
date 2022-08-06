<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form action="" method="post">
            <?= $form->input('email','Email','email','Username') ?>
            <?= $form->input('password','Mot de Passe','password') ?><br>
            <?= $form->submit('Connexion') ?>  <em><a href="?p=auths.singup">Create a new Count</a> </em>
        </form>
        <?php if($errors) :?>
        <div class="alert alert-danger">Identifiant incorect verifie l'email ou le mot de passe</div>
        <?php endif?>
    </div>
    <div class="col-md-4"></div>
</div>
