<header class="fleurs-header">
    
    <div class="header-logo-container">
        <div class="header-logo">Qisat_Ward</div>
    </div>

    <nav class="header-nav" id="headerNav">
        <button class="close-menu" id="closeMenu">&times;</button>
        
        <div class="nav-links-group">
            <a href="../index.php" class="nav-link">Bouquets</a>

            <a href="../admin/dashboard.php" class="nav-link active">Dashboard</a>
        </div>

        <div class="user-actions-mobile">
            <div class="user-profile">
                <svg class="icon-user" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>

            <button class="logout-btn" title="Log out">
                <svg class="icon-logout" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"></path>
                </svg>
                <span class="logout-text-mobil">Se déconnecter</span>
            </button>
        </div>
    </nav>

    <div class="header-right">
        <button class="menu-toggle" id="menuToggle" aria-label="Open Menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
    </div>
</header>




<style>
/* --- Style Desktop (PC) --- */
.fleurs-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 18px 40px;
    background-color: #ffffff;
    border-bottom: 1px solid #f0f0f0;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.header-logo-container {
    flex: 1;
}

.header-logo {
    color: #b30052;
    font-size: 26px;
    font-weight: 700;
    font-family: Georgia, serif;
    letter-spacing: 0.5px;
    display: inline-block;
}

/* Navigation layout f l-PC */
.header-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex: 3; /* Khdit l-space d l-wst w l-ymn */
}

.nav-links-group {
    display: flex;
    gap: 35px;
    margin-left: auto;
    margin-right: auto; /* Had jjooj kikhlliw l-links dima f l-wst exact */
}

.nav-link {
    text-decoration: none;
    color: #666666;
    font-size: 15px;
    font-weight: 500;
    transition: color 0.2s ease;
}

.nav-link:hover { color: #111111; }

.nav-link.active {
    color: #b30052;
    font-weight: 600;
    border-bottom: 2px solid #b30052;
    padding-bottom: 6px;
}

/* Profile + Logout layout f l-PC */
.user-actions-mobile {
    display: flex;
    align-items: center;
    gap: 16px;
}

.user-profile {
    display: flex;
    align-items: center;
    gap: 8px;
    background-color: #f3f4f6;
    padding: 8px 18px;
    border-radius: 50px;
    cursor: pointer;
}

.user-email { font-size: 14px; color: #333333; font-weight: 500; }
.icon-user { width: 20px; height: 20px; color: #b30052; }
.icon-logout { width: 22px; height: 22px; color: #666666; }

.logout-btn { 
    background: none; 
    border: none; 
    cursor: pointer; 
    display: flex; 
    align-items: center; 
    gap: 8px;
    padding: 0;
}

.logout-text-mobil {
    display: none; /* Khfiyya f l-PC, gha tban ghir f l-mobil */
}

.logout-btn:hover .icon-logout { color: #111111; }

.menu-toggle, .close-menu { display: none; }
.header-right { display: none; }

/* --- 📱 Style Responsive (Mobile - Logout inside Menu) --- */
@media screen and (max-width: 768px) {
    .fleurs-header {
        padding: 15px 20px;
    }

    .header-right {
        display: flex;
        flex: 1;
        justify-content: flex-end;
    }

    /* Hamburger Button f l-ymn dyal l-header */
    .menu-toggle {
        display: flex !important;
        flex-direction: column;
        justify-content: space-between;
        width: 28px;
        height: 18px;
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 0;
    }

    .menu-toggle .bar {
        width: 100%;
        height: 3px;
        background-color: #b30052;
        border-radius: 3px;
    }

    /* Fixed Sidebar Menu dyal mobil lli gha y-glisser mn l-ymn */
    .header-nav {
        position: fixed;
        top: 0;
        right: 0;
        width: 280px;
        height: 100vh;
        background-color: #ffffff;
        box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
        display: flex !important;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start; /* Rjj3na l-ktaba t-bda mn l-issr nqiya */
        padding: 30px;
        gap: 35px;
        z-index: 9999;
        transform: translateX(100%);
        transition: transform 0.3s ease-in-out;
    }

    .header-nav.open {
        transform: translateX(0);
    }

    .nav-links-group {
        display: flex;
        flex-direction: column;
        gap: 25px;
        width: 100%;
        margin: 0; /* Hyyadna center alignment dyal l-PC */
    }

    .nav-link.active {
        border-bottom: none;
        padding-bottom: 0;
    }

    /* 📌 Structure dyal Profile + Logout dakhil l-menu f l-mobil */
    .user-actions-mobile {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 20px;
        width: 100%;
        border-top: 1px solid #f0f0f0; /* Khatt f l-wst l-menu yfsel mabin navigation w logout */
        padding-top: 25px;
    }

    .user-profile {
        background-color: transparent; /* Hyyadna l-pill gray bach yji nqi m3a l-menu list */
        padding: 0;
    }

    .logout-text-mobil {
        display: inline; /* Biyna l-ktaba dyal "Se déconnecter" hda l-icon */
        font-size: 15px;
        color: #666666;
        font-weight: 500;
    }

    .close-menu {
        display: block;
        align-self: flex-end;
        background: none;
        border: none;
        font-size: 30px;
        color: #666666;
        cursor: pointer;
        padding: 0;
        margin-top: -10px;
    }
}
</style>


<script>
document.addEventListener("DOMContentLoaded", function() {
    const menuToggle = document.getElementById('menuToggle');
    const closeMenu = document.getElementById('closeMenu');
    const headerNav = document.getElementById('headerNav');

    if (menuToggle && headerNav) {
        menuToggle.addEventListener('click', function() {
            headerNav.classList.add('open');
        });
    }

    if (closeMenu && headerNav) {
        closeMenu.addEventListener('click', function() {
            headerNav.classList.remove('open');
        });
    }
});
</script>