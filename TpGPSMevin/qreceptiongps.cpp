  /* Projet FLARM GROUP
 * SNIR2 - LP2I
 * Janvier 2019
 * qreceptiongps.cpp
 */

#include <QtSql/QSqlDatabase>
#include <QtSql/QSqlQuery>
#include <QtSql/QSqlRecord>
#include <QVariant>

#include "qreceptiongps.h"
//-----------------------------------------------

QReceptionGPS::QReceptionGPS(QString Port)
{
    //ETAT DU PORT SERIE
    Etat= -1;

    // NOM DU PORT SERIE OUVERT
    PortSerie.setPortName(Port);

    //19200 bits par seconde, 8 bits données, pas de parité, 1 bit de stop, pas de contrôle de flux
    PortSerie.setBaudRate(QSerialPort::Baud19200);
    PortSerie.setParity(QSerialPort::NoParity);
    PortSerie.setStopBits(QSerialPort::OneStop);
    PortSerie.setDataBits(QSerialPort::Data8);
    PortSerie.setFlowControl(QSerialPort::NoFlowControl);

    if (PortSerie.open(QIODevice::ReadOnly) == true)
    {
        Etat = 0; // Le port est ouvert

        // Connecter le signal ReadyRead() du port série au slot TraiterTrames() de l'objet QReceptionGps
        connect(&PortSerie, SIGNAL(readyRead()),this, SLOT(TraiterTrames()));

        // Connexion à la BDD
        db.setDatabaseName("donnees_vol");
        db.setConnectOptions("");
        db.setHostName("localhost");
        db.setUserName("root");
        db.setPassword("");
        db.setPort(3306);
        db.open();
    }
    else
    {
        return;
    }

}

//-----------------------------------------------
// Fermer le port série & déconnexion
QReceptionGPS::~QReceptionGPS(){
    disconnect(&PortSerie, SIGNAL(readyRead()),this, SLOT(TraiterTrames()));
    PortSerie.close();
    db.close();
}

//-----------------------------------------------
int QReceptionGPS::ObtenirEtat()
{
    return Etat;
}

//-------------------------------------------------------------------------------------------
QString QReceptionGPS::TrameGPGGA()
{
    return CompleteGPGGA;
}

QString QReceptionGPS::TexteUTC()
{
    return UTC.toString("hhmmss.zzz");
}

QString QReceptionGPS::TexteLatitude()
{
    return Latitude;
}

QString QReceptionGPS::TexteDirLatitude()
{
    return DirLatitude;
}

QString QReceptionGPS::TexteLongitude()
{
    return Longitude;
}

QString QReceptionGPS::TexteDirLongitude()
{
    return DirLongitude;
}

QString QReceptionGPS::TexteAltitudeMer()
{
    return AltitudeMer;
}

//-------------------------------------------------------------------------------------------
QString QReceptionGPS::TrameGPRMC()
{
    return CompleteGPRMC;
}

QString QReceptionGPS::TexteCap()
{
    return Cap;
}

QString QReceptionGPS::TexteVitesseSol()
{
    return VitesseSol;
}

//-------------------------------------------------------------------------------------------
QString QReceptionGPS::TramePFLAA()
{
    return CompletePFLAA;
}

QString QReceptionGPS::TexteCapAutres()
{
    return CapAutres;
}

QString QReceptionGPS::TexteNomAutres()
{
    return NomAutres;
}

QString QReceptionGPS::TexteNomImportant()
{
    return NomImportant;
}

//-------------------------------------------------------------------------------------------
QString QReceptionGPS::TramePFLAU()
{
    return CompletePFLAU;
}

QString QReceptionGPS::TexteEtatAlimentation()
{
    return EtatAlimentation;
}

QString QReceptionGPS::TexteTypeAlarme()
{
    return TypeAlarme;
}

QString QReceptionGPS::TexteNiveauAlarme()
{
    return NiveauAlarme;
}

//-----------------------------------------------
// Slot de traitement des trames envoyées par le FLARM
void QReceptionGPS::TraiterTrames()
{
    bool Maj = false;

    // Ligne Complète ?
    while (PortSerie.canReadLine() == true)
    {
        // Il y'a une ligne : on va la lire
        TrameRecue = PortSerie.readLine(); // Limité à 82 caractères

        // Vérifier que la trame commence par "$GPGGA"
        if (TrameRecue.startsWith("$GPGGA"))
        {
            CompleteGPGGA = QString::fromUtf8(TrameRecue);

            //Découpage des morceaux
            QStringList Morceaux;
            Morceaux = CompleteGPGGA.split(',');

            CompleteGPGGA.chop(5);

            //Récupération et stockage dans le QStringList
            UTC = QDateTime::fromString(Morceaux[1],"hhmmss.zzz");

            Latitude = Morceaux[2];

            DirLatitude = Morceaux[3];

            Longitude = Morceaux[4];

            DirLongitude =  Morceaux[5];

            AltitudeMer = Morceaux[9];

            Maj = true;
        }

        if (TrameRecue.startsWith("$GPRMC"))
        {
            CompleteGPRMC = QString::fromUtf8(TrameRecue);

            CompleteGPRMC.chop(5);

            //Découpage des morceaux
            QStringList Morceaux;
            Morceaux = CompleteGPRMC.split(',');

            //Récupération et stockage dans le QStringList
            Cap = Morceaux[8];

            VitesseSol = Morceaux[7];

            Maj = true;
        }

        if (TrameRecue.startsWith("$PFLAA"))
        {
            CompletePFLAA = QString::fromUtf8(TrameRecue);

            CompletePFLAA.chop(5);

            //Découpage des morceaux
            QStringList Morceaux;
            Morceaux = CompletePFLAA.split(',');

            //Récupération et stockage dans le QStringList
            NomAutres = Morceaux[6];

            CapAutres = Morceaux[7];

            Maj = true;
        }

        if (TrameRecue.startsWith("$PFLAU"))
        {
            CompletePFLAU = QString::fromUtf8(TrameRecue);

            CompletePFLAU.chop(5);

            //Découpage des morceaux
            QStringList Morceaux;
            Morceaux = CompletePFLAU.split(',');

            //Récupération et stockage dans le QStringList
            EtatAlimentation = Morceaux[4];

            NiveauAlarme = Morceaux[5];

            TypeAlarme = Morceaux[7];

            Maj = true;
        }
    }

    //Emettre le signal de nouvelle position
    if (Maj == 1)
    {
        emit NouvellesPositions();
    }

    QSqlQuery requete;
    requete.exec("INSERT INTO historisation (utc, latitude, longitude, dir_latitude, dir_longitude, altitude_mer, cap, vitesse_sol, etat_alimentation, niveau_alarme, type_alarme)"
                 "VALUES ('"+UTC.toString("HHmmss")+"','"+Latitude+"','"+Longitude+"','"+DirLatitude+"','"+DirLongitude+"','"+AltitudeMer+"','"+Cap+"','"+VitesseSol+"','"+EtatAlimentation+"','"+NiveauAlarme+"','"+TypeAlarme+"');");

}

