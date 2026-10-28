
-- IDEA INTEGRATED ERP - DUMMY DATA
-- Semua data di bawah ini fiktif untuk development/demo.
BEGIN;

INSERT INTO companies(code,name,legal_name,email,phone,address)
VALUES ('IDEA','IDEA Indonesia','PT IDeA Indonesia Akademi Tbk','info@idea-demo.local','021-5550000','Jakarta, Indonesia');

INSERT INTO business_units(company_id,code,name) SELECT id,'ACADEMY','IDEA Academy' FROM companies WHERE code='IDEA';
INSERT INTO business_units(company_id,code,name) SELECT id,'PLACEMENT','Career & Placement' FROM companies WHERE code='IDEA';

INSERT INTO branches(company_id,business_unit_id,code,name,city_name,province_name)
SELECT c.id,b.id,'JKT','Jakarta Campus','Jakarta','DKI Jakarta' FROM companies c,business_units b WHERE c.code='IDEA' AND b.code='ACADEMY';
INSERT INTO branches(company_id,business_unit_id,code,name,city_name,province_name)
SELECT c.id,b.id,'METRO','Metro Campus','Metro','Lampung' FROM companies c,business_units b WHERE c.code='IDEA' AND b.code='ACADEMY';
INSERT INTO branches(company_id,business_unit_id,code,name,city_name,province_name)
SELECT c.id,b.id,'BALI','Bali Campus','Denpasar','Bali' FROM companies c,business_units b WHERE c.code='IDEA' AND b.code='ACADEMY';

INSERT INTO departments(company_id,code,name) SELECT id,'ADM','Admission' FROM companies WHERE code='IDEA';
INSERT INTO departments(company_id,code,name) SELECT id,'FIN','Finance & Accounting' FROM companies WHERE code='IDEA';
INSERT INTO departments(company_id,code,name) SELECT id,'ACD','Student & Academic' FROM companies WHERE code='IDEA';
INSERT INTO departments(company_id,code,name) SELECT id,'ASM','Assessment & Certification' FROM companies WHERE code='IDEA';
INSERT INTO departments(company_id,code,name) SELECT id,'PLC','Career & Placement' FROM companies WHERE code='IDEA';
INSERT INTO departments(company_id,code,name) SELECT id,'ALM','Alumni Relations' FROM companies WHERE code='IDEA';
INSERT INTO departments(company_id,code,name) SELECT id,'MGT','Management' FROM companies WHERE code='IDEA';

INSERT INTO positions(company_id,department_id,code,name,level_no)
SELECT c.id,d.id,'HEAD_ADM','Head of Admission',4 FROM companies c,departments d WHERE c.code='IDEA' AND d.code='ADM';
INSERT INTO positions(company_id,department_id,code,name,level_no)
SELECT c.id,d.id,'FIN_MGR','Finance Manager',4 FROM companies c,departments d WHERE c.code='IDEA' AND d.code='FIN';
INSERT INTO positions(company_id,department_id,code,name,level_no)
SELECT c.id,d.id,'ACD_OFF','Academic Officer',2 FROM companies c,departments d WHERE c.code='IDEA' AND d.code='ACD';
INSERT INTO positions(company_id,department_id,code,name,level_no)
SELECT c.id,d.id,'ASM_OFF','Assessment Officer',2 FROM companies c,departments d WHERE c.code='IDEA' AND d.code='ASM';
INSERT INTO positions(company_id,department_id,code,name,level_no)
SELECT c.id,d.id,'PLC_OFF','Placement Officer',2 FROM companies c,departments d WHERE c.code='IDEA' AND d.code='PLC';
INSERT INTO positions(company_id,department_id,code,name,level_no)
SELECT c.id,d.id,'DIRECTOR','Director',6 FROM companies c,departments d WHERE c.code='IDEA' AND d.code='MGT';

INSERT INTO countries(iso2,iso3,name,phone_code) VALUES
('ID','IDN','Indonesia','+62'),('SG','SGP','Singapore','+65'),('JP','JPN','Japan','+81'),('AE','ARE','United Arab Emirates','+971');
INSERT INTO provinces(country_id,code,name) SELECT id,'DKI','DKI Jakarta' FROM countries WHERE iso2='ID';
INSERT INTO provinces(country_id,code,name) SELECT id,'LPG','Lampung' FROM countries WHERE iso2='ID';
INSERT INTO provinces(country_id,code,name) SELECT id,'BALI','Bali' FROM countries WHERE iso2='ID';
INSERT INTO provinces(country_id,code,name) SELECT id,'BKL','Bengkulu' FROM countries WHERE iso2='ID';
INSERT INTO cities(country_id,province_id,code,name) SELECT c.id,p.id,'JKT','Jakarta' FROM countries c,provinces p WHERE c.iso2='ID' AND p.code='DKI';
INSERT INTO cities(country_id,province_id,code,name) SELECT c.id,p.id,'MTR','Metro' FROM countries c,provinces p WHERE c.iso2='ID' AND p.code='LPG';
INSERT INTO cities(country_id,province_id,code,name) SELECT c.id,p.id,'DPS','Denpasar' FROM countries c,provinces p WHERE c.iso2='ID' AND p.code='BALI';
INSERT INTO cities(country_id,province_id,code,name) SELECT c.id,p.id,'BKL','Bengkulu' FROM countries c,provinces p WHERE c.iso2='ID' AND p.code='BKL';
INSERT INTO cities(country_id,code,name) SELECT id,'SG','Singapore' FROM countries WHERE iso2='SG';
INSERT INTO cities(country_id,code,name) SELECT id,'TYO','Tokyo' FROM countries WHERE iso2='JP';
INSERT INTO cities(country_id,code,name) SELECT id,'DXB','Dubai' FROM countries WHERE iso2='AE';

INSERT INTO schools(code,name,school_type,city_id,address) VALUES
('SCH001','SMK Pariwisata Nusantara','SMK',(SELECT id FROM cities WHERE code='JKT'),'Jakarta'),
('SCH002','SMA Negeri 5 Bengkulu','SMA',(SELECT id FROM cities WHERE code='BKL'),'Bengkulu'),
('SCH003','SMK Hospitality Metro','SMK',(SELECT id FROM cities WHERE code='MTR'),'Metro'),
('SCH004','SMA Harapan Bali','SMA',(SELECT id FROM cities WHERE code='DPS'),'Bali');

INSERT INTO persons(person_code,full_name,gender,email,phone,nationality_country_id) VALUES
('EMP01','Sari Anggraini','FEMALE','sari@idea-demo.local','08110001',(SELECT id FROM countries WHERE iso2='ID')),
('EMP02','Rizky Pratama','MALE','rizky.finance@idea-demo.local','08110002',(SELECT id FROM countries WHERE iso2='ID')),
('EMP03','Alya Ramadhani','FEMALE','alya.academic@idea-demo.local','08110003',(SELECT id FROM countries WHERE iso2='ID')),
('EMP04','Dimas Setiawan','MALE','dimas.placement@idea-demo.local','08110004',(SELECT id FROM countries WHERE iso2='ID')),
('EMP05','Budi Santoso','MALE','budi.assessment@idea-demo.local','08110005',(SELECT id FROM countries WHERE iso2='ID')),
('EMP06','Eko Prasetyo','MALE','eko.director@idea-demo.local','08110006',(SELECT id FROM countries WHERE iso2='ID'));

INSERT INTO roles(code,name) VALUES
('SUPER_ADMIN','Super Administrator'),('DIRECTOR','Director'),('ADMISSION','Admission Officer'),
('FINANCE','Finance Officer'),('ACADEMIC','Academic Officer'),('ASSESSMENT','Assessment Officer'),
('PLACEMENT','Placement Officer'),('ALUMNI','Alumni Officer');
INSERT INTO permissions(code,module,name) VALUES
('dashboard.view','Dashboard','View Dashboard'),('admission.manage','Admission','Manage Admission'),
('finance.manage','Finance','Manage Finance'),('student.manage','Student','Manage Student'),
('assessment.manage','Assessment','Manage Assessment'),('placement.manage','Placement','Manage Placement'),
('partner.manage','Partners','Manage Partners'),('alumni.manage','Alumni','Manage Alumni'),
('reports.view','Reports','View Reports'),('settings.manage','Settings','Manage Settings');

