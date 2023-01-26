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
        session_start(); //demarre la session

        if (isset($A_parametres[0])){
            $_A_recettesBD = Recette::donneRecette($A_parametres[0]);
            if (!empty($_A_recettesBD)){
                $O_recette = new Recette($_A_recettesBD[0]['nomRecette'],
                    $_A_recettesBD[0]['libelle'],
                    $_A_recettesBD[0]['categories'],
                    $_A_recettesBD[0]['ingredients'],
                    $_A_recettesBD[0]['quantites'],
                    $_A_recettesBD[0]['image']);

                $B_estConnecté =!empty($_SESSION['idPersonneConnectee']); // on verifie si l'uttilisateur est connecté
                $I_notation = Recette::avisUtilisateur($_SESSION['idPersonneConnectee'],$A_parametres[0]); //recupere la notation de l'uttilisateur pour cette recette

                $I_moyenneNotation = Recette::moyenneAvisRecette($A_parametres[0]); // recupere la moyenne de notation pour cette recette

                Vue::montrer('recette/grosBlocDebut');

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

                //On affiche l'image lié à la recette
                Vue::montrer('recette/image', array('lien' => $O_recette->donneImage()));

                Vue::montrer('recette/grosBlocFin', array('fin' => " "));
            }
        }

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
        session_start(); //demarre la session

        if(!empty($_SESSION['idPersonneConnectee']) && !empty($A_parametres) && sizeof($A_parametres) == 1 && !empty($_POST['notation'])){
            //On verifie s'il n'y a pas déja un avis
            $I_notation = Recette::avisUtilisateur($_SESSION['idPersonneConnectee'],$A_parametres[0]);
            if ($I_notation == null){
                Recette::ajouterAvis($_SESSION['idPersonneConnectee'], $A_parametres[0], $_POST['notation']);
            }
        }
        //On retourne sur la recette
        header( 'Location: /recette/afficheRecette/' . $A_parametres[0]);
    }

}