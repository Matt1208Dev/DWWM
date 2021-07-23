// Créer un tableau comportant 4 lignes et 5 colonnes.
// La dernière ligne et la dernière colonne serviront à afficher les totaux des cellules de chaque ligne et de chaque colonne.
// Saisir au clavier les valeurs des 3 premières lignes.
// Saisir au clavier les valeurs des 4 premières colonnes.
// Calculer le total de chaque ligne et de chaque colonne.


let tab = [[1, 2, 3], [4, 5, 6], [7, 8, 9], [10, 11, 12]];
// tab[0] = [1, 2, 3];
// tab[1] = [4, 5, 6];
// tab[2] = [7, 8, 9];
// tab[3] = [10, 11, 12];


let i = 0;
let j = 0;
let length = tab.length;
let length2 = tab[i].length;
//  Calcul du total de chaque ligne
for(i = 0; i < length; i++) // Nombre de lignes
{
    // Nombre de colonnes
    let lineResult = 0;
    
    for(j = 0; j < length2; j++)
    {
        lineResult += tab[i][j];
        tab[i][length2] = lineResult;
    }
}
console.table(tab);

// Calcul total de chaque colonne
for(i = 0; i < tab[0].length; i++) // Nombre de lignes
{
    let colResult = 0;
    for(j = 0; j < tab.length; j++)
    {
        
        colResult += tab[j][i];

    }
    console.log(colResult);


    // tab[length2][j] = colResult;

}
console.table(tab);

