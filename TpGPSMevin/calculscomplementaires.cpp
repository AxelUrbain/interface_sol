#include "calculscomplementaires.h"

CalculsComplementaires::CalculsComplementaires(QObject *parent) : QObject(parent)
{

    /*
    // Si vitesse dépasse 30 km/h et que la distance entre les deux flarms est plus petite que la précédente
    // alors je met à jour le nom du FLARM le plus proche (NomImportant)
    NouvelleDistanceSeparation = sqrt( (SeparationHorizontale*SeparationHorizontale) + (SeparationVerticale*SeparationVerticale) );

    if ( (Vitesse > "16.2") && (NouvelleDistanceSeparation < DistanceSeparation) )
    {
        DistanceSeparation = NouvelleDistanceSeparation;
        NomImportant = Morceaux[6];
    }

            QString SepVertBrute;
            QString SepHoriBrute;

            SepVertBrute = Morceaux[8];
            SepHoriBrute = Morceaux[9];

            SeparationVerticale = SepVertBrute.toDouble();
            SeparationHorizontale = SepHoriBrute.toDouble();*/
}
