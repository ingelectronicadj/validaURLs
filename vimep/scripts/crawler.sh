#!/bin/bash
DIR='./salidas'
OUT="$DIR/url-list.php"

mkdir -p $DIR
REGEX='(http|https)://[a-zA-Z0-9./?=_-:%]*'

for file in "$@"
do
	#echo $file
	if [[ ! (-d "$file") ]]; then
		echo "<p><strong>### $file</strong></p>" | tee -a $OUT
		if [[ "$file" =~ \.pdf$ ]]; then
				#echo "pdf"
				pdfx -v "$file" | grep -A 100000 'URL References:' | tail -n+2 | cut -d' ' -f2 | tee -a $OUT
		else
				#echo "other"
				grep -oE  $REGEX "$file" | uniq | tee -a $OUT
		fi
	fi
done


