#!/bin/bash
clear
echo "Ejecutando Script para validación de URL's encontradas"
sleep 1
echo -e "Esto puede tomar un tiempo \n"
if [ -d ./salida ]
then
	echo -e "La carpeta salida ya existe \n"
else
	mkdir salida
fi

while read url
do
	urlstatus=$(curl -o /dev/null --silent --head --write-out '%{http_code}' "$url" )
		echo "$url $urlstatus"
		echo "$url , $urlstatus" >> salida/urlStatus.csv

	case $urlstatus in
		200)
		echo "$url , $urlstatus" >> salida/urlBuenos.csv
	;;
		*)
		echo "$url , $urlstatus" >> salida/urlRotos.csv
	;;
	esac

done < $1
