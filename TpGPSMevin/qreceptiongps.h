/* Projet FLARM GROUP
 * SNIR2 - LP2I
 * Janvier 2019
 * qreceptiongps.h
 */

#ifndef QRECEPTIONGPS_H
#define QRECEPTIONGPS_H

//BIBLIOTHEQUE AJOUTER
#include <QString>
#include <QByteArray>
#include <QDateTime>
#include <QtSerialPort/QSerialPort>
#include <QtSql/QSqlDatabase>

class QReceptionGPS : public QObject
{
    Q_OBJECT
public:
    //DECLARATION DU CONSTRUCTEUR DESTRUCTEUR
    QReceptionGPS(QString Port);
    ~QReceptionGPS();

    //DECLARATION DES ACCESSEURS
    int ObtenirEtat();

    //Méthodes GPGGA
    QString TexteUTC();
    QString TexteLatitude();
    QString TexteDirLatitude();
    QString TexteLongitude();
    QString TexteDirLongitude();
    QString TexteAltitudeMer();

    //Méthodes GPRMC
    QString TexteCap();
    QString TexteVitesseSol();

    //Méthodes PFLAA
    QString TexteNomAutres();
    QString TexteCapAutres();
    QString TexteNomImportant();

    //Méthodes PFLAU
    QString TexteEtatAlimentation();
    QString TexteNiveauAlarme();
    QString TexteTypeAlarme();

    //Trames
    QString TrameGPGGA();
    QString TrameGPRMC();
    QString TramePFLAA();
    QString TramePFLAU();

signals:
    void NouvellesPositions();

private slots:
    void TraiterTrames();

private:
    QSqlDatabase db = QSqlDatabase::addDatabase("QMYSQL");

    //DECLARATION DE TOUT LES ATTRIBUTS
    QByteArray TrameRecue;

    // Trames reconnues
    QString CompleteGPGGA;
    QString CompleteGPRMC;
    QString CompletePFLAA;
    QString CompletePFLAU;

    int Etat;

    // Variables GPGGA
    QDateTime UTC;
    QString Latitude;
    QString DirLatitude;
    QString Longitude;
    QString DirLongitude;
    QString AltitudeMer;

    // Variables GPRMC
    QString Cap;
    QString VitesseSol;

    // Variables PFLAA
    QString NomAutres;
    QString CapAutres;
    QString NomImportant;

    // Variables PFLAU
    QString EtatAlimentation;
    QString NiveauAlarme;
    QString TypeAlarme;

    // Autres
    QSerialPort PortSerie;
};

#endif // QRECEPTIONGPS_H