INSERT INTO users(person_id,company_id,branch_id,department_id,position_id,username,email)
SELECT p.id,c.id,b.id,d.id,po.id,'sari.admin','sari@idea-demo.local'
FROM persons p,companies c,branches b,departments d,positions po WHERE p.person_code='EMP01' AND c.code='IDEA' AND b.code='JKT' AND d.code='ADM' AND po.code='HEAD_ADM';
INSERT INTO users(person_id,company_id,branch_id,department_id,position_id,username,email)
SELECT p.id,c.id,b.id,d.id,po.id,'rizky.finance','rizky.finance@idea-demo.local'
FROM persons p,companies c,branches b,departments d,positions po WHERE p.person_code='EMP02' AND c.code='IDEA' AND b.code='JKT' AND d.code='FIN' AND po.code='FIN_MGR';
INSERT INTO users(person_id,company_id,branch_id,department_id,position_id,username,email)
SELECT p.id,c.id,b.id,d.id,po.id,'alya.academic','alya.academic@idea-demo.local'
FROM persons p,companies c,branches b,departments d,positions po WHERE p.person_code='EMP03' AND c.code='IDEA' AND b.code='JKT' AND d.code='ACD' AND po.code='ACD_OFF';
INSERT INTO users(person_id,company_id,branch_id,department_id,position_id,username,email)
SELECT p.id,c.id,b.id,d.id,po.id,'budi.assessment','budi.assessment@idea-demo.local'
FROM persons p,companies c,branches b,departments d,positions po WHERE p.person_code='EMP05' AND c.code='IDEA' AND b.code='JKT' AND d.code='ASM' AND po.code='ASM_OFF';
INSERT INTO users(person_id,company_id,branch_id,department_id,position_id,username,email)
SELECT p.id,c.id,b.id,d.id,po.id,'dimas.placement','dimas.placement@idea-demo.local'
FROM persons p,companies c,branches b,departments d,positions po WHERE p.person_code='EMP04' AND c.code='IDEA' AND b.code='JKT' AND d.code='PLC' AND po.code='PLC_OFF';
INSERT INTO users(person_id,company_id,branch_id,department_id,position_id,username,email)
SELECT p.id,c.id,b.id,d.id,po.id,'eko.director','eko.director@idea-demo.local'
FROM persons p,companies c,branches b,departments d,positions po WHERE p.person_code='EMP06' AND c.code='IDEA' AND b.code='JKT' AND d.code='MGT' AND po.code='DIRECTOR';

INSERT INTO user_roles SELECT u.id,r.id FROM users u,roles r WHERE u.username='sari.admin' AND r.code='ADMISSION';
INSERT INTO user_roles SELECT u.id,r.id FROM users u,roles r WHERE u.username='rizky.finance' AND r.code='FINANCE';
INSERT INTO user_roles SELECT u.id,r.id FROM users u,roles r WHERE u.username='alya.academic' AND r.code='ACADEMIC';
INSERT INTO user_roles SELECT u.id,r.id FROM users u,roles r WHERE u.username='budi.assessment' AND r.code='ASSESSMENT';
INSERT INTO user_roles SELECT u.id,r.id FROM users u,roles r WHERE u.username='dimas.placement' AND r.code='PLACEMENT';
INSERT INTO user_roles SELECT u.id,r.id FROM users u,roles r WHERE u.username='eko.director' AND r.code='DIRECTOR';

INSERT INTO role_permissions
SELECT r.id,p.id FROM roles r CROSS JOIN permissions p WHERE r.code='SUPER_ADMIN';
INSERT INTO role_permissions
SELECT r.id,p.id FROM roles r,permissions p WHERE r.code='DIRECTOR' AND p.code IN ('dashboard.view','reports.view');
INSERT INTO role_permissions SELECT r.id,p.id FROM roles r,permissions p WHERE r.code='ADMISSION' AND p.code='admission.manage';
INSERT INTO role_permissions SELECT r.id,p.id FROM roles r,permissions p WHERE r.code='FINANCE' AND p.code='finance.manage';
INSERT INTO role_permissions SELECT r.id,p.id FROM roles r,permissions p WHERE r.code='ACADEMIC' AND p.code='student.manage';
INSERT INTO role_permissions SELECT r.id,p.id FROM roles r,permissions p WHERE r.code='ASSESSMENT' AND p.code='assessment.manage';
INSERT INTO role_permissions SELECT r.id,p.id FROM roles r,permissions p WHERE r.code='PLACEMENT' AND p.code IN ('placement.manage','partner.manage');

INSERT INTO user_branch_access
SELECT u.id,b.id,TRUE,CASE WHEN u.username='eko.director' THEN FALSE ELSE TRUE END FROM users u CROSS JOIN branches b;

INSERT INTO system_settings(company_id,setting_group,setting_key,setting_value,updated_by)
SELECT c.id,'general','brand',jsonb_build_object('primary_color','#F47A33','timezone','Asia/Jakarta'),u.id
FROM companies c,users u WHERE c.code='IDEA' AND u.username='sari.admin';

INSERT INTO document_types(code,name,category,has_expiry,is_required_default) VALUES
('KTP','KTP','IDENTITY',FALSE,TRUE),('KK','Kartu Keluarga','IDENTITY',FALSE,TRUE),
('IJAZAH','Ijazah','EDUCATION',FALSE,TRUE),('PASSPORT','Passport','PLACEMENT',TRUE,FALSE),
('MEDICAL','Medical Certificate','PLACEMENT',TRUE,FALSE),('VISA','Visa','PLACEMENT',TRUE,FALSE);

INSERT INTO notification_templates(code,channel,subject_template,body_template) VALUES
('ADM_ACCEPTED','EMAIL','Admission Accepted','Halo {{name}}, Anda diterima di {{program}}.'),
('PAYMENT_DUE','WHATSAPP',NULL,'Tagihan {{invoice}} jatuh tempo pada {{date}}.'),
('PLACEMENT_INTERVIEW','EMAIL','Placement Interview','Interview {{partner}} dijadwalkan {{date}}.');

INSERT INTO programs(company_id,code,name,category,duration_months) SELECT id,'HOSP','Hospitality','HOSPITALITY',6 FROM companies WHERE code='IDEA';
INSERT INTO programs(company_id,code,name,category,duration_months) SELECT id,'CUL','Culinary Arts','CULINARY',6 FROM companies WHERE code='IDEA';
INSERT INTO programs(company_id,code,name,category,duration_months) SELECT id,'CRUISE','Cruise & Cabin Service','CRUISE',6 FROM companies WHERE code='IDEA';
INSERT INTO programs(company_id,code,name,category,duration_months) SELECT id,'BUS','Business & Hospitality Management','BUSINESS',6 FROM companies WHERE code='IDEA';
INSERT INTO programs(company_id,code,name,category,duration_months) SELECT id,'LANG','Hospitality Language','LANGUAGE',3 FROM companies WHERE code='IDEA';

INSERT INTO curriculum_versions(program_id,code,name,effective_from) SELECT id,'HOSP-2026','Hospitality Curriculum 2026','2026-01-01' FROM programs WHERE code='HOSP';
INSERT INTO curriculum_versions(program_id,code,name,effective_from) SELECT id,'CUL-2026','Culinary Curriculum 2026','2026-01-01' FROM programs WHERE code='CUL';

INSERT INTO subjects(code,name,subject_type) VALUES
('HOSP-BASIC','Hospitality Basic','THEORY'),('FRONTOFFICE','Front Office Operation','PRACTICAL'),
('HOUSEKEEP','Housekeeping Operation','PRACTICAL'),('ENG-COMM','English Communication','THEORY'),
('CUL-BASIC','Culinary Basic','THEORY'),('KITCHEN','Kitchen Practical','PRACTICAL');

INSERT INTO curriculum_subjects(curriculum_version_id,subject_id,sequence_no,hours_theory,hours_practical,passing_grade)
SELECT cv.id,s.id,ROW_NUMBER() OVER(ORDER BY s.id),10,20,75 FROM curriculum_versions cv,subjects s
WHERE cv.code='HOSP-2026' AND s.code IN ('HOSP-BASIC','FRONTOFFICE','HOUSEKEEP','ENG-COMM');
INSERT INTO curriculum_subjects(curriculum_version_id,subject_id,sequence_no,hours_theory,hours_practical,passing_grade)
SELECT cv.id,s.id,ROW_NUMBER() OVER(ORDER BY s.id),10,30,75 FROM curriculum_versions cv,subjects s
WHERE cv.code='CUL-2026' AND s.code IN ('CUL-BASIC','KITCHEN');

INSERT INTO admission_intakes(company_id,branch_id,code,name,registration_open,registration_close,start_date,status)
SELECT c.id,b.id,'INT-JKT-2609','September 2026 Jakarta','2026-04-01','2026-08-31','2026-09-07','OPEN'
FROM companies c,branches b WHERE c.code='IDEA' AND b.code='JKT';

INSERT INTO batches(program_id,curriculum_version_id,intake_id,branch_id,code,name,start_date,end_date,capacity,status)
SELECT p.id,cv.id,i.id,b.id,'HOSP-JKT-2609','Hospitality Jakarta Sep 2026','2026-09-07','2027-03-06',30,'ACTIVE'
FROM programs p,curriculum_versions cv,admission_intakes i,branches b
WHERE p.code='HOSP' AND cv.code='HOSP-2026' AND i.code='INT-JKT-2609' AND b.code='JKT';
INSERT INTO batches(program_id,curriculum_version_id,intake_id,branch_id,code,name,start_date,end_date,capacity,status)
SELECT p.id,cv.id,i.id,b.id,'CUL-JKT-2609','Culinary Jakarta Sep 2026','2026-09-07','2027-03-06',25,'ACTIVE'
FROM programs p,curriculum_versions cv,admission_intakes i,branches b
WHERE p.code='CUL' AND cv.code='CUL-2026' AND i.code='INT-JKT-2609' AND b.code='JKT';

