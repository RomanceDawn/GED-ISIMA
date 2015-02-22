<?php include("./header.php"); ?>
<div class="container theme-showcase" role="main">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>Résultat de recherche</h3>
        </div>
        <div class="panel-body">

            <?php
            if (!empty($_SESSION['rapports'])) {
                require_once '../php/Rapport.class.php';
                $rapports = $_SESSION['rapports'];
                ?>
            <div class="alert alert-info text-center"><strong><?php echo count($rapports);?></strong> résultat(s).
                </div>
                <div class="table-responsive">
                    <table class="table table-condensed table-striped ">
                        <thead >
                        <th class="text-center">Titre</th>
                        <th class="text-center">Auteur</th>
                        <th class="text-center">Année</th>
                        </thead>
                        <tbody>

                            <?php
                            for ($i = 0; $i < count($rapports); $i++) {
                                $rapports[$i] = unserialize($rapports[$i]);
                                ?>
                                <tr id="<?php echo $rapports[$i]->getID(); ?>" class="<?php if (!$rapports[$i]->isValide() && !empty($_SESSION['login'])) {
                                    ?>danger
                                <?php } ?>">

                                    <td class="col-md-3 "><?php echo $rapports[$i]->getTitre(); ?></td>
                                    <td><?php echo $rapports[$i]->getAuteur(); ?></td>
                                    <td><?php echo $rapports[$i]->getAnnee(); ?></td>
                                    <td><a class="btn btn-sm btn-default" href="../rapports/<?php echo $rapports[$i]->getNomServ(); ?>" target=\"_blank\">Afficher</a></td>
                                    <td><a class="btn btn-sm btn-primary" href="../php/telechargerManager.php?id=<?php echo $rapports[$i]->getId(); ?>">Télécharger</a></td>
        <?php
        if (!empty($_SESSION['login'])) {
            $id = $rapports[$i]->getID();
            ?>
                                        <td><a class="btn btn-default btn-sm" href="modifierRapport.php?id=<?php echo $id; ?>">Modifier</a></td>
                                        <td><a class="btn btn-danger btn-sm" href="#" onClick="supprimerRapport('<?php echo $rapports[$i]->getID() ?>', '<?php echo $i ?>');
                                       return false;">Supprimer</a></td>
                                    <?php } ?>
                                </tr>
                                <?php }
                                ?>
                        </tbody>
                    </table>
                </div>
                            <?php
                        }
                        ?>
        </div>
    </div>
</div>
            <?php include("./footer.php"); ?>