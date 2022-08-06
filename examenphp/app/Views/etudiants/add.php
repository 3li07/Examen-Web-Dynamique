<section class="vh-100">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Ajouter un nouveau etudiant</h2>
                <form class="row g-3" action="?p=etudiants.save" method="post" enctype="multipart/form-data">
                  <div class="col-md-6">
                    <label for="inputNom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="inputNom" name="nom">
                  </div>
                  <div class="col-md-6">
                    <label for="inputPrenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="inputPrenom" name="prenom">
                  </div>
                  <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputAddress" name="address">
                  </div>
                  <div class="col-12">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="etudiant@gmail.com" name = "email">
                  </div>
                  <div class="col-md-6">
                    <label for="inputMatricule" class="form-label">Matricule</label>
                    <input type="text" class="form-control" id="inputMatricule" name = "matricule">
                  </div>
                  <div class="col-md-3">
                    <label for="inputNiveau" class="form-label">Niveau</label>
                    <input type="text" class="form-control" id="inputNiveau" name = "niveau">
                  </div>
                  <div class="col-md-3">
                    <label for="inputGroupe" class="form-label">Groupe</label>
                    <input type="text" class="form-control" id="inputGroupe" name ="groupe">
                  </div>
                  <div class="col-md-6">
                    <label for="inputPasswd" class="form-label">Mot de Passe</label>
                    <input type="password" class="form-control" id="inputPasswd" name = "passwd">
                  </div>
                  <div class="col-md-6">
                    <label for="inputPasswd2" class="form-label">Confirmer mot de passe</label>
                    <input type="password" class="form-control" id="inputPasswd" name="passwd2">
                    <?=$message?>
                  </div>
                  <div class="col-12">
                    <label for="inputDtn" class="form-label">Date de Naissance</label>
                    <input type="date" class="form-control" id="inputDtn" name="dtn">
                  </div>
                  <div class="col-md-6">
                    <label for="inputTel" class="form-label">Téléphone</label>
                    <input type="tel" class="form-control" id="inputTel" name="tel">
                  </div>
                  <div class="col-md-6">
                    <label for="inputRS" class="form-label">Facebook</label>
                    <input type="text" class="form-control" id="inputRS" name="rs">
                  </div>
                  <div class="col-md-3">
                    <label for="inputBacc" class="form-label">Diplôme</label>
                    <input type="inputBacc" class="form-control" id="inputBacc" placeholder="Série S" name="bacc">
                  </div>
                  <div class="col-md-3">
                    <label for="inputGenre" class="form-label">Genre</label>
                    <select id="inputGenre" class="form-control" name="genre">
                      <option selected>Choisissez...</option>
                      <option value="H">H</option>
                      <option value="F">F</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="inputEtab" class="form-label">Etablissement</label>
                    <input type="inputEtab" class="form-control" id="inputEtab" name="etab">
                  </div>

                  <div class="col-12">
                    <label for="inputPfp" class="form-label">Photo</label>
                    <input type="file" class="form-control" id="inputPfp" name="url">
                    <?=$messagepdp?>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary mt-4 col-12">Ajouter</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