INSERT INTO classes(batch_id,code,name,room_name,capacity,homeroom_user_id)
SELECT b.id,'CLS-HOSP-A','Hospitality A','Room 201',30,u.id FROM batches b,users u WHERE b.code='HOSP-JKT-2609' AND u.username='alya.academic';
INSERT INTO classes(batch_id,code,name,room_name,capacity,homeroom_user_id)
SELECT b.id,'CLS-CUL-A','Culinary A','Kitchen Lab',25,u.id FROM batches b,users u WHERE b.code='CUL-JKT-2609' AND u.username='alya.academic';

INSERT INTO persons(person_code,national_id,full_name,gender,birth_place,birth_date,email,phone,nationality_country_id) VALUES
('P001','327300000001','Putri Ananda','FEMALE','Jakarta','2007-02-12','putri@example.test','08120001',(SELECT id FROM countries WHERE iso2='ID')),
('P002','327300000002','Andi Wijaya','MALE','Bandung','2006-11-20','andi@example.test','08120002',(SELECT id FROM countries WHERE iso2='ID')),
('P003','327300000003','Siti Rahma','FEMALE','Bengkulu','2007-05-08','siti@example.test','08120003',(SELECT id FROM countries WHERE iso2='ID')),
('P004','327300000004','Kevin Adriansyah','MALE','Jakarta','2006-08-17','kevin@example.test','08120004',(SELECT id FROM countries WHERE iso2='ID')),
('P005','327300000005','Nadya Kirana','FEMALE','Metro','2007-01-03','nadya@example.test','08120005',(SELECT id FROM countries WHERE iso2='ID')),
('P006','327300000006','Fahri Maulana','MALE','Bali','2006-12-15','fahri@example.test','08120006',(SELECT id FROM countries WHERE iso2='ID'));

INSERT INTO person_addresses(person_id,address,address_type,city_id,is_primary)
SELECT p.id,'Jl. Contoh No. 1','HOME',c.id,TRUE FROM persons p,cities c WHERE p.person_code='P001' AND c.code='JKT';
INSERT INTO person_documents(person_id,document_type_id,document_no,file_url,verification_status)
SELECT p.id,d.id,'327300000001','/dummy/ktp-putri.pdf','VERIFIED' FROM persons p,document_types d WHERE p.person_code='P001' AND d.code='KTP';

INSERT INTO applicants(company_id,branch_id,intake_id,person_id,registration_no,school_id,graduation_year,source_channel,assigned_user_id,admission_status,submitted_at)
SELECT c.id,b.id,i.id,p.id,'ADM-2026-001',s.id,2026,'WEBSITE',u.id,'ENROLLED','2026-07-01 09:00+07'
FROM companies c,branches b,admission_intakes i,persons p,schools s,users u
WHERE c.code='IDEA' AND b.code='JKT' AND i.code='INT-JKT-2609' AND p.person_code='P001' AND s.code='SCH001' AND u.username='sari.admin';
INSERT INTO applicants(company_id,branch_id,intake_id,person_id,registration_no,school_id,graduation_year,source_channel,assigned_user_id,admission_status,submitted_at)
SELECT c.id,b.id,i.id,p.id,'ADM-2026-002',s.id,2026,'REFERRAL',u.id,'ENROLLED','2026-07-02 10:00+07'
FROM companies c,branches b,admission_intakes i,persons p,schools s,users u
WHERE c.code='IDEA' AND b.code='JKT' AND i.code='INT-JKT-2609' AND p.person_code='P002' AND s.code='SCH001' AND u.username='sari.admin';
INSERT INTO applicants(company_id,branch_id,intake_id,person_id,registration_no,school_id,graduation_year,source_channel,assigned_user_id,admission_status,submitted_at)
SELECT c.id,b.id,i.id,p.id,'ADM-2026-003',s.id,2026,'SCHOOL_VISIT',u.id,'ENROLLED','2026-07-03 11:00+07'
FROM companies c,branches b,admission_intakes i,persons p,schools s,users u
WHERE c.code='IDEA' AND b.code='JKT' AND i.code='INT-JKT-2609' AND p.person_code='P003' AND s.code='SCH002' AND u.username='sari.admin';
INSERT INTO applicants(company_id,branch_id,intake_id,person_id,registration_no,school_id,graduation_year,source_channel,assigned_user_id,admission_status,submitted_at)
SELECT c.id,b.id,i.id,p.id,'ADM-2026-004',s.id,2026,'INSTAGRAM',u.id,'ENROLLED','2026-07-04 12:00+07'
FROM companies c,branches b,admission_intakes i,persons p,schools s,users u
WHERE c.code='IDEA' AND b.code='JKT' AND i.code='INT-JKT-2609' AND p.person_code='P004' AND s.code='SCH001' AND u.username='sari.admin';
INSERT INTO applicants(company_id,branch_id,intake_id,person_id,registration_no,school_id,graduation_year,source_channel,assigned_user_id,admission_status,submitted_at)
SELECT c.id,b.id,i.id,p.id,'ADM-2026-005',s.id,2026,'TIKTOK',u.id,'ACCEPTED','2026-07-05 13:00+07'
FROM companies c,branches b,admission_intakes i,persons p,schools s,users u
WHERE c.code='IDEA' AND b.code='JKT' AND i.code='INT-JKT-2609' AND p.person_code='P005' AND s.code='SCH003' AND u.username='sari.admin';
INSERT INTO applicants(company_id,branch_id,intake_id,person_id,registration_no,school_id,graduation_year,source_channel,assigned_user_id,admission_status,submitted_at)
SELECT c.id,b.id,i.id,p.id,'ADM-2026-006',s.id,2026,'WEBSITE',u.id,'INTERVIEW','2026-07-06 14:00+07'
FROM companies c,branches b,admission_intakes i,persons p,schools s,users u
WHERE c.code='IDEA' AND b.code='JKT' AND i.code='INT-JKT-2609' AND p.person_code='P006' AND s.code='SCH004' AND u.username='sari.admin';

INSERT INTO applicant_program_choices(applicant_id,program_id,branch_id,priority_no,is_selected)
SELECT a.id,p.id,b.id,1,TRUE FROM applicants a,programs p,branches b
WHERE a.registration_no IN ('ADM-2026-001','ADM-2026-002','ADM-2026-004','ADM-2026-005') AND p.code='HOSP' AND b.code='JKT';
INSERT INTO applicant_program_choices(applicant_id,program_id,branch_id,priority_no,is_selected)
SELECT a.id,p.id,b.id,1,TRUE FROM applicants a,programs p,branches b
WHERE a.registration_no IN ('ADM-2026-003','ADM-2026-006') AND p.code='CUL' AND b.code='JKT';

INSERT INTO admission_verifications(applicant_id,verified_by,status,checklist,notes)
SELECT a.id,u.id,'PASSED','{"identity":true,"education":true}'::jsonb,'Complete'
FROM applicants a,users u WHERE a.registration_no IN ('ADM-2026-001','ADM-2026-002','ADM-2026-003','ADM-2026-004') AND u.username='sari.admin';

INSERT INTO interview_criteria(code,name,weight,max_score) VALUES
('COMM','Communication',20,100),('MOT','Motivation',20,100),('ATT','Attitude',20,100),('GROOM','Grooming',15,100),('ENG','English Basic',25,100);

INSERT INTO admission_interviews(applicant_id,interviewer_user_id,scheduled_at,interview_mode,overall_score,recommendation,status,completed_at)
SELECT a.id,u.id,'2026-07-10 10:00+07','ONLINE',88,'ACCEPT','COMPLETED','2026-07-10 10:45+07'
FROM applicants a,users u WHERE a.registration_no='ADM-2026-001' AND u.username='sari.admin';
INSERT INTO admission_interviews(applicant_id,interviewer_user_id,scheduled_at,interview_mode,overall_score,recommendation,status,completed_at)
SELECT a.id,u.id,'2026-07-10 13:00+07','ONSITE',85,'ACCEPT','COMPLETED','2026-07-10 13:45+07'
FROM applicants a,users u WHERE a.registration_no='ADM-2026-002' AND u.username='sari.admin';
INSERT INTO admission_interviews(applicant_id,interviewer_user_id,scheduled_at,interview_mode,status)
SELECT a.id,u.id,'2026-10-28 10:00+07','ONLINE','SCHEDULED'
FROM applicants a,users u WHERE a.registration_no='ADM-2026-006' AND u.username='sari.admin';

INSERT INTO interview_scores(interview_id,criterion_id,score)
SELECT i.id,c.id,90 FROM admission_interviews i,interview_criteria c
WHERE i.applicant_id=(SELECT id FROM applicants WHERE registration_no='ADM-2026-001') AND c.code='COMM';

INSERT INTO admission_decisions(applicant_id,program_id,decision,decision_date,decided_by)
SELECT a.id,p.id,'ACCEPTED','2026-07-12',u.id FROM applicants a,programs p,users u
WHERE a.registration_no IN ('ADM-2026-001','ADM-2026-002','ADM-2026-004','ADM-2026-005') AND p.code='HOSP' AND u.username='sari.admin';
INSERT INTO admission_decisions(applicant_id,program_id,decision,decision_date,decided_by)
SELECT a.id,p.id,'ACCEPTED','2026-07-12',u.id FROM applicants a,programs p,users u
WHERE a.registration_no='ADM-2026-003' AND p.code='CUL' AND u.username='sari.admin';

