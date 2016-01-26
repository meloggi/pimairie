#!/bin/sh
##permet d'exporter le projet vers mon serveur
##/!\ écrase les données du serveur
cp -R Site/* -t /srv/http/PI ;
exit 0 ;
