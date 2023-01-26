<?php

final class ControleurRecette
{
    public function defautAction()
    {
        $_A_recettesBD = Recette::donneToutesRecettes();
        $_A_recettes = array();
        foreach (range(0, sizeof($_A_recettesBD) - 1) as $_I_indexRecette) {
            $_A_recettes[$_I_indexRecette] = new Recette($_A_recettesBD[$_I_indexRecette]->nomRecette,
            $_A_recettesBD[$_I_indexRecette]->libelle,
            $_A_recettesBD[$_I_indexRecette]->categories,
             $_A_recettesBD[$_I_indexRecette]->ingredients,
              $_A_recettesBD[$_I_indexRecette]->quantites);
        }

        Vue::montrer('recette/blocDebut',array('recettes' => "Recettes"));
        foreach (range(0, sizeof($_A_recettes) - 1) as $_I_indexRecette) {
            Vue::montrer('recette/voirTitreRecette', array('titreRecette' =>  $_A_recettes[$_I_indexRecette]->donneNomRecette()));
            Vue::montrer('recette/voir', array('recette' => "ingredients:"));
            Vue::montrer('recette/voir', array('recette' =>  $_A_recettes[$_I_indexRecette]->donneIngredients()));
            Vue::montrer('recette/voir', array('recette' => "quantites:"));
            Vue::montrer('recette/voir', array('recette' =>  $_A_recettes[$_I_indexRecette]->donneQuantites()));
            Vue::montrer('recette/voir', array('recette' => "instructions:"));
            Vue::montrer('recette/voir', array('recette' =>  $_A_recettes[$_I_indexRecette]->donneInstructions()));
            Vue::montrer('recette/voir', array('recette' => "categories:"));
            Vue::montrer('recette/voir', array('recette' =>  $_A_recettes[$_I_indexRecette]->donneNomCategories()));
            Vue::montrer('recette/voir', array('recette' => "\n *******"));
        }
        Vue::montrer('recette/blocFin',array('fin' => ""));
    }

    public function afficheRecetteAction($A_parametres)
    {
        if (isset($A_parametres[0])){
            $_A_recettesBD = Recette::donneRecette($A_parametres[0]);
            if (!empty($_A_recettesBD)){
                $O_recette = new Recette($_A_recettesBD[0]['nomRecette'],
                    $_A_recettesBD[0]['libelle'],
                    $_A_recettesBD[0]['categories'],
                    $_A_recettesBD[0]['ingredients'],
                    $_A_recettesBD[0]['quantites']);

                //recuperer id uttilisateur
                $I_idUtilisateur = 1; // CHANGER
                $B_estConnecté = true; // CHANGER AVEC LE TEST
                $I_notation = Recette::avisUtilisateur($I_idUtilisateur,$A_parametres[0]); //recupere la notation de l'uttilisateur pour cette recette

                $I_moyenneNotation = Recette::moyenneAvisRecette($A_parametres[0]); // recupere la moyenne de notation pour cette recette


                Vue::montrer('recette/blocDebut',array('recettes' => "Recettes"));
                Vue::montrer('recette/voirTitreRecette', array('titreRecette' =>  $O_recette->donneNomRecette()));

                if ($B_estConnecté){
                    if ($I_notation == null){
                        Vue::montrer('recette/ajouterAvis', array('idRecette' => $A_parametres[0]));
                    }
                    else{
                        Vue::montrer('recette/montrerAvis', array('notation' => $I_notation));
                    }
                }
                if ($I_moyenneNotation == null){
                    Vue::montrer('recette/moyenneAvisNule');
                } else {
                    Vue::montrer('recette/moyenneAvis', array('moyenneNotation' => $I_moyenneNotation));
                }

                Vue::montrer('recette/voir', array('recette' => "ingredients:"));
                Vue::montrer('recette/voir', array('recette' =>  $O_recette->donneIngredients()));
                Vue::montrer('recette/voir', array('recette' => "quantites:"));
                Vue::montrer('recette/voir', array('recette' =>  $O_recette->donneQuantites()));
                Vue::montrer('recette/voir', array('recette' => "instructions:"));
                Vue::montrer('recette/voir', array('recette' =>  $O_recette->donneInstructions()));
                Vue::montrer('recette/voir', array('recette' => "categories:"));
                Vue::montrer('recette/voir', array('recette' =>  $O_recette->donneNomCategories()));
                Vue::montrer('recette/voir', array('recette' => "\n *******"));
                Vue::montrer('recette/blocFin',array('fin' => ""));
            }
        }

    }

