#!/bin/bash
mkdir salidas
while read file
do
	urlDetect=$(cat $file | grep -Eo "(http|https)://[a-zA-Z0-9./?=_-:]*" | uniq )
		echo "$urlDetect"
		echo "$urlDetect" >> salidas/urls-list.txt
done < $1

