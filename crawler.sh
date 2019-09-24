#!/bin/bash
DIR='./salidas'
mkdir -p $DIR
REGEX='(http|https)://[a-zA-Z0-9./?=_-:]*'
grep -Eo $REGEX $1 | uniq | tee -a "$DIR/urls-list.txt"

