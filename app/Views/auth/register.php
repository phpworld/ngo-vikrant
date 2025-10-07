<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= esc($title) ?> - एनजीओ विक्रांत</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <style>
        :root {
            --brand-start:#667eea; --brand-end:#764ba2; --brand:#667eea; --radius-lg:28px; --radius-md:16px; --radius-sm:10px;
        }
        * { box-sizing: border-box; }
        body {
            font-family: 'Noto Sans Devanagari', sans-serif;
            min-height: 100vh;
            margin: 0;
            background: radial-gradient(circle at 20% 20%, #eef2ff, #d9e4ff 40%, #cbd5ff 60%, #bfc9ff 75%, #b5bfff 90%);
            display: flex;
            align-items: stretch;
            justify-content: center;
            padding: clamp(1rem, 2vw, 2rem);
        }
        .auth-wrapper {
            width: 100%;
            max-width: 1320px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(480px, 1fr));
            background: #ffffff;
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: 0 20px 50px -10px rgba(82,63,105,.2), 0 8px 24px -6px rgba(82,63,105,.15);
            position: relative;
        }
        .media-pane {
            position: relative;
            background: linear-gradient(135deg, var(--brand-start), var(--brand-end));
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: clamp(2rem, 4vw, 3.5rem) clamp(2rem, 4vw, 3rem);
            isolation: isolate;
        }
        .media-pane::before, .media-pane::after {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 30% 30%, rgba(255,255,255,.25), transparent 60%);
            mix-blend-mode: overlay;
            opacity: .5;
        }
        .media-pane::after {
            background: radial-gradient(circle at 70% 70%, rgba(255,255,255,.25), transparent 60%);
        }
        .media-top h1 { font-weight: 700; font-size: clamp(1.9rem, 2.4vw, 2.7rem); margin-bottom: .75rem; }
        .tag-badge { background: rgba(255,255,255,.15); backdrop-filter: blur(4px); padding: .4rem .9rem; border-radius: 30px; display: inline-flex; align-items: center; gap: .5rem; font-size: .9rem; letter-spacing: .5px; }
        .media-illustration { margin: 2.2rem 0 1.5rem; position: relative; }
        .media-illustration img { width: 100%; max-width: 440px; border-radius: var(--radius-md); box-shadow: 0 12px 35px -10px rgba(0,0,0,.45); object-fit: cover; }
        .floating-info { position: absolute; bottom: -14px; left: 20px; background: rgba(255,255,255,.12); backdrop-filter: blur(6px); padding: .65rem 1rem; border-radius: 14px; font-size: .8rem; display: flex; align-items: center; gap: .5rem; }
        .media-benefits { list-style: none; padding: 0; margin: 0; display: grid; gap: .85rem; }
        .media-benefits li { display: flex; align-items: flex-start; gap: .65rem; font-size: .9rem; line-height: 1.3; }
        .media-benefits li i { background: rgba(255,255,255,.18); width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border-radius: 10px; }
        .copyright-note { font-size: .7rem; opacity: .7; margin-top: 1.25rem; }

        .form-pane { padding: clamp(1.7rem, 3vw, 3rem) clamp(1.5rem, 3vw, 3rem) clamp(2rem, 3vw, 2.4rem); position: relative; }
        .form-header { margin-bottom: 1.1rem; }
        .form-header h2 { font-weight: 600; font-size: clamp(1.35rem, 1.9vw, 1.9rem); margin: 0 0 .25rem; }
        .form-header p { font-size: .9rem; color: #6b6e82; }
        .divider-text { text-align: center; position: relative; margin: 1.7rem 0 1.1rem; }
        .divider-text span { background: #fff; padding: 0 .9rem; font-size: .75rem; font-weight: 500; letter-spacing: .5px; color: #555; }
        .divider-text::before { content: ""; position: absolute; height: 1px; background: #e5e7ef; inset: 50% 0 auto; transform: translateY(-50%); }

        form .row-gap { --bs-gutter-x:1.25rem; --bs-gutter-y:1.1rem; }
        .form-floating>label { font-size: .8rem; letter-spacing: .4px; }
        .form-control, .form-select, textarea.form-control { border: 1.8px solid #dbe0ea; border-radius: var(--radius-sm); padding: .85rem .95rem; font-size: .9rem; transition: .25s ease; background: #f9fafc; }
        .form-control:focus, .form-select:focus, textarea.form-control:focus { border-color: var(--brand-start); background: #fff; box-shadow: 0 0 0 .15rem rgba(102,126,234,.25); }
        .is-invalid { border-color: #dc3545 !important; }
        .invalid-feedback { font-size: .7rem; margin-top: 4px; }

        .password-wrapper { position: relative; }
        .password-wrapper .toggle-pass { position: absolute; top: 50%; right: 10px; transform: translateY(-50%); border: none; background: transparent; color: #666; cursor: pointer; padding: .25rem .4rem; }
        .strength-meter { height: 6px; border-radius: 4px; background: #e2e8f0; margin-top: .4rem; overflow: hidden; }
        .strength-meter-bar { height: 100%; width: 0; background: linear-gradient(90deg,#ff4d4d,#ffb347,#5cb85c); transition: width .4s; }
        .small-hint { font-size: .65rem; color: #6c7487; margin-top: .25rem; }

        .terms-box { background: #f5f7fb; border: 1px dashed #c9d3e3; padding: .75rem .9rem; border-radius: var(--radius-sm); font-size: .73rem; display: flex; gap: .55rem; }
        .terms-box i { color: var(--brand-start); }

        .btn-primary-gradient { background: linear-gradient(135deg,var(--brand-start),var(--brand-end)); border: none; padding: .9rem 1.2rem; font-weight: 600; font-size: .95rem; letter-spacing: .5px; border-radius: 14px; position: relative; overflow: hidden; transition: .35s; box-shadow: 0 6px 18px -6px rgba(102,126,234,.55); }
        .btn-primary-gradient:hover { filter: brightness(1.07); transform: translateY(-2px); box-shadow: 0 10px 26px -8px rgba(102,126,234,.65); }
        .btn-primary-gradient:active { transform: translateY(0); }

        .alt-route { font-size: .8rem; margin-top: 1rem; }
        .alt-route a { font-weight: 600; text-decoration: none; background: linear-gradient(90deg,var(--brand-start),var(--brand-end)); -webkit-background-clip: text; color: transparent; }
        .alt-route a:hover { text-decoration: underline; }

        .flash-alert { border: 1px solid #e0e4ef; background: #ffffff; border-left: 5px solid var(--brand-start); padding: .85rem 1rem; border-radius: var(--radius-sm); font-size: .8rem; display: flex; gap: .6rem; align-items: flex-start; box-shadow: 0 4px 15px -6px rgba(0,0,0,.08); }
        .flash-alert.success { border-left-color: #28a745; }
        .flash-alert.error { border-left-color: #dc3545; }

        @media (max-width: 1100px) {
            .media-illustration img { max-width: 370px; }
        }
        @media (max-width: 995px) {
            .auth-wrapper { grid-template-columns: 1fr; }
            .media-pane { min-height: 380px; }
        }
        @media (max-width: 575px) {
            .form-pane { padding: 1.4rem 1.1rem 2rem; }
            .media-pane { padding: 2rem 1.5rem 2.4rem; }
        }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        <!-- Left / Media Pane -->
        <div class="media-pane">
            <div class="media-top">
                <span class="tag-badge"><i class="fas fa-shield-heart"></i> सामाजिक सेवा</span>
                <h1>एनजीओ विक्रांत</h1>
                <p class="mb-0" style="max-width: 460px; font-size: .95rem; line-height: 1.55;">हम समाज में ज़रूरतमंद परिवारों को <strong>विवाह सहायता</strong>, <strong>मृत्यु सहायता</strong> और <strong>शिक्षा सहायता</strong> के माध्यम से सशक्त बनाते हैं। आज ही सदस्य बनें और परिवर्तन की यात्रा का हिस्सा बनें।</p>
                <div class="media-illustration">
                    <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&w=1000&q=60" alt="Community Service" />
                    <div class="floating-info"><i class="fas fa-users"></i><span>500+ लाभार्थी</span></div>
                </div>
            </div>
            <ul class="media-benefits mb-3">
                <li><i class="fas fa-bolt"></i><span>त्वरित ऑनलाइन आवेदन प्रक्रिया</span></li>
                <li><i class="fas fa-lock"></i><span>सुरक्षित व संरक्षित व्यक्तिगत जानकारी</span></li>
                <li><i class="fas fa-file-shield"></i><span>पारदर्शी सत्यापन एवं अनुमोदन</span></li>
                <li><i class="fas fa-heart"></i><span>समर्पित स्वयंसेवक समर्थन</span></li>
            </ul>
            <div class="mt-auto small text-white-50">
                <div class="d-flex gap-3">
                    <span><i class="fas fa-circle me-1" style="font-size:.45rem;"></i> गैर-लाभकारी</span>
                    <span><i class="fas fa-circle me-1" style="font-size:.45rem;"></i> पंजीकृत संगठन</span>
                </div>
                <div class="copyright-note">© 2025 एनजीओ विक्रांत • सभी अधिकार सुरक्षित</div>
            </div>
        </div>

        <!-- Right / Form Pane -->
        <div class="form-pane">
            <div class="form-header">
                <h2>सदस्य पंजीकरण</h2>
                <p class="mb-2">कुछ विवरण भरें और अपनी यात्रा शुरू करें।</p>
            </div>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="flash-alert success mb-3"><i class="fas fa-check-circle mt-1"></i><div><?= session()->getFlashdata('success') ?></div></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="flash-alert error mb-3"><i class="fas fa-triangle-exclamation mt-1"></i><div><?= session()->getFlashdata('error') ?></div></div>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <div class="flash-alert error mb-3"><i class="fas fa-triangle-exclamation mt-1"></i><div><?= esc($error) ?></div></div>
            <?php endif; ?>

            <form method="post" action="/register" novalidate>
                <?= csrf_field() ?>
                <div class="row row-gap">
                    <div class="col-md-6">
                        <label class="form-label mb-1" for="username">उपयोगकर्ता नाम *</label>
                        <input type="text" id="username" name="username" value="<?= old('username') ?>" class="form-control <?= ($validation && $validation->hasError('username')) ? 'is-invalid' : '' ?>" placeholder="उदा. rakesh123" />
                        <?php if ($validation && $validation->hasError('username')): ?><div class="invalid-feedback"><?= $validation->getError('username') ?></div><?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label mb-1" for="email">ईमेल *</label>
                        <input type="email" id="email" name="email" value="<?= old('email') ?>" class="form-control <?= ($validation && $validation->hasError('email')) ? 'is-invalid' : '' ?>" placeholder="name@example.com" />
                        <?php if ($validation && $validation->hasError('email')): ?><div class="invalid-feedback"><?= $validation->getError('email') ?></div><?php endif; ?>
                    </div>
                    <div class="col-12">
                        <label class="form-label mb-1" for="full_name">पूरा नाम *</label>
                        <input type="text" id="full_name" name="full_name" value="<?= old('full_name') ?>" class="form-control <?= ($validation && $validation->hasError('full_name')) ? 'is-invalid' : '' ?>" placeholder="आपका पूरा नाम" />
                        <?php if ($validation && $validation->hasError('full_name')): ?><div class="invalid-feedback"><?= $validation->getError('full_name') ?></div><?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label mb-1" for="phone">फ़ोन *</label>
                        <input type="tel" id="phone" name="phone" value="<?= old('phone') ?>" class="form-control <?= ($validation && $validation->hasError('phone')) ? 'is-invalid' : '' ?>" placeholder="10 अंकों का नंबर" />
                        <?php if ($validation && $validation->hasError('phone')): ?><div class="invalid-feedback"><?= $validation->getError('phone') ?></div><?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label mb-1" for="aadhar_number">आधार नंबर *</label>
                        <input type="text" id="aadhar_number" name="aadhar_number" value="<?= old('aadhar_number') ?>" class="form-control <?= ($validation && $validation->hasError('aadhar_number')) ? 'is-invalid' : '' ?>" placeholder="12 अंक" />
                        <?php if ($validation && $validation->hasError('aadhar_number')): ?><div class="invalid-feedback"><?= $validation->getError('aadhar_number') ?></div><?php endif; ?>
                    </div>
                    <div class="col-12">
                        <label class="form-label mb-1" for="address">पूरा पता *</label>
                        <textarea id="address" name="address" rows="3" class="form-control <?= ($validation && $validation->hasError('address')) ? 'is-invalid' : '' ?>" placeholder="ग्राम / पोस्ट / जिला / राज्य"><?= old('address') ?></textarea>
                        <?php if ($validation && $validation->hasError('address')): ?><div class="invalid-feedback"><?= $validation->getError('address') ?></div><?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label mb-1" for="password">पासवर्ड *</label>
                        <div class="password-wrapper">
                            <input type="password" id="password" name="password" class="form-control <?= ($validation && $validation->hasError('password')) ? 'is-invalid' : '' ?>" placeholder="पासवर्ड" />
                            <button type="button" class="toggle-pass" data-target="password"><i class="fas fa-eye"></i></button>
                            <?php if ($validation && $validation->hasError('password')): ?><div class="invalid-feedback"><?= $validation->getError('password') ?></div><?php endif; ?>
                        </div>
                        <div class="strength-meter mt-1"><div class="strength-meter-bar" id="pwdStrength"></div></div>
                        <div class="small-hint">कम से कम 6 अक्षर (अधिक सुरक्षित पासवर्ड का उपयोग करें)</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label mb-1" for="confirm_password">पासवर्ड पुष्टि *</label>
                        <div class="password-wrapper">
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control <?= ($validation && $validation->hasError('confirm_password')) ? 'is-invalid' : '' ?>" placeholder="दोबारा पासवर्ड" />
                            <button type="button" class="toggle-pass" data-target="confirm_password"><i class="fas fa-eye"></i></button>
                            <?php if ($validation && $validation->hasError('confirm_password')): ?><div class="invalid-feedback"><?= $validation->getError('confirm_password') ?></div><?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="mt-3 terms-box">
                    <div><i class="fas fa-file-contract"></i></div>
                    <div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" id="terms" required />
                            <label class="form-check-label" for="terms">मैं <a href="/rulebook" target="_blank">नियम व शर्तों</a> से सहमत हूँ *</label>
                        </div>
                        <div>सहमति देकर आप डेटा उपयोग नीति को स्वीकार करते हैं।</div>
                    </div>
                </div>
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary-gradient"><i class="fas fa-user-plus me-2"></i> पंजीकरण पूरा करें</button>
                </div>
            </form>
            <div class="alt-route text-center">
                पहले से खाता है? <a href="/login">लॉगिन करें</a>
                <div class="mt-2"><a href="/" class="text-muted"><i class="fas fa-home me-1"></i> वेबसाइट पर वापस जाएँ</a></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password visibility toggles
        document.querySelectorAll('.toggle-pass').forEach(btn => {
            btn.addEventListener('click', () => {
                const targetId = btn.getAttribute('data-target');
                const input = document.getElementById(targetId);
                const icon = btn.querySelector('i');
                if (input.type === 'password') { input.type = 'text'; icon.classList.replace('fa-eye','fa-eye-slash'); }
                else { input.type = 'password'; icon.classList.replace('fa-eye-slash','fa-eye'); }
            });
        });
        // Password strength meter (basic)
        const pwd = document.getElementById('password');
        const meter = document.getElementById('pwdStrength');
        const evaluate = val => {
            let score = 0;
            if (!val) return 0;
            if (val.length >= 6) score += 20;
            if (val.length >= 10) score += 20;
            if (/[A-Zअ-ह]/.test(val)) score += 20;
            if (/[0-9]/.test(val)) score += 20;
            if (/[^A-Za-z0-9]/.test(val)) score += 20;
            return Math.min(score,100);
        };
        pwd.addEventListener('input', e => {
            const v = e.target.value;
            const sc = evaluate(v);
            meter.style.width = sc + '%';
            meter.style.background = sc < 40 ? '#ff4d4d' : sc < 70 ? '#ffb347' : '#43d17b';
        });
        // Auto dismiss flash alerts
        setTimeout(()=>{ document.querySelectorAll('.flash-alert').forEach(a=> a.style.display='none'); }, 6000);
    </script>
</body>
</html>