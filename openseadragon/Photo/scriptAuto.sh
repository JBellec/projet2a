#!/bin/bash 
mysql -h localhost -u root -proot -D projet2a -e "DELETE FROM miniatures;"
for fichier in $ls *.svs
do	
	#Conversion des images svs en Deep Zoom Image
	if test -s ../PhotoDzi/$fichier.dzi
	then echo "Photo $fichier déjà convertie"
	else echo "Conversion de $fichier en cours..." 
		vips dzsave $fichier ../PhotoDzi/$fichier
	fi
	#création d'une variable chemin contenant le chemin de la miniature
	chemin=$fichier"_files/7/0_0.jpeg"
	titre=$fichier
	echo $fichier >tmp
	xml=$(cut -d '-' -f 1-3 tmp)
	echo $xml
	#connection base de donnée + insertion
	mysql -h localhost -u root -proot -D projet2a -e "INSERT INTO miniatures VALUES ('','$titre', 'PhotoDzi/$chemin','https://tcga-data.nci.nih.gov/tcgafiles/ftp_auth/distro_ftpusers/anonymous/tumor/brca/bcr/nationwidechildrens.org/bio/clin/nationwidechildrens.org_BRCA.bio.Level_1.103.62.0/nationwidechildrens.org_clinical.$xml.xml');"
	
done

rm tmp