INSERT INTO registrations(applicant_id,program_id,batch_id,registration_date,terms_accepted,registration_status,completed_at)
SELECT a.id,p.id,b.id,'2026-07-15',TRUE,'COMPLETE','2026-07-15 10:00+07'
FROM applicants a,programs p,batches b WHERE a.registration_no IN ('ADM-2026-001','ADM-2026-002','ADM-2026-004') AND p.code='HOSP' AND b.code='HOSP-JKT-2609';
INSERT INTO registrations(applicant_id,program_id,batch_id,registration_date,terms_accepted,registration_status,completed_at)
SELECT a.id,p.id,b.id,'2026-07-15',TRUE,'COMPLETE','2026-07-15 10:00+07'
FROM applicants a,programs p,batches b WHERE a.registration_no='ADM-2026-003' AND p.code='CUL' AND b.code='CUL-JKT-2609';

INSERT INTO students(company_id,branch_id,person_id,applicant_id,registration_id,student_no,program_id,batch_id,class_id,enrollment_date)
SELECT c.id,b.id,p.id,a.id,r.id,'STD2026001',pr.id,bt.id,cl.id,'2026-09-07'
FROM companies c,branches b,persons p,applicants a,registrations r,programs pr,batches bt,classes cl
WHERE c.code='IDEA' AND b.code='JKT' AND p.person_code='P001' AND a.person_id=p.id AND r.applicant_id=a.id AND pr.code='HOSP' AND bt.code='HOSP-JKT-2609' AND cl.code='CLS-HOSP-A';
INSERT INTO students(company_id,branch_id,person_id,applicant_id,registration_id,student_no,program_id,batch_id,class_id,enrollment_date)
SELECT c.id,b.id,p.id,a.id,r.id,'STD2026002',pr.id,bt.id,cl.id,'2026-09-07'
FROM companies c,branches b,persons p,applicants a,registrations r,programs pr,batches bt,classes cl
WHERE c.code='IDEA' AND b.code='JKT' AND p.person_code='P002' AND a.person_id=p.id AND r.applicant_id=a.id AND pr.code='HOSP' AND bt.code='HOSP-JKT-2609' AND cl.code='CLS-HOSP-A';
INSERT INTO students(company_id,branch_id,person_id,applicant_id,registration_id,student_no,program_id,batch_id,class_id,enrollment_date)
SELECT c.id,b.id,p.id,a.id,r.id,'STD2026003',pr.id,bt.id,cl.id,'2026-09-07'
FROM companies c,branches b,persons p,applicants a,registrations r,programs pr,batches bt,classes cl
WHERE c.code='IDEA' AND b.code='JKT' AND p.person_code='P003' AND a.person_id=p.id AND r.applicant_id=a.id AND pr.code='CUL' AND bt.code='CUL-JKT-2609' AND cl.code='CLS-CUL-A';
INSERT INTO students(company_id,branch_id,person_id,applicant_id,registration_id,student_no,program_id,batch_id,class_id,enrollment_date)
SELECT c.id,b.id,p.id,a.id,r.id,'STD2026004',pr.id,bt.id,cl.id,'2026-09-07'
FROM companies c,branches b,persons p,applicants a,registrations r,programs pr,batches bt,classes cl
WHERE c.code='IDEA' AND b.code='JKT' AND p.person_code='P004' AND a.person_id=p.id AND r.applicant_id=a.id AND pr.code='HOSP' AND bt.code='HOSP-JKT-2609' AND cl.code='CLS-HOSP-A';

INSERT INTO class_students(class_id,student_id) SELECT class_id,id FROM students;
INSERT INTO student_status_history(student_id,new_status,effective_date,reason,changed_by)
SELECT s.id,'ACTIVE','2026-09-07','Enrollment',u.id FROM students s,users u WHERE u.username='alya.academic';

INSERT INTO banks(code,name) VALUES ('BCA','Bank Central Asia'),('MANDIRI','Bank Mandiri');
INSERT INTO bank_accounts(company_id,bank_id,branch_id,account_no,account_name)
SELECT c.id,bk.id,b.id,'1234567890','PT IDEA Indonesia Akademi Tbk'
FROM companies c,banks bk,branches b WHERE c.code='IDEA' AND bk.code='BCA' AND b.code='JKT';

INSERT INTO fee_components(code,name,component_type,revenue_account_code) VALUES
('REG','Registration Fee','REGISTRATION','4101'),('TUITION','Tuition Fee','TUITION','4102'),
('DORM','Dormitory Fee','DORMITORY','4103'),('CERT','Certification Fee','CERTIFICATION','4104');

INSERT INTO program_fee_plans(program_id,branch_id,intake_id,code,name,total_amount)
SELECT p.id,b.id,i.id,'FEE-HOSP-2609','Hospitality Fee Plan',18000000 FROM programs p,branches b,admission_intakes i WHERE p.code='HOSP' AND b.code='JKT' AND i.code='INT-JKT-2609';
INSERT INTO program_fee_plans(program_id,branch_id,intake_id,code,name,total_amount)
SELECT p.id,b.id,i.id,'FEE-CUL-2609','Culinary Fee Plan',20000000 FROM programs p,branches b,admission_intakes i WHERE p.code='CUL' AND b.code='JKT' AND i.code='INT-JKT-2609';

INSERT INTO program_fee_plan_items(fee_plan_id,fee_component_id,sequence_no,amount,due_offset_days)
SELECT f.id,c.id,1,2000000,0 FROM program_fee_plans f,fee_components c WHERE f.code='FEE-HOSP-2609' AND c.code='REG';
INSERT INTO program_fee_plan_items(fee_plan_id,fee_component_id,sequence_no,amount,due_offset_days)
SELECT f.id,c.id,2,16000000,30 FROM program_fee_plans f,fee_components c WHERE f.code='FEE-HOSP-2609' AND c.code='TUITION';

INSERT INTO student_invoices(company_id,branch_id,person_id,applicant_id,student_id,invoice_no,invoice_date,due_date,billing_context,subtotal,total_amount,paid_amount,outstanding_amount,status)
SELECT c.id,b.id,p.id,a.id,s.id,'INV-001','2026-07-15','2026-07-20','ADMISSION',18000000,18000000,18000000,0,'PAID'
FROM companies c,branches b,persons p,applicants a,students s WHERE c.code='IDEA' AND b.code='JKT' AND p.person_code='P001' AND a.person_id=p.id AND s.person_id=p.id;
INSERT INTO student_invoices(company_id,branch_id,person_id,applicant_id,student_id,invoice_no,invoice_date,due_date,billing_context,subtotal,total_amount,paid_amount,outstanding_amount,status)
SELECT c.id,b.id,p.id,a.id,s.id,'INV-002','2026-07-15','2026-10-01','STUDENT',18000000,18000000,10000000,8000000,'PARTIAL'
FROM companies c,branches b,persons p,applicants a,students s WHERE c.code='IDEA' AND b.code='JKT' AND p.person_code='P002' AND a.person_id=p.id AND s.person_id=p.id;
INSERT INTO student_invoices(company_id,branch_id,person_id,applicant_id,student_id,invoice_no,invoice_date,due_date,billing_context,subtotal,total_amount,paid_amount,outstanding_amount,status)
SELECT c.id,b.id,p.id,a.id,s.id,'INV-003','2026-07-15','2026-09-20','STUDENT',20000000,20000000,5000000,15000000,'OVERDUE'
FROM companies c,branches b,persons p,applicants a,students s WHERE c.code='IDEA' AND b.code='JKT' AND p.person_code='P003' AND a.person_id=p.id AND s.person_id=p.id;

INSERT INTO student_invoice_items(invoice_id,fee_component_id,description,unit_price,amount)
SELECT i.id,f.id,'Program Fee',i.total_amount,i.total_amount FROM student_invoices i,fee_components f WHERE f.code='TUITION';

INSERT INTO payments(company_id,branch_id,person_id,payment_no,payment_date,payment_method,bank_account_id,amount,reference_no,verification_status,verified_by,verified_at)
SELECT c.id,b.id,p.id,'PAY-001','2026-07-18 10:00+07','BANK_TRANSFER',ba.id,18000000,'TRX001','VERIFIED',u.id,NOW()
FROM companies c,branches b,persons p,bank_accounts ba,users u WHERE c.code='IDEA' AND b.code='JKT' AND p.person_code='P001' AND ba.account_no='1234567890' AND u.username='rizky.finance';
INSERT INTO payments(company_id,branch_id,person_id,payment_no,payment_date,payment_method,bank_account_id,amount,reference_no,verification_status,verified_by,verified_at)
SELECT c.id,b.id,p.id,'PAY-002','2026-07-18 11:00+07','BANK_TRANSFER',ba.id,10000000,'TRX002','VERIFIED',u.id,NOW()
FROM companies c,branches b,persons p,bank_accounts ba,users u WHERE c.code='IDEA' AND b.code='JKT' AND p.person_code='P002' AND ba.account_no='1234567890' AND u.username='rizky.finance';
INSERT INTO payments(company_id,branch_id,person_id,payment_no,payment_date,payment_method,bank_account_id,amount,reference_no,verification_status,verified_by,verified_at)
SELECT c.id,b.id,p.id,'PAY-003','2026-07-18 12:00+07','QRIS',ba.id,5000000,'TRX003','VERIFIED',u.id,NOW()
FROM companies c,branches b,persons p,bank_accounts ba,users u WHERE c.code='IDEA' AND b.code='JKT' AND p.person_code='P003' AND ba.account_no='1234567890' AND u.username='rizky.finance';

