#!/bin/bash 
mysql -h localhost -u root -proot -D projet2a -e "DELETE FROM miniatures;"
for fichier in $ls *.svs
do	
	#Conversion des images svs en Deep Zoom Image
	if test -s ../PhotoDzi/$fichier.dzi
	then echo "Photo déjà convertie"
	else echo "Conversion en cours, veuillez patienter ..." 
		vips dzsave $fichier ../PhotoDzi/$fichier
	fi
	#création d'une variable chemin contenant le chemin de la miniature
	chemin=$fichier"_files/7/0_0.jpeg"
	titre=$fichier
	echo $fichier >tmp
	f=$(cut -d '-' -f 1-3 tmp)
	xml="https://tcga-data.nci.nih.gov/tcgafiles/ftp_auth/distro_ftpusers/anonymous/tumor/brca/bcr/nationwidechildrens.org/bio/clin/nationwidechildrens.org_BRCA.bio.Level_1.103.62.0/nationwidechildrens.org_clinical.$f.xml"
	
	curl $xml>patient.xml

	grep "<shared:bcr_patient_barcode .*>.*</.*>" <patient.xml>tmpBarcode.xml
	sed "s/<shared:bcr_patient_barcode .*\">//" <tmpBarcode.xml>tmpBarcode2.xml
	sed "s/<\/shared:bcr_patient_barcode>//" <tmpBarcode2.xml>barcode
	rm tmpBarcode2.xml | rm tmpBarcode.xml
	barcode=$(<barcode)
	rm barcode
	echo $barcode



	grep "<shared:gender .*>.*</.*>" <patient.xml>tmpGender.xml
	sed "s/<shared:gender .*\">//" <tmpGender.xml>tmpGender2.xml
	sed "s/<\/shared:gender>//" <tmpGender2.xml>gender
	rm tmpGender2.xml | rm tmpGender.xml
	gender=$(<gender)
	rm gender
	echo $gender

	grep "<shared:vital_status .*>.*</.*>" <patient.xml>tmpStatus.xml
	sed "s/<shared:vital_status .*\">//" <tmpStatus.xml>tmpStatus2.xml
	sed "s/<\/shared:vital_status>//" <tmpStatus2.xml>status.txt
	sed '2d'<status.txt>status
	sed "s/^\ \ *//" <status>status2
	#rm tmpStatus2.xml | rm tmpStatus.xml | rm status.txt
	status=$(<status2)
	#rm status
	echo $status

	grep "<shared:race .*>.*</.*>" <patient.xml>tmpRace.xml
	sed "s/<shared:race .*\">//" <tmpRace.xml>tmpRace2.xml
	sed "s/<\/shared:race>//" <tmpRace2.xml>race
	rm tmpRace2.xml | rm tmpRace.xml
	race=$(<race)
	rm race
	echo $race

	grep "<cqcf:country .*>.*</.*>" <patient.xml>tmpCountry.xml
	sed "s/<cqcf:country .*\">//" <tmpCountry.xml>tmpCountry2.xml
	sed "s/<\/cqcf:country>//" <tmpCountry2.xml>country
	rm tmpCountry2.xml | rm tmpCountry.xml
	country=$(<country)
	rm country
	echo $country

	grep "<shared:tumor_tissue_site .*>.*</.*>" <patient.xml>tmpTumor.xml
	sed "s/<shared:tumor_tissue_site .*\">//" <tmpTumor.xml>tmpTumor2.xml
	sed "s/<\/shared:tumor_tissue_site>//" <tmpTumor2.xml>tumor
	rm tmpTumor2.xml | rm tmpTumor.xml
	tumor=$(<tumor)
	rm tumor
	echo $tumor

	grep "<shared:days_to_birth .*>.*</.*>" <patient.xml>tmpBirth.xml
	sed "s/<shared:days_to_birth .*\">//" <tmpBirth.xml>tmpBirth2.xml
	sed "s/<\/shared:days_to_birth>//" <tmpBirth2.xml>birth
	rm tmpBirth2.xml | rm tmpBirth.xml
	daysToBirth=$(<birth)
	rm birth
	echo $daysToBirth

	grep "<shared:days_to_death .*>.*</.*>" <patient.xml>tmpDeath.xml
	sed "s/<shared:days_to_death .*\">//" <tmpDeath.xml>tmpDeath2.xml
	sed "s/<\/shared:days_to_death>//" <tmpDeath2.xml>death.txt
	sed -n '1p'<death.txt>death
	rm tmpDeath2.xml | rm tmpDeath.xml
	daysToDeath=$(<death)
	rm death
	echo $daysToDeath

	mysql -h localhost -u root -proot -D projet2a -e "INSERT INTO miniatures VALUES ('$titre', 'PhotoDzi/$chemin', '$xml', '$barcode', '$gender', '$status', '$race', '$country', '$tumor', '$daysToBirth', '$daysToDeath');"
done

rm tmp