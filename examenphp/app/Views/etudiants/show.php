<div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card p-2 text-center">
                    <div class="row">
                        <div class="col-md-7 border-right no-gutters">
                            <div class="py-3"><img src="images/<?php echo $etudiant -> profil?>" width="100" class="rounded-circle">
                                <h4 class="text-secondary"><?php echo $etudiant -> nom." ".$etudiant -> prenom?></h4>
                                <div class="group&class"><span><?php echo $etudiant -> niveau." ".$etudiant ->groupe?></span></div>
                                <div class="stats">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex flex-column"> <span class="text-left head">Matricule</span> <span class="text-left bottom"><?= $etudiant->numero_matricule?></span> </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column"> <span class="text-left head">Etablissement Antérieur</span> <span class="text-left bottom"><?php echo $etudiant -> etab_ant?></span> </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex flex-column"> <span class="text-left head">Date de Naissance</span> <span class="text-left bottom"><?php echo $etudiant -> dateDeNaissance?></span> </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column"> <span class="text-left head">Diplôme</span> <span class="text-left bottom"><?php echo $etudiant -> diplome?></span> </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="px-3"><a href="?p=etudiants.edit&id=<?php echo $etudiant->id_eleve?>"><button type="button" class="btn btn-primary btn-block">Modifier</button></a></div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="py-3">
                                <div> <span class="d-block head">Adresse</span> <span class="bottom"><?php echo $etudiant -> adresse?></span> </div>
                                <div class="mt-4"> <span class="d-block head">Téléphone</span> <span class="bottom"><?php echo $etudiant -> contact?></span> </div>
                                <div class="mt-4"> <span class="d-block head">Genre</span> <span class="bottom"><?php echo $etudiant -> genre?></span> </div>
                                <div class="mt-4"> <span class="d-block head">Réseau Social</span> <span class="bottom"><?php echo $etudiant -> facebook?></span> </div>
                                <div class="mt-4"> <span class="d-block head">Email</span> <span class="bottom"><?php echo $etudiant -> email?></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