INSERT INTO payment_allocations(payment_id,invoice_id,allocated_amount)
SELECT p.id,i.id,p.amount FROM payments p,student_invoices i WHERE p.payment_no='PAY-001' AND i.invoice_no='INV-001';
INSERT INTO payment_allocations(payment_id,invoice_id,allocated_amount)
SELECT p.id,i.id,p.amount FROM payments p,student_invoices i WHERE p.payment_no='PAY-002' AND i.invoice_no='INV-002';
INSERT INTO payment_allocations(payment_id,invoice_id,allocated_amount)
SELECT p.id,i.id,p.amount FROM payments p,student_invoices i WHERE p.payment_no='PAY-003' AND i.invoice_no='INV-003';

INSERT INTO scholarships_discounts(person_id,student_id,type,name,value_type,value,valid_from,status,approved_by)
SELECT p.id,s.id,'DISCOUNT','Early Enrollment','AMOUNT',1000000,'2026-07-01','ACTIVE',u.id
FROM persons p,students s,users u WHERE p.person_code='P004' AND s.person_id=p.id AND u.username='rizky.finance';

INSERT INTO refunds(refund_no,person_id,payment_id,invoice_id,request_date,amount,reason,status)
SELECT 'REF-001',pe.id,p.id,i.id,'2026-10-01',500000,'Dummy excess payment','REQUESTED'
FROM persons pe,payments p,student_invoices i WHERE pe.person_code='P001' AND p.payment_no='PAY-001' AND i.invoice_no='INV-001';

INSERT INTO vendors(company_id,code,name,contact_name,phone) SELECT id,'VND001','PT Edu Supply Indonesia','Rina','08131111' FROM companies WHERE code='IDEA';
INSERT INTO expense_categories(code,name,account_code) VALUES ('TRAINING','Training Operational','5101'),('OFFICE','Office Expense','5102');
INSERT INTO expenses(company_id,branch_id,department_id,category_id,vendor_id,expense_no,expense_date,description,amount,payment_status,approval_status,requested_by)
SELECT c.id,b.id,d.id,ec.id,v.id,'EXP-001','2026-10-10','Training material',3500000,'PAID','APPROVED',u.id
FROM companies c,branches b,departments d,expense_categories ec,vendors v,users u
WHERE c.code='IDEA' AND b.code='JKT' AND d.code='ACD' AND ec.code='TRAINING' AND v.code='VND001' AND u.username='alya.academic';

INSERT INTO chart_of_accounts(company_id,account_code,account_name,account_type,normal_balance) SELECT id,'1101','Bank','ASSET','DEBIT' FROM companies WHERE code='IDEA';
INSERT INTO chart_of_accounts(company_id,account_code,account_name,account_type,normal_balance) SELECT id,'1201','Student Receivable','ASSET','DEBIT' FROM companies WHERE code='IDEA';
INSERT INTO chart_of_accounts(company_id,account_code,account_name,account_type,normal_balance) SELECT id,'4102','Tuition Revenue','REVENUE','CREDIT' FROM companies WHERE code='IDEA';
INSERT INTO chart_of_accounts(company_id,account_code,account_name,account_type,normal_balance) SELECT id,'5101','Training Expense','EXPENSE','DEBIT' FROM companies WHERE code='IDEA';

INSERT INTO journal_entries(company_id,branch_id,journal_no,journal_date,source_module,source_type,source_id,description,created_by)
SELECT c.id,b.id,'JV-001','2026-07-18','FINANCE','PAYMENT',p.id,'Payment receipt',u.id
FROM companies c,branches b,payments p,users u WHERE c.code='IDEA' AND b.code='JKT' AND p.payment_no='PAY-001' AND u.username='rizky.finance';
INSERT INTO journal_lines(journal_entry_id,account_id,description,debit,credit)
SELECT j.id,a.id,'Bank receipt',18000000,0 FROM journal_entries j,chart_of_accounts a WHERE j.journal_no='JV-001' AND a.account_code='1101';
INSERT INTO journal_lines(journal_entry_id,account_id,description,debit,credit)
SELECT j.id,a.id,'Receivable settlement',0,18000000 FROM journal_entries j,chart_of_accounts a WHERE j.journal_no='JV-001' AND a.account_code='1201';

INSERT INTO schedules(class_id,subject_id,trainer_user_id,schedule_date,start_time,end_time,room_name,delivery_mode,status)
SELECT c.id,s.id,u.id,'2026-10-26','08:00','10:00','Room 201','ONSITE','COMPLETED'
FROM classes c,subjects s,users u WHERE c.code='CLS-HOSP-A' AND s.code='HOSP-BASIC' AND u.username='alya.academic';
INSERT INTO schedules(class_id,subject_id,trainer_user_id,schedule_date,start_time,end_time,room_name,delivery_mode,status)
SELECT c.id,s.id,u.id,'2026-10-27','10:00','12:00','Front Office Lab','PRACTICAL','SCHEDULED'
FROM classes c,subjects s,users u WHERE c.code='CLS-HOSP-A' AND s.code='FRONTOFFICE' AND u.username='alya.academic';

INSERT INTO attendance(schedule_id,student_id,check_in_at,check_out_at,status,method)
SELECT sc.id,st.id,'2026-10-26 07:55+07','2026-10-26 10:00+07','PRESENT','QR'
FROM schedules sc,students st WHERE sc.schedule_date='2026-10-26' AND st.student_no='STD2026001';
INSERT INTO attendance(schedule_id,student_id,check_in_at,status,method)
SELECT sc.id,st.id,'2026-10-26 08:05+07','LATE','QR'
FROM schedules sc,students st WHERE sc.schedule_date='2026-10-26' AND st.student_no='STD2026002';

INSERT INTO learning_materials(subject_id,title,material_type,url,created_by)
SELECT s.id,'Hospitality Basic Handbook','PDF','/dummy/materials/hospitality.pdf',u.id FROM subjects s,users u WHERE s.code='HOSP-BASIC' AND u.username='alya.academic';
INSERT INTO assignments(class_id,subject_id,title,due_at,created_by)
SELECT c.id,s.id,'Guest Handling Reflection','2026-10-30 23:59+07',u.id FROM classes c,subjects s,users u WHERE c.code='CLS-HOSP-A' AND s.code='HOSP-BASIC' AND u.username='alya.academic';
INSERT INTO assignment_submissions(assignment_id,student_id,submitted_at,answer_text,score,feedback,graded_by,graded_at)
SELECT a.id,s.id,'2026-10-28 20:00+07','Guest should be welcomed professionally...',88,'Good',u.id,'2026-10-29 09:00+07'
FROM assignments a,students s,users u WHERE a.title='Guest Handling Reflection' AND s.student_no='STD2026001' AND u.username='alya.academic';
INSERT INTO grades(student_id,subject_id,batch_id,grade_type,score,weight,recorded_by)
SELECT st.id,s.id,st.batch_id,'ASSIGNMENT',88,20,u.id FROM students st,subjects s,users u WHERE st.student_no='STD2026001' AND s.code='HOSP-BASIC' AND u.username='alya.academic';

INSERT INTO partner_categories(code,name) VALUES ('HOTEL','Hotel'),('RESTAURANT','Restaurant'),('CRUISE','Cruise'),('AGENCY','Recruitment Agency');
INSERT INTO partners(company_id,category_id,code,name,country_id,city_id,partnership_status,is_international)
SELECT c.id,pc.id,'PRT001','Marriott Singapore',co.id,ci.id,'ACTIVE',TRUE FROM companies c,partner_categories pc,countries co,cities ci WHERE c.code='IDEA' AND pc.code='HOTEL' AND co.iso2='SG' AND ci.code='SG';
INSERT INTO partners(company_id,category_id,code,name,country_id,city_id,partnership_status,is_international)
SELECT c.id,pc.id,'PRT002','Four Seasons Tokyo',co.id,ci.id,'ACTIVE',TRUE FROM companies c,partner_categories pc,countries co,cities ci WHERE c.code='IDEA' AND pc.code='HOTEL' AND co.iso2='JP' AND ci.code='TYO';
INSERT INTO partners(company_id,category_id,code,name,country_id,city_id,partnership_status,is_international)
SELECT c.id,pc.id,'PRT003','Aidia Grande Hotel',co.id,ci.id,'ACTIVE',FALSE FROM companies c,partner_categories pc,countries co,cities ci WHERE c.code='IDEA' AND pc.code='HOTEL' AND co.iso2='ID' AND ci.code='MTR';

