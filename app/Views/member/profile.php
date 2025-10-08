<?= $this->extend('member/layout') ?>

<?= $this->section('content') ?>

<!-- Enhanced Styles for Profile Page -->
<style>
.profile-header {
    background: linear-gradient(135deg, #4CAF50, #45a049);
    border-radius: 20px;
    padding: 2rem;
    color: white;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
}

.profile-header::before {
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
    background: linear-gradient(135deg, #4CAF50, #45a049);
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
    border-color: #4CAF50;
    box-shadow: 0 0 0 0.25rem rgba(76, 175, 80, 0.15);
}

.form-floating .form-control[readonly] {
    background-color: #f8f9fa;
    border-color: #dee2e6;
}

.form-floating label {
    color: #6c757d;
    font-weight: 500;
}

.btn-submit {
    background: linear-gradient(135deg, #4CAF50, #45a049);
    border: none;
    border-radius: 12px;
    padding: 1rem 2.5rem;
    font-weight: 600;
    font-size: 1.1rem;
    color: white;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3);
}

.btn-submit:hover {
    background: linear-gradient(135deg, #45a049, #3d8b40);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(76, 175, 80, 0.4);
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

.profile-summary {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    border: none;
    position: sticky;
    top: 2rem;
}

.summary-header {
    background: linear-gradient(135deg, #17a2b8, #138496);
    color: white;
    border-radius: 15px 15px 0 0;
    padding: 1.5rem;
}

.summary-body {
    padding: 2rem;
}

.avatar-circle {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: linear-gradient(135deg, #4CAF50, #45a049);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    font-weight: bold;
    color: white;
    margin: 0 auto 1rem;
    box-shadow: 0 8px 20px rgba(76, 175, 80, 0.3);
}

.info-item {
    display: flex;
    justify-content: between;
    align-items: center;
    padding: 0.75rem 0;
    border-bottom: 1px solid #f1f3f4;
}

.info-item:last-child {
    border-bottom: none;
}

.status-badge {
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
}

.status-active {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
}

.status-inactive {
    background: linear-gradient(135deg, #ffc107, #fd7e14);
    color: white;
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
    .profile-summary {
        position: static;
        margin-top: 2rem;
    }
    
    .profile-header {
        padding: 1.5rem;
    }
    
    .form-section {
        padding: 1.5rem;
    }
}

@media (max-width: 768px) {
    .profile-header {
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
    
    .avatar-circle {
        width: 80px;
        height: 80px;
        font-size: 2rem;
    }
}
</style>

<!-- Profile Header -->
<div class="profile-header">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h1 class="h2 mb-2 fw-bold">
                <i class="fas fa-user-circle me-3"></i>प्रोफाइल प्रबंधन
            </h1>
            <p class="mb-0 opacity-90 fs-5">
                अपनी व्यक्तिगत जानकारी देखें और अपडेट करें
            </p>
        </div>
        <div class="col-md-4 text-md-end">
            <div class="badge bg-light text-dark fs-6 px-3 py-2">
                <i class="fas fa-shield-alt me-2"></i>सुरक्षित प्रोफाइल
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
    <!-- Profile Form -->
    <div class="col-lg-8">
        <form action="/member/update-profile" method="POST">
            <?= csrf_field() ?>
            
            <!-- Personal Information Section -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-user me-2"></i>व्यक्तिगत जानकारी
                </h3>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control <?= $validation->hasError('full_name') ? 'is-invalid' : '' ?>" 
                                   id="full_name" name="full_name" value="<?= old('full_name', $user['full_name'] ?? '') ?>" required>
                            <label for="full_name">पूरा नाम <span class="required-star">*</span></label>
                            <?php if ($validation->hasError('full_name')): ?>
                                <div class="invalid-feedback"><?= $validation->getError('full_name') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="username" value="<?= $user['username'] ?? '' ?>" readonly>
                            <label for="username">उपयोगकर्ता नाम</label>
                            <div class="form-text">
                                <i class="fas fa-lock me-1"></i>उपयोगकर्ता नाम बदला नहीं जा सकता
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="email" value="<?= $user['email'] ?? '' ?>" readonly>
                            <label for="email">ईमेल पता</label>
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>ईमेल बदलने के लिए एडमिन से संपर्क करें
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="tel" class="form-control <?= $validation->hasError('phone') ? 'is-invalid' : '' ?>" 
                                   id="phone" name="phone" value="<?= old('phone', $user['phone'] ?? '') ?>" maxlength="10" required>
                            <label for="phone">मोबाइल नंबर <span class="required-star">*</span></label>
                            <?php if ($validation->hasError('phone')): ?>
                                <div class="invalid-feedback"><?= $validation->getError('phone') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control <?= $validation->hasError('address') ? 'is-invalid' : '' ?>" 
                                      id="address" name="address" style="height: 100px" required><?= old('address', $user['address'] ?? '') ?></textarea>
                            <label for="address">पूरा पता <span class="required-star">*</span></label>
                            <?php if ($validation->hasError('address')): ?>
                                <div class="invalid-feedback"><?= $validation->getError('address') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="aadhar_number" value="<?= $user['aadhar_number'] ?? '' ?>" readonly>
                            <label for="aadhar_number">आधार नंबर</label>
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>आधार नंबर बदलने के लिए एडमिन से संपर्क करें
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Password Change Section -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-lock me-2"></i>पासवर्ड बदलें (वैकल्पिक)
                </h3>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" 
                                   id="password" name="password" placeholder="नया पासवर्ड दर्ज करें">
                            <label for="password">नया पासवर्ड</label>
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>कम से कम 6 अक्षर का होना चाहिए
                            </div>
                            <?php if ($validation->hasError('password')): ?>
                                <div class="invalid-feedback"><?= $validation->getError('password') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="password" class="form-control <?= $validation->hasError('confirm_password') ? 'is-invalid' : '' ?>" 
                                   id="confirm_password" name="confirm_password" placeholder="पासवर्ड दोबारा दर्ज करें">
                            <label for="confirm_password">पासवर्ड की पुष्टि करें</label>
                            <?php if ($validation->hasError('confirm_password')): ?>
                                <div class="invalid-feedback"><?= $validation->getError('confirm_password') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Section -->
            <div class="form-section text-center">
                <div class="d-flex flex-column flex-md-row gap-3 justify-content-center align-items-center">
                    <button type="submit" class="btn btn-submit">
                        <i class="fas fa-save me-2"></i>प्रोफाइल अपडेट करें
                    </button>
                    <a href="/member/dashboard" class="btn btn-back">
                        <i class="fas fa-arrow-left me-2"></i>डैशबोर्ड पर वापस जाएं
                    </a>
                </div>
                
                <div class="mt-4 p-3 bg-light rounded-3">
                    <small class="text-muted">
                        <i class="fas fa-shield-alt me-2 text-primary"></i>
                        आपकी सभी जानकारी सुरक्षित रूप से संग्रहीत की जाती है।
                    </small>
                </div>
            </div>
        </form>
    </div>

    <!-- Profile Summary Panel -->
    <div class="col-lg-4">
        <div class="profile-summary">
            <div class="summary-header">
                <h5 class="mb-0 fw-bold">
                    <i class="fas fa-id-card me-2"></i>खाता सारांश
                </h5>
            </div>
            <div class="summary-body">
                <div class="text-center mb-4">
                    <div class="avatar-circle">
                        <?= strtoupper(substr($user['full_name'] ?? 'U', 0, 1)) ?>
                    </div>
                    <h5 class="mb-1 fw-bold"><?= esc($user['full_name'] ?? 'उपयोगकर्ता') ?></h5>
                    <p class="text-muted mb-0">सदस्य ID: #<?= $user['id'] ?? 'N/A' ?></p>
                </div>
                
                <div class="mb-4">
                    <div class="info-item">
                        <span class="text-muted fw-semibold">खाता स्थिति:</span>
                        <span class="status-badge <?= ($user['status'] ?? 'inactive') == 'active' ? 'status-active' : 'status-inactive' ?>">
                            <?= ($user['status'] ?? 'inactive') == 'active' ? '✓ सक्रिय' : '⏳ निष्क्रिय' ?>
                        </span>
                    </div>
                    <div class="info-item">
                        <span class="text-muted fw-semibold">सदस्यता दिनांक:</span>
                        <span class="fw-semibold"><?= date('d/m/Y', strtotime($user['created_at'] ?? 'now')) ?></span>
                    </div>
                    <div class="info-item">
                        <span class="text-muted fw-semibold">अंतिम अपडेट:</span>
                        <span class="fw-semibold"><?= date('d/m/Y', strtotime($user['updated_at'] ?? 'now')) ?></span>
                    </div>
                </div>

                <div class="alert alert-info border-0 rounded-3 mb-4">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-info-circle me-3 mt-1"></i>
                        <div>
                            <small>
                                यदि आपको अपनी ईमेल या आधार नंबर बदलने की आवश्यकता है, तो कृपया एडमिन से संपर्क करें।
                            </small>
                        </div>
                    </div>
                </div>
                
                <div class="d-grid gap-2">
                    <a href="/member/applications" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-file-alt me-2"></i>मेरे आवेदन देखें
                    </a>
                    <a href="/member/apply-vivah-help" class="btn btn-outline-success">
                        <i class="fas fa-heart me-2"></i>विवाह सहायता आवेदन
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>