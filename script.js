(function() {
    // ---- elementos globales ----
    const track = document.getElementById('carouselTrack');
    const slides = document.querySelectorAll('.carousel-slide');
    const prevBtn = document.querySelector('.prev-button');
    const nextBtn = document.querySelector('.next-button');
    const dots = document.querySelectorAll('.dot');
    let currentSlide = 0;

    function updateCarousel() {
        if (!track) return;
        track.style.transform = `translateX(-${currentSlide * 100}%)`;
        dots.forEach((dot, i) => dot.classList.toggle('active', i === currentSlide));
    }
    function nextSlide() { currentSlide = (currentSlide + 1) % slides.length; updateCarousel(); }
    function prevSlide() { currentSlide = (currentSlide - 1 + slides.length) % slides.length; updateCarousel(); }

    if (prevBtn && nextBtn) {
        prevBtn.addEventListener('click', prevSlide);
        nextBtn.addEventListener('click', nextSlide);
        dots.forEach((dot, idx) => dot.addEventListener('click', () => { currentSlide = idx; updateCarousel(); }));
        setInterval(nextSlide, 5000);
    }

    // ---- búsqueda y filtros (unificados) ----
    const searchInput = document.getElementById('searchInput');
    const searchBtn = document.getElementById('searchButton');
    const productCards = Array.from(document.querySelectorAll('.product-card'));

    function applyFilterAndSearch() {
        const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : '';
        // Determinar categoría activa (topFilters o categoryNav)
        const activeCatElement = document.querySelector('#topFilters .filter-btn.active') || document.querySelector('#categoryNav .filter-btn.active');
        const activeCategory = activeCatElement ? activeCatElement.getAttribute('data-cat') || activeCatElement.getAttribute('data-category') || 'todos' : 'todos';

        productCards.forEach(card => {
            const title = card.querySelector('h3')?.textContent.toLowerCase() || '';
            const fullText = card.textContent.toLowerCase();

            // filtro búsqueda
            const matchesSearch = searchTerm === '' || title.includes(searchTerm) || fullText.includes(searchTerm);

            // filtro categoría
            let matchesCat = true;
            if (activeCategory !== 'todos') {
                if (activeCategory === 'consolas') matchesCat = title.includes('switch') || title.includes('ps5') || title.includes('playstation') || title.includes('consola');
                else if (activeCategory === 'laptops' || activeCategory === 'portatiles') matchesCat = title.includes('asus') || title.includes('lenovo') || title.includes('msi') || title.includes('portátil') || title.includes('laptop') || title.includes('computador');
                else if (activeCategory === 'celulares') matchesCat = title.includes('motorola') || title.includes('celular') || title.includes('edge') || title.includes('iphone');
                else if (activeCategory === 'accesorios') matchesCat = title.includes('cámara') || title.includes('teclado') || title.includes('combo') || title.includes('mouse') || title.includes('accesorio');
            }

            card.style.display = (matchesSearch && matchesCat) ? 'flex' : 'none';

            // resaltado (simple)
            if (searchTerm && matchesSearch && card.querySelector('h3')) {
                const h3 = card.querySelector('h3');
                const originalText = h3.textContent;
                if (originalText.toLowerCase().includes(searchTerm)) {
                    const regex = new RegExp(`(${searchTerm.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')})`, 'gi');
                    h3.innerHTML = originalText.replace(regex, `<span class="search-highlight">$1</span>`);
                } else {
                    h3.innerHTML = originalText; // limpia
                }
            } else {
                const h3 = card.querySelector('h3');
                if (h3) h3.innerHTML = h3.textContent; // remueve highlight
            }
        });
    }

    // Eventos búsqueda
    if (searchInput) {
        searchInput.addEventListener('input', applyFilterAndSearch);
        searchInput.addEventListener('keypress', (e) => e.key === 'Enter' && applyFilterAndSearch());
    }
    if (searchBtn) searchBtn.addEventListener('click', applyFilterAndSearch);

    // Filtros botones (top y sticky)
    function setupFilterButtons(containerId) {
        const container = document.getElementById(containerId);
        if (!container) return;
        container.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                // remover active de todos los botones en ambos contenedores
                document.querySelectorAll('#topFilters .filter-btn, #categoryNav .filter-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                // sincronizar el otro contenedor
                const cat = btn.getAttribute('data-cat') || btn.getAttribute('data-category');
                document.querySelectorAll('#topFilters .filter-btn, #categoryNav .filter-btn').forEach(b => {
                    const bCat = b.getAttribute('data-cat') || b.getAttribute('data-category');
                    if (bCat === cat) b.classList.add('active');
                });
                applyFilterAndSearch();
                // update dropdown active state if present
                if (mainMenuDropdown) {
                    mainMenuDropdown.querySelectorAll('a').forEach(a=>a.classList.remove('active'));
                    const linkToActivate = mainMenuDropdown.querySelector(`a[href*="cat=${cat}"]`);
                    if (linkToActivate) linkToActivate.classList.add('active');
                }
            });
        });
    }
    setupFilterButtons('topFilters');
    setupFilterButtons('categoryNav');

    // Actualizar carrito desde localStorage (solo contador)
    function updateCartCount() {
        const cart = JSON.parse(localStorage.getItem('tamCart')) || [];
        const total = cart.reduce((acc, item) => acc + (item.quantity || 1), 0);
        const countSpan = document.getElementById('navCartCount');
        if (countSpan) countSpan.textContent = total;
    }

    // Ajustes de interfaz según usuario logueado/invitado
    function updateUserUI() {
        const state = localStorage.getItem('isLoggedIn');
        const cartLink = document.getElementById('cartNavLink');
        const compareLink = document.getElementById('compareNavLink');
        if (state === 'guest') {
            if (cartLink) cartLink.style.display = 'none';
            if (compareLink) compareLink.style.display = 'none';

            // mostrar aviso de modo invitado en la parte superior
            if (!document.getElementById('guestBanner')) {
                const banner = document.createElement('div');
                banner.id = 'guestBanner';
                banner.textContent = '🔒 Estás navegando como invitado. Regístrate para poder comprar y comentar.';
                banner.style.cssText = 'background:#ffcc00;color:#333;padding:8px;text-align:center;font-size:0.9em;';
                document.body.insertBefore(banner, document.body.firstChild);
            }
        }
    }
    updateCartCount();
    updateUserUI && updateUserUI();

    // logout
    window.logout = function() {
        if (confirm('¿Cerrar sesión?')) {
            localStorage.removeItem('isLoggedIn');
            window.location.href = 'login.html';
        }
    };

    // Enlace catálogo real (no modifica)
    document.querySelectorAll('.view-all-link, #catalogLink').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            window.location.href = link.getAttribute('href');
        });
    });

    // Dropdown menu toggle for mobile (Catalogo arrow) - may remain unused
    document.querySelectorAll('.nav-item.dropdown > .nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            if (window.innerWidth < 900) {
                e.preventDefault();
                const parent = link.parentElement;
                parent.classList.toggle('open');
                const menu = parent.querySelector('.dropdown-menu');
                if (menu) {
                    menu.style.display = parent.classList.contains('open') ? 'block' : 'none';
                }
            }
        });
    });

    // Toggle categories under main MENU button (support both hamburger and pill)
    const menuButtons = [];
    const btn2 = document.getElementById('menuToggle2');
    const btn1 = document.getElementById('menuToggle');
    if (btn2) menuButtons.push(btn2);
    if (btn1 && btn1 !== btn2) menuButtons.push(btn1);
    const mainMenuDropdown = document.getElementById('menuDropdown');
    
    if (menuButtons.length && mainMenuDropdown) {
        menuButtons.forEach(mainMenuBtn => {
            // handle click/tap with visual feedback
            mainMenuBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                const isOpen = mainMenuBtn.classList.contains('open');
                menuButtons.forEach(b => b.classList.remove('open'));
                mainMenuDropdown.style.display = 'none';
                if (!isOpen) {
                    mainMenuBtn.classList.add('open');
                    mainMenuDropdown.style.display = 'block';
                }
            });
            // allow keyboard activation
            mainMenuBtn.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    mainMenuBtn.click();
                }
            });
        });
        // close on Esc key
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape' && mainMenuDropdown.style.display === 'block') {
                menuButtons.forEach(b => b.classList.remove('open'));
                mainMenuDropdown.style.display = 'none';
            }
        });
        // click outside to close
        document.addEventListener('click', (evt) => {
            if (!menuButtons.some(b => b.contains(evt.target)) && !mainMenuDropdown.contains(evt.target)) {
                menuButtons.forEach(b => b.classList.remove('open'));
                mainMenuDropdown.style.display = 'none';
            }
        });
        // prepare links for keyboard and inline filtering with visual update
        mainMenuDropdown.querySelectorAll('a').forEach(link => {
            link.setAttribute('tabindex', '0');
            link.addEventListener('keydown', e => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    link.click();
                }
            });
            link.addEventListener('click', function(e) {
                const href = link.getAttribute('href');
                const params = new URLSearchParams(href.split('?')[1] || '');
                const cat = params.get('cat');
                if (cat) {
                    const path = window.location.pathname.split('/').pop();
                    if (path === '' || path === 'index.html') {
                        e.preventDefault();
                        const btn = document.querySelector(`.filter-btn[data-cat="${cat}"], .filter-btn[data-category="${cat}"]`);
                        if (btn) {
                            btn.click();
                            // update dropdown active state
                            mainMenuDropdown.querySelectorAll('a').forEach(a => a.classList.remove('active'));
                            link.classList.add('active');
                        }
                    } else if (path === 'comparador.html') {
                        e.preventDefault();
                        const btn = document.querySelector(`.filter-btn[data-filter="${cat}"]`);
                        if (btn) {
                            btn.click();
                            mainMenuDropdown.querySelectorAll('a').forEach(a => a.classList.remove('active'));
                            link.classList.add('active');
                        }
                    } else if (path === 'catalogo.html') {
                        e.preventDefault();
                        if (typeof applyUrlFilters === 'function') {
                            const newUrl = window.location.pathname + '?category=' + encodeURIComponent(cat);
                            window.history.pushState({}, '', newUrl);
                            applyUrlFilters();
                            mainMenuDropdown.querySelectorAll('a').forEach(a => a.classList.remove('active'));
                            link.classList.add('active');
                        }
                    }
                    // always close menu after selection
                    menuButtons.forEach(b => b.classList.remove('open'));
                    mainMenuDropdown.style.display = 'none';
                }
            });
        });
    }

    // highlight active category link based on URL query
    (function() {
        const params = new URLSearchParams(window.location.search);
        const cat = params.get('cat');
        if (cat && mainMenuDropdown) {
            const link = mainMenuDropdown.querySelector(`a[href*="cat=${cat}"]`);
            if (link) link.classList.add('active');
        }
    })();

})();