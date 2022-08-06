<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <h2>Listes des Professeurs</h2>
                        <a href="?p=professeurs.add" class="btn btn-info">Ajouter</a>
                        <table class="table user-list">
                            <thead>
                                <tr>
                                <th><span>Professeur</span></th>
                                <th><span>Facebook</span></th>
                                <th><span>Email</span></th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($professeurs as $professeur) :?>
                                <tr>
                                    <td>
                                        <img src="images/<?= $professeur->profil?>" alt="" width="100px">
                                        <a href="?p=professeurs.show&id=<?=$professeur->id_prof;?>" class="user-link"><?=$professeur->nom_prof?> <?=$professeur->prenom?></a>
                                    </td>
                                    <td><?=$professeur->facebook?></td>
                                    <td>
                                        <a href="#"><?=$professeur->email?></a>
                                    </td>
                                    <td style="width: 25%;">
                                        <a href="?p=professeurs.show&id=<?= $professeur->id_prof?>"><button class="btn btn-primary btn-sm" style="display: inline ;">Voir détails</button></a>
                                        <a href="?p=professeurs.edit&id=<?= $professeur->id_prof?>"><button class="btn btn-warning btn-sm" style="display: inline ;">Modifier</button></a> <br><br> 
                                        <form action="?p=professeurs.delete&id=<?=$professeur->id_prof?>" method="POST">
                                            <input type="hidden" name="id" value="<?=$professeur->id_prof?>">
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
