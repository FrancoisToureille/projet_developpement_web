<?php

// Rappel : nous sommes dans le répertoire Core, voilà pourquoi dans realpath je "remonte d'un cran" pour faire référence
// à la VRAIE racine de mon application

final class Constantes
{
    // Les constantes relatives aux chemins

    const REPERTOIRE_VUES        = '/Vues/';

    const REPERTOIRE_MODELE      = '/Modele/';

    const REPERTOIRE_NOYAU       = '/Noyau/';

    const REPERTOIRE_EXCEPTIONS  = '/Noyau/Exceptions/';

    const REPERTOIRE_CONTROLEURS = '/Controleurs/';

    const NOM_UTILISATEUR_BD = "295283";

    const MOT_DE_PASSE_BD ="eugenax18";


    public static function repertoireRacine() {
        return realpath(__DIR__ . '/../');
    }

    public static function repertoireNoyau() {
        return self::repertoireRacine() . self::REPERTOIRE_NOYAU;
    }

    public static function repertoireExceptions() {
        return self::repertoireRacine() . self::REPERTOIRE_EXCEPTIONS;
    }

    public static function repertoireVues() {
        return self::repertoireRacine() . self::REPERTOIRE_VUES;
    }

    public static function repertoireModele() {
        return self::repertoireRacine() . self::REPERTOIRE_MODELE;
    }

    public static function repertoireControleurs() {
        return self::repertoireRacine() . self::REPERTOIRE_CONTROLEURS;
    }

    public static function nomUtilisateurBD(){
        return self::NOM_UTILISATEUR_BD;
    }

    public static function motDePAsseBD(){
        return self::MOT_DE_PASSE_BD;
    }
}