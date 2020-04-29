<?php include "header.php"; ?>

<body>
    <div class="container-md bg_container">

        <a href="<?= site_url("produits/ajouter"); ?>" class="btn btn-success">Ajout</a>
        <table class="table table-hover table-sm table-responsive-sm">
        <tr class="headtable text-truncate">
        <th scope="col" class="sticky-top">Photo</th>
        <th scope="col" class="sticky-top ">ID</th>
        <th scope="col" class="sticky-top ">Référence</th>
        <th scope="col" class="sticky-top ">Libelle</th>
        <th scope="col" class="sticky-top ">Prix</th>
        <th scope="col" class="sticky-top ">Stock</th>
        <th scope="col" class="sticky-top ">Couleur</th>
        <th scope="col" class="sticky-top ">Date d\'ajout</th>
        <th scope="col" class="sticky-top ">Date de modif</th>
        <th scope="col" class="sticky-top ">Bloqué</th>
        <th scope="col">Détails</th>
        </tr>
        <?php foreach ($liste as $row) { ?>
            <tr class="bobytable">
                <td> <img src="<?=  base_url('assets/img/') .$row->pro_id.'.'.$row->pro_photo; ?>" class="photoliste"> </td> 
                <td><?= $row->pro_id ?></td>
                <td><?= $row->pro_ref ?></td>
                <td><?= $row->pro_libelle ?></td>
                <td><?= $row->pro_prix ?></td>
                <td><?= $row->pro_stock ?></td>
                <td><?= $row->pro_couleur ?></td>
                <td><?= $row->pro_d_ajout ?></td>
                <td><?= $row->pro_d_modif ?></td>
                <td><?= $row->pro_bloque ?></td>
                <td><a href="<?= site_url("produits/modifier/".$row->pro_id); ?>">Modifier</a></td>
            <?php }; ?>
    </tr>
</table>
</body>
<?php include "footer.php"; ?>