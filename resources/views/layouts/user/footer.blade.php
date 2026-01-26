<!-- Footer -->
<footer id="footer">
    <div class="footer-main">
        <div class="container">
            <div class="footer-row">
                <!-- Kolom 1: About SMK Assalaam -->
                <div class="footer-col footer-about">
                    <div class="brand-section">
                        <div class="brand-logo">
                            <span class="brand-text">SMK</span>
                            <span class="brand-highlight">Assalaam</span>
                        </div>
                        <div class="brand-tagline">Membangun Generasi Profesional</div>
                    </div>
                    
                    <p class="about-text">
                        SMK Assalaam adalah bagian dari Yayasan Assalaam yang mempersiapkan siswa untuk siap kerja dengan keterampilan & profesional di bidang industri (sekolah berbasis industri) dan kewirausahaan.
                    </p>
                    
                    <a href="https://smkassalaambandung.sch.id/about" class="btn-primary">
                        <span>Pelajari Lebih Lanjut</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Kolom 2: Quick Links & Unit Pendidikan -->
                <div class="footer-col footer-links">
                    <h3 class="footer-title">
                        <span>Unit Pendidikan</span>
                        <div class="title-underline"></div>
                    </h3>
                    <nav class="link-list">
                        <a href="#" class="link-item">
                            <i class="fas fa-chevron-right"></i>
                            <span>SMK (Anda Berada Disini)</span>
                        </a>
                        <a href="#" class="link-item">
                            <i class="fas fa-chevron-right"></i>
                            <span>SMA - Sekolah Menengah Atas</span>
                        </a>
                        <a href="#" class="link-item">
                            <i class="fas fa-chevron-right"></i>
                            <span>SMP - Sekolah Menengah Pertama</span>
                        </a>
                        <a href="#" class="link-item">
                            <i class="fas fa-chevron-right"></i>
                            <span>MTS - Madrasah Tsanawiyah</span>
                        </a>
                        <a href="#" class="link-item">
                            <i class="fas fa-chevron-right"></i>
                            <span>SD - Sekolah Dasar</span>
                        </a>
                        <a href="#" class="link-item">
                            <i class="fas fa-chevron-right"></i>
                            <span>PG TK - Pendidikan Anak Usia Dini</span>
                        </a>
                        <a href="#" class="link-item">
                            <i class="fas fa-chevron-right"></i>
                            <span>TPQ - Taman Pendidikan Al-Quran</span>
                        </a>
                    </nav>
                </div>

                <!-- Kolom 3: Contact & Social -->
                <div class="footer-col footer-contact-section">
                    <h3 class="footer-title">
                        <span>Hubungi Kami</span>
                        <div class="title-underline"></div>
                    </h3>
                    
                    <div class="contact-items">
                        <div class="contact-card">
                            <div class="contact-icon phone">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="contact-info">
                                <span class="contact-label">Telepon</span>
                                <a href="tel:0225420220" class="contact-value">022 5420-220</a>
                            </div>
                        </div>
                        
                        <div class="contact-card">
                            <div class="contact-icon email">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-info">
                                <span class="contact-label">Email</span>
                                <a href="mailto:info@smkassalaambandung.sch.id" class="contact-value">info@smkassalaambandung.sch.id</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="social-section">
                        <h4 class="social-title">Ikuti Kami</h4>
                        <div class="social-grid">
                            <a href="https://www.facebook.com/smkassalaam/?locale=id_ID" class="social-btn facebook" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://x.com/smkassalaam" class="social-btn twitter" title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://www.instagram.com/smkassalaam/" class="social-btn instagram" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://www.youtube.com/@smkassalaambandung4011" class="social-btn youtube" title="YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>

<style>
/* ========== FOOTER MAIN ========== */
#footer {
    background: linear-gradient(180deg, #0f1419 0%, #1a1f2e 50%, #0a0e17 100%);
    color: #cbd5e0;
    font-family: 'Inter', 'Segoe UI', sans-serif;
    position: relative;
    overflow: hidden;
}

#footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, #00d4ff, transparent);
}

.footer-main {
    padding: 70px 0 50px;
    position: relative;
}

.container {
    max-width: 1240px;
    margin: 0 auto;
    padding: 0 25px;
}

.footer-row {
    display: grid;
    grid-template-columns: 1.8fr 1.2fr 1fr;
    gap: 60px;
    animation: fadeInStagger 1s ease-out;
}

/* ========== FOOTER COLUMNS ========== */
.footer-col {
    animation: slideUp 0.8s ease-out;
}

.footer-col:nth-child(1) { animation-delay: 0.1s; }
.footer-col:nth-child(2) { animation-delay: 0.2s; }
.footer-col:nth-child(3) { animation-delay: 0.3s; }

/* ========== BRAND SECTION ========== */
.brand-section {
    margin-bottom: 25px;
}

.brand-logo {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 8px;
}

.brand-text {
    font-size: 38px;
    font-weight: 800;
    color: #ffffff;
    letter-spacing: 1px;
}

.brand-highlight {
    font-size: 38px;
    font-weight: 800;
    background: linear-gradient(135deg, #00d4ff 0%, #0099ff 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.brand-tagline {
    font-size: 13px;
    color: #00d4ff;
    font-weight: 600;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.about-text {
    line-height: 1.9;
    color: #a0aec0;
    margin-bottom: 30px;
    font-size: 15px;
}

/* ========== PRIMARY BUTTON ========== */
.btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 14px 32px;
    background: linear-gradient(135deg, #00d4ff 0%, #0099ff 100%);
    color: #ffffff;
    text-decoration: none;
    font-weight: 700;
    border-radius: 50px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 8px 25px rgba(0, 212, 255, 0.3);
    position: relative;
    overflow: hidden;
}

.btn-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.5s;
}

.btn-primary:hover::before {
    left: 100%;
}

.btn-primary:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 12px 35px rgba(0, 212, 255, 0.5);
}