INSERT INTO partner_contacts(partner_id,name,position,email,is_primary) SELECT id,'John Miller','HR Manager','john@example.test',TRUE FROM partners WHERE code='PRT001';
INSERT INTO partner_contracts(partner_id,contract_no,contract_type,title,start_date,end_date,status)
SELECT id,'MOU-MARRIOTT-2026','PLACEMENT','Placement Cooperation','2026-01-01','2027-12-31','ACTIVE' FROM partners WHERE code='PRT001';

INSERT INTO practical_sessions(program_id,batch_id,title,partner_id,location,start_date,end_date,supervisor_user_id)
SELECT p.id,b.id,'Hotel Operational Practice',pt.id,'Aidia Grande Hotel','2026-11-01','2026-11-14',u.id
FROM programs p,batches b,partners pt,users u WHERE p.code='HOSP' AND b.code='HOSP-JKT-2609' AND pt.code='PRT003' AND u.username='alya.academic';
INSERT INTO practical_participants(practical_session_id,student_id,shift_name,task_summary,performance_score)
SELECT ps.id,s.id,'Morning','Front office rotation',90 FROM practical_sessions ps,students s WHERE ps.title='Hotel Operational Practice' AND s.student_no='STD2026001';

INSERT INTO dormitories(branch_id,code,name,address,gender_policy) SELECT id,'DORM-JKT-A','Jakarta Dormitory A','Campus Area','MIXED' FROM branches WHERE code='JKT';
INSERT INTO dormitory_rooms(dormitory_id,room_no,floor_no,capacity) SELECT id,'201',2,4 FROM dormitories WHERE code='DORM-JKT-A';
INSERT INTO dormitory_beds(room_id,bed_no,status) SELECT id,'A','OCCUPIED' FROM dormitory_rooms WHERE room_no='201';
INSERT INTO dormitory_allocations(student_id,bed_id,check_in_date,status)
SELECT s.id,b.id,'2026-09-06','ACTIVE' FROM students s,dormitory_beds b WHERE s.student_no='STD2026001' AND b.bed_no='A';

INSERT INTO competency_frameworks(program_id,code,name,version,effective_from) SELECT id,'CF-HOSP-2026','Hospitality Competency','2026.1','2026-01-01' FROM programs WHERE code='HOSP';
INSERT INTO competency_frameworks(program_id,code,name,version,effective_from) SELECT id,'CF-CUL-2026','Culinary Competency','2026.1','2026-01-01' FROM programs WHERE code='CUL';
INSERT INTO competencies(framework_id,code,name,category,weight,minimum_score,sequence_no)
SELECT id,'GUEST','Guest Handling','SERVICE',25,75,1 FROM competency_frameworks WHERE code='CF-HOSP-2026';
INSERT INTO competencies(framework_id,code,name,category,weight,minimum_score,sequence_no)
SELECT id,'FRONT','Front Office Operation','FRONT_OFFICE',25,75,2 FROM competency_frameworks WHERE code='CF-HOSP-2026';
INSERT INTO competencies(framework_id,code,name,category,weight,minimum_score,sequence_no)
SELECT id,'KITCH','Kitchen Operation','CULINARY',50,75,1 FROM competency_frameworks WHERE code='CF-CUL-2026';
INSERT INTO program_competencies(program_id,competency_id)
SELECT f.program_id,c.id FROM competency_frameworks f JOIN competencies c ON c.framework_id=f.id;

INSERT INTO assessments(program_id,batch_id,code,name,assessment_type,scheduled_at,location,assessor_user_id,status)
SELECT p.id,b.id,'ASM-HOSP-001','Hospitality Final Practical','PRACTICAL','2026-10-25 09:00+07','Hotel Lab',u.id,'COMPLETED'
FROM programs p,batches b,users u WHERE p.code='HOSP' AND b.code='HOSP-JKT-2609' AND u.username='budi.assessment';
INSERT INTO assessment_components(assessment_id,competency_id,name,weight)
SELECT a.id,c.id,c.name,c.weight FROM assessments a,competencies c,competency_frameworks f WHERE a.code='ASM-HOSP-001' AND c.framework_id=f.id AND f.code='CF-HOSP-2026';
INSERT INTO assessment_participants(assessment_id,student_id,status,total_score,result,assessed_at)
SELECT a.id,s.id,'ASSESSED',88,'COMPETENT','2026-10-25 11:00+07' FROM assessments a,students s WHERE a.code='ASM-HOSP-001' AND s.student_no='STD2026001';
INSERT INTO assessment_participants(assessment_id,student_id,status,total_score,result,assessed_at)
SELECT a.id,s.id,'ASSESSED',82,'COMPETENT','2026-10-25 11:05+07' FROM assessments a,students s WHERE a.code='ASM-HOSP-001' AND s.student_no='STD2026002';
INSERT INTO assessment_scores(participant_id,component_id,score,evidence_url)
SELECT ap.id,ac.id,90,'/dummy/evidence/guest.jpg' FROM assessment_participants ap,assessment_components ac
WHERE ap.student_id=(SELECT id FROM students WHERE student_no='STD2026001') AND ac.assessment_id=ap.assessment_id LIMIT 1;
INSERT INTO remedials(assessment_participant_id,remedial_date,score_before,score_after,result,assessor_user_id,notes)
SELECT ap.id,'2026-10-30',70,80,'PASSED',u.id,'Dummy remedial' FROM assessment_participants ap,users u
WHERE ap.student_id=(SELECT id FROM students WHERE student_no='STD2026002') AND u.username='budi.assessment';

INSERT INTO readiness_scores(student_id,calculated_date,academic_score,competency_score,english_score,attendance_score,attitude_score,document_score,overall_score,readiness_status)
SELECT id,'2026-10-26',88,88,85,95,90,100,90,'PLACEMENT_READY' FROM students WHERE student_no='STD2026001';
INSERT INTO readiness_scores(student_id,calculated_date,academic_score,competency_score,english_score,attendance_score,attitude_score,document_score,overall_score,readiness_status)
SELECT id,'2026-10-26',84,82,80,88,86,100,85,'PLACEMENT_READY' FROM students WHERE student_no='STD2026002';
INSERT INTO readiness_scores(student_id,calculated_date,academic_score,competency_score,english_score,attendance_score,attitude_score,document_score,overall_score,readiness_status)
SELECT id,'2026-10-26',78,72,75,90,85,80,79,'ASSESSMENT_READY' FROM students WHERE student_no='STD2026003';
INSERT INTO readiness_scores(student_id,calculated_date,academic_score,competency_score,english_score,attendance_score,attitude_score,document_score,overall_score,readiness_status)
SELECT id,'2026-10-26',82,80,83,78,88,90,82,'PLACEMENT_READY' FROM students WHERE student_no='STD2026004';

INSERT INTO certification_types(code,name,issuer_type,validity_months) VALUES
('COMP','Competency Certificate','INTERNAL',36),('BNSP','BNSP Certification','BNSP',36),('LANG','Language Certificate','LANGUAGE',24);
INSERT INTO certificates(student_id,certification_type_id,certificate_no,title,issued_by,issue_date,expiry_date,score,status)
SELECT s.id,c.id,'CERT-001','Hospitality Competency Certificate','IDEA Indonesia','2026-10-26','2029-10-26',88,'ACTIVE'
FROM students s,certification_types c WHERE s.student_no='STD2026001' AND c.code='COMP';

INSERT INTO job_positions(code,name,category) VALUES
('FO_ASSOC','Front Office Associate','HOTEL'),('ROOM_ATT','Room Attendant','HOTEL'),
('CUL_TRAINEE','Culinary Trainee','CULINARY'),('CABIN','Cabin Crew','CRUISE');
INSERT INTO job_demands(partner_id,job_position_id,code,title,country_id,city_id,slots,employment_type,salary_min,salary_max,currency,min_english_score,min_competency_score,passport_required,medical_required,open_date,close_date,interview_date,status,requirements)
SELECT p.id,j.id,'JOB-SG-001','Front Office Associate Singapore',co.id,ci.id,5,'FULL_TIME',2200,2800,'SGD',80,80,TRUE,TRUE,'2026-10-01','2026-11-30','2026-11-05','OPEN','{"grooming":"good"}'::jsonb
FROM partners p,job_positions j,countries co,cities ci WHERE p.code='PRT001' AND j.code='FO_ASSOC' AND co.iso2='SG' AND ci.code='SG';
INSERT INTO job_demands(partner_id,job_position_id,code,title,country_id,city_id,slots,employment_type,salary_min,salary_max,currency,min_english_score,min_competency_score,passport_required,medical_required,open_date,close_date,status,requirements)
SELECT p.id,j.id,'JOB-JP-001','Culinary Trainee Tokyo',co.id,ci.id,4,'INTERNSHIP',180000,220000,'JPY',75,75,TRUE,TRUE,'2026-10-01','2026-11-30','OPEN','{}'::jsonb
FROM partners p,job_positions j,countries co,cities ci WHERE p.code='PRT002' AND j.code='CUL_TRAINEE' AND co.iso2='JP' AND ci.code='TYO';

