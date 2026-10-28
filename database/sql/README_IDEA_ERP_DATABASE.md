# IDEA Integrated ERP PostgreSQL Database

Database ini mengakomodasi menu:
- Dashboard / Single Executive Dashboard
- Admission
- Finance & Accounting
- Student Management & Training
- Assessment & Certification
- Career & Placement
- Partners
- Alumni
- Reports & Analytics
- Master Data
- Users & Access
- Settings, Approval, Notification, Audit Trail
- Integrasi / Webhook

Jumlah tabel: 114

## Files
- idea_erp_postgresql_schema.sql
- idea_erp_postgresql_seed.sql
- idea_erp_postgresql_full.sql

## Import
```bash
createdb idea_erp
psql -d idea_erp -f idea_erp_postgresql_full.sql
```

## Prinsip desain
`persons` adalah master identitas. Applicant, Student, Placement Candidate, dan Alumni tetap merujuk ke orang yang sama, sehingga histori Admission -> Student -> Assessment -> Placement -> Alumni tidak terputus.

## Dashboard views
- v_executive_dashboard
- v_admission_pipeline
- v_student_finance_summary
- v_student_readiness_latest
- v_placement_pipeline
- v_partner_performance

## Dummy users
- sari.admin
- rizky.finance
- alya.academic
- budi.assessment
- dimas.placement
- eko.director

`password_hash` adalah placeholder, bukan password valid. Gunakan hashing dari aplikasi (mis. Laravel) saat membuat akun aktual.

Semua data seed adalah data fiktif untuk development/demo.
