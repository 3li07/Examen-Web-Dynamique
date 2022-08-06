<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Creation d'un Compte</h1>
</div>
<?=$erreur?>
<form method="POST" action="?p=auths.singup" class="user">
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="exampleFirstName"
                placeholder="Prenom" name="prenom" required>
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user" id="exampleLastName"
                placeholder="Nom" name="nom"required>
        </div>
    </div>
    <div class="form-group">
        <input type="email" class="form-control form-control-user" id="exampleInputEmail"
            placeholder="Email Address" name="email"required>
    </div>
    <div class="form-group">
        <select class ="form-control" id="type" name="type" required>
            <option value="professeurs">professeur</option>
            <option value="etudiants">étudiant</option>
        </select><br>
    </div>


    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user"
                id="exampleInputPassword" name="password1" placeholder="Password"required>
        </div>
        <div class="col-sm-6">
            <input type="password" class="form-control form-control-user"
                id="exampleRepeatPassword" name="password2" placeholder="Repeat Password"required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        S'enregister
    </button>
    <hr>
</form>
<hr>
<div class="text-center">
    <a class="small" href="?p=auths.login">Already have an account? Login!</a>
</div>