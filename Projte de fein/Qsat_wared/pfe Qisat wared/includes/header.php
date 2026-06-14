<?php
// Déterminer le préfixe du chemin en fonction du dossier actuel
$current_page = $_SERVER['PHP_SELF'];
$is_in_subdir = (strpos($current_page, '/admin/') !== false || strpos($current_page, '/client/') !== false);
$path_prefix = $is_in_subdir ? '../' : '';
?>
<header class="fleurs-header">
    <div class="header-logo-container">
        <a href="<?= $path_prefix ?>index.php" style="text-decoration: none;">
            <div class="header-logo">Qisat_Ward</div>
        </a>
    </div>

    <nav class="header-nav" id="headerNav">
        <button class="close-menu" id="closeMenu">&times;</button>
        
        <div class="nav-links-group">
            <a href="<?= $path_prefix ?>index.php" class="nav-link <?= basename($current_page) == 'index.php' ? 'active' : '' ?>">Bouquets</a>
        </div>

        <div class="user-actions-mobile">
            <div class="user-profile">           
                 <a href="<?= $path_prefix ?>admin/dashboard.php" class="nav-link-icon" title="Tableau de bord">
                    <svg class="icon-user" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                 </a>
            </div>

            <a href="<?= $path_prefix ?>admin/logout.php" class="logout-btn" title="Se déconnecter">
                <svg class="icon-logout" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
                <span class="logout-text-mobil">Se déconnecter</span>
            </a>
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
/* --- Global Theme Color --- */
:root {
    --primary-color: #B32039;
    --header-bg: #B32039;
    --header-text: #ffffff;
}

/* --- Style Desktop (PC) --- */
.fleurs-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 40px;
    background-color: var(--header-bg);
    box-shadow: 0 2px 10px rgba(179, 32, 57, 0.2);
    font-family: 'Outfit', sans-serif;
    position: sticky;
    top: 0;
    z-index: 1000;
}

.header-logo {
    color: var(--header-text);
    font-size: 24px;
    font-weight: 700;
    letter-spacing: -0.5px;
}

.header-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex: 2;
}

.nav-links-group {
    display: flex;
    gap: 30px;
    margin-left: auto;
    margin-right: auto;
}

.nav-link {
    text-decoration: none;
    color: rgba(255, 255, 255, 0.9);
    font-size: 16px;
    font-weight: 500;
    transition: all 0.3s ease;
    padding: 5px 0;
}

.nav-link:hover {
    color: #ffffff;
}

.nav-link.active {
    color: #ffffff;
    font-weight: 600;
    border-bottom: 2px solid #ffffff;
}

.user-actions-mobile {
    display: flex;
    align-items: center;
    gap: 20px;
}

.user-profile {
    display: flex;
    align-items: center;
}

.nav-link-icon {
    color: var(--header-text);
    display: flex;
    align-items: center;
    transition: transform 0.2s ease;
}

.nav-link-icon:hover {
    transform: scale(1.1);
}

.icon-user, .icon-logout {
    width: 22px;
    height: 22px;
    stroke: var(--header-text);
}

.logout-btn { 
    background: rgba(255, 255, 255, 0.15);
    border: none; 
    cursor: pointer; 
    display: flex; 
    align-items: center; 
    gap: 8px;
    padding: 8px 15px;
    border-radius: 50px;
    color: var(--header-text);
    text-decoration: none;
    transition: background 0.3s ease;
}

.logout-btn:hover {
    background: rgba(255, 255, 255, 0.25);
}

.logout-text-mobil {
    display: none;
}

.menu-toggle, .close-menu { display: none; }
.header-right { display: none; }

/* --- 📱 Style Responsive --- */
@media screen and (max-width: 768px) {
    .fleurs-header {
        padding: 12px 20px;
    }

    .header-right {
        display: flex;
        justify-content: flex-end;
    }

    .menu-toggle {
        display: flex !important;
        flex-direction: column;
        justify-content: space-between;
        width: 25px;
        height: 16px;
        background: transparent;
        border: none;
        cursor: pointer;
    }

    .menu-toggle .bar {
        width: 100%;
        height: 2px;
        background-color: #ffffff;
        border-radius: 2px;
    }

    .header-nav {
        position: fixed;
        top: 0;
        right: 0;
        width: 260px;
        height: 100vh;
        background-color: #ffffff;
        box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
        display: flex !important;
        flex-direction: column;
        padding: 40px 30px;
        z-index: 9999;
        transform: translateX(100%);
        transition: transform 0.3s ease-in-out;
    }

    .header-nav.open {
        transform: translateX(0);
    }

    .nav-links-group {
        flex-direction: column;
        width: 100%;
        margin-top: 20px;
    }

    .nav-link {
        color: #333;
        font-size: 18px;
    }

    .nav-link.active {
        color: var(--primary-color);
        border-bottom: none;
    }

    .user-actions-mobile {
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
        border-top: 1px solid #eee;
        padding-top: 20px;
        margin-top: auto;
    }

    .nav-link-icon {
        color: #333;
    }

    .icon-user {
        stroke: #333;
    }

    .logout-btn {
        background: transparent;
        padding: 0;
        color: #333;
    }

    .icon-logout {
        stroke: #333;
    }

    .logout-text-mobil {
        display: inline;
        font-weight: 500;
    }

    .close-menu {
        display: block;
        align-self: flex-end;
        background: none;
        border: none;
        font-size: 28px;
        color: #333;
        cursor: pointer;
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