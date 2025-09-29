<!-- Produits -->
<section>
    <h2 class="text-xl font-semibold mb-8 text-anthracite">Produits mis en avant</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

        <?php
        include_once "Algos.php";


        // TEST POUR TROUVER OU EST L'ERREUR SINON ENVOYER MESSAGE AU PROF.
        // //TRouver le bon chemin:
        // if(file_exists("fichiers_information/annonces.csv"))
        //     echo "Le premier chemin est bon.";

        // if(file_exists("../fichiers_information/annonces.csv"))
        //     echo "Le deuxieme chemin est bon.";

        // if(file_exists("../../fichiers_information/annonces.csv"))
        //     echo "Le troisieme chemin est bon.";


        // $chemin = "fichiers_information/annonces.csv";
        $fichier = "https://prog101.com/cours/kb9/bd/annonces.csv";
        if ($fichier === false) {
            echo "Erreur lors de la lecture du fichier.";
            exit;
        } else {
            $rangées = [];
            $donnéesFichier = fopen($fichier, "r");
            while (($ligne = fgetcsv($donnéesFichier, $maxLongueur, $delimiteur, "\"", "\\")) !== false) {
                $rangées[] = $ligne;
                if (count($rangées) === 6) {
                    $titre = $rangées[0];
                    $description = $rangées[1];
                    $prix = $rangées[2];
                    $negociable = $rangées[3];
                    $image = $rangées[4];
                    $vendeur = $rangées[5];
                    
                    creerPoste($titre, $description, $prix, $negociable, $image, $vendeur);
                    $rangées = [];
                }
            }
            $titre = $description = $prix = $negociable = $image = $vendeur = "";

            $delimiteur = "|";
            $maxLongueur = 1000;
        }
        ?>

    </div>
</section>