date=`date +"%H.%M"`
target="$HOME/Téléchargements/Copies/Sym-ElanSession-$date"

cp -r config $target
cp -r public $target
cp -r src $target
cp -r templates $target

echo "Copie du projet - $date"