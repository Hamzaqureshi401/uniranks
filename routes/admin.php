<?php

use App\Http\Controllers\Admin\Account\ExportTransactionController;
use App\Http\Controllers\Admin\Account\TransactionController;
use App\Http\Controllers\Admin\UniversityEvents\CompetitionsController;
use App\Http\Controllers\Admin\UniversityEvents\OpenDaysController;
use App\Http\Controllers\Admin\UniversityEvents\StudentForADayController;
use App\Http\Controllers\Admin\UniversityEvents\WorkshopsController;
use App\Http\Controllers\StripeController;
use App\Models\Fairs\Fair;
use App\Models\School\SchoolSponsoredEvent;

//use PDF;

Route::middleware(['setup-locale', "verify-role:" . implode(',', [AppConst::UNIVERSITY_ADMINISTRATOR, AppConst::UNIVERSITY_REPRESENTATIVE]), 'auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->name('admin.')->group(function () {
        Route::view('/dashboard', 'pages.dashboard')->name('dashboard');
        Route::view('schools-list', 'pages.schools.list')->name('school.list');
        Route::redirect('user/profile', url('admin/profile? t=user-personal-info'))->name('user.profile');
        
        Route::prefix('schools')->name('schools.')->group(function () {

            Route::view('one-to-one-meeting-request', 'pages.schools.one-to-one-meeting-request')->name('one-to-one-meeting-request');
            
             
        });
        Route::prefix('events')->name('events.')->group(function () {
            Route::prefix('workshops')->name('workshops.')->controller(WorkshopsController::class)
                ->group(function () {
                    Route::get('/', 'index');
                    Route::get('list', 'list')->name('list');
                    Route::get('create', 'create')->name('create');
                    Route::get('edit/{event}', 'edit')->name('edit');
                    Route::get('view/{event}', 'view')->name('view');
                    Route::view('registartion', 'pages.university-events.workshops.registartion')->name('registartion');
                });
            Route::prefix('open-days')->name('openDays.')->controller(OpenDaysController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('list', 'list')->name('list');
                Route::get('create', 'create')->name('create');
                Route::get('edit/{event}', 'edit')->name('edit');
                Route::get('view/{event}', 'view')->name('view');
                Route::view('registartion', 'pages.university-events.open-days.registartion')->name('registartion');
            });
            Route::prefix('competitions')->name('competitions.')->controller(CompetitionsController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('list', 'list')->name('list');
                Route::get('create', 'create')->name('create');
                Route::get('edit/{event}', 'edit')->name('edit');
                Route::get('view/{event}', 'view')->name('view');
                Route::view('registartion', 'pages.university-events.competitions.registartion')->name('registartion');
            });
            Route::prefix('student-for-a-days')->name('studentForADays.')->controller(StudentForADayController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('list', 'list')->name('list');
                Route::get('create', 'create')->name('create');
                Route::get('edit/{event}', 'edit')->name('edit');
                Route::get('view/{event}', 'view')->name('view');
                Route::view('registartion', 'pages.university-events.student-for-a-days.registartion')->name('registartion');
            });
        });
        Route::prefix('school-fairs')->name('schoolFairs.')->group(function () {
            Route::get('/', fn() => redirect()->route('admin.schoolFairs.fair.list'))->name('show');
            Route::prefix('fair')->name('fair.')->group(function () {
                Route::get('/', fn() => redirect()->route('admin.schoolFairs.fair.list'))->name('show');
                Route::view('list', 'pages.school-fairs.fairs.list')->name('list');
                Route::get('details/{fair}', fn(Fair $fair) => view('pages.school-fairs.fairs.view-details', compact('fair')))->name('view');
            });
            Route::prefix('career-talks')->name('careerTalks.')->group(function () {
                Route::get('/', fn() => redirect()->route('admin.schoolFairs.careerTalks.list'))->name('show');
                Route::view('list', 'pages.school-fairs.career-talks.list')->name('list');
                Route::get('details/{fair}', fn(Fair $fair) => view('pages.school-fairs.career-talks.view-details', compact('fair')))->name('view');

            });
        });

        Route::prefix('sponsored-event')->name('sponsored.')->group(function () {
            Route::get('/', fn() => redirect()->route('admin.sponsored.list'))->name('show');
            Route::view('list', 'pages.sponsored-events.list')->name('list');
            Route::get('details/{event}', fn(SchoolSponsoredEvent $event) => view('pages.sponsored-events.view-details', compact('event')))->name('view');
        });
        Route::prefix('leads')->name('leads.')->group(function () {
            Route::get('/', fn() => redirect()->route('admin.leads.owned'))->name('show');
            Route::view('owned', 'pages.leads.owned')->name('owned');
            Route::view('repository', 'pages.leads.repository')->name('repository');
        });

        Route::name('account.')->prefix('account')->group(function () {
            Route::get('/', fn() => redirect()->route('admin.account.top-up'))->name('show');
            Route::view('top-up', 'pages.account.top-up-account')->name('topUp');
            Route::view('invoices-list', 'pages.account.invoices-list')->name('invoicesList');
            Route::view('event-credits', 'pages.account.event-credits')->name('eventCredits');
            Route::view('repository-transactions', 'pages.account.repository-transactions')->name('repositoryTransactions');
            Route::view('event-packages', 'pages.account.event-packages')->name('eventPackages');
            Route::get('invoice/{invoice}', [TransactionController::class, 'viewInvoice'])->name('viewInvoice');
            Route::get('invoice/{invoice}/download', [TransactionController::class, 'downloadInvoice'])->name('downloadInvoice');
            Route::get('receipt/{receipt}', [TransactionController::class, 'viewReceipt'])->name('viewReceipt');
            Route::get('receipt/{receipt}/download', [TransactionController::class, 'downloadReceipt'])->name('downloadReceipt');
            Route::prefix('export')->name('export.')->group(function () {
                Route::prefix('excel')->name('excel.')->group(function () {
                    Route::get('invoices', [ExportTransactionController::class, 'exportInvoices'])->name('invoices');
                    Route::get('event-credits', [ExportTransactionController::class, 'exportEventCredits'])->name('eventCredits');
                    Route::get('repository-transactions', [ExportTransactionController::class, 'exportRepositoryTransactions'])->name('repositoryTransactions');
                });
                Route::prefix('pdf')->name('pdf.')->group(function () {
                    Route::get('invoices', [ExportTransactionController::class, 'exportInvoicesPdf'])->name('invoices');
                    Route::get('event-credits', [ExportTransactionController::class, 'exportEventCreditsPdf'])->name('eventCredits');
                    Route::get('repository-transactions', [ExportTransactionController::class, 'exportRepositoryTransactionsPdf'])->name('repositoryTransactions');
                });
            });
            Route::prefix('payment')->name('payment.')->group(function () {
                Route::get('success/{invoice}', [StripeController::class, 'success'])
                    ->middleware('signed')
                    ->name('success');
                Route::get('cancel/{invoice}', [StripeController::class, 'cancel'])->middleware('signed')->name('cancel');
                Route::get('stripe/{invoice}', [StripeController::class, 'stripe']);
                Route::post('stripe/{invoice}', [StripeController::class, 'stripePost'])->name('stripe.post');
            });
        });

        Route::prefix('media')->name('media.')->group(function () {
            Route::get('/', fn() => redirect()->route('admin.media.photos'))->name('show');
            Route::view('photo-galleries', 'pages.media.university-photo-galleries')->name('photos');
            Route::view('video-galleries', 'pages.media.university-video-galleries')->name('videos');
            Route::view('panorama-galleries', 'pages.media.university-panorama-galleries')->name('panoramas');
        });

        Route::prefix('university')->name('university.')->group(function () {
            Route::get('/', fn() => redirect()->route('admin.university.mainInfo'))->name('show');

            Route::prefix('information')->group(function () {
                Route::get('/', fn() => redirect()->route('admin.university.mainInfo'))->name('show');
                Route::view('main-info', 'pages.university.main-info')->name('mainInfo');
                Route::view('set-logo', 'pages.university.set-logo')->name('setLogo');
                Route::view('domains', 'pages.university.domains')->name('domains');
                Route::view('quick-view', 'pages.university.quick-view')->name('quickView');
                Route::view('about', 'pages.university.about')->name('about');
                Route::view('front-banners', 'pages.university.front-banners')->name('frontBanners');
                Route::view('front-videos', 'pages.university.front-videos')->name('frontVideos');
                Route::view('social-media', 'pages.university.social-media')->name('socialMedia');
                Route::view('academics', 'pages.university.academics')->name('academics');
                Route::view('conference', 'pages.university.university-conferences')->name('university-conferences');
                Route::view('research-output-data', 'pages.university.research-output-data')->name('research-output-data');
                Route::view('confirm-one-to-one-meeting', 'pages.university.confirm-one-to-one-meeting')->name('confirm-one-to-one-meeting');
                Route::view('location-and-branches', 'pages.university.location-and-branches')->name('location-and-branches');
                
            });

            Route::prefix('facilities')->group(function () {
                Route::get('/', fn() => redirect()->route('admin.university.mainBuilding'))->name('show');
                Route::view('main-building', 'pages.university-facilities.main-building')->name('mainBuilding');
                Route::view('sports', 'pages.university-facilities.sports')->name('sports');
                Route::view('labs', 'pages.university-facilities.labs')->name('labs');
                Route::view('housing', 'pages.university-facilities.housing')->name('housing');
                Route::view('transport', 'pages.university-facilities.transport')->name('transport');
                Route::view('student-life', 'pages.university-facilities.student-life')->name('studentLife');
                Route::view('student-support', 'pages.university-facilities.student-support')->name('studentSupport');
            });

            Route::prefix('admissions')->group(function () {
                Route::get('/', fn() => redirect()->route('admin.university.mainBuilding'))->name('show');
                Route::view('semesters', 'pages.university-admissions.semesters')->name('semesters');
                Route::view('semesters-And-Admission-Sessions', 'pages.university-admissions.admissions-semesters-and-admission-sessions')->name('admissionsSemestersAdmissionSessions');
                Route::view('sessions', 'pages.university-admissions.sessions')->name('sessions');
                Route::view('fee-structure', 'pages.university-admissions.fee-structure')->name('feeStructure');
                Route::view('accreditation-agencies', 'pages.university-admissions.accreditation-agencies')->name('accreditationAgencies');
                Route::view('degrees', 'pages.university-admissions.degrees')->name('degrees');
                Route::view('faculties', 'pages.university-admissions.faculties')->name('faculties');
                Route::view('programs', 'pages.university-admissions.programs')->name('programs');
                Route::view('financial-aid', 'pages.university-admissions.financial-aid')->name('financialAid');
                Route::view('scholarships', 'pages.university-admissions.scholarships')->name('scholarships');
                Route::prefix('admission-requirements')->name('admissionRequirements.')->group(function () {
                    Route::view('/', 'pages.university-admissions.admissionRequirements.description')->name('show');
                    Route::view('education-documents', 'pages.university-admissions.admissionRequirements.doc-education')->name('education');
                    Route::view('travel-documents', 'pages.university-admissions.admissionRequirements.doc-travel')->name('travel');
                    Route::view('other-documents', 'pages.university-admissions.admissionRequirements.doc-others')->name('others');

                    Route::prefix('previous-grades')->name('previousGrades.')->group(function () {
                        Route::get('/', fn() => redirect()->route('admin.university.admissionRequirements.previousGrades.undergraduate'))->name('show');
                        Route::view('undergraduate', 'pages.university-admissions.admissionRequirements.previousGrades.undergraduate')->name('undergraduate');
                        Route::view('postgraduate', 'pages.university-admissions.admissionRequirements.previousGrades.postgraduate')->name('postgraduate');
                        Route::view('phd', 'pages.university-admissions.admissionRequirements.previousGrades.phd')->name('phd');

                    });

                    Route::prefix('test-english')->name('englishTest.')->group(function () {
                        Route::get('/', fn() => redirect()->route('admin.university.admissionRequirements.englishTest.undergraduate'))->name('show');
                        Route::view('undergraduate', 'pages.university-admissions.admissionRequirements.englishTest.undergraduate')->name('undergraduate');
                        Route::view('postgraduate', 'pages.university-admissions.admissionRequirements.englishTest.postgraduate')->name('postgraduate');
                        Route::view('phd', 'pages.university-admissions.admissionRequirements.englishTest.phd')->name('phd');

                    });

                    Route::prefix('entry-test')->name('entryTest.')->group(function () {
                        Route::get('/', fn() => redirect()->route('admin.university.admissionRequirements.entryTest.undergraduate'))->name('show');
                        Route::view('undergraduate', 'pages.university-admissions.admissionRequirements.entryTest.undergraduate')->name('undergraduate');
                        Route::view('postgraduate', 'pages.university-admissions.admissionRequirements.entryTest.postgraduate')->name('postgraduate');
                        Route::view('phd', 'pages.university-admissions.admissionRequirements.entryTest.phd')->name('phd');

                    });
                });

            });
        });

        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/', fn() => redirect()->route('admin.user.profile'))->name('show');
            Route::view('profile', 'pages.user.user-information')->name('profile');
            Route::view('emails', 'pages.user.user-emails')->name('emails');
            Route::view('phone-number', 'pages.user.user-phone-number')->name('phoneNumber');
            Route::view('password', 'pages.user.user-password')->name('password');
            Route::view('sessions', 'pages.user.active-sessions')->name('sessions');
        });
    });
