date=`date +"%H.%M"`

#cp -r public/json $HOME/Téléchargements/Copies/JSON-$date
cp src/DataFixtures/AppFixtures.php $HOME/Téléchargements/Copies/AppFixtures-$date

echo "Copie des données de test - $date"