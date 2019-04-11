#ifndef CALCULSCOMPLEMENTAIRES_H
#define CALCULSCOMPLEMENTAIRES_H

#include <QObject>

class CalculsComplementaires : public QObject
{
    Q_OBJECT
public:
    explicit CalculsComplementaires(QObject *parent = nullptr);

private:
    //Variable à retourner
    QString NomImportant;

    //Calculs


signals:

public slots:
};

#endif // CALCULSCOMPLEMENTAIRES_H
