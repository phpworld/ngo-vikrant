<?= $this->extend('member/layout') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-heart me-2 text-danger"></i>विवाह सहायता आवेदन
            </h1>
            <p class="text-muted mb-0">विवाह सहायता के लिए आवेदन फॉर्म भरें</p>
        </div>
    </div>
</div>

<!-- Application Form -->
<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-gradient-primary text-white">
                <h5 class="mb-0">
                    <i class="fas fa-form me-2"></i>विवाह सहायता आवेदन फॉर्म
                </h5>
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fas fa-check-circle me-2"></i>
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <form action="/member/apply-vivah-help" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    
                    <!-- Personal Information -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-user me-2"></i>व्यक्तिगत जानकारी
                        </h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">आवेदक का नाम <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?= $validation->hasError('applicant_name') ? 'is-invalid' : '' ?>" 
                                       name="applicant_name" value="<?= old('applicant_name') ?>" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('applicant_name') ?>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">पिता का नाम <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?= $validation->hasError('father_name') ? 'is-invalid' : '' ?>" 
                                       name="father_name" value="<?= old('father_name') ?>" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('father_name') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">माता का नाम <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?= $validation->hasError('mother_name') ? 'is-invalid' : '' ?>" 
                                       name="mother_name" value="<?= old('mother_name') ?>" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('mother_name') ?>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">फोन नंबर <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control <?= $validation->hasError('phone') ? 'is-invalid' : '' ?>" 
                                       name="phone" value="<?= old('phone') ?>" maxlength="10" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('phone') ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">पूरा पता <span class="text-danger">*</span></label>
                            <textarea class="form-control <?= $validation->hasError('address') ? 'is-invalid' : '' ?>" 
                                      name="address" rows="3" required><?= old('address') ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('address') ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">आधार नंबर <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?= $validation->hasError('aadhar_number') ? 'is-invalid' : '' ?>" 
                                       name="aadhar_number" value="<?= old('aadhar_number') ?>" maxlength="12" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('aadhar_number') ?>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">आय प्रमाण पत्र नंबर</label>
                                <input type="text" class="form-control" name="income_certificate" value="<?= old('income_certificate') ?>">
                            </div>
                        </div>
                    </div>

                    <!-- Bank Information -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-university me-2"></i>बैंक जानकारी
                        </h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">बैंक खाता संख्या <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?= $validation->hasError('bank_account') ? 'is-invalid' : '' ?>" 
                                       name="bank_account" value="<?= old('bank_account') ?>" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('bank_account') ?>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">IFSC कोड <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?= $validation->hasError('ifsc_code') ? 'is-invalid' : '' ?>" 
                                       name="ifsc_code" value="<?= old('ifsc_code') ?>" maxlength="11" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ifsc_code') ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Application Details -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-file-alt me-2"></i>आवेदन विवरण
                        </h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">सहायता राशि (रुपये में) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control <?= $validation->hasError('application_amount') ? 'is-invalid' : '' ?>" 
                                       name="application_amount" value="<?= old('application_amount') ?>" min="1" max="50000" required>
                                <div class="form-text">अधिकतम राशि: ₹50,000</div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('application_amount') ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">आवेदन का कारण <span class="text-danger">*</span></label>
                            <textarea class="form-control <?= $validation->hasError('application_reason') ? 'is-invalid' : '' ?>" 
                                      name="application_reason" rows="4" required 
                                      placeholder="कृपया विस्तार से बताएं कि आपको विवाह सहायता की आवश्यकता क्यों है..."><?= old('application_reason') ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('application_reason') ?>
                            </div>
                        </div>
                    </div>

                    <!-- Documents Upload -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-paperclip me-2"></i>आवश्यक दस्तावेज
                        </h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">आधार कार्ड</label>
                                <input type="file" class="form-control" name="aadhar_document" accept=".jpg,.jpeg,.png,.pdf">
                                <div class="form-text">स्वीकृत फाइल: JPG, PNG, PDF</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">आय प्रमाण पत्र</label>
                                <input type="file" class="form-control" name="income_document" accept=".jpg,.jpeg,.png,.pdf">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">बैंक पासबुक</label>
                                <input type="file" class="form-control" name="bank_document" accept=".jpg,.jpeg,.png,.pdf">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">अन्य दस्तावेज</label>
                                <input type="file" class="form-control" name="other_documents" accept=".jpg,.jpeg,.png,.pdf">
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-paper-plane me-2"></i>आवेदन जमा करें
                        </button>
                        <a href="/member/applications" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-arrow-left me-2"></i>वापस जाएं
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Information Panel -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-info text-white">
                <h6 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>महत्वपूर्ण जानकारी
                </h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6 class="text-primary">पात्रता शर्तें:</h6>
                    <ul class="list-unstyled small">
                        <li><i class="fas fa-check text-success me-2"></i>आवेदक की उम्र 18 वर्ष से अधिक होनी चाहिए</li>
                        <li><i class="fas fa-check text-success me-2"></i>पारिवारिक आय ₹2,00,000 प्रति वर्ष से कम होनी चाहिए</li>
                        <li><i class="fas fa-check text-success me-2"></i>सभी दस्तावेज सत्यापित होने चाहिए</li>
                    </ul>
                </div>
                <div class="mb-3">
                    <h6 class="text-primary">आवश्यक दस्तावेज:</h6>
                    <ul class="list-unstyled small">
                        <li><i class="fas fa-file text-info me-2"></i>आधार कार्ड</li>
                        <li><i class="fas fa-file text-info me-2"></i>आय प्रमाण पत्र</li>
                        <li><i class="fas fa-file text-info me-2"></i>बैंक पासबुक</li>
                        <li><i class="fas fa-file text-info me-2"></i>विवाह कार्ड (यदि उपलब्ध हो)</li>
                    </ul>
                </div>
                <div class="alert alert-warning">
                    <small>
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        कृपया सभी जानकारी सही और पूर्ण भरें। गलत जानकारी देने पर आवेदन रद्द हो सकता है।
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>