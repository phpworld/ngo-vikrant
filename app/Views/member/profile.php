<?= $this->extend('member/layout') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-user me-2"></i>प्रोफाइल प्रबंधन
            </h1>
            <p class="text-muted mb-0">अपनी व्यक्तिगत जानकारी देखें और अपडेट करें</p>
        </div>
    </div>
</div>

<div class="row">
    <!-- Profile Information -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-gradient-primary text-white">
                <h5 class="mb-0">
                    <i class="fas fa-edit me-2"></i>प्रोफाइल अपडेट करें
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

                <form action="/member/update-profile" method="POST">
                    <?= csrf_field() ?>
                    
                    <!-- Basic Information -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-user me-2"></i>व्यक्तिगत जानकारी
                        </h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">पूरा नाम <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?= $validation->hasError('full_name') ? 'is-invalid' : '' ?>" 
                                       name="full_name" value="<?= old('full_name', $user['full_name'] ?? '') ?>" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('full_name') ?>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">उपयोगकर्ता नाम</label>
                                <input type="text" class="form-control" value="<?= $user['username'] ?? '' ?>" readonly>
                                <div class="form-text">उपयोगकर्ता नाम बदला नहीं जा सकता</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">ईमेल पता</label>
                                <input type="email" class="form-control" value="<?= $user['email'] ?? '' ?>" readonly>
                                <div class="form-text">ईमेल पता बदलने के लिए एडमिन से संपर्क करें</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">फोन नंबर <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control <?= $validation->hasError('phone') ? 'is-invalid' : '' ?>" 
                                       name="phone" value="<?= old('phone', $user['phone'] ?? '') ?>" maxlength="10" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('phone') ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">पूरा पता <span class="text-danger">*</span></label>
                            <textarea class="form-control <?= $validation->hasError('address') ? 'is-invalid' : '' ?>" 
                                      name="address" rows="3" required><?= old('address', $user['address'] ?? '') ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('address') ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">आधार नंबर</label>
                            <input type="text" class="form-control" value="<?= $user['aadhar_number'] ?? '' ?>" readonly>
                            <div class="form-text">आधार नंबर बदलने के लिए एडमिन से संपर्क करें</div>
                        </div>
                    </div>

                    <!-- Password Change -->
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="fas fa-lock me-2"></i>पासवर्ड बदलें (वैकल्पिक)
                        </h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">नया पासवर्ड</label>
                                <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" 
                                       name="password" placeholder="नया पासवर्ड दर्ज करें">
                                <div class="form-text">कम से कम 6 अक्षर का होना चाहिए</div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password') ?>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">पासवर्ड की पुष्टि करें</label>
                                <input type="password" class="form-control <?= $validation->hasError('password_confirm') ? 'is-invalid' : '' ?>" 
                                       name="password_confirm" placeholder="पासवर्ड दोबारा दर्ज करें">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password_confirm') ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save me-2"></i>प्रोफाइल अपडेट करें
                        </button>
                        <a href="/member/dashboard" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-arrow-left me-2"></i>डैशबोर्ड पर वापस जाएं
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Profile Summary -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-info text-white">
                <h6 class="mb-0">
                    <i class="fas fa-id-card me-2"></i>खाता सारांश
                </h6>
            </div>
            <div class="card-body">
                <div class="text-center mb-3">
                    <div class="avatar mx-auto mb-3" style="width: 80px; height: 80px;">
                        <div class="avatar-initial rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="font-size: 2rem;">
                            <?= strtoupper(substr($user['full_name'] ?? 'U', 0, 1)) ?>
                        </div>
                    </div>
                    <h5 class="mb-1"><?= esc($user['full_name'] ?? 'उपयोगकर्ता') ?></h5>
                    <p class="text-muted mb-0">सदस्य ID: <?= $user['id'] ?? 'N/A' ?></p>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-muted">खाता स्थिति:</span>
                        <span class="badge <?= ($user['status'] ?? 'inactive') == 'active' ? 'bg-success' : 'bg-warning' ?>">
                            <?= ($user['status'] ?? 'inactive') == 'active' ? 'सक्रिय' : 'निष्क्रिय' ?>
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-muted">सदस्यता दिनांक:</span>
                        <span><?= date('d/m/Y', strtotime($user['created_at'] ?? 'now')) ?></span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">अंतिम अपडेट:</span>
                        <span><?= date('d/m/Y', strtotime($user['updated_at'] ?? 'now')) ?></span>
                    </div>
                </div>

                <div class="alert alert-info">
                    <small>
                        <i class="fas fa-info-circle me-2"></i>
                        यदि आपको अपनी ईमेल या आधार नंबर बदलने की आवश्यकता है, तो कृपया एडमिन से संपर्क करें।
                    </small>
                </div>
                
                <div class="d-grid">
                    <a href="/member/applications" class="btn btn-outline-primary">
                        <i class="fas fa-file-alt me-2"></i>मेरे आवेदन देखें
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>