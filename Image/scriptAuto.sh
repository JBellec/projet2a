#!/bin/bash 
echo "===== Script d'automatisation ====="
echo "Veuillez saisir le nom d'utilisteur de votre base de données : "
read user
echo "Veuillez saisir le mot de passe de votre base de données : "
read -s password

mysql -h localhost -u $user -p$password -D projet2a -e "DELETE FROM miniatures;"
lienPdfTmp="https://tcga-data.nci.nih.gov/tcgafiles/ftp_auth/distro_ftpusers/anonymous/tumor/brca/bcr/nationwidechildrens.org/pathology_reports/reports/nationwidechildrens.org_BRCA.pathology_reports.Level_1.103.3.0/"
curl $lienPdfTmp>lienPdfTmp.xml

for fichier in $ls *.svs
do	
	#Conversion des images svs en Deep Zoom Image
	if test -s ../ImageDzi/$fichier.dzi
	then echo "Photo déjà convertie"
	else echo "Conversion en cours, veuillez patienter ..." 
		vips dzsave $fichier ../ImageDzi/$fichier
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
	sed "s/^\ \ *//" <barcode>barcode2
	tr -d '\r\n' < barcode2 > barcode3
	rm tmpBarcode2.xml | rm tmpBarcode.xml
	barcode=$(<barcode3)
	rm barcode |rm barcode2 | rm barcode3
	echo $barcode

	grep "$barcode" <lienPdfTmp.xml>pdf.xml
	sed "s/<a .*\">//" <pdf.xml>pdf2.xml
	sed "s/<\/a>.*//" <pdf2.xml>pdf3.xml
	grep "$barcode" <pdf3.xml>pdf4.xml
	sed "s/^\ \ *//" <pdf4.xml>pdf5.xml
	tr -d '\r\n' < pdf5.xml > pdf6.xml
	pdf=$(<pdf6.xml)
	rm pdf.xml | rm pdf2.xml| rm pdf3.xml| rm pdf4.xml| rm pdf5.xml| rm pdf6.xml
	lienPdf="https://tcga-data.nci.nih.gov/tcgafiles/ftp_auth/distro_ftpusers/anonymous/tumor/brca/bcr/nationwidechildrens.org/pathology_reports/reports/nationwidechildrens.org_BRCA.pathology_reports.Level_1.103.3.0/$pdf"
	echo $pdf


	grep "<shared:gender .*>.*</.*>" <patient.xml>tmpGender.xml
	sed "s/<shared:gender .*\">//" <tmpGender.xml>tmpGender2.xml
	sed "s/<\/shared:gender>//" <tmpGender2.xml>gender
	sed "s/^\ \ *//" <gender>gender2
	tr -d '\r\n' < gender2 > gender3
	rm tmpGender2.xml | rm tmpGender.xml
	gender=$(<gender3)
	rm gender | rm gender2 | rm gender3
	echo $gender

	grep "<shared:vital_status .*>.*</.*>" <patient.xml>tmpStatus.xml
	sed "s/<shared:vital_status .*\">//" <tmpStatus.xml>tmpStatus2.xml
	sed "s/<\/shared:vital_status>//" <tmpStatus2.xml>status.txt
	sed '2d'<status.txt>status
	sed "s/^\ \ *//" <status>status2
	tr -d '\r\n' < status2 > status3
	rm tmpStatus2.xml | rm tmpStatus.xml | rm status.txt
	status=$(<status3)
	rm status | rm status2 | rm status3
	echo $status

	grep "<shared:race .*>.*</.*>" <patient.xml>tmpRace.xml
	sed "s/<shared:race .*\">//" <tmpRace.xml>tmpRace2.xml
	sed "s/<\/shared:race>//" <tmpRace2.xml>race
	sed "s/^\ \ *//" <race>race2
	tr -d '\r\n' < race2 > race3
	rm tmpRace2.xml | rm tmpRace.xml
	race=$(<race3)
	rm race |rm race2 |rm race3
	echo $race

	grep "<cqcf:country .*>.*</.*>" <patient.xml>tmpCountry.xml
	sed "s/<cqcf:country .*\">//" <tmpCountry.xml>tmpCountry2.xml
	sed "s/<\/cqcf:country>//" <tmpCountry2.xml>country
	sed "s/^\ \ *//" <country>country2
	tr -d '\r\n' < country2 > country3
	rm tmpCountry2.xml | rm tmpCountry.xml
	country=$(<country3)
	rm country |rm country2 | rm country3
	echo $country

	grep "<shared:tumor_tissue_site .*>.*</.*>" <patient.xml>tmpTumor.xml
	sed "s/<shared:tumor_tissue_site .*\">//" <tmpTumor.xml>tmpTumor2.xml
	sed "s/<\/shared:tumor_tissue_site>//" <tmpTumor2.xml>tumor
	sed "s/^\ \ *//" <tumor>tumor2
	tr -d '\r\n' <tumor2 > tumor3
	rm tmpTumor2.xml | rm tmpTumor.xml
	tumor=$(<tumor3)
	rm tumor | rm tumor2 | rm tumor3
	echo $tumor

	grep "<shared:days_to_birth .*>.*</.*>" <patient.xml>tmpBirth.xml
	sed "s/<shared:days_to_birth .*\">//" <tmpBirth.xml>tmpBirth2.xml
	sed "s/<\/shared:days_to_birth>//" <tmpBirth2.xml>birth
	sed "s/^\ \ *//" <birth>birth2
	tr -d '\r\n' < birth2 > birth3
	rm tmpBirth2.xml | rm tmpBirth.xml
	daysToBirth=$(<birth3)
	rm birth | rm birth2 | rm birth3
	echo $daysToBirth

	grep "<shared:days_to_death .*>.*</.*>" <patient.xml>tmpDeath.xml
	sed "s/<shared:days_to_death .*\">//" <tmpDeath.xml>tmpDeath2.xml
	sed "s/<\/shared:days_to_death>//" <tmpDeath2.xml>death.txt
	sed -n '1p'<death.txt>death
	sed "s/^\ \ *//" <death>death2
	tr -d '\r\n' < death2 > death3
	rm tmpDeath2.xml | rm tmpDeath.xml | rm death.txt
	daysToDeath=$(<death3)
	rm death | rm death2 | rm death3
	echo $daysToDeath

	grep "<shared:person_neoplasm_cancer_status .*>.*</.*>" <patient.xml>tmpTumorStatus.xml
	sed "s/<shared:person_neoplasm_cancer_status .*\">//" <tmpTumorStatus.xml>tmpTumorStatus2.xml
	sed "s/<\/shared:person_neoplasm_cancer_status>//" <tmpTumorStatus2.xml>TumorStatus.txt
	sed -n '1p'<TumorStatus.txt>TumorStatus
	sed "s/^\ \ *//" <TumorStatus>TumorStatus2
	tr -d '\r\n' < TumorStatus2 > TumorStatus3
	rm tmpTumorStatus2.xml | rm tmpTumorStatus.xml | rm TumorStatus.txt
	TumorStatus=$(<TumorStatus3)
	rm TumorStatus | rm TumorStatus2 | rm TumorStatus3
	echo $TumorStatus

	grep "<shared:days_to_last_followup .*>.*</.*>" <patient.xml>tmpContact.xml
	sed "s/<shared:days_to_last_followup .*\">//" <tmpContact.xml>tmpContact2.xml
	sed "s/<\/shared:days_to_last_followup>//" <tmpContact2.xml>Contact.txt
	sed -n '2p'<Contact.txt>Contact
	sed "s/^\ \ *//" <Contact>Contact2
	tr -d '\r\n' < Contact2 > Contact3
	rm tmpContact2.xml | rm tmpContact.xml | rm Contact.txt
	Contact=$(<Contact3)
	rm Contact | rm Contact2 | rm Contact3
	echo $Contact

	grep "<shared:age_at_initial_pathologic_diagnosis .*>.*</.*>" <patient.xml>tmpAge.xml
	sed "s/<shared:age_at_initial_pathologic_diagnosis .*\">//" <tmpAge.xml>tmpAge2.xml
	sed "s/<\/shared:age_at_initial_pathologic_diagnosis>//" <tmpAge2.xml>Age.txt
	sed -n '1p'<Age.txt>Age
	sed "s/^\ \ *//" <Age>Age2
	tr -d '\r\n' < Age2 > Age3
	rm tmpAge2.xml | rm tmpAge.xml | rm Age.txt
	Age=$(<Age3)
	rm Age | rm Age2 | rm Age3
	echo $Age

	grep "<brca_shared:breast_carcinoma_estrogen_receptor_status .*>.*</.*>" <patient.xml>tmpErStatusIhc.xml
	sed "s/<brca_shared:breast_carcinoma_estrogen_receptor_status.*\">//" <tmpErStatusIhc.xml>tmpErStatusIhc2.xml
	sed "s/<\/brca_shared:breast_carcinoma_estrogen_receptor_status>//" <tmpErStatusIhc2.xml>ErStatusIhc.txt
	sed -n '1p'<ErStatusIhc.txt>ErStatusIhc
	sed "s/^\ \ *//" <ErStatusIhc>ErStatusIhc2
	tr -d '\r\n' < ErStatusIhc2 > ErStatusIhc3
	rm tmpErStatusIhc2.xml | rm tmpErStatusIhc.xml | rm ErStatusIhc.txt
	ErStatusIhc=$(<ErStatusIhc3)
	rm ErStatusIhc | rm ErStatusIhc2 | rm ErStatusIhc3
	echo $ErStatusIhc

	grep "<brca_shared:breast_carcinoma_progesterone_receptor_status .*>.*</.*>" <patient.xml>tmpPrStatusIhc.xml
	sed "s/<brca_shared:breast_carcinoma_progesterone_receptor_status .*\">//" <tmpPrStatusIhc.xml>tmpPrStatusIhc2.xml
	sed "s/<\/brca_shared:breast_carcinoma_progesterone_receptor_status>//" <tmpPrStatusIhc2.xml>PrStatusIhc.txt
	sed -n '1p'<PrStatusIhc.txt>PrStatusIhc
	sed "s/^\ \ *//" <PrStatusIhc>PrStatusIhc2
	tr -d '\r\n' < PrStatusIhc2 > PrStatusIhc3
	rm tmpPrStatusIhc2.xml | rm tmpPrStatusIhc.xml | rm PrStatusIhc.txt
	PrStatusIhc=$(<PrStatusIhc3)
	rm PrStatusIhc | rm PrStatusIhc2 | rm PrStatusIhc3
	echo $PrStatusIhc

	grep "<brca_shared:lab_proc_her2_neu_immunohistochemistry_receptor_status .*>.*</.*>" <patient.xml>tmpHer2StatusIhc.xml
	sed "s/<brca_shared:lab_proc_her2_neu_immunohistochemistry_receptor_status .*\">//" <tmpHer2StatusIhc.xml>tmpHer2StatusIhc2.xml
	sed "s/<\/brca_shared:lab_proc_her2_neu_immunohistochemistry_receptor_status>//" <tmpHer2StatusIhc2.xml>Her2StatusIhc.txt
	sed -n '1p'<Her2StatusIhc.txt>Her2StatusIhc
	sed "s/^\ \ *//" <Her2StatusIhc>Her2StatusIhc2
	tr -d '\r\n' < Her2StatusIhc2 > Her2StatusIhc3
	rm tmpHer2StatusIhc2.xml | rm tmpHer2StatusIhc.xml | rm Her2StatusIhc.txt
	Her2StatusIhc=$(<Her2StatusIhc3)
	rm Her2StatusIhc | rm Her2StatusIhc2 | rm Her2StatusIhc3
	echo $Her2StatusIhc

	grep "<shared:histological_type .*>.*</.*>" <patient.xml>tmpHistologicalType.xml
	sed "s/<shared:histological_type .*\">//" <tmpHistologicalType.xml>tmpHistologicalType2.xml
	sed "s/<\/shared:histological_type>//" <tmpHistologicalType2.xml>HistologicalType.txt
	sed -n '1p'<HistologicalType.txt>HistologicalType
	sed "s/^\ \ *//" <HistologicalType>HistologicalType2
	tr -d '\r\n' < HistologicalType2 > HistologicalType3
	rm tmpHistologicalType2.xml | rm tmpHistologicalType.xml | rm HistologicalType.txt
	HistologicalType=$(<HistologicalType3)
	rm HistologicalType | rm HistologicalType2 | rm HistologicalType3
	echo $HistologicalType

	grep "<shared_stage:pathologic_stage .*>.*</.*>" <patient.xml>tmpPathologicStage.xml
	sed "s/<shared_stage:pathologic_stage .*\">//" <tmpPathologicStage.xml>tmpPathologicStage2.xml
	sed "s/<\/shared_stage:pathologic_stage>//" <tmpPathologicStage2.xml>PathologicStage.txt
	sed -n '1p'<PathologicStage.txt>PathologicStage
	sed "s/^\ \ *//" <PathologicStage>PathologicStage2
	tr -d '\r\n' < PathologicStage2 > PathologicStage3
	rm tmpPathologicStage2.xml | rm tmpPathologicStage.xml | rm PathologicStage.txt
	PathologicStage=$(<PathologicStage3)
	rm PathologicStage | rm PathologicStage2 | rm PathologicStage3
	echo $PathologicStage

	grep "<shared_stage:pathologic_T .*>.*</.*>" <patient.xml>tmpPathologicT.xml
	sed "s/<shared_stage:pathologic_T .*\">//" <tmpPathologicT.xml>tmpPathologicT2.xml
	sed "s/<\/shared_stage:pathologic_T>//" <tmpPathologicT2.xml>PathologicT.txt
	sed -n '1p'<PathologicT.txt>PathologicT
	sed "s/^\ \ *//" <PathologicT>PathologicT2
	tr -d '\r\n' < PathologicT2 > PathologicT3
	rm tmpPathologicT2.xml | rm tmpPathologicT.xml | rm PathologicT.txt
	PathologicT=$(<PathologicT3)
	rm PathologicT | rm PathologicT2 | rm PathologicT3
	echo $PathologicT

	grep "<shared_stage:pathologic_N .*>.*</.*>" <patient.xml>tmpPathologicN.xml
	sed "s/<shared_stage:pathologic_N .*\">//" <tmpPathologicN.xml>tmpPathologicN2.xml
	sed "s/<\/shared_stage:pathologic_N>//" <tmpPathologicN2.xml>PathologicN.txt
	sed -n '1p'<PathologicN.txt>PathologicN
	sed "s/^\ \ *//" <PathologicN>PathologicN2
	tr -d '\r\n' < PathologicN2 > PathologicN3
	rm tmpPathologicN2.xml | rm tmpPathologicN.xml | rm PathologicN.txt
	PathologicN=$(<PathologicN3)
	rm PathologicN | rm PathologicN2 | rm PathologicN3
	echo $PathologicN

	grep "<shared_stage:pathologic_M .*>.*</.*>" <patient.xml>tmpPathologicM.xml
	sed "s/<shared_stage:pathologic_M .*\">//" <tmpPathologicM.xml>tmpPathologicM2.xml
	sed "s/<\/shared_stage:pathologic_M>//" <tmpPathologicM2.xml>PathologicM.txt
	sed -n '1p'<PathologicM.txt>PathologicM
	sed "s/^\ \ *//" <PathologicM>PathologicM2
	tr -d '\r\n' < PathologicM2 > PathologicM3
	rm tmpPathologicM2.xml | rm tmpPathologicM.xml | rm PathologicM.txt
	PathologicM=$(<PathologicM3)
	rm PathologicM | rm PathologicM2 | rm PathologicM3
	echo $PathologicM




	mysql -h localhost -u $user -p$password -D projet2a -e "INSERT INTO miniatures VALUES ('$titre', 'ImageDzi/$chemin', '$xml','$lienPdf', '$barcode', '$gender', '$status', '$race', '$country', '$tumor', '$daysToBirth', '$daysToDeath','$TumorStatus', '$Contact', '$Age', '$ErStatusIhc', '$PrStatusIhc', '$Her2StatusIhc', '$HistologicalType', '$PathologicStage', '$PathologicT', '$PathologicN', '$PathologicM');"
done

rm tmp | rm lienPdfTmp.xml | rm patient.xml