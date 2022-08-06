<div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card p-2 text-center">
                    <div class="row">
                        <div class="col-md-7 border-right no-gutters">
                            <div class="py-3"><img src="images/<?php echo $professeur -> profil?>" width="100" class="rounded-circle">
                                <h4 class="text-secondary"><?php echo $professeur -> nom_prof." ".$professeur -> prenom?></h4>
                                <div class="stats">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex flex-column"> <span class="text-left head">Nombre de matiere enseigner</span></div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column"> <span class="text-left head"><?=$nombre?></span></div> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex flex-column"> <span class="text-left head">Date de Naissance</span> <span class="text-left bottom"><?php echo $professeur -> dateDeNaissance?></span> </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column"> <span class="text-left head">Diplôme</span> <span class="text-left bottom"><?php echo ''?></span> </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="px-3"><a href="?p=professeurs.edit&id=<?php echo $professeur->id_prof?>"><button type="button" class="btn btn-primary btn-block">Modifier</button></a></div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="py-3">
                                <div> <span class="d-block head">Adresse</span> <span class="bottom"><?php echo $professeur -> adresse?></span> </div>
                                <div class="mt-4"> <span class="d-block head">Téléphone</span> <span class="bottom"><?php echo $professeur -> contact?></span> </div>
                                <div class="mt-4"> <span class="d-block head">Genre</span> <span class="bottom"><?php echo $professeur -> genre?></span> </div>
                                <div class="mt-4"> <span class="d-block head">Réseau Social</span> <span class="bottom"><?php echo $professeur -> facebook?></span> </div>
                                <div class="mt-4"> <span class="d-block head">Email</span> <span class="bottom"><?php echo $professeur -> email?></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>