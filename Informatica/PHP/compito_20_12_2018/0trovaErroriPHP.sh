#!/bin/sh
NOMEFILEERRORI='0erroriCompilazionePHP.txt'
rm -f $NOMEFILEERRORI
echo "ERRORI DI COMPILAZIONE\n" >> $NOMEFILEERRORI
chmod 755 *.php
for nomeSorgente in `ls *.php`; do
   echo "- - -$nomeSorgente" >> $NOMEFILEERRORI
	php -l $nomeSorgente 2>> $NOMEFILEERRORI
   echo "\n" >> $NOMEFILEERRORI
done
echo "###PAGINA###\n" >> $NOMEFILEERRORI

