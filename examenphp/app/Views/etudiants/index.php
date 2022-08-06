<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <h2>Listes des Etudiants</h2>
                        <a href="?p=etudiants.add" class="btn btn-info">Ajouter</a>
                        <table class="table user-list">
                            <thead>
                                <tr>
                                <th><span>Etudiant</span></th>
                                <th><span>Facebook</span></th>
                                <th class="text-center"><span>Niveau/Groupe</span></th>
                                <th><span>Email</span></th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($etudiants as $etudiant) :?>
                                <tr>
                                    <td>
                                        <img src="images/<?= $etudiant->profil?>" alt="" width="100px">
                                        <a href="?p=etudiants.show&id=<?=$etudiant->id_eleve;?>" class="user-link"><?=$etudiant->nom?> <?=$etudiant->prenom?></a>
                                        <span class="user-subhead"><?= $etudiant->numero_matricule?></span>
                                    </td>
                                    <td><?=$etudiant->facebook?></td>
                                    <td class="text-center">
                                        <span class="label label-default"><?= $etudiant->niveau." ".$etudiant->groupe ?></span>
                                    </td>
                                    <td>
                                        <a href="#"><?=$etudiant->email?></a>
                                    </td>
                                    <td style="width: 25%;">
                                        <a href="?p=etudiants.show&id=<?= $etudiant->id_eleve?>"><button class="btn btn-primary btn-sm">Voir détails</button></a><br><br>
                                        <a href="?p=etudiants.edit&id=<?= $etudiant->id_eleve?>"><button class="btn btn-warning btn-sm">Modifier</button></a><br><br>
                                        <form action="?p=etudiants.delete&id=<?=$etudiant->id_eleve?>" method="POST">
                                            <input type="hidden" name="id" value="<?=$etudiant->id_eleve?>">
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
