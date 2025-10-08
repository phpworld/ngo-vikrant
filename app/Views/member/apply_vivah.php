<?= $this->extend('member/layout') ?>

<?= $this->section('content') ?>

<!-- Enhanced Styles for Vivah Application Form -->
<style>
.application-header {
    background: linear-gradient(135deg, #ff6b6b, #ee5a6f);
    border-radius: 20px;
    padding: 2rem;
    color: white;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
}

.application-header::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50px;
    width: 200px;
    height: 200px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
}

.form-section {
    background: #fff;
    border-radius: 15px;
    padding: 2rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    border: none;
    transition: all 0.3s ease;
}

.form-section:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
}

.section-title {
    color: #2c5aa0;
    font-weight: 700;
    font-size: 1.2rem;
    margin-bottom: 1.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 3px solid #e3f2fd;
    position: relative;
}

.section-title::before {
    content: '';
    position: absolute;
    bottom: -3px;
    left: 0;
    width: 60px;
    height: 3px;
    background: linear-gradient(135deg, #ff6b6b, #ee5a6f);
    border-radius: 2px;
}

.form-floating {
    margin-bottom: 1.5rem;
}

.form-floating .form-control {
    border-radius: 12px;
    border: 2px solid #e1e5e9;
    padding: 1rem 0.75rem;
    height: auto;
    transition: all 0.3s ease;
}

.form-floating .form-control:focus {
    border-color: #ff6b6b;
    box-shadow: 0 0 0 0.25rem rgba(255, 107, 107, 0.15);
}

.form-floating label {
    color: #6c757d;
    font-weight: 500;
}

.btn-submit {
    background: linear-gradient(135deg, #ff6b6b, #ee5a6f);
    border: none;
    border-radius: 12px;
    padding: 1rem 2.5rem;
    font-weight: 600;
    font-size: 1.1rem;
    color: white;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
}

.btn-submit:hover {
    background: linear-gradient(135deg, #ee5a6f, #d63447);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(255, 107, 107, 0.4);
    color: white;
}

.btn-back {
    background: transparent;
    border: 2px solid #6c757d;
    border-radius: 12px;
    padding: 1rem 2rem;
    font-weight: 600;
    color: #6c757d;
    transition: all 0.3s ease;
}

.btn-back:hover {
    background: #6c757d;
    color: white;
    transform: translateY(-2px);
}

.info-panel {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    border: none;
    position: sticky;
    top: 2rem;
}

.info-header {
    background: linear-gradient(135deg, #17a2b8, #138496);
    color: white;
    border-radius: 15px 15px 0 0;
    padding: 1.5rem;
}

.info-body {
    padding: 2rem;
}

.eligibility-item, .document-item {
    display: flex;
    align-items: center;
    padding: 0.75rem 0;
    border-bottom: 1px solid #f1f3f4;
}

.eligibility-item:last-child, .document-item:last-child {
    border-bottom: none;
}

.file-upload-area {
    border: 2px dashed #dee2e6;
    border-radius: 12px;
    padding: 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
    background: #f8f9fa;
}

.file-upload-area:hover {
    border-color: #ff6b6b;
    background: rgba(255, 107, 107, 0.05);
}

.file-upload-area .form-control {
    border: none;
    background: transparent;
}

.required-star {
    color: #dc3545;
    font-weight: bold;
}

.form-text {
    font-size: 0.85rem;
    color: #6c757d;
    margin-top: 0.5rem;
}

@media (max-width: 992px) {
    .info-panel {
        position: static;
        margin-top: 2rem;
    }
    
    .application-header {
        padding: 1.5rem;
    }
    
    .form-section {
        padding: 1.5rem;
    }
}

@media (max-width: 768px) {
    .application-header {
        padding: 1rem;
        margin-bottom: 1rem;
    }
    
    .form-section {
        padding: 1rem;
        margin-bottom: 1rem;
    }
    
    .btn-submit, .btn-back {
        width: 100%;
        margin-bottom: 0.5rem;
    }
}
</style>

<!-- Application Header -->
<div class="application-header">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h1 class="h2 mb-2 fw-bold">
                <i class="fas fa-heart me-3"></i>विवाह सहायता आवेदन
            </h1>
            <p class="mb-0 opacity-90 fs-5">
                अपने विवाह के लिए सहायता राशि हेतु आवेदन फॉर्म भरें
            </p>
        </div>
        <div class="col-md-4 text-md-end">
            <div class="badge bg-light text-dark fs-6 px-3 py-2">
                <i class="fas fa-clock me-2"></i>अधिकतम राशि: ₹50,000
            </div>
        </div>
    </div>
</div>

<!-- Flash Messages -->
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 shadow-sm">
        <div class="d-flex align-items-center">
            <i class="fas fa-check-circle me-3 fa-lg"></i>
            <div>
                <strong>सफल!</strong> <?= session()->getFlashdata('success') ?>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show rounded-4 border-0 shadow-sm">
        <div class="d-flex align-items-center">
            <i class="fas fa-exclamation-circle me-3 fa-lg"></i>
            <div>
                <strong>त्रुटि!</strong> <?= session()->getFlashdata('error') ?>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="row">
    <!-- Application Form -->
    <div class="col-lg-8">
        <form action="/member/apply-vivah-help" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <!-- Personal Information Section -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-user me-2"></i>व्यक्तिगत जानकारी
                </h3>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control <?= $validation->hasError('applicant_name') ? 'is-invalid' : '' ?>" 
                                   id="applicant_name" name="applicant_name" value="<?= old('applicant_name') ?>" required>
                            <label for="applicant_name">आवेदक का नाम <span class="required-star">*</span></label>
                            <?php if ($validation->hasError('applicant_name')): ?>
                                <div class="invalid-feedback"><?= $validation->getError('applicant_name') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control <?= $validation->hasError('father_name') ? 'is-invalid' : '' ?>" 
                                   id="father_name" name="father_name" value="<?= old('father_name') ?>" required>
                            <label for="father_name">पिता का नाम <span class="required-star">*</span></label>
                            <?php if ($validation->hasError('father_name')): ?>
                                <div class="invalid-feedback"><?= $validation->getError('father_name') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control <?= $validation->hasError('mother_name') ? 'is-invalid' : '' ?>" 
                                   id="mother_name" name="mother_name" value="<?= old('mother_name') ?>" required>
                            <label for="mother_name">माता का नाम <span class="required-star">*</span></label>
                            <?php if ($validation->hasError('mother_name')): ?>
                                <div class="invalid-feedback"><?= $validation->getError('mother_name') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="tel" class="form-control <?= $validation->hasError('phone') ? 'is-invalid' : '' ?>" 
                                   id="phone" name="phone" value="<?= old('phone') ?>" maxlength="10" required>
                            <label for="phone">मोबाइल नंबर <span class="required-star">*</span></label>
                            <?php if ($validation->hasError('phone')): ?>
                                <div class="invalid-feedback"><?= $validation->getError('phone') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control <?= $validation->hasError('address') ? 'is-invalid' : '' ?>" 
                                      id="address" name="address" style="height: 100px" required><?= old('address') ?></textarea>
                            <label for="address">पूरा पता <span class="required-star">*</span></label>
                            <?php if ($validation->hasError('address')): ?>
                                <div class="invalid-feedback"><?= $validation->getError('address') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control <?= $validation->hasError('aadhar_number') ? 'is-invalid' : '' ?>" 
                                   id="aadhar_number" name="aadhar_number" value="<?= old('aadhar_number') ?>" maxlength="12" required>
                            <label for="aadhar_number">आधार नंबर <span class="required-star">*</span></label>
                            <?php if ($validation->hasError('aadhar_number')): ?>
                                <div class="invalid-feedback"><?= $validation->getError('aadhar_number') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="income_certificate" 
                                   name="income_certificate" value="<?= old('income_certificate') ?>">
                            <label for="income_certificate">आय प्रमाण पत्र नंबर</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bank Information Section -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-university me-2"></i>बैंक जानकारी
                </h3>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control <?= $validation->hasError('bank_account') ? 'is-invalid' : '' ?>" 
                                   id="bank_account" name="bank_account" value="<?= old('bank_account') ?>" required>
                            <label for="bank_account">बैंक खाता संख्या <span class="required-star">*</span></label>
                            <?php if ($validation->hasError('bank_account')): ?>
                                <div class="invalid-feedback"><?= $validation->getError('bank_account') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control <?= $validation->hasError('ifsc_code') ? 'is-invalid' : '' ?>" 
                                   id="ifsc_code" name="ifsc_code" value="<?= old('ifsc_code') ?>" maxlength="11" required>
                            <label for="ifsc_code">IFSC कोड <span class="required-star">*</span></label>
                            <?php if ($validation->hasError('ifsc_code')): ?>
                                <div class="invalid-feedback"><?= $validation->getError('ifsc_code') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Application Details Section -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-file-alt me-2"></i>आवेदन विवरण
                </h3>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="number" class="form-control <?= $validation->hasError('application_amount') ? 'is-invalid' : '' ?>" 
                                   id="application_amount" name="application_amount" value="<?= old('application_amount') ?>" 
                                   min="1" max="50000" required>
                            <label for="application_amount">सहायता राशि (रुपये में) <span class="required-star">*</span></label>
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>अधिकतम राशि: ₹50,000
                            </div>
                            <?php if ($validation->hasError('application_amount')): ?>
                                <div class="invalid-feedback"><?= $validation->getError('application_amount') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control <?= $validation->hasError('application_reason') ? 'is-invalid' : '' ?>" 
                                      id="application_reason" name="application_reason" style="height: 120px" required 
                                      placeholder="कृपया विस्तार से बताएं कि आपको विवाह सहायता की आवश्यकता क्यों है..."><?= old('application_reason') ?></textarea>
                            <label for="application_reason">आवेदन का कारण <span class="required-star">*</span></label>
                            <?php if ($validation->hasError('application_reason')): ?>
                                <div class="invalid-feedback"><?= $validation->getError('application_reason') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Documents Upload Section -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-paperclip me-2"></i>आवश्यक दस्तावेज अपलोड करें
                </h3>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="file-upload-area">
                            <i class="fas fa-id-card fa-2x text-primary mb-2"></i>
                            <h6 class="mb-2">आधार कार्ड</h6>
                            <input type="file" class="form-control <?= $validation->hasError('aadhar_document') ? 'is-invalid' : '' ?>" 
                                   name="aadhar_document" accept=".jpg,.jpeg,.png,.pdf">
                            <div class="form-text mt-2">
                                <i class="fas fa-file me-1"></i>JPG, PNG, PDF (अधिकतम 2MB)
                            </div>
                            <?php if ($validation->hasError('aadhar_document')): ?>
                                <div class="invalid-feedback"><?= $validation->getError('aadhar_document') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="file-upload-area">
                            <i class="fas fa-file-invoice fa-2x text-success mb-2"></i>
                            <h6 class="mb-2">आय प्रमाण पत्र</h6>
                            <input type="file" class="form-control <?= $validation->hasError('income_document') ? 'is-invalid' : '' ?>" 
                                   name="income_document" accept=".jpg,.jpeg,.png,.pdf">
                            <div class="form-text mt-2">
                                <i class="fas fa-file me-1"></i>JPG, PNG, PDF (अधिकतम 2MB)
                            </div>
                            <?php if ($validation->hasError('income_document')): ?>
                                <div class="invalid-feedback"><?= $validation->getError('income_document') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="file-upload-area">
                            <i class="fas fa-university fa-2x text-info mb-2"></i>
                            <h6 class="mb-2">बैंक पासबुक</h6>
                            <input type="file" class="form-control <?= $validation->hasError('bank_document') ? 'is-invalid' : '' ?>" 
                                   name="bank_document" accept=".jpg,.jpeg,.png,.pdf">
                            <div class="form-text mt-2">
                                <i class="fas fa-file me-1"></i>JPG, PNG, PDF (अधिकतम 2MB)
                            </div>
                            <?php if ($validation->hasError('bank_document')): ?>
                                <div class="invalid-feedback"><?= $validation->getError('bank_document') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="file-upload-area">
                            <i class="fas fa-paperclip fa-2x text-warning mb-2"></i>
                            <h6 class="mb-2">अन्य दस्तावेज</h6>
                            <input type="file" class="form-control <?= $validation->hasError('other_documents') ? 'is-invalid' : '' ?>" 
                                   name="other_documents" accept=".jpg,.jpeg,.png,.pdf">
                            <div class="form-text mt-2">
                                <i class="fas fa-file me-1"></i>JPG, PNG, PDF (अधिकतम 2MB)
                            </div>
                            <?php if ($validation->hasError('other_documents')): ?>
                                <div class="invalid-feedback"><?= $validation->getError('other_documents') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Section -->
            <div class="form-section text-center">
                <div class="d-flex flex-column flex-md-row gap-3 justify-content-center align-items-center">
                    <button type="submit" class="btn btn-submit">
                        <i class="fas fa-paper-plane me-2"></i>आवेदन जमा करें
                    </button>
                    <a href="/member/applications" class="btn btn-back">
                        <i class="fas fa-arrow-left me-2"></i>वापस जाएं
                    </a>
                </div>
                
                <div class="mt-4 p-3 bg-light rounded-3">
                    <small class="text-muted">
                        <i class="fas fa-shield-alt me-2 text-primary"></i>
                        आपकी सभी जानकारी सुरक्षित है और केवल आवेदन प्रक्रिया के लिए उपयोग की जाएगी।
                    </small>
                </div>
            </div>
        </form>
    </div>

    <!-- Information Panel -->
    <div class="col-lg-4">
        <div class="info-panel">
            <div class="info-header">
                <h5 class="mb-0 fw-bold">
                    <i class="fas fa-info-circle me-2"></i>महत्वपूर्ण जानकारी
                </h5>
            </div>
            <div class="info-body">
                <div class="mb-4">
                    <h6 class="text-primary fw-bold mb-3">
                        <i class="fas fa-check-circle me-2"></i>पात्रता शर्तें
                    </h6>
                    <div class="eligibility-item">
                        <i class="fas fa-user-check text-success me-3"></i>
                        <span>आवेदक की उम्र 18 वर्ष से अधिक होनी चाहिए</span>
                    </div>
                    <div class="eligibility-item">
                        <i class="fas fa-rupee-sign text-success me-3"></i>
                        <span>पारिवारिक आय ₹2,00,000 प्रति वर्ष से कम होनी चाहिए</span>
                    </div>
                    <div class="eligibility-item">
                        <i class="fas fa-file-check text-success me-3"></i>
                        <span>सभी दस्तावेज सत्यापित होने चाहिए</span>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h6 class="text-primary fw-bold mb-3">
                        <i class="fas fa-folder-open me-2"></i>आवश्यक दस्तावेज
                    </h6>
                    <div class="document-item">
                        <i class="fas fa-id-card text-primary me-3"></i>
                        <span>आधार कार्ड</span>
                    </div>
                    <div class="document-item">
                        <i class="fas fa-file-invoice text-primary me-3"></i>
                        <span>आय प्रमाण पत्र</span>
                    </div>
                    <div class="document-item">
                        <i class="fas fa-university text-primary me-3"></i>
                        <span>बैंक पासबुक</span>
                    </div>
                    <div class="document-item">
                        <i class="fas fa-heart text-primary me-3"></i>
                        <span>विवाह कार्ड (यदि उपलब्ध हो)</span>
                    </div>
                </div>
                
                <div class="alert alert-warning border-0 rounded-3">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-exclamation-triangle me-3 mt-1"></i>
                        <div>
                            <strong>सावधानी:</strong><br>
                            <small>कृपया सभी जानकारी सही और पूर्ण भरें। गलत जानकारी देने पर आवेदन रद्द हो सकता है।</small>
                        </div>
                    </div>
                </div>
                
                <div class="mt-3 p-3 bg-light rounded-3 text-center">
                    <small class="text-muted">
                        <i class="fas fa-clock me-2"></i>
                        आवेदन प्रक्रिया में <strong>3-5 कार्य दिवस</strong> लग सकते हैं
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>