<footer class="fleurs-footer">
    <div class="footer-container">
        
        <!-- 1. Column: Brand / About -->
        <div class="footer-col brand-col">
            <h2 class="footer-logo">Fleurs Satin</h2>
            <p class="brand-text">L'excellence du bouquet artisanal livré chez vous.</p>
        </div>

        <!-- 2. Column: Informations -->
        <div class="footer-col">
            <h3 class="footer-title">INFORMATIONS</h3>
            <ul class="footer-links">
                <li><a href="#">À propos</a></li>
                <li><a href="#">Livraison</a></li>
                <li><a href="#">CGV</a></li>
            </ul>
        </div>

        <!-- 3. Column: Support -->
        <div class="footer-col">
            <h3 class="footer-title">SUPPORT</h3>
            <ul class="footer-links">
                <li><a href="#">Contact</a></li>
                <li><a href="#">WhatsApp</a></li>
            </ul>
        </div>

        <!-- 4. Column: Social Media Icons -->
        <div class="footer-col">
            <h3 class="footer-title">RESTEZ CONNECTÉS</h3>
            <div class="footer-socials">
                <!-- Instagram (Share icon pattern match) -->
                <a href="#" class="social-icon-link" title="Instagram">
                    <svg class="icon-social" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.684 10.742l4.136-1.503M13.414 16.4l-4.135-1.503M16.5 6a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zm0 12a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zm-9-6a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </a>
                <!-- Email Icon (@ pattern match) -->
                <a href="#" class="social-icon-link" title="Email">
                    <svg class="icon-social" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25"></path>
                    </svg>
                </a>
            </div>
        </div>

    </div>

    <!-- Copyright Section bottom lines -->
    <div class="footer-bottom">
        <p>&copy; 2024 Fleurs Satin - L'excellence du bouquet artisanal.</p>
    </div>
</footer>









<style>

/* ==========================================================================
   🌸 DÉCORATION ET STYLE RESPONSIVE DU FOOTER
   ========================================================================== */

.fleurs-footer {
    background-color: #ffffffff;
    padding: 20px 40px 20px 40px;
    margin-top: 50px;
    border-top: 1px solid #f9e6ed; /* Line border khfif f rose background match */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #444444;
}

/* Container d l-a3mida */
.footer-container {
    max-width: 1200px;
    margin-top: 50px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap; /* Kikhlli l-khdma d l-mobil thbat automatically */
    gap: 40px;
}

/* Style l-koll 3amoud */
.footer-col {
    flex: 1;
    min-width: 200px; /* Bach maytzahmoch f tablet */
}

/* Gzo dyal Fleurs Satin (Brand Column) */
.brand-col {
    flex: 1.5; /* Khdit 3rd kbar chi chwya */
    min-width: 250px;
}

.footer-logo {
    color: #b30052; /* Rose ghamq bhal identity dyalk */
    font-family: Georgia, serif;
    font-size: 26px;
    font-weight: 700;
    margin-top: 0;
    margin-bottom: 18px;
    letter-spacing: 0.5px;
}

.brand-text {
    font-size: 14px;
    line-height: 1.6;
    color: #666666;
    max-width: 280px;
}

/* Aanawin sghar (Informations, Support...) */
.footer-title {
    color: #777777;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 1px;
    margin-top: 5px;
    margin-bottom: 22px;
}

/* Lists d links */
.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 12px;
}

.footer-links a {
    text-decoration: none;
    color: #555555;
    font-size: 14.5px;
    transition: color 0.2s ease, padding-left 0.2s ease;
    display: inline-block;
}

.footer-links a:hover {
    color: #b30052; /* Kiywlli rose f highlight mouse hover */
    padding-left: 2px;
}

/* Icons dyal Social Media */
.footer-socials {
    display: flex;
    gap: 16px;
    align-items: center;
}

.social-icon-link {
    color: #666666;
    transition: color 0.2s ease, transform 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.icon-social {
    width: 22px;
    height: 22px;
}

.social-icon-link:hover {
    color: #b30052;
    transform: translateY(-2px); /* Animation t-ytla3 l-foq chwya */
}

/* Khatt dyal l-t7t (Copyright) */
.footer-bottom {
    max-width: 1200px;
    margin: 50px auto 0 auto;
    padding-top: 20px;
    border-top: 1px solid #f5f5f5;
    text-align: center;
}

.footer-bottom p {
    font-size: 12.5px;
    color: #888888;
    margin: 0;
    letter-spacing: 0.3px;
}

/* ==========================================================================
   📱 MEDIA QUERIES FOR TABLES & MOBILE SCREEN SIZES
   ========================================================================== */

/* Chachat mutawassita (Tablets / Ipads) */
@media screen and (max-width: 992px) {
    .footer-container {
        gap: 30px;
    }
    .footer-col {
        min-width: 40%; /* Koll jjooj a3mida ybano f row wahed */
    }
}

/* Chachat sghira bzaff (Smartphones) */
@media screen and (max-width: 576px) {
    .fleurs-footer {
        padding: 40px 20px 20px 20px;
    }

    .footer-container {
        flex-direction: column; /* Kollchi y-flew_down verticalement */
        gap: 35px;
        text-align: left; /* T-ytstfo perfectly aligned l l-issr */
    }

    .footer-col {
        width: 100%;
        min-width: 100%;
    }

    .brand-text {
        max-width: 100%;
    }

    .footer-title {
        margin-bottom: 14px;
    }

    .footer-bottom {
        margin-top: 35px;
    }
}
</style>