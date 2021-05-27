date=`date +"%H.%M"`
copies="$HOME/Téléchargements/Copies"
target="$copies/Sym-ElanSession-$date"

#cp -r config $target
#cp -r public/json $target
cp public/json/stagiaires.json $copies/stagiaires-$date.json
#cp -r src $target
#cp -r templates $target

echo "Copie du projet - $date"