#!/bin/bash
mkdir -p salidas
DIR_OK='./salidas/urlBuenos.php'
DIR_ERR='./salidas/urlRotos.php'

while read url
do
	urlstatus=$(curl -o /dev/null --silent -L --head --write-out '%{http_code}' "$url" )
    
	case $urlstatus in
		200)
		echo "<p>$url , <strong>$urlstatus</strong></p>" >> $DIR_OK
	;;
		*)
		echo "<p>$url , <strong>$urlstatus</strong></p>" >> $DIR_ERR
	;;
	esac

done < $1
