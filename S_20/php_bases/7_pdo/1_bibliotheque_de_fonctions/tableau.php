<?php

if (file_exists('header.php')){

    require_once('header.php');

} else {

    require('page_not_found.php');

}

?>

        <div class="row" style="margin: auto;" >
            <div class="col g-0">

                
        
                    <div>
                       
                        <Table class="table table-bordered">
                            <thead class="table-active">
                                <tr>
                                    <th >Photo</th>
                                    <th>ID</th>
                                    <th>Catégorie</th>
                                    <th>Libellé</th>
                                    <th>Prix</th>
                                    <th>Couleur</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-warning">
                                    <td><img src="src/img/7.jpg" alt="Photo du barbecue Aramis" height="100" width="100"></td>
                                    <td>7</td>
                                    <td>Barbecues</td>
                                    <td>Aramis</td>
                                    <td>110.00€</td>
                                    <td>Brun</td>
                                </tr>
                                <tr>
                                    <td><img src="src/img/8.jpg" alt="Photo du barbecue Athos" height="100" width="100"></td>
                                    <td>8</td>
                                    <td>Barbecues</td>
                                    <td>Athos</td>
                                    <td>249.99€</td>
                                    <td>Noir</td>
                                </tr>
                                <tr class="table-warning">
                                    <td><img src="src/img/11.jpg" alt="Photo du barbecue Clatronic" height="100" width="100"></td>
                                    <td>11</td>
                                    <td>Barbecues</td>
                                    <td>Clatronic</td>
                                    <td>135.90€</td>
                                    <td>Chrome</td>
                                </tr>
                                <tr>
                                    <td><img src="src/img/12.jpg" alt="Photo du barbecue Camping" height="100" width="100"></td>
                                    <td>12</td>
                                    <td>Barbecues</td>
                                    <td>Camping</td>
                                    <td>88.00€</td>
                                    <td>Noir</td>
                                </tr>
                                <tr class="table-warning">
                                    <td><img src="src/img/13.jpg" alt="Photo du barbecue Green" height="100" width="100"></td>
                                    <td>13</td>
                                    <td>Brouette</td>
                                    <td>Green</td>
                                    <td>49.00€</td>
                                    <td>Verte</td>
                                </tr>
                    
                            </tbody>
                        </Table>

                    </div>

                

        </div>

<?php

if (file_exists('footer.php')){

    require_once('footer.php');

} else {

    require('page_not_found.php');

}

?>