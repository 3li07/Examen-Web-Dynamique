<section class="vh-100">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Modifier le compte</h2>
                <form class="row g-3" action="?p=etudiants.saveData&id=<?= $etudiant -> id_eleve?>" method="post" enctype="multipart/form-data">
                  <div class="col-md-6">
                    <label for="inputNom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="inputNom" name="nom" value ="<?php echo $etudiant->nom?>">
                  </div>
                  <div class="col-md-6">
                    <label for="inputPrenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="inputPrenom" name="prenom" value ="<?php echo $etudiant -> prenom?>">
                  </div>
                  <div class="col-6">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputAddress" name="address" value ="<?php echo $etudiant -> adresse?>">
                  </div>
                  <div class="col-md-3">
                    <label for="inputClasse" class="form-label">Classe</label>
                    <input type="text" class="form-control" id="inputClasse" name = "classe" value ="<?php echo $etudiant -> niveau?>">
                  </div>
                  <div class="col-md-3">
                    <label for="inputGroupe" class="form-label">Groupe</label>
                    <input type="text" class="form-control" id="inputGroupe" name ="groupe" value ="<?php echo $etudiant -> groupe?>">
                  </div>
                  <div class="col-12">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="etudiant@gmail.com" name = "email" value= "<?php echo $etudiant -> email?>">
                  </div>
                  <div class="col-12">
                    <label for="inputDtn" class="form-label">Numero Matricule</label>
                    <input type="text" class="form-control" id="inputDtn" name="numero_matricule" value ="<?php echo $etudiant->numero_matricule?>">
                  </div>
                  <div class="col-12">
                    <label for="inputDtn" class="form-label">Date de Naissance</label>
                    <input type="date" class="form-control" id="inputDtn" name="dtn" value ="<?php echo $etudiant -> dateDeNaissance?>">
                  </div>
                  <div class="col-md-6">
                    <label for="inputTel" class="form-label">Téléphone</label>
                    <input type="tel" class="form-control" id="inputTel" name="tel" value ="<?php echo $etudiant -> contact?>">
                  </div>
                  <div class="col-md-6">
                    <label for="inputRS" class="form-label">Réseau social</label>
                    <input type="text" class="form-control" id="inputRS" name="rs" value ="<?php echo $etudiant -> facebook?>">
                  </div>
                  <div class="col-md-3">
                    <label for="inputBacc" class="form-label">Diplôme</label>
                    <input type="text" class="form-control" id="inputBacc" name="bacc" value ="<?php echo $etudiant -> diplome?>">
                  </div>
                  <div class="col-md-3">
                    <label for="inputGenre" class="form-label">Genre</label>
                    <select id="inputGenre" class="form-control" name="genre" >
                      <option <?php if($etudiant -> genre=="H") echo "selected";?> value="H">H</option>
                      <option <?php if($etudiant -> genre=="F") echo "selected";?> value="F">F</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="Etb" class="form-label">Etablissement</label>
                    <input type="text" class="form-control" id="Etb" placeholder="Etablissement..." name="etab_ant" value ="<?php echo $etudiant -> etab_ant?>">
                  </div>
                  <div class="col-12">
                    <label for="inputPfp" class="form-label">Photo</label>
                    <input type="file" class="form-control" id="inputPfp" name="url">
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary mt-4 col-12">Modifier</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
