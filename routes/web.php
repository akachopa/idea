<?php

use App\Http\Controllers\ErpController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ErpController::class, 'dashboard'])->name('erp.dashboard');
Route::get('/dashboard', fn () => redirect()->route('erp.dashboard'));

Route::get('/admission', [ErpController::class, 'admission'])->name('erp.admission');
Route::post('/admission', [ErpController::class, 'storeApplicant'])->name('erp.admission.store');
Route::post('/admission/{id}/status', [ErpController::class, 'updateApplicantStatus'])->name('erp.admission.status');

Route::get('/finance', [ErpController::class, 'finance'])->name('erp.finance');
Route::post('/finance/invoices', [ErpController::class, 'storeInvoice'])->name('erp.finance.invoice.store');

Route::get('/students', [ErpController::class, 'students'])->name('erp.students');
Route::post('/students', [ErpController::class, 'storeStudent'])->name('erp.students.store');

Route::get('/assessments', [ErpController::class, 'assessments'])->name('erp.assessments');
Route::post('/assessments/certificates', [ErpController::class, 'storeCertificate'])->name('erp.assessments.certificate.store');

Route::get('/placements', [ErpController::class, 'placements'])->name('erp.placements');
Route::post('/placements/vacancies', [ErpController::class, 'storeVacancy'])->name('erp.placements.vacancy.store');

Route::get('/partners', [ErpController::class, 'partners'])->name('erp.partners');
Route::post('/partners', [ErpController::class, 'storePartner'])->name('erp.partners.store');

Route::get('/alumni', [ErpController::class, 'alumni'])->name('erp.alumni');

Route::get('/reports', [ErpController::class, 'reports'])->name('erp.reports');
Route::get('/reports/export/{type?}', [ErpController::class, 'exportReport'])->name('erp.reports.export');

Route::post('/switch-user', [ErpController::class, 'switchUser'])->name('erp.switch-user');
