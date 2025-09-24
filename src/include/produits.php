  <!-- Produits -->
  <section>
    <h2 class="text-xl font-semibold mb-8 text-anthracite">Produits mis en avant</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
    
    <?php
    include_once "Algos.php";

    $chemin = "../fichiers_information/annonces.csv";
    if(file_exists($chemin) && fopen($chemin, "r") !== false)
        $fich = fopen($chemin, "r");

    $titre = $description = $prix = $negociable = $image = $vendeur = "";

    $delimiteur = "|";
    $maxLongueur = 1000;

    while(!feof($fich)){
        $ligne = fgetcsv($fich, $maxLongueur, $delimiteur, "\"", "\\");
        if($ligne !== false && count($ligne) === 6){
            $titre = $ligne[0];
            $description = $ligne[1];
            $prix = $ligne[2];
            $negociable = $ligne[3];
            $image = $ligne[4];
            $vendeur = $ligne[5];
        }

        creerPoste($titre, $description, $prix, $negociable, $image, $vendeur);
    }


    ?>

    </div>
  </section>