INSERT INTO placement_candidates(student_id,readiness_score_id,cv_url,desired_country_id,desired_position_id,candidate_status,available_from)
SELECT s.id,r.id,'/dummy/cv/putri.pdf',c.id,j.id,'MATCHED','2026-11-01'
FROM students s,readiness_scores r,countries c,job_positions j WHERE s.student_no='STD2026001' AND r.student_id=s.id AND c.iso2='SG' AND j.code='FO_ASSOC';
INSERT INTO placement_candidates(student_id,readiness_score_id,cv_url,desired_country_id,desired_position_id,candidate_status,available_from)
SELECT s.id,r.id,'/dummy/cv/andi.pdf',c.id,j.id,'PLACED','2026-11-01'
FROM students s,readiness_scores r,countries c,job_positions j WHERE s.student_no='STD2026002' AND r.student_id=s.id AND c.iso2='SG' AND j.code='FO_ASSOC';
INSERT INTO placement_candidates(student_id,readiness_score_id,cv_url,desired_country_id,desired_position_id,candidate_status,available_from)
SELECT s.id,r.id,'/dummy/cv/kevin.pdf',c.id,j.id,'SUBMITTED','2026-11-01'
FROM students s,readiness_scores r,countries c,job_positions j WHERE s.student_no='STD2026004' AND r.student_id=s.id AND c.iso2='SG' AND j.code='FO_ASSOC';

INSERT INTO candidate_matches(candidate_id,job_demand_id,match_score,match_detail,recommended_by,is_shortlisted)
SELECT pc.id,j.id,95,'{"english":90,"competency":92}'::jsonb,'AI',TRUE
FROM placement_candidates pc,job_demands j WHERE pc.student_id=(SELECT id FROM students WHERE student_no='STD2026001') AND j.code='JOB-SG-001';
INSERT INTO candidate_matches(candidate_id,job_demand_id,match_score,match_detail,recommended_by,is_shortlisted)
SELECT pc.id,j.id,92,'{"english":85,"competency":90}'::jsonb,'SYSTEM',TRUE
FROM placement_candidates pc,job_demands j WHERE pc.student_id=(SELECT id FROM students WHERE student_no='STD2026002') AND j.code='JOB-SG-001';

INSERT INTO job_applications(candidate_id,job_demand_id,application_no,applied_at,current_stage,status)
SELECT pc.id,j.id,'APP-001','2026-10-27 09:00+07','INTERVIEW','ACTIVE'
FROM placement_candidates pc,job_demands j WHERE pc.student_id=(SELECT id FROM students WHERE student_no='STD2026001') AND j.code='JOB-SG-001';
INSERT INTO job_applications(candidate_id,job_demand_id,application_no,applied_at,current_stage,status)
SELECT pc.id,j.id,'APP-002','2026-10-20 09:00+07','PLACED','CLOSED'
FROM placement_candidates pc,job_demands j WHERE pc.student_id=(SELECT id FROM students WHERE student_no='STD2026002') AND j.code='JOB-SG-001';

INSERT INTO application_stage_history(job_application_id,old_stage,new_stage,changed_by,notes)
SELECT a.id,'SUBMITTED','INTERVIEW',u.id,'Passed screening' FROM job_applications a,users u WHERE a.application_no='APP-001' AND u.username='dimas.placement';
INSERT INTO placement_interviews(job_application_id,scheduled_at,interview_mode,location_or_link,interviewer_name,result,score)
SELECT id,'2026-11-05 10:00+08','ONLINE','https://meet.example/interview','John Miller','PENDING',NULL FROM job_applications WHERE application_no='APP-001';
INSERT INTO placement_interviews(job_application_id,scheduled_at,interview_mode,location_or_link,interviewer_name,result,score)
SELECT id,'2026-10-22 10:00+08','ONLINE','https://meet.example/andi','John Miller','PASSED',91 FROM job_applications WHERE application_no='APP-002';

INSERT INTO job_offers(job_application_id,offer_date,position_title,salary,currency,start_date,contract_months,status,accepted_at)
SELECT id,'2026-10-23','Front Office Associate',2500,'SGD','2026-11-15',24,'ACCEPTED','2026-10-24 09:00+07'
FROM job_applications WHERE application_no='APP-002';
INSERT INTO placements(job_application_id,student_id,partner_id,job_position_id,placement_date,country_id,city_id,salary,currency,contract_start_date,contract_end_date,placement_type,status)
SELECT a.id,s.id,p.id,j.id,'2026-11-15',c.id,ci.id,2500,'SGD','2026-11-15','2028-11-14','INTERNATIONAL','ACTIVE'
FROM job_applications a,students s,partners p,job_positions j,countries c,cities ci
WHERE a.application_no='APP-002' AND s.student_no='STD2026002' AND p.code='PRT001' AND j.code='FO_ASSOC' AND c.iso2='SG' AND ci.code='SG';
INSERT INTO departures(placement_id,passport_no,visa_no,medical_status,flight_no,departure_at,arrival_at,accommodation,predeparture_status)
SELECT id,'A12345678','SGVISA001','FIT','SQ951','2026-11-14 18:00+07','2026-11-14 21:00+08','Staff Accommodation','ARRIVED'
FROM placements WHERE student_id=(SELECT id FROM students WHERE student_no='STD2026002');
INSERT INTO placement_monitoring(placement_id,monitoring_date,period_month,employment_status,current_position,current_salary,performance_rating,follow_up,monitored_by)
SELECT p.id,'2026-12-15',1,'EMPLOYED','Front Office Associate',2500,90,'Continue monitoring',u.id
FROM placements p,users u WHERE p.student_id=(SELECT id FROM students WHERE student_no='STD2026002') AND u.username='dimas.placement';

INSERT INTO graduations(student_id,graduation_date,final_score,graduation_status,certificate_no)
SELECT id,'2026-10-20',86,'PASSED','GRAD-2026-002' FROM students WHERE student_no='STD2026002';
UPDATE students SET student_status='GRADUATED' WHERE student_no='STD2026002';

INSERT INTO alumni_profiles(student_id,alumni_no,graduation_date,current_employment_status,current_partner_id,current_position,current_country_id,current_salary,currency,is_mentor)
SELECT s.id,'ALM2026002','2026-10-20','EMPLOYED',p.id,'Front Office Associate',c.id,2500,'SGD',TRUE
FROM students s,partners p,countries c WHERE s.student_no='STD2026002' AND p.code='PRT001' AND c.iso2='SG';
INSERT INTO alumni_career_history(alumni_id,employer_name,partner_id,position,country_id,start_date,salary,currency,is_current)
SELECT a.id,'Marriott Singapore',p.id,'Front Office Associate',c.id,'2026-11-15',2500,'SGD',TRUE
FROM alumni_profiles a,partners p,countries c WHERE a.alumni_no='ALM2026002' AND p.code='PRT001' AND c.iso2='SG';
INSERT INTO alumni_surveys(code,title,description,start_date,end_date,questions)
VALUES ('SURV-2026','Alumni Employment Survey 2026','Outcome survey','2026-11-01','2026-12-31','[{"id":1,"question":"Employment status?"}]'::jsonb);
INSERT INTO alumni_survey_responses(survey_id,alumni_id,responses)
SELECT s.id,a.id,'{"1":"EMPLOYED"}'::jsonb FROM alumni_surveys s,alumni_profiles a WHERE s.code='SURV-2026' AND a.alumni_no='ALM2026002';
INSERT INTO alumni_mentors(alumni_id,expertise,availability_notes,mentor_status)
SELECT id,'Front Office & International Career','Monthly online mentoring','ACTIVE' FROM alumni_profiles WHERE alumni_no='ALM2026002';
INSERT INTO alumni_engagements(alumni_id,engagement_type,engagement_date,title,description,points)
SELECT id,'MENTORING','2026-12-10','Career Sharing Session','International career sharing',20 FROM alumni_profiles WHERE alumni_no='ALM2026002';

INSERT INTO approval_workflows(code,name,module,reference_type) VALUES
('WF-EXP','Expense Approval','Finance','expenses'),('WF-REF','Refund Approval','Finance','refunds');
INSERT INTO approval_steps(workflow_id,step_no,role_id,minimum_amount,is_required)
SELECT w.id,1,r.id,0,TRUE FROM approval_workflows w,roles r WHERE w.code='WF-EXP' AND r.code='FINANCE';
INSERT INTO approval_steps(workflow_id,step_no,role_id,minimum_amount,is_required)
SELECT w.id,2,r.id,3000000,TRUE FROM approval_workflows w,roles r WHERE w.code='WF-EXP' AND r.code='DIRECTOR';
INSERT INTO approval_requests(workflow_id,requested_by,reference_type,reference_id,amount,current_step_no,status,requested_at,completed_at)
SELECT w.id,u.id,'expenses',e.id,e.amount,2,'APPROVED','2026-10-10 09:00+07','2026-10-10 12:00+07'
FROM approval_workflows w,users u,expenses e WHERE w.code='WF-EXP' AND u.username='alya.academic' AND e.expense_no='EXP-001';
INSERT INTO approval_actions(approval_request_id,step_no,actor_user_id,action,notes)
SELECT a.id,1,u.id,'APPROVE','Approved by Finance' FROM approval_requests a,users u WHERE a.reference_type='expenses' AND u.username='rizky.finance';

