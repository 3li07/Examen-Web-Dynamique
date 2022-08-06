<section class="vh-100">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Modifier le compte</h2>
                <form class="row g-3" action="?p=professeurs.saveData&id=<?= $professeur -> id_prof?>" method="post" enctype="multipart/form-data">
                  <div class="col-md-6">
                    <label for="inputNom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="inputNom" name="nom" value ="<?php echo $professeur->nom_prof?>">
                  </div>
                  <div class="col-md-6">
                    <label for="inputPrenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="inputPrenom" name="prenom" value ="<?php echo $professeur -> prenom?>">
                  </div>
                  <div class="col-6">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputAddress" name="address" value ="<?php echo $professeur -> adresse?>">
                  </div>
                  <div class="col-md-3">
                  <label for="inputGenre" class="form-label">Genre</label>
                    <select id="inputGenre" class="form-control" name="genre" >
                      <option <?php if($professeur -> genre=="H") echo "selected";?> value="H">H</option>
                      <option <?php if($professeur -> genre=="F") echo "selected";?> value="F">F</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                  </div>
                  <div class="col-12">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="professeur@gmail.com" name = "email" value= "<?php echo $professeur -> email?>">
                  </div>
                  <div class="col-12">
                    <label for="inputDtn" class="form-label">Date de Naissance</label>
                    <input type="date" class="form-control" id="inputDtn" name="dtn" value ="<?php echo $professeur -> dateDeNaissance?>">
                  </div>
                  <div class="col-md-6">
                    <label for="inputTel" class="form-label">Téléphone</label>
                    <input type="tel" class="form-control" id="inputTel" name="tel" value ="<?php echo $professeur -> contact?>">
                  </div>
                  <div class="col-md-6">
                    <label for="inputRS" class="form-label">Réseau social</label>
                    <input type="text" class="form-control" id="inputRS" name="rs" value ="<?php echo $professeur -> facebook?>">
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
