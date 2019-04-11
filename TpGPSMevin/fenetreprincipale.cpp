/* Projet FLARM GROUP
 * SNIR2 - LP2I
 * Janvier 2019
 * fenetreprincipale.cpp
 */

#include "fenetreprincipale.h"
#include "ui_fenetreprincipale.h"
#include <QtSql/QSqlDatabase>

FenetrePrincipale::FenetrePrincipale(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::FenetrePrincipale)
{
    ui->setupUi(this);

    // Créer l'objet QReceptionGps
    ReceptionGPS = new QReceptionGPS("COM4");

    //Connecter le signal NouvellePosition() de mon objet QReceptionGPS au slot AfficherPositions() de l'objet FenetrePrincipale
    connect(ReceptionGPS, SIGNAL(NouvellesPositions()),this,SLOT(AfficherPositions()));
}

FenetrePrincipale::~FenetrePrincipale()
{
    delete ReceptionGPS;
    delete ui;
}

void FenetrePrincipale::AfficherPositions()
{
    // Affichage dans les labels de IHM
    // Trame GPGGA
    ui->label_GPGGA->setText(ReceptionGPS->TrameGPGGA());
    ui->label_UTC->setText(ReceptionGPS->TexteUTC());
    ui->label_Latitude->setText(ReceptionGPS->TexteLatitude());
    ui->label_DirLatitude->setText(ReceptionGPS->TexteDirLatitude());
    ui->label_Longitude->setText(ReceptionGPS->TexteLongitude());
    ui->label_DirLongitude->setText(ReceptionGPS->TexteDirLongitude());
    ui->label_AltitudeMer->setText(ReceptionGPS->TexteAltitudeMer());

    // Trame GPRMC
    ui->label_GPRMC->setText(ReceptionGPS->TrameGPRMC());
    ui->label_Cap->setText(ReceptionGPS->TexteCap());
    ui->label_VitesseSol->setText(ReceptionGPS->TexteVitesseSol());

    // Trame PFLAA
    ui->label_PFLAA->setText(ReceptionGPS->TramePFLAA());
    ui->label_CapAutres->setText(ReceptionGPS->TexteCapAutres());

    // Trame PFLAU
    ui->label_PFLAU->setText(ReceptionGPS->TramePFLAU());
}