INSERT INTO notifications(user_id,channel,title,body,reference_type,reference_id,status,sent_at)
SELECT u.id,'IN_APP','Outstanding Payment','Ada invoice overdue.','student_invoices',i.id,'SENT',NOW()
FROM users u,student_invoices i WHERE u.username='rizky.finance' AND i.status='OVERDUE' LIMIT 1;
INSERT INTO audit_logs(user_id,module,action,table_name,record_id,old_values,new_values,ip_address,user_agent)
SELECT u.id,'Admission','UPDATE_STATUS','applicants',a.id,'{"status":"INTERVIEW"}'::jsonb,'{"status":"ACCEPTED"}'::jsonb,'127.0.0.1','Dummy Browser'
FROM users u,applicants a WHERE u.username='sari.admin' AND a.registration_no='ADM-2026-005';

INSERT INTO report_definitions(code,name,module,description,query_key,default_format) VALUES
('RPT-ADM','Laporan Pendaftaran','Admission','Admission summary','admission_summary','TABLE'),
('RPT-FIN','Laporan Keuangan','Finance','Finance summary','finance_summary','CHART'),
('RPT-STD','Laporan Student','Student','Student summary','student_summary','TABLE'),
('RPT-ASM','Laporan Assessment','Assessment','Assessment summary','assessment_summary','TABLE'),
('RPT-PLC','Laporan Placement','Placement','Placement summary','placement_summary','CHART'),
('RPT-ALM','Laporan Alumni','Alumni','Alumni summary','alumni_summary','TABLE');
INSERT INTO scheduled_reports(report_definition_id,owner_user_id,schedule_expression,delivery_channel,recipients,parameters,is_active,next_run_at)
SELECT r.id,u.id,'0 7 1 * *','EMAIL','["director@idea-demo.local"]'::jsonb,'{"branch":"ALL"}'::jsonb,TRUE,'2026-11-01 07:00+07'
FROM report_definitions r,users u WHERE r.code='RPT-ADM' AND u.username='sari.admin';
INSERT INTO export_logs(report_definition_id,requested_by,export_format,parameters,file_url,status,completed_at)
SELECT r.id,u.id,'XLSX','{"period":"2026-10"}'::jsonb,'/dummy/admission.xlsx','COMPLETED',NOW()
FROM report_definitions r,users u WHERE r.code='RPT-ADM' AND u.username='sari.admin';

INSERT INTO dashboard_widgets(code,title,module,widget_type,data_source_key) VALUES
('KPI_APP','Applicants','Dashboard','KPI','kpi_applicants'),
('KPI_STU','Active Students','Dashboard','KPI','kpi_active_students'),
('KPI_REV','Revenue','Dashboard','KPI','kpi_revenue'),
('KPI_READY','Placement Ready','Dashboard','KPI','kpi_placement_ready'),
('ADM_FUNNEL','Admission Funnel','Admission','FUNNEL','admission_funnel'),
('FIN_CHART','Revenue vs Expense','Finance','BAR','finance_revenue_expense'),
('ASM_DONUT','Assessment Status','Assessment','DONUT','assessment_status'),
('PLC_FUNNEL','Placement Pipeline','Placement','FUNNEL','placement_pipeline');
INSERT INTO user_dashboard_widgets(user_id,widget_id,position_no)
SELECT u.id,w.id,ROW_NUMBER() OVER(ORDER BY w.id) FROM users u CROSS JOIN dashboard_widgets w WHERE u.username='eko.director' AND w.module='Dashboard';

INSERT INTO integration_configs(company_id,code,integration_type,provider_name,base_url,credentials,settings)
SELECT id,'INT-WA','WHATSAPP','Demo WA Gateway','https://api.example.test/wa','{"token":"DUMMY"}'::jsonb,'{}'::jsonb FROM companies WHERE code='IDEA';
INSERT INTO integration_configs(company_id,code,integration_type,provider_name,base_url,credentials,settings)
SELECT id,'INT-PG','PAYMENT_GATEWAY','Demo Payment Gateway','https://api.example.test/pay','{"secret":"DUMMY"}'::jsonb,'{}'::jsonb FROM companies WHERE code='IDEA';
INSERT INTO webhook_logs(integration_config_id,direction,event_name,payload,response_code,response_body,status)
SELECT id,'INBOUND','payment.paid','{"invoice":"INV-001","amount":18000000}'::jsonb,200,'OK','PROCESSED' FROM integration_configs WHERE code='INT-PG';

-- Dashboard views
CREATE OR REPLACE VIEW v_admission_pipeline AS
SELECT branch_id,
COUNT(*) total_applicants,
COUNT(*) FILTER(WHERE admission_status IN ('VERIFICATION','INTERVIEW','ACCEPTED','REGISTRATION','PAYMENT_VERIFICATION','ENROLLED')) verified_or_beyond,
COUNT(*) FILTER(WHERE admission_status IN ('INTERVIEW','ACCEPTED','REGISTRATION','PAYMENT_VERIFICATION','ENROLLED')) interview_or_beyond,
COUNT(*) FILTER(WHERE admission_status IN ('ACCEPTED','REGISTRATION','PAYMENT_VERIFICATION','ENROLLED')) accepted_or_beyond,
COUNT(*) FILTER(WHERE admission_status='ENROLLED') enrolled
FROM applicants GROUP BY branch_id;

CREATE OR REPLACE VIEW v_student_finance_summary AS
SELECT s.id student_id,s.student_no,p.full_name,pr.name program_name,
COALESCE(SUM(i.total_amount),0) total_billing,
COALESCE(SUM(i.paid_amount),0) total_paid,
COALESCE(SUM(i.outstanding_amount),0) total_outstanding
FROM students s JOIN persons p ON p.id=s.person_id JOIN programs pr ON pr.id=s.program_id
LEFT JOIN student_invoices i ON i.student_id=s.id
GROUP BY s.id,s.student_no,p.full_name,pr.name;

CREATE OR REPLACE VIEW v_student_readiness_latest AS
SELECT DISTINCT ON (r.student_id) r.student_id,s.student_no,p.full_name,r.calculated_date,
r.academic_score,r.competency_score,r.english_score,r.attendance_score,r.attitude_score,r.document_score,
r.overall_score,r.readiness_status
FROM readiness_scores r JOIN students s ON s.id=r.student_id JOIN persons p ON p.id=s.person_id
ORDER BY r.student_id,r.calculated_date DESC;

CREATE OR REPLACE VIEW v_placement_pipeline AS
SELECT
COUNT(*) FILTER(WHERE candidate_status IN ('READY','MATCHED','SUBMITTED','INTERVIEW','ACCEPTED','PLACED')) ready,
COUNT(*) FILTER(WHERE candidate_status IN ('MATCHED','SUBMITTED','INTERVIEW','ACCEPTED','PLACED')) matched,
COUNT(*) FILTER(WHERE candidate_status IN ('SUBMITTED','INTERVIEW','ACCEPTED','PLACED')) submitted,
COUNT(*) FILTER(WHERE candidate_status IN ('INTERVIEW','ACCEPTED','PLACED')) interview,
COUNT(*) FILTER(WHERE candidate_status IN ('ACCEPTED','PLACED')) accepted,
COUNT(*) FILTER(WHERE candidate_status='PLACED') placed
FROM placement_candidates;

CREATE OR REPLACE VIEW v_partner_performance AS
SELECT p.id partner_id,p.code,p.name,pc.name category,
COUNT(DISTINCT jd.id) FILTER(WHERE jd.status IN ('OPEN','IN_PROGRESS')) open_job_demands,
COUNT(DISTINCT ja.id) candidate_applications,COUNT(DISTINCT pl.id) successful_placements
FROM partners p JOIN partner_categories pc ON pc.id=p.category_id
LEFT JOIN job_demands jd ON jd.partner_id=p.id
LEFT JOIN job_applications ja ON ja.job_demand_id=jd.id
LEFT JOIN placements pl ON pl.partner_id=p.id
GROUP BY p.id,p.code,p.name,pc.name;

CREATE OR REPLACE VIEW v_executive_dashboard AS
SELECT
(SELECT COUNT(*) FROM applicants) total_applicants,
(SELECT COUNT(*) FROM students WHERE student_status='ACTIVE') active_students,
(SELECT COALESCE(SUM(amount),0) FROM payments WHERE verification_status='VERIFIED') cash_in,
(SELECT COALESCE(SUM(outstanding_amount),0) FROM student_invoices WHERE status IN ('UNPAID','PARTIAL','OVERDUE')) outstanding_payment,
(SELECT COUNT(*) FROM v_student_readiness_latest WHERE readiness_status='PLACEMENT_READY') placement_ready,
(SELECT COUNT(*) FROM placements) placed_students,
CASE WHEN (SELECT COUNT(*) FROM placement_candidates)=0 THEN 0
ELSE ROUND((SELECT COUNT(*) FROM placements)::numeric*100/(SELECT COUNT(*) FROM placement_candidates),2) END placement_rate_percent,
(SELECT COUNT(*) FROM partners WHERE partnership_status='ACTIVE') active_partners,
(SELECT COUNT(*) FROM alumni_profiles) total_alumni;

COMMIT;