.btn-primary i {
    transition: transform 0.3s ease;
}

.btn-primary:hover i {
    transform: translateX(5px);
}

/* ========== FOOTER TITLE ========== */
.footer-title {
    margin-bottom: 30px;
    position: relative;
}

.footer-title span {
    font-size: 22px;
    font-weight: 700;
    color: #ffffff;
    display: inline-block;
}

.title-underline {
    width: 50px;
    height: 3px;
    background: linear-gradient(90deg, #00d4ff, #0099ff);
    margin-top: 10px;
    border-radius: 10px;
    transition: width 0.3s ease;
}

.footer-col:hover .title-underline {
    width: 80px;
}

/* ========== LINK LIST ========== */
.link-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.link-item {
    display: flex;
    align-items: center;
    gap: 12px;
    color: #a0aec0;
    text-decoration: none;
    padding: 10px 0;
    transition: all 0.3s ease;
    position: relative;
    padding-left: 0;
}

.link-item i {
    font-size: 10px;
    color: #00d4ff;
    transition: transform 0.3s ease;
}

.link-item:hover {
    color: #00d4ff;
    padding-left: 10px;
}

.link-item:hover i {
    transform: translateX(5px);
}

/* ========== CONTACT CARDS ========== */
.contact-items {
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-bottom: 35px;
}

.contact-card {
    display: flex;
    align-items: center;
    gap: 18px;
    padding: 18px;
    background: rgba(255, 255, 255, 0.03);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.05);
    transition: all 0.3s ease;
}

.contact-card:hover {
    background: rgba(0, 212, 255, 0.05);
    border-color: rgba(0, 212, 255, 0.2);
    transform: translateX(5px);
}

.contact-icon {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    font-size: 20px;
    flex-shrink: 0;
}

.contact-icon.phone {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #ffffff;
}

.contact-icon.email {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: #ffffff;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.contact-label {
    font-size: 12px;
    color: #718096;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.contact-value {
    color: #e2e8f0;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

.contact-value:hover {
    color: #00d4ff;
}

/* ========== SOCIAL SECTION ========== */
.social-section {
    margin-top: 35px;
}

.social-title {
    color: #ffffff;
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 18px;
}

.social-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 12px;
}

.social-btn {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.05);
    color: #ffffff;
    text-decoration: none;
    font-size: 20px;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.social-btn:hover {
    transform: translateY(-5px) rotate(5deg);
    border-color: transparent;
}

.social-btn.facebook:hover {
    background: linear-gradient(135deg, #3b5998, #2d4373);
    box-shadow: 0 10px 25px rgba(59, 89, 152, 0.4);
}

.social-btn.twitter:hover {
    background: linear-gradient(135deg, #1da1f2, #0c85d0);
    box-shadow: 0 10px 25px rgba(29, 161, 242, 0.4);
}

.social-btn.instagram:hover {
    background: linear-gradient(135deg, #f09433, #dc2743, #bc1888);
    box-shadow: 0 10px 25px rgba(240, 148, 51, 0.4);
}

.social-btn.youtube:hover {
    background: linear-gradient(135deg, #ff0000, #cc0000);
    box-shadow: 0 10px 25px rgba(255, 0, 0, 0.4);
}

/* ========== FOOTER BOTTOM ========== */
.footer-bottom {
    background: rgba(0, 0, 0, 0.4);
    padding: 30px 0;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(10px);
}

.bottom-wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap;
    position: relative;
}

.back-to-top {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #00d4ff, #0099ff);
    border: none;
    border-radius: 12px;
    color: #ffffff;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    box-shadow: 0 5px 20px rgba(0, 212, 255, 0.3);
}

.back-to-top:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 212, 255, 0.5);
}

.copyright {
    margin: 0;
    color: #cbd5e0;
    font-size: 15px;
    flex: 1;
    text-align: center;
}

.copyright strong {
    color: #00d4ff;
    font-weight: 700;
}

.developer {
    margin: 0;
    color: #718096;
    font-size: 14px;
}

.developer i {
    color: #f56565;
    animation: heartbeat 1.5s ease-in-out infinite;
}

/* ========== ANIMATIONS ========== */
@keyframes fadeInStagger {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes heartbeat {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.2); }
}

/* ========== RESPONSIVE ========== */
@media (max-width: 1024px) {
    .footer-row {
        grid-template-columns: 1fr 1fr;
        gap: 50px;
    }
    
    .footer-about {
        grid-column: 1 / -1;
    }
}

@media (max-width: 768px) {
    .footer-row {
        grid-template-columns: 1fr;
        gap: 45px;
    }
    
    .footer-about {
        grid-column: auto;
    }
    
    .footer-main {
        padding: 50px 0 40px;
    }
    
    .bottom-wrapper {
        flex-direction: column;
        text-align: center;
    }
    
    .copyright {
        text-align: center;
    }
    
    .social-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

@media (max-width: 480px) {
    .brand-text,
    .brand-highlight {
        font-size: 30px;
    }
    
    .footer-title span {
        font-size: 20px;
    }
    
    .btn-primary {
        padding: 12px 24px;
        font-size: 14px;
    }
    
    .contact-card {
        padding: 15px;
    }
    
    .contact-icon {
        width: 45px;
        height: 45px;
        font-size: 18px;
    }
    
    .social-grid {
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
    }
    
    .social-btn {
        width: 45px;
        height: 45px;
        font-size: 18px;
    }
}
</style>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">