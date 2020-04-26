<?php include "header.php"; ?>

<body>
    <div class="container-md bg_container">

        <?php
        echo "<a href=\"formulaire_ajout.php\" class=\"btn btn-success\">Ajout</a>";
        echo '<table class="table table-hover table-sm table-responsive-sm">';
        echo '<tr class="headtable text-truncate">';
        echo '<th scope="col" class="sticky-top">Photo</th>';
        echo '<th scope="col" class="sticky-top ">ID</th>';
        echo '<th scope="col" class="sticky-top ">Référence</th>';
        echo '<th scope="col" class="sticky-top ">Libelle</th>';
        echo '<th scope="col" class="sticky-top ">Prix</th>';
        echo '<th scope="col" class="sticky-top ">Stock</th>';
        echo '<th scope="col" class="sticky-top ">Couleur</th>';
        echo '<th scope="col" class="sticky-top ">Date d\'ajout</th>';
        echo '<th scope="col" class="sticky-top ">Date de modif</th>';
        echo '<th scope="col" class="sticky-top ">Bloqué</th>';
            echo '<th scope="col">Détails</th>';
        echo '</tr>';
        foreach ($liste as $row) { ?>
            <tr class="bobytable">
                <td> <img src="<?php echo base_url('assets/img/') .$value->pro_id.'.'.$value->pro_photo; ?>"> </td> 
                <td><?= $row->pro_id ?></td>
                <td><?= $row->pro_ref ?></td>
                <td><?= $row->pro_libelle ?></td>
                <td><?= $row->pro_prix ?></td>
                <td><?= $row->pro_stock ?></td>
                <td><?= $row->pro_couleur ?></td>
                <td><?= $row->pro_d_ajout ?></td>
                <td><?= $row->pro_d_modif ?></td>
                <td><?= $row->pro_bloque ?></td>
                <td><a href="<?= site_url("produits/modifier/".$produits->id); ?>">Modifier</a></td>
            <?php }; ?>
    </tr>
</table>
</body>
<?php include "footer.php"; ?>