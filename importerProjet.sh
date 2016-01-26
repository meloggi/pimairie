#!/bin/sh
##permet d'importer le projet depuis mon serveur vers ma copie local 
(pour commit)
cp -R /srv/http/PI/src -t Site ;
cp -R /srv/http/PI/web -t Site ;
cp /srv/http/PI/composer.json -t Site ;
cp -R /srv/http/PI/app -t Site ;
cp -R /srv/http/PI/tests -t Site ;
cp /srv/http/PI/README.md -t Site ;
exit 0;