    public function afficheRecettesAleatoiresAction()
    {
        $A_recettesBD = Recette::donneRecettesAleatoires();
        $A_recettes = array();
        foreach (range(0, sizeof($A_recettesBD) - 1) as $I_indexRecette) {
            $A_recettes[$I_indexRecette] = new Recette($A_recettesBD[$I_indexRecette]->nomRecette,
            $A_recettesBD[$I_indexRecette]->libelle,
            $A_recettesBD[$I_indexRecette]->categories,
            $A_recettesBD[$I_indexRecette]->ingredients,
            $A_recettesBD[$I_indexRecette]->quantites);
        }
        
        Vue::montrer('recette/grosBloc',array('grosBloc' => ""));

        Vue::montrer('recette/blocRecetteUn',array('recette1' => $A_recettes[0]->donneNomRecette()));
        Vue::montrer('recette/voir', array('recette' => "ingredients:"));
        Vue::montrer('recette/voir', array('recette' =>  $A_recettes[0]->donneIngredients()));
        Vue::montrer('recette/voir', array('recette' => "quantites:"));
        Vue::montrer('recette/voir', array('recette' =>  $A_recettes[0]->donneQuantites()));
        Vue::montrer('recette/voir', array('recette' => "instructions:"));
        Vue::montrer('recette/voir', array('recette' =>  $A_recettes[0]->donneInstructions()));
        Vue::montrer('recette/voir', array('recette' => "categories:"));
        Vue::montrer('recette/blocFin', array('fin' =>  $A_recettes[0]->donneNomCategories()));

        Vue::montrer('recette/blocRecetteDeux',array('recette2' => $A_recettes[1]->donneNomRecette()));
        Vue::montrer('recette/voir', array('recette' => "ingredients:"));
        Vue::montrer('recette/voir', array('recette' =>  $A_recettes[1]->donneIngredients()));
        Vue::montrer('recette/voir', array('recette' => "quantites:"));
        Vue::montrer('recette/voir', array('recette' =>  $A_recettes[1]->donneQuantites()));
        Vue::montrer('recette/voir', array('recette' => "instructions:"));
        Vue::montrer('recette/voir', array('recette' =>  $A_recettes[1]->donneInstructions()));
        Vue::montrer('recette/voir', array('recette' => "categories:"));
        Vue::montrer('recette/blocFin', array('fin' =>  $A_recettes[1]->donneNomCategories()));

        Vue::montrer('recette/blocRecetteTrois',array('recette3' => $A_recettes[2]->donneNomRecette()));
        Vue::montrer('recette/voir', array('recette' => "ingredients:"));
        Vue::montrer('recette/voir', array('recette' =>  $A_recettes[2]->donneIngredients()));
        Vue::montrer('recette/voir', array('recette' => "quantites:"));
        Vue::montrer('recette/voir', array('recette' =>  $A_recettes[2]->donneQuantites()));
        Vue::montrer('recette/voir', array('recette' => "instructions:"));
        Vue::montrer('recette/voir', array('recette' =>  $A_recettes[2]->donneInstructions()));
        Vue::montrer('recette/voir', array('recette' => "categories:"));
        Vue::montrer('recette/blocFin', array('fin' =>  $A_recettes[2]->donneNomCategories()));

        Vue::montrer('recette/grosBlocFin', array('fin' => " "));

    }

    public function afficheRecettesCategorieAction($I_numCategorie)
    {
        $_A_recetteCategorie = Recette::donneToutesRecettesCategorie($I_numCategorie);
        foreach (range(0, sizeof($_A_recetteCategorie) - 1) as $_I_index) {
            Vue::montrer('recette/voir', array('recette' => $_A_recetteCategorie[$_I_index]['nomRecette']));
            Vue::montrer('recette/voir', array('recette' => $_A_recetteCategorie[$_I_index]['nomCategorie']));
        }
    }

    public function ajouterAvisAction($A_parametres){

        //verifie si l'utilisateur est connecté et recup son id
        $I_idUtilisateur = 1;


        if(!empty($A_parametres) && sizeof($A_parametres) == 1 && !empty($_POST['notation'])){
            //On verifie s'il n'y a pas déja un avis
            $I_notation = Recette::avisUtilisateur($I_idUtilisateur,$A_parametres[0]);
            if ($I_notation == null){
                Recette::ajouterAvis($I_idUtilisateur, $A_parametres[0], $_POST['notation']);
            }
        }
        //On retourne sur la recette
        header( 'Location: /recette/afficheRecette/' . $A_parametres[0]);
    }

}