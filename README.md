git pull origin dev
git add -A
git commit -m "details about u've done"  
git pull origin dev
git push origin dev

//to check branch name
git status

> [!CAUTION]
Rename coulmn `divition` into `division`  @ `student_cert_info`
## Amendments to the second meeting
1. Index page ~ icon remove 
2. Naming all page in CamilStyle
3. FU apan => serial number.php ~ remove and inhance the unput desing 
4. Alerts ~ inhance the UX colore
5. upload_document.php ~ remove it and marge it into request.php
6. Search icon ~ remove
7. Log out ~ pull out form <Nave link UL>
8. Dashbord ~ redesing and git it data from database
9. All page ~ add nave link active
10. Animation shake logo ~ only in index page
> [!CAUTION]
 Delete upload_document.php file
 Delete forgot_password.php
 Delet enhanced_search.php
 Delet recover_password.php
 Delet file Nots 

## Amendments August - 2024 - 14 - Wednesday

1. change request.php data tabel from simple data table into enhanced data table
2. enhance add user layout
3. enhnace the new_certificat.php layout
4. Rename and data validation into Database ()
> [!NOTE]
>Add 5 columns ~ for Arbic name (full name and the part of name).
>update btn in manage_users.php ~ removed.

> [!TIP]
>complete build profile.php file.

> [!CAUTION]
>Delete unessery code from user.php.
>Drop enrollment column.


## Amendments August - 2024 - 15 - Thursday
> [!IMPORTANT]
>Send all dat into (student_basic_info table, student_cert_info table, request table)
> [!NOTE]
>enhance new_certificat.php layout by adding next fild:
1. Certificat Type
2. Printed Place
3. Printed At
4. GPA
5. CGPA
6. Total Hours
7. Add Alart after Send request btn ~ clicked
> [!IMPORTANT]
>creat next function:
1. Insert_Student_Info ~ to insert data from new_certificate.php into spacific table
2. Request ~ to handel all request form Certificate user & Certificate admin
3. Get_Std_Info_Last_Id ~ handel the last ID from Std_basic_info and insert it into Request table
4. Get_Std_Cert_Info_Last_Id ~ handel the last ID from Std_Cert_Info and insert it into Request table
5. Get_Requests ~ handel all request form Certificate user & Certificate admin and featch it into Request.php
> [!IMPORTANT]
>Enhance the request.php layout
> [!IMPORTANT]
> Create a link (join) between those next table:
1. student_cert_info
2. student_basic_info
3. request
4. users

> [!NOTE]
>Add next column:
1. In student_cert_info table  add ~ student_basic_info_id
2. In request table  add ~ 	std_cert_id

> [!NOTE]
>enhance query:
1. Let student_basic_info` ORDER BY `student_basic_info_id` ASC

> [!CAUTION]
>Drop the next Tables:
1. certificate_type table ~ it's unnessery cz certificate type will be inserted manualy in new_certificate.php after enhancing the new_certificate
2. question and secret_questions table ~ cz we don;t have a forget password method
