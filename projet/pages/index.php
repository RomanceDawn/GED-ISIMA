<?php include("header.php"); ?>



<div class="container theme-showcase" role="main">

<p class="text-center">Ici on va expliquer des trucs.</p> 

    <div class="jumbotron " style="transform: translate(0,50%);">

        <p class="text-center">Ici on va expliquer des trucs.</p> 
        <form class="form-horizontal" method="post" action="../php/rechercheManager.php" enctype="multipart/form-data">
            <fieldset>

                <div class="col-md-6 col-md-offset-3">

                    <div class="center col-md-12 input-group">
                        <input class="form-control" type="text" name="motsClefs" value="" id="motsClefs" />
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Recherche rapide</button>
                        </span>
                    </div>
                </div>           


            </fieldset>
        </form>
    </div>


</div>
<?php include("footer.php"); ?>

