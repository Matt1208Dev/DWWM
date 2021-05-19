<?php

if (file_exists('header.php')){

    require_once('header.php');

} else {

    require('page_not_found.php');

}

?>

        <div class="row" style="margin:auto">
            <div class="col-lg-8">

                <section>
        
                    <div class="mt-3 ps-3">
                       
                        <div>
                            <h1 class="fs-2">L'entreprise</h1>
            
                            <p>Notre entreprise familiale met tout son savoir-faire à  votre disposition dans le domaine du jardin et du paysagisme. <br><br>
                            Créée il y a 70 ans, notre entreprise vend fleurs, arbustes, matériel à  main et motorisés. <br><br>
                            Implantés à  Amiens, nous intervenons dans tout le département de la Somme : Albert, Doullens, Péronne, Abbeville, Corbie.</p>
                            
                        </div>
            
                        <div>
                            <h2>Qualité</h2>
            
                            <p>Nous mettons à  votre disposition un service personnalisé, avec 1 seul interlocuteur durant tout votre projet. <br><br>
                            Vous serez séduit par notre expertise, nos compétences et notre sérieux.</p>
            
                        </div>
            
                        <div>
                            <h2>Devis gratuit</h2>
            
                            <p>Vous pouvez bien sûr nous contacter pour de plus amples informations ou pour une demande d'intervention. Vous souhaitez un devis ? Nous vous le réalisons gratuitement. Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus impedit pariatur aperiam aliquid quod maiores minus facilis, incidunt perferendis voluptas, fuga at dolore laboriosam minima cum fugit ex optio porro.</p>
            
                        </div>
                    </div>
                     
                </section>
            </div>
            <div class="col-lg-4 bg-warning">
                <h2 class="text-center mt-3">[Colonne de droite]</h2>
            </div>

        </div>

<?php

if (file_exists('footer.php')){

    require_once('footer.php');

} else {

    require('page_not_found.php');

}

?>