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
	rm tmpStatus2.xml | rm tmpStatus.xml | rm status.txt
	status=$(<status2)
	rm status | rm status2
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
	rm tmpDeath2.xml | rm tmpDeath.xml | rm death.txt
	daysToDeath=$(<death)
	rm death
	echo $daysToDeath

	grep "<shared:person_neoplasm_cancer_status .*>.*</.*>" <patient.xml>tmpTumorStatus.xml
	sed "s/<shared:person_neoplasm_cancer_status .*\">//" <tmpTumorStatus.xml>tmpTumorStatus2.xml
	sed "s/<\/shared:person_neoplasm_cancer_status>//" <tmpTumorStatus2.xml>TumorStatus.txt
	sed -n '1p'<TumorStatus.txt>TumorStatus
	rm tmpTumorStatus2.xml | rm tmpTumorStatus.xml | rm TumorStatus.txt
	TumorStatus=$(<TumorStatus)
	rm TumorStatus
	echo $TumorStatus

	grep "<shared:days_to_last_followup .*>.*</.*>" <patient.xml>tmpContact.xml
	sed "s/<shared:days_to_last_followup .*\">//" <tmpContact.xml>tmpContact2.xml
	sed "s/<\/shared:days_to_last_followup>//" <tmpContact2.xml>Contact.txt
	sed -n '1p'<Contact.txt>Contact
	rm tmpContact2.xml | rm tmpContact.xml | rm Contact.txt
	Contact=$(<Contact)
	rm Contact
	echo $Contact

	grep "<shared:age_at_initial_pathologic_diagnosis .*>.*</.*>" <patient.xml>tmpAge.xml
	sed "s/<shared:age_at_initial_pathologic_diagnosis .*\">//" <tmpAge.xml>tmpAge2.xml
	sed "s/<\/shared:age_at_initial_pathologic_diagnosis>//" <tmpAge2.xml>Age.txt
	sed -n '1p'<Age.txt>Age
	rm tmpAge2.xml | rm tmpAge.xml | rm Age.txt
	Age=$(<Age)
	rm Age
	echo $Age

	grep "<brca_shared:breast_carcinoma_estrogen_receptor_status .*>.*</.*>" <patient.xml>tmpErStatusIhc.xml
	sed "s/<brca_shared:breast_carcinoma_estrogen_receptor_status.*\">//" <tmpErStatusIhc.xml>tmpErStatusIhc2.xml
	sed "s/<\/brca_shared:breast_carcinoma_estrogen_receptor_status>//" <tmpErStatusIhc2.xml>ErStatusIhc.txt
	sed -n '1p'<ErStatusIhc.txt>ErStatusIhc
	rm tmpErStatusIhc2.xml | rm tmpErStatusIhc.xml | rm ErStatusIhc.txt
	ErStatusIhc=$(<ErStatusIhc)
	rm ErStatusIhc
	echo $ErStatusIhc

	grep "<brca_shared:breast_carcinoma_progesterone_receptor_status .*>.*</.*>" <patient.xml>tmpPrStatusIhc.xml
	sed "s/<brca_shared:breast_carcinoma_progesterone_receptor_status .*\">//" <tmpPrStatusIhc.xml>tmpPrStatusIhc2.xml
	sed "s/<\/brca_shared:breast_carcinoma_progesterone_receptor_status>//" <tmpPrStatusIhc2.xml>PrStatusIhc.txt
	sed -n '1p'<PrStatusIhc.txt>PrStatusIhc
	#rm tmpPrStatusIhc2.xml | rm tmpPrStatusIhc.xml | rm PrStatusIhc.txt
	PrStatusIhc=$(<PrStatusIhc)
	#rm PrStatusIhc
	echo $PrStatusIhc

	grep "<brca_shared:lab_proc_her2_neu_immunohistochemistry_receptor_status .*>.*</.*>" <patient.xml>tmpHer2StatusIhc.xml
	sed "s/<brca_shared:lab_proc_her2_neu_immunohistochemistry_receptor_status .*\">//" <tmpHer2StatusIhc.xml>tmpHer2StatusIhc2.xml
	sed "s/<\/brca_shared:lab_proc_her2_neu_immunohistochemistry_receptor_status>//" <tmpHer2StatusIhc2.xml>Her2StatusIhc.txt
	sed -n '1p'<Her2StatusIhc.txt>Her2StatusIhc
	rm tmpHer2StatusIhc2.xml | rm tmpHer2StatusIhc.xml | rm Her2StatusIhc.txt
	Her2StatusIhc=$(<Her2StatusIhc)
	rm Her2StatusIhc
	echo $Her2StatusIhc

	grep "<shared:histological_type .*>.*</.*>" <patient.xml>tmpHistologicalType.xml
	sed "s/<shared:histological_type .*\">//" <tmpHistologicalType.xml>tmpHistologicalType2.xml
	sed "s/<\/shared:histological_type>//" <tmpHistologicalType2.xml>HistologicalType.txt
	sed -n '1p'<HistologicalType.txt>HistologicalType
	rm tmpHistologicalType2.xml | rm tmpHistologicalType.xml | rm HistologicalType.txt
	HistologicalType=$(<HistologicalType)
	rm HistologicalType
	echo $HistologicalType



	mysql -h localhost -u root -proot -D projet2a -e "INSERT INTO miniatures VALUES ('$titre', 'PhotoDzi/$chemin', '$xml', '$barcode', '$gender', '$status', '$race', '$country', '$tumor', '$daysToBirth', '$daysToDeath','$TumorStatus', '$Contact', '$Age', '$ErStatusIhc', '$PrStatusIhc', '$Her2StatusIhc', '$HistologicalType');"
done

rm tmp