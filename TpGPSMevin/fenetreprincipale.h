/* Projet FLARM GROUP
 * SNIR2 - LP2I
 * Janvier 2019
 * fenetreprincipale.h
 */
#ifndef FENETREPRINCIPALE_H
#define FENETREPRINCIPALE_H

#include <QMainWindow>

//Inclure la bibliothèque de la classe QReceptionGPS
#include "qreceptiongps.h"

namespace Ui {
class FenetrePrincipale;
}

class FenetrePrincipale : public QMainWindow
{
    Q_OBJECT

public:
    explicit FenetrePrincipale(QWidget *parent = 0);
    ~FenetrePrincipale();

private slots:
    //DECLARATION DE LA METHODE D'AFFICHAGE
    void AfficherPositions();

private:
    Ui::FenetrePrincipale *ui;

    //DECLARATION DU POINTEUR RECEPTION GPS
    QReceptionGPS *ReceptionGPS;

    double NouvelleDistanceSeparation;
    double DistanceSeparation; //En mètre, distance directe entre le FLARM et l'appareil le plus proche
    double SeparationVerticale;
    double SeparationHorizontale;
};

#endif // FENETREPRINCIPALE_H
