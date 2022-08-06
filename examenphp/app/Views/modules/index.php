<h2>Liste des Modules</h2>

<table class="table">
    <thead>
        <tr>
            <th>Code Matiere</th>
            <th>Nom module</th>
            <th>Nom du Professeur</th>
            <th>Nombre d'heure</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($modules as $module) : ?>
        <tr>
            <td><?=$module->code_module?></td>
            <td><?=$module->nom_module?></td>
            <td><?=$module->nom_prof ." ". $module->prenom?></td>
            <td><?=$module->nombre_heure?></td>
            <td>
                <a href="?p=modules.show&id=<?=$module->id?>" class="btn btn-secondary" style=" display: inline;">Details</a>
                <a href="?p=modules.edit&id=<?=$module->id?>" class="btn btn-warning" style=" display: inline;">Modifier</a>
                <form action="?p=modules.delete&id=<?=$module->id?>" method="POST" style="display :inline;">
                    <input type="hidden" name="id" value="<?=$module->id?>">
                    <button type="submit" href="?p=modules.delete&id=<?=$module->id?>" class="btn btn-danger ">Supprimer</button>
                </form>
            </td>      
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
