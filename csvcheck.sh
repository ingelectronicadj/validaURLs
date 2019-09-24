#!/bin/bash
clear
echo "Ejecutando Script para validación de URL's encontradas"
sleep 1
echo -e "Esto puede tomar un tiempo \n"
mkdir -p salida

while read url
do
	urlstatus=$(curl -o /dev/null --silent -L --head --write-out '%{http_code}' "$url" )

	case $urlstatus in
		200)
		echo "$url , $urlstatus" | tee -a salidas/urlBuenos.csv
	;;
		*)
		echo "$url , $urlstatus" | tee -a salidas/urlRotos.csv
	;;
	esac

done < $1
