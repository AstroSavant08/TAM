// ======================================================
// DATOS DE PRODUCTOS - CON PESOS COLOMBIANOS
// ======================================================
const products = [
    {
        id: "nintendo-switch-2",
        name: "Nintendo Switch 2 + Mario Kart",
        description: "Consola de videojuegos Nintendo Switch 2 con el juego Mario Kart incluido. Gráficos mejorados, mayor duración de batería y compatibilidad con juegos anteriores.",
        image: "https://images.unsplash.com/photo-1578303512597-81e6cc155b3e?w=600&auto=format",
        priceNow: "$ 1.499.900",
        priceBefore: "$ 1.899.900",
        discount: "−21%",
        category: "Consolas",
        brand: "Nintendo",
        freeShipping: true,
        stock: 15,
        featured: true
    },
    {
        id: "asus-vivobook-16",
        name: "Portátil ASUS Vivobook 16",
        description: "Portátil ASUS Vivobook 16 con procesador Intel Core i5-1235U, 8GB RAM, 512GB SSD, pantalla Full HD y batería de larga duración.",
        image: "https://images.unsplash.com/photo-1593642702821-c8da6771f0c6?w=600&auto=format",
        priceNow: "$ 2.549.900",
        priceBefore: "$ 3.600.000",
        discount: "−29%",
        category: "Portátiles",
        brand: "ASUS",
        freeShipping: true,
        stock: 8
    },
    {
        id: "insta360-ace-pro-2",
        name: "Cámara Insta360 Ace Pro 2",
        description: "Cámara de acción Insta360 Ace Pro 2 con video 8K, estabilización FlowState, resistencia al agua hasta 10m y IA integrada para edición automática.",
        image: "https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?w=600&auto=format",
        priceNow: "$ 1.679.726",
        priceBefore: "$ 2.269.900",
        discount: "−26%",
        category: "Cámaras",
        brand: "Insta360",
        freeShipping: false,
        stock: 5
    },
    {
        id: "motorola-edge-50-fusion",
        name: "Motorola Edge 50 Fusion",
        description: "Smartphone Motorola Edge 50 Fusion con pantalla OLED 144Hz, cámara de 50MP con OIS, carga rápida 68W y procesador Snapdragon.",
        image: "https://images.unsplash.com/photo-1598327105666-5b89351aff97?w=600&auto=format",
        priceNow: "$ 999.900",
        priceBefore: "$ 1.599.900",
        discount: "−38%",
        category: "Celulares",
        brand: "Motorola",
        freeShipping: true,
        stock: 12
    },
    {
        id: "asus-intel-core-i9",
        name: "ASUS ROG Intel Core i9",
        description: "Portátil gamer ASUS ROG con procesador Intel Core i9-13900H, 16GB RAM, 1TB SSD, RTX 4060 y pantalla de 165Hz.",
        image: "https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=600&auto=format",
        priceNow: "$ 3.999.900",
        priceBefore: "$ 5.999.900",
        discount: "−33%",
        category: "Portátiles",
        brand: "ASUS",
        freeShipping: true,
        stock: 3
    },
    {
        id: "msi-katana-17-3",
        name: "MSI Katana 17.3\" Gamer",
        description: "Potente portátil gamer MSI Katana de 17.3 pulgadas, RTX 4060, 16GB RAM, 1TB SSD, pantalla 144Hz y teclado RGB.",
        image: "https://images.unsplash.com/photo-1542751371-adc38448a05e?w=600&auto=format",
        priceNow: "$ 4.999.000",
        priceBefore: "$ 6.499.000",
        discount: "−23%",
        category: "Portátiles",
        brand: "MSI",
        freeShipping: true,
        stock: 4
    },
    {
        id: "kalley-atletico-combo",
        name: "Combo Kalley Atlético",
        description: "Combo de teclado mecánico RGB y mouse gaming Kalley Atlético. Switches intercambiables, 8 botones programables y iluminación personalizable.",
        image: "https://images.unsplash.com/photo-1587829741301-dc798b83add3?w=600&auto=format",
        priceNow: "$ 199.900",
        priceBefore: "$ 289.900",
        discount: "−31%",
        category: "Accesorios",
        brand: "Kalley",
        freeShipping: false,
        stock: 25
    },
    {
        id: "ps5-digital-slim",
        name: "PS5 Digital Edition Slim",
        description: "Consola PlayStation 5 Digital Edition Slim de 1TB, SSD ultrarrápido, retrocompatible, DualSense incluido y gráficos 4K.",
        image: "https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=600&auto=format",
        priceNow: "$ 2.599.000",
        priceBefore: "$ 3.199.000",
        discount: "−19%",
        category: "Consolas",
        brand: "Sony",
        freeShipping: true,
        stock: 6,
        featured: true
    },
    {
        id: "samsung-galaxy-s24",
        name: "Samsung Galaxy S24 Ultra",
        description: "Samsung Galaxy S24 Ultra, cámara de 200MP, S Pen incluido, pantalla Dynamic AMOLED 2X, 12GB RAM y 512GB almacenamiento.",
        image: "https://images.unsplash.com/photo-1610945415295-d9bbf067e59c?w=600&auto=format",
        priceNow: "$ 3.899.900",
        priceBefore: "$ 4.899.900",
        discount: "−20%",
        category: "Celulares",
        brand: "Samsung",
        freeShipping: true,
        stock: 7,
        featured: true
    },
    {
        id: "iphone-15-pro",
        name: "iPhone 15 Pro Max",
        description: "Apple iPhone 15 Pro Max, chip A17 Pro, cámara de 48MP, titanio, USB-C, 256GB y Dynamic Island.",
        image: "https://images.unsplash.com/photo-1695048133142-1a20484d2569?w=600&auto=format",
        priceNow: "$ 5.499.900",
        priceBefore: "$ 6.299.900",
        discount: "−13%",
        category: "Celulares",
        brand: "Apple",
        freeShipping: true,
        stock: 5,
        featured: true
    },
    {
        id: "xbox-series-x",
        name: "Xbox Series X 1TB",
        description: "Xbox Series X de 1TB, 4K a 120fps, Quick Resume, 12 teraflops de potencia, control inalámbrico y Game Pass incluido.",
        image: "https://images.unsplash.com/photo-1621259182978-fbf93132d53d?w=600&auto=format",
        priceNow: "$ 2.799.000",
        priceBefore: "$ 3.299.000",
        discount: "−15%",
        category: "Consolas",
        brand: "Microsoft",
        freeShipping: true,
        stock: 4
    },
    {
        id: "airpods-pro-2",
        name: "AirPods Pro 2",
        description: "AirPods Pro 2 con cancelación activa de ruido, audio espacial personalizado, estuche MagSafe USB-C y resistencia al agua.",
        image: "https://images.unsplash.com/photo-1603351154351-5e2d0600bb77?w=600&auto=format",
        priceNow: "$ 699.900",
        priceBefore: "$ 899.900",
        discount: "−22%",
        category: "Accesorios",
        brand: "Apple",
        freeShipping: false,
        stock: 18
    },
    {
        id: "monitor-samsung-odyssey",
        name: "Monitor Samsung Odyssey G7",
        description: "Monitor curvo Samsung Odyssey G7 27\", 240Hz, 1ms, QHD, G-Sync compatible, HDR600 y diseño sin bordes.",
        image: "https://images.unsplash.com/photo-1616763355603-9755a640a287?w=600&auto=format",
        priceNow: "$ 1.299.900",
        priceBefore: "$ 1.699.900",
        discount: "−24%",
        category: "Accesorios",
        brand: "Samsung",
        freeShipping: true,
        stock: 9
    }
];

// ======================================================
// VARIABLES GLOBALES
// ======================================================
const catalogState = {
    products: products,
    filteredProducts: [],
    selectedCategories: ['Consolas', 'Portátiles', 'Celulares', 'Cámaras', 'Accesorios'],
    selectedBrands: ['Nintendo', 'ASUS', 'Insta360', 'Motorola', 'MSI', 'Kalley', 'Sony', 'Samsung', 'Apple', 'Microsoft'],
    maxPrice: 15000000,
    minRating: 1,
    freeShipping: false,
    sortBy: 'relevance',
    viewMode: 'grid',
    searchTerm: ''
};

let currentProductForReview = null;
let selectedStarRating = 0;
let currentUser = null;
let reviews = [];
let users = [];
let orders = [];
let reviewImages = [];

// ======================================================
// INICIALIZACIÓN
// ======================================================
document.addEventListener('DOMContentLoaded', function() {
    initCatalog();
    initReviews();
    initUsers();
    initOrders();
    initAuth();
    initCart();
    initMercadoPago();
    setupEventListeners();
    updateCartCount();
    updateCategoryCounts();
    updateBrandCounts();
    setupAuthTabs();
    setupImageUpload();
});

function initCatalog() {
    catalogState.filteredProducts = [...products];
    // Aplicar filtros desde querystring si existen
    applyUrlFilters();
    updateFilterControls();
    renderProducts();
    
    // Detectar si viene desde index con parámetro preview
    const params = new URLSearchParams(window.location.search);
    const previewId = params.get('preview');
    if (previewId) {
        // Ejecutar con pequeño delay para asegurar que el DOM esté listo
        setTimeout(() => {
            showQuickView(previewId);
            // Limpiar el parámetro de la URL para no abrirlo de nuevo en recargas
            const cleanUrl = window.location.pathname + (window.location.search.includes('&') ? '?' + window.location.search.split('preview=')[1].split('&')[1] : '');
            window.history.replaceState({}, document.title, cleanUrl);
        }, 100);
    }
}

// Leer query params (?search=, ?category=) y actualizar el estado del catálogo
function applyUrlFilters() {
    try {
        const params = new URLSearchParams(window.location.search);
    // support both ?category= and legacy ?cat= from our dropdown links
    const categoryParam = params.get('category') || params.get('cat');

        const categoryMap = {
            'todos': ['Consolas','Portátiles','Celulares','Cámaras','Accesorios'],
            'consolas': ['Consolas'],
            'portatiles': ['Portátiles'],
            'laptops': ['Portátiles'],
            'celulares': ['Celulares'],
            'accesorios': ['Accesorios']
        };

        if (searchParam) {
            catalogState.searchTerm = decodeURIComponent(searchParam);
            const searchInput = document.getElementById('searchInput');
            if (searchInput) searchInput.value = catalogState.searchTerm;
        }

        if (categoryParam) {
            const key = categoryParam.toLowerCase();
            if (categoryMap[key]) {
                catalogState.selectedCategories = categoryMap[key];
            } else {
                // por si envían el nombre en mayúsculas tal cual
                const normalized = categoryParam.charAt(0).toUpperCase() + categoryParam.slice(1);
                catalogState.selectedCategories = [normalized];
            }

            // marcar elemento activo en la barra de categorías si existe
            const catLinks = document.querySelectorAll('.category-nav a, .filter-buttons a, .categories .filter-btn, .menu-dropdown a');
            catLinks.forEach(link => {
                const dataCat = (link.dataset.category || '').toLowerCase();
                const hrefCat = (new URL(link.href, window.location.origin).searchParams.get('category') || '').toLowerCase();
                if (dataCat && dataCat === key) {
                    link.classList.add('active');
                } else if (hrefCat && hrefCat === key) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        }

        // Si había query, aplicar filtros inmediatamente
        if (searchParam || categoryParam) {
            applyFilters();
        }
    } catch (e) {
        console.warn('applyUrlFilters error', e);
    }
}

// ======================================================
// SISTEMA DE USUARIOS COMPLETO
// ======================================================
function initUsers() {
    const storedUsers = localStorage.getItem('tamUsers');
    if (storedUsers) {
        users = JSON.parse(storedUsers);
    } else {
        // Usuario de prueba
        users = [
            {
                id: 1,
                name: 'Usuario Prueba',
                email: 'test@tam.com',
                password: '123456',
                avatar: 'U',
                isGuest: false,
                createdAt: new Date().toISOString(),
                direcciones: [],
                historialCompras: [],
                favoritos: []
            }
        ];
        localStorage.setItem('tamUsers', JSON.stringify(users));
    }
}

function initAuth() {
    const storedUser = localStorage.getItem('tamCurrentUser');
    if (storedUser) {
        currentUser = JSON.parse(storedUser);
        updateUserUI();
    }
}

function setupAuthTabs() {
    const loginTab = document.getElementById('login-tab');
    const registerTab = document.getElementById('register-tab');
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    const registerBtn = document.getElementById('register-btn');
    const acceptTerms = document.getElementById('accept-terms');
    const regPassword = document.getElementById('reg-password');
    const regConfirmPassword = document.getElementById('reg-confirm-password');
    
    if (loginTab && registerTab) {
        loginTab.addEventListener('click', function() {
            loginTab.classList.add('active');
            registerTab.classList.remove('active');
            loginForm.style.display = 'block';
            registerForm.style.display = 'none';
        });
        
        registerTab.addEventListener('click', function() {
            registerTab.classList.add('active');
            loginTab.classList.remove('active');
            registerForm.style.display = 'block';
            loginForm.style.display = 'none';
        });
    }
    
    // Validar formulario de registro
    if (registerBtn && acceptTerms && regPassword && regConfirmPassword) {
        const validateRegister = function() {
            const name = document.getElementById('reg-name')?.value.trim() || '';
            const email = document.getElementById('reg-email')?.value.trim() || '';
            const password = regPassword.value;
            const confirmPassword = regConfirmPassword.value;
            const termsAccepted = acceptTerms.checked;
            
            const isValid = name.length > 0 && 
                           validateEmail(email) && 
                           password.length >= 6 && 
                           password === confirmPassword && 
                           termsAccepted;
            
            registerBtn.disabled = !isValid;
        };
        
        document.getElementById('reg-name')?.addEventListener('input', validateRegister);
        document.getElementById('reg-email')?.addEventListener('input', validateRegister);
        regPassword.addEventListener('input', validateRegister);
        regConfirmPassword.addEventListener('input', validateRegister);
        acceptTerms.addEventListener('change', validateRegister);
    }
}

function handleRegister(e) {
    e.preventDefault();
    
    const name = document.getElementById('reg-name').value.trim();
    const email = document.getElementById('reg-email').value.trim();
    const password = document.getElementById('reg-password').value;
    
    // Verificar si el email ya existe
    if (users.some(u => u.email === email)) {
        showToast('El email ya está registrado', 'error');
        return;
    }
    
    // Crear nuevo usuario
    const newUser = {
        id: Date.now(),
        name: name,
        email: email,
        password: password,
        avatar: name.charAt(0).toUpperCase(),
        isGuest: false,
        createdAt: new Date().toISOString(),
        direcciones: [],
        historialCompras: [],
        favoritos: []
    };
    
    users.push(newUser);
    localStorage.setItem('tamUsers', JSON.stringify(users));
    
    // Iniciar sesión automáticamente
    currentUser = newUser;
    localStorage.setItem('tamCurrentUser', JSON.stringify(newUser));
    
    showToast('¡Registro exitoso!', 'success');
    closeAuthModal();
    updateUserUI();
}

function handleLogin() {
    const email = document.getElementById('auth-email').value.trim();
    const password = document.getElementById('auth-password').value.trim();
    const errorDiv = document.getElementById('auth-error');
    const errorMessage = document.getElementById('error-message');
    
    if (!email || !password) {
        errorMessage.textContent = 'Por favor, completa todos los campos.';
        errorDiv.style.display = 'block';
        return;
    }
    
    // Buscar usuario
    const user = users.find(u => u.email === email && u.password === password);
    
    if (!user) {
        errorMessage.textContent = 'Email o contraseña incorrectos';
        errorDiv.style.display = 'block';
        return;
    }
    
    currentUser = user;
    localStorage.setItem('tamCurrentUser', JSON.stringify(user));
    updateUserUI();
    closeAuthModal();
    showToast(`¡Bienvenido, ${user.name}!`, 'success');
    
    if (window.pendingReviewProductId) {
        setTimeout(() => {
            openReviewsModal(window.pendingReviewProductId);
            window.pendingReviewProductId = null;
        }, 500);
    }
}

function handleGuestLogin() {
    currentUser = {
        id: 'guest_' + Date.now(),
        email: 'invitado@tam.com',
        name: 'Invitado TAM',
        avatar: 'I',
        isGuest: true,
        createdAt: new Date().toISOString(),
        favoritos: []
    };
    
    localStorage.setItem('tamCurrentUser', JSON.stringify(currentUser));
    updateUserUI();
    closeAuthModal();
    showToast('¡Sesión iniciada como invitado!', 'success');
    
    if (window.pendingReviewProductId) {
        setTimeout(() => {
            openReviewsModal(window.pendingReviewProductId);
            window.pendingReviewProductId = null;
        }, 500);
    }
}

function handleLogout() {
    if (confirm('¿Estás seguro de que quieres cerrar sesión?')) {
        currentUser = null;
        localStorage.removeItem('tamCurrentUser');
        updateUserUI();
        showToast('Sesión cerrada correctamente', 'info');
        document.querySelectorAll('.user-dropdown').forEach(d => d.remove());
    }
}

// ======================================================
// SISTEMA DE ÓRDENES Y FACTURACIÓN
// ======================================================
function initOrders() {
    const storedOrders = localStorage.getItem('tamOrders');
    if (storedOrders) {
        orders = JSON.parse(storedOrders);
    }
}

function processCheckout() {
    const cart = JSON.parse(localStorage.getItem('tamCart')) || [];
    
    if (cart.length === 0) {
        showToast('Tu carrito está vacío', 'error');
        return;
    }
    
    if (!currentUser) {
        showToast('Inicia sesión para continuar', 'info');
        openAuthModal();
        return;
    }
    
    const subtotal = cart.reduce((sum, item) => sum + (getPriceValue(item.priceNow) * item.quantity), 0);
    const shipping = subtotal > 100000 ? 0 : 10000;
    const tax = Math.round(subtotal * 0.19); // IVA 19% Colombia
    const total = subtotal + shipping + tax;
    
    // Crear número de orden único
    const orderNumber = 'TAM-' + Date.now() + '-' + Math.floor(Math.random() * 1000);
    
    // Crear orden
    const order = {
        id: Date.now(),
        orderNumber: orderNumber,
        userId: currentUser.id,
        userName: currentUser.name,
        userEmail: currentUser.email,
        items: cart.map(item => ({
            id: item.id,
            name: item.name,
            price: item.priceNow,
            quantity: item.quantity,
            subtotal: getPriceValue(item.priceNow) * item.quantity
        })),
        subtotal: subtotal,
        shipping: shipping,
        tax: tax,
        total: total,
        status: 'Pendiente',
        paymentMethod: 'Pendiente',
        createdAt: new Date().toISOString(),
        updatedAt: new Date().toISOString()
    };
    
    orders.push(order);
    localStorage.setItem('tamOrders', JSON.stringify(orders));
    
    // Agregar al historial del usuario
    if (!currentUser.historialCompras) {
        currentUser.historialCompras = [];
    }
    currentUser.historialCompras.push(order);
    localStorage.setItem('tamCurrentUser', JSON.stringify(currentUser));
    
    // Actualizar en la lista de usuarios
    const userIndex = users.findIndex(u => u.id === currentUser.id);
    if (userIndex !== -1) {
        users[userIndex] = currentUser;
        localStorage.setItem('tamUsers', JSON.stringify(users));
    }
    
    // Mostrar modal de confirmación
    document.getElementById('order-number').textContent = orderNumber;
    document.getElementById('order-total').textContent = formatCurrency(total);
    document.getElementById('order-subtotal').textContent = formatCurrency(subtotal);
    document.getElementById('order-tax').textContent = formatCurrency(tax);
    document.getElementById('order-shipping').textContent = shipping === 0 ? 'Gratis' : formatCurrency(shipping);
    
    document.getElementById('checkout-modal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
    
    // Limpiar carrito
    localStorage.setItem('tamCart', JSON.stringify([]));
    updateCartCount();
    renderProducts();
    toggleCartSection();
    
    // Enviar email de confirmación (simulado)
    sendOrderConfirmationEmail(order);
}

function sendOrderConfirmationEmail(order) {
    console.log('Enviando email de confirmación a:', order.userEmail);
    console.log('Orden:', order.orderNumber);
    showToast('Email de confirmación enviado', 'success');
}

function generateInvoicePDF() {
    showToast('Generando factura PDF...', 'info');
    
    // Aquí se integraría jsPDF
    setTimeout(() => {
        showToast('Factura descargada', 'success');
    }, 1500);
}

// ======================================================
// FUNCIONES DE FAVORITOS
// ======================================================
function addToFavorites(productId) {
    if (!currentUser) {
        showToast('Inicia sesión para guardar favoritos', 'info');
        openAuthModal();
        return;
    }
    
    const product = products.find(p => p.id === productId);
    if (!product) return;
    
    if (!currentUser.favoritos) {
        currentUser.favoritos = [];
    }
    
    if (currentUser.favoritos.some(f => f.id === productId)) {
        currentUser.favoritos = currentUser.favoritos.filter(f => f.id !== productId);
        showToast('Eliminado de favoritos', 'info');
    } else {
        currentUser.favoritos.push(product);
        showToast('Agregado a favoritos', 'success');
    }
    
    // Actualizar en localStorage
    localStorage.setItem('tamCurrentUser', JSON.stringify(currentUser));
    
    // Actualizar en la lista de usuarios
    const userIndex = users.findIndex(u => u.id === currentUser.id);
    if (userIndex !== -1) {
        users[userIndex] = currentUser;
        localStorage.setItem('tamUsers', JSON.stringify(users));
    }
    
    renderProducts(); // Para actualizar el icono de favorito en las tarjetas
}

function isInFavorites(productId) {
    if (!currentUser || !currentUser.favoritos) return false;
    return currentUser.favoritos.some(f => f.id === productId);
}

// ======================================================
// CONFIGURACIÓN DE EVENT LISTENERS
// ======================================================
function setupEventListeners() {
    // Menú toggle móvil
    const menuToggle = document.getElementById('menuToggle');
    if (menuToggle) {
        menuToggle.addEventListener('click', toggleMobileMenu);
    }

    // Menú principal desplegable (categorías) bajo botón MENÚ
    const mainMenuBtn = document.getElementById('menuToggle');
    const mainMenuDropdown = document.getElementById('menuDropdown');
    if (mainMenuBtn && mainMenuDropdown) {
        mainMenuBtn.addEventListener('click', function(e) {
            mainMenuBtn.classList.toggle('open');
            mainMenuDropdown.style.display = mainMenuBtn.classList.contains('open') ? 'block' : 'none';
        });
        document.addEventListener('click', (evt) => {
            if (!mainMenuBtn.contains(evt.target) && !mainMenuDropdown.contains(evt.target)) {
                mainMenuBtn.classList.remove('open');
                mainMenuDropdown.style.display = 'none';
            }
        });
    }

    // Búsqueda
    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');
    
    if (searchButton) {
        searchButton.addEventListener('click', performSearch);
    }
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') performSearch();
        });
    }

    // Icono de usuario
    const userIcon = document.getElementById('userIcon');
    if (userIcon) {
        userIcon.addEventListener('click', handleUserIconClick);
    }

    // Carrito - abrir (usar cartNavLink que es el link del carrito en la navegación)
    const cartIcon = document.getElementById('cartNavLink');
    if (cartIcon) {
        cartIcon.addEventListener('click', function(e) {
            e.preventDefault(); // Prevenir navegación al href
            toggleCartSection();
        });
    }

    // Cerrar carrito
    const closeCartBtn = document.getElementById('close-cart');
    if (closeCartBtn) {
        closeCartBtn.addEventListener('click', toggleCartSection);
    }

    // Continuar comprando desde carrito vacío
    const continueShoppingBtn = document.getElementById('continue-shopping-btn');
    if (continueShoppingBtn) {
        continueShoppingBtn.addEventListener('click', toggleCartSection);
    }

    // Continuar comprando desde resumen
    const continueShoppingSummary = document.getElementById('continue-shopping-from-summary');
    if (continueShoppingSummary) {
        continueShoppingSummary.addEventListener('click', toggleCartSection);
    }

    // Continuar comprando desde modal de checkout
    const continueShoppingCheckout = document.getElementById('continue-shopping-checkout');
    if (continueShoppingCheckout) {
        continueShoppingCheckout.addEventListener('click', function() {
            document.getElementById('checkout-modal').style.display = 'none';
            document.body.style.overflow = '';
            toggleCartSection();
        });
    }

    // Vaciar carrito
    const clearCartBtn = document.getElementById('clear-cart-btn');
    if (clearCartBtn) {
        clearCartBtn.addEventListener('click', clearCart);
    }

    // Checkout
    const checkoutBtn = document.getElementById('checkout-button');
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', processCheckout);
    }
    
    // Botón MercadoPago
    const mpBtn = document.getElementById('mercadopago-button');
    if (mpBtn) {
        mpBtn.addEventListener('click', processMercadoPagoPayment);
    }
    
    // Descargar factura
    const downloadInvoice = document.getElementById('download-invoice');
    if (downloadInvoice) {
        downloadInvoice.addEventListener('click', generateInvoicePDF);
    }

    // Favoritos
    const favoritesIcon = document.getElementById('favoritesIcon');
    if (favoritesIcon) {
        favoritesIcon.addEventListener('click', function() {
            if (currentUser) {
                window.location.href = 'user/favoritos.html';
            } else {
                openAuthModal();
            }
        });
    }

    // Botón comparar
    

    // Filtros de categorías
    document.querySelectorAll('.category-item input[name="category"]').forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedCategories);
    });
    
    // Filtros de marcas
    document.querySelectorAll('.category-item input[name="brand"]').forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedBrands);
    });

    const priceSlider = document.getElementById('price-slider');
    if (priceSlider) {
        priceSlider.addEventListener('input', function(e) {
            updatePriceSlider();
            catalogState.maxPrice = parseInt(e.target.value);
        });
    }

    document.querySelectorAll('input[name="rating"]').forEach(radio => {
        radio.addEventListener('change', function() {
            catalogState.minRating = parseInt(this.value);
        });
    });

    const freeShippingCheck = document.getElementById('freeShippingCheck');
    if (freeShippingCheck) {
        freeShippingCheck.addEventListener('change', function() {
            catalogState.freeShipping = this.checked;
        });
    }

    const applyBtn = document.getElementById('apply-filters');
    if (applyBtn) applyBtn.addEventListener('click', applyFilters);

    const resetBtn = document.getElementById('reset-filters');
    if (resetBtn) resetBtn.addEventListener('click', resetFilters);

    const clearAllBtn = document.getElementById('clear-all-filters');
    if (clearAllBtn) clearAllBtn.addEventListener('click', resetAllFilters);

    // Ordenamiento
    const sortSelect = document.getElementById('sort-select');
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            catalogState.sortBy = this.value;
            applyFilters();
        });
    }

    // Vista
    document.querySelectorAll('.view-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.view-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            catalogState.viewMode = this.dataset.view;
            renderProducts();
        });
    });

    // Navegación por categorías
    document.querySelectorAll('.category-nav a').forEach(link => {
        link.addEventListener('click', handleCategoryClick);
    });

    // Cerrar modales con ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeAllModals();
        }
    });

    // Event listeners para modal de autenticación
    const closeAuthBtn = document.getElementById('close-auth-modal');
    const cancelAuthBtn = document.getElementById('cancel-auth');
    const loginBtn = document.getElementById('login-btn');
    const guestBtn = document.getElementById('guest-login-btn');
    const registerBtn = document.getElementById('register-btn');
    const googleBtn = document.getElementById('google-login-btn');
    const facebookBtn = document.getElementById('facebook-login-btn');
    
    if (closeAuthBtn) closeAuthBtn.addEventListener('click', closeAuthModal);
    if (cancelAuthBtn) cancelAuthBtn.addEventListener('click', closeAuthModal);
    
    const authModal = document.getElementById('auth-modal');
    if (authModal) {
        authModal.addEventListener('click', function(e) {
            if (e.target === authModal) closeAuthModal();
        });
    }
    
    if (loginBtn) loginBtn.addEventListener('click', handleLogin);
    if (guestBtn) guestBtn.addEventListener('click', handleGuestLogin);
    if (registerBtn) registerBtn.addEventListener('click', handleRegister);
    
    if (googleBtn) {
        googleBtn.addEventListener('click', function() {
            showToast('Login con Google (próximamente)', 'info');
        });
    }
    
    if (facebookBtn) {
        facebookBtn.addEventListener('click', function() {
            showToast('Login con Facebook (próximamente)', 'info');
        });
    }
    
    const authEmail = document.getElementById('auth-email');
    const authPassword = document.getElementById('auth-password');
    
    if (authEmail && authPassword) {
        authEmail.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') handleLogin();
        });
        authPassword.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') handleLogin();
        });
    }

    // Cerrar modal de checkout
    const closeCheckoutModal = document.getElementById('close-checkout-modal');
    if (closeCheckoutModal) {
        closeCheckoutModal.addEventListener('click', function() {
            document.getElementById('checkout-modal').style.display = 'none';
            document.body.style.overflow = '';
        });
    }

    // Setup reviews modal events
    setupReviewsModalEvents();

    // Quick view modal events
    document.getElementById('quick-view-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            this.style.display = 'none';
            document.body.style.overflow = '';
        }
    });

    document.getElementById('close-quick-view').addEventListener('click', function() {
        document.getElementById('quick-view-modal').style.display = 'none';
        document.body.style.overflow = '';
    });
}

// ======================================================
// FUNCIONES DE FILTROS AVANZADOS
// ======================================================
function updateSelectedCategories() {
    const selected = [];
    document.querySelectorAll('.category-item input[name="category"]:checked').forEach(checkbox => {
        selected.push(checkbox.value);
    });
    catalogState.selectedCategories = selected;
}

function updateSelectedBrands() {
    const selected = [];
    document.querySelectorAll('.category-item input[name="brand"]:checked').forEach(checkbox => {
        selected.push(checkbox.value);
    });
    catalogState.selectedBrands = selected;
}

function updatePriceSlider() {
    const priceSlider = document.getElementById('price-slider');
    if (!priceSlider) return;
    
    const value = parseInt(priceSlider.value);
    const percent = (value / 15000000) * 100;
    
    document.getElementById('max-price').textContent = formatCurrency(value);
    priceSlider.style.background = `linear-gradient(to right, #4CAF50 0%, #4CAF50 ${percent}%, #ccc ${percent}%, #ccc 100%)`;
}

function updateFilterControls() {
    document.querySelectorAll('.category-item input[name="category"]').forEach(checkbox => {
        checkbox.checked = catalogState.selectedCategories.includes(checkbox.value);
    });
    
    document.querySelectorAll('.category-item input[name="brand"]').forEach(checkbox => {
        checkbox.checked = catalogState.selectedBrands.includes(checkbox.value);
    });

    const priceSlider = document.getElementById('price-slider');
    if (priceSlider) {
        priceSlider.value = catalogState.maxPrice;
        updatePriceSlider();
    }

    document.querySelectorAll('input[name="rating"]').forEach(radio => {
        if (parseInt(radio.value) === catalogState.minRating) {
            radio.checked = true;
        }
    });
}

function updateCategoryCounts() {
    const categories = {
        'Consolas': 0,
        'Portátiles': 0,
        'Celulares': 0,
        'Cámaras': 0,
        'Accesorios': 0
    };
    
    products.forEach(product => {
        if (categories.hasOwnProperty(product.category)) {
            categories[product.category]++;
        }
    });
    
    document.getElementById('count-consolas').textContent = `(${categories.Consolas})`;
    document.getElementById('count-portatiles').textContent = `(${categories.Portátiles})`;
    document.getElementById('count-celulares').textContent = `(${categories.Celulares})`;
    document.getElementById('count-camaras').textContent = `(${categories.Cámaras})`;
    document.getElementById('count-accesorios').textContent = `(${categories.Accesorios})`;
}

function updateBrandCounts() {
    const brands = {
        'Nintendo': 0,
        'ASUS': 0,
        'Insta360': 0,
        'Motorola': 0,
        'MSI': 0,
        'Kalley': 0,
        'Sony': 0,
        'Samsung': 0,
        'Apple': 0,
        'Microsoft': 0
    };
    
    products.forEach(product => {
        if (brands.hasOwnProperty(product.brand)) {
            brands[product.brand]++;
        }
    });
    
    document.getElementById('count-nintendo').textContent = `(${brands.Nintendo})`;
    document.getElementById('count-asus').textContent = `(${brands.ASUS})`;
    document.getElementById('count-insta360').textContent = `(${brands.Insta360})`;
    document.getElementById('count-motorola').textContent = `(${brands.Motorola})`;
    document.getElementById('count-msi').textContent = `(${brands.MSI})`;
    document.getElementById('count-kalley').textContent = `(${brands.Kalley})`;
    document.getElementById('count-sony').textContent = `(${brands.Sony})`;
    document.getElementById('count-samsung').textContent = `(${brands.Samsung})`;
    document.getElementById('count-apple').textContent = `(${brands.Apple})`;
    document.getElementById('count-microsoft').textContent = `(${brands.Microsoft})`;
}

function applyFilters() {
    let filtered = [...products];

    if (catalogState.searchTerm) {
        const term = catalogState.searchTerm.toLowerCase();
        filtered = filtered.filter(product => 
            product.name.toLowerCase().includes(term) ||
            product.description.toLowerCase().includes(term) ||
            product.category.toLowerCase().includes(term)
        );
    }

    if (catalogState.selectedCategories.length > 0) {
        filtered = filtered.filter(product =>
            catalogState.selectedCategories.includes(product.category)
        );
    }
    
    if (catalogState.selectedBrands.length > 0) {
        filtered = filtered.filter(product =>
            catalogState.selectedBrands.includes(product.brand)
        );
    }

    filtered = filtered.filter(product => {
        const price = getProductPriceValue(product);
        return price <= catalogState.maxPrice;
    });

    if (catalogState.minRating > 1) {
        filtered = filtered.filter(product => {
            const rating = getProductRating(product.id);
            return rating >= catalogState.minRating;
        });
    }

    if (catalogState.freeShipping) {
        filtered = filtered.filter(product => product.freeShipping);
    }

    filtered.sort((a, b) => {
        switch(catalogState.sortBy) {
            case 'price-low':
                return getProductPriceValue(a) - getProductPriceValue(b);
            case 'price-high':
                return getProductPriceValue(b) - getProductPriceValue(a);
            case 'rating':
                return getProductRating(b.id) - getProductRating(a.id);
            case 'name':
                return a.name.localeCompare(b.name);
            default:
                return 0;
        }
    });

    catalogState.filteredProducts = filtered;
    renderProducts();
}

function resetFilters() {
    catalogState.selectedCategories = ['Consolas', 'Portátiles', 'Celulares', 'Cámaras', 'Accesorios'];
    catalogState.selectedBrands = ['Nintendo', 'ASUS', 'Insta360', 'Motorola', 'MSI', 'Kalley', 'Sony', 'Samsung', 'Apple', 'Microsoft'];
    catalogState.maxPrice = 15000000;
    catalogState.minRating = 1;
    catalogState.freeShipping = false;
    catalogState.searchTerm = '';
    
    const searchInput = document.getElementById('searchInput');
    if (searchInput) searchInput.value = '';
    
    const freeShippingCheck = document.getElementById('freeShippingCheck');
    if (freeShippingCheck) freeShippingCheck.checked = false;
    
    updateFilterControls();
    applyFilters();
    showToast('Filtros restablecidos', 'info');
}

function resetAllFilters() {
    resetFilters();
    showToast('Todos los filtros fueron limpiados', 'success');
}

function performSearch() {
    const searchInput = document.getElementById('searchInput');
    if (!searchInput) return;
    
    catalogState.searchTerm = searchInput.value.trim();
    applyFilters();
    
    if (catalogState.searchTerm) {
        showToast(`Buscando: "${catalogState.searchTerm}"`, 'info');
    }
}

// ======================================================
// FUNCIONES DE RENDERIZADO DE PRODUCTOS
// ======================================================
function renderProducts() {
    const productGrid = document.getElementById('product-grid');
    const noResultsMessage = document.getElementById('no-results-message');
    const productCount = document.getElementById('product-count');

    if (!productGrid) return;

    productCount.textContent = `${catalogState.filteredProducts.length} ${catalogState.filteredProducts.length === 1 ? 'producto encontrado' : 'productos encontrados'}`;

    if (catalogState.filteredProducts.length === 0) {
        noResultsMessage.style.display = 'block';
        productGrid.innerHTML = '';
        return;
    }

    noResultsMessage.style.display = 'none';
    productGrid.className = `product-grid ${catalogState.viewMode}-view`;
    productGrid.innerHTML = '';
    
    catalogState.filteredProducts.forEach((product, index) => {
        const productCard = createProductCard(product);
        productCard.style.animationDelay = `${index * 0.05}s`;
        productCard.classList.add('animate-up');
        productGrid.appendChild(productCard);
    });
}

function createProductCard(product) {
    const card = document.createElement('div');
    card.className = 'product-card';
    card.dataset.id = product.id;
    
    const rating = getProductRating(product.id);
    const reviewCount = getReviewCount(product.id);
    const isInCart = isProductInCart(product.id);
    const isFav = isInFavorites(product.id);
    const discount = product.priceBefore ? Math.round((1 - getProductPriceValue(product) / getPriceValue(product.priceBefore)) * 100) : 0;

    card.innerHTML = `
        <div class="product-badges">
            ${product.discount ? `<span class="badge discount"><i class="fas fa-tag"></i> ${product.discount}</span>` : ''}
            ${product.freeShipping ? '<span class="badge offer"><i class="fas fa-truck"></i> ENVÍO GRATIS</span>' : ''}
            ${product.stock < 5 ? '<span class="badge new"><i class="fas fa-bolt"></i> ÚLTIMAS UNIDADES</span>' : ''}
            ${product.featured ? '<span class="badge featured"><i class="fas fa-crown"></i> DESTACADO</span>' : ''}
        </div>

        <div class="product-image">
            <img src="${product.image}" alt="${product.name}" loading="lazy"
                 onerror="this.src='https://via.placeholder.com/300x200?text=${encodeURIComponent(product.name)}'">
            <div class="image-overlay">
                <button class="quick-view-btn" data-id="${product.id}">
                    <i class="fas fa-eye"></i> VISTA RÁPIDA
                </button>
            </div>
        </div>

        <div class="product-info">
            <div class="product-category">
                <i class="fas fa-tag"></i> ${product.category} | ${product.brand}
            </div>
            
            <h3 class="product-title">${product.name}</h3>
            
            <div class="product-description">
                ${product.description.substring(0, 80)}...
            </div>

            <div class="product-rating">
                <div class="stars">
                    ${generateStarsHTML(rating)}
                </div>
                <span class="rating-text">
                    ${rating.toFixed(1)} (${reviewCount} ${reviewCount === 1 ? 'reseña' : 'reseñas'})
                </span>
            </div>

            <div class="product-pricing">
                <div class="current-price">
                    ${product.priceNow}
                    ${discount > 0 ? `<span class="price-save">-${discount}%</span>` : ''}
                </div>
                ${product.priceBefore ? `
                    <div class="original-price">${product.priceBefore}</div>
                ` : ''}
            </div>

            <div class="product-stock">
                <i class="fas fa-box"></i> Stock: ${product.stock} unidades
            </div>

            <div class="product-actions">
                <button class="action-btn cart-btn ${isInCart ? 'in-cart' : ''}" data-id="${product.id}">
                    <i class="fas ${isInCart ? 'fa-check' : 'fa-cart-plus'}"></i>
                    ${isInCart ? 'EN CARRITO' : 'AGREGAR'}
                </button>
                <button class="action-btn reviews-btn" data-id="${product.id}">
                    <i class="fas fa-star"></i> RESEÑAS
                </button>
                <button class="action-btn details-btn" data-id="${product.id}">
                    <i class="fas fa-info-circle"></i> DETALLES
                </button>
                <button class="action-btn favorite-btn ${isFav ? 'in-favorites' : ''}" data-id="${product.id}" style="background: ${isFav ? '#ff4081' : '#f8f9fa'}; color: ${isFav ? 'white' : '#333'};">
                    <i class="fas fa-heart"></i>
                </button>
            </div>
        </div>
    `;

    card.querySelector('.cart-btn').addEventListener('click', () => addToCart(product.id));
    card.querySelector('.reviews-btn').addEventListener('click', () => openReviewsModal(product.id));
    card.querySelector('.quick-view-btn').addEventListener('click', () => showQuickView(product.id));
    card.querySelector('.details-btn').addEventListener('click', () => showProductDetails(product.id));
    card.querySelector('.favorite-btn').addEventListener('click', () => addToFavorites(product.id));

    return card;
}

// ======================================================
// FUNCIONES DEL CARRITO
// ======================================================
function toggleCartSection() {
    const cartSection = document.getElementById('cart-section');
    if (cartSection.style.display === 'none' || cartSection.style.display === '') {
        cartSection.style.display = 'flex';
        renderCartItems();
        document.body.style.overflow = 'hidden';
    } else {
        cartSection.style.display = 'none';
        document.body.style.overflow = '';
    }
}

function renderCartItems() {
    const cart = JSON.parse(localStorage.getItem('tamCart')) || [];
    const cartContainer = document.getElementById('cart-items-container');
    const cartSummary = document.getElementById('cart-summary');
    const mpBtn = document.getElementById('mercadopago-button');
    
    if (cart.length === 0) {
        cartSummary.style.display = 'none';
        if (mpBtn) mpBtn.style.display = 'none';
        cartContainer.innerHTML = `
            <div class="empty-cart-message">
                <i class="fas fa-shopping-cart"></i>
                <h3>Tu carrito está vacío</h3>
                <p>Explora nuestro catálogo y encuentra los mejores productos tecnológicos.</p>
                <button id="continue-shopping-btn" class="continue-shopping-btn">
                    <i class="fas fa-arrow-left"></i> Seguir Comprando
                </button>
            </div>
        `;
        document.getElementById('continue-shopping-btn').addEventListener('click', toggleCartSection);
        return;
    }

    cartSummary.style.display = 'block';
    if (mpBtn) mpBtn.style.display = 'block';
    
    let cartHTML = '';
    let subtotal = 0;
    
    cart.forEach(item => {
        const itemPrice = getPriceValue(item.priceNow || item.price);
        const itemTotal = itemPrice * item.quantity;
        subtotal += itemTotal;
        
        cartHTML += `
            <div class="cart-item" data-id="${item.id}">
                <img src="${item.image}" alt="${item.name}" loading="lazy">
                <div class="cart-item-details">
                    <h4>${item.name}</h4>
                    <div class="cart-item-price">${item.priceNow || item.price}</div>
                    <div class="cart-item-quantity">
                        <button class="decrease-qty" data-id="${item.id}">-</button>
                        <span>${item.quantity}</span>
                        <button class="increase-qty" data-id="${item.id}">+</button>
                    </div>
                    <button class="remove-item-btn" data-id="${item.id}">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </button>
                </div>
            </div>
        `;
    });
    
    cartContainer.innerHTML = cartHTML;
    
    const shipping = subtotal > 100000 ? 0 : 10000;
    const total = subtotal + shipping;
    
    document.getElementById('cart-subtotal').textContent = formatCurrency(subtotal);
    document.getElementById('cart-shipping').textContent = shipping === 0 ? 'Gratis' : formatCurrency(shipping);
    document.getElementById('cart-total').textContent = formatCurrency(total);
    
    cartContainer.querySelectorAll('.increase-qty').forEach(btn => {
        btn.removeEventListener('click', handleIncreaseQuantity);
        btn.addEventListener('click', handleIncreaseQuantity);
    });
    
    cartContainer.querySelectorAll('.decrease-qty').forEach(btn => {
        btn.removeEventListener('click', handleDecreaseQuantity);
        btn.addEventListener('click', handleDecreaseQuantity);
    });
    
    cartContainer.querySelectorAll('.remove-item-btn').forEach(btn => {
        btn.removeEventListener('click', handleRemoveItem);
        btn.addEventListener('click', handleRemoveItem);
    });
}

function handleIncreaseQuantity(e) {
    const productId = e.currentTarget.dataset.id;
    updateCartQuantity(productId, 1);
}

function handleDecreaseQuantity(e) {
    const productId = e.currentTarget.dataset.id;
    updateCartQuantity(productId, -1);
}

function handleRemoveItem(e) {
    const productId = e.currentTarget.dataset.id;
    removeFromCart(productId);
}

function updateCartQuantity(productId, change) {
    const cart = JSON.parse(localStorage.getItem('tamCart')) || [];
    const itemIndex = cart.findIndex(item => item.id === productId);
    
    if (itemIndex !== -1) {
        cart[itemIndex].quantity += change;
        
        if (cart[itemIndex].quantity <= 0) {
            cart.splice(itemIndex, 1);
            showToast('Producto eliminado del carrito', 'info');
        } else {
            showToast('Cantidad actualizada', 'success');
        }
        
        localStorage.setItem('tamCart', JSON.stringify(cart));
        updateCartCount();
        renderCartItems();
        renderProducts();
    }
}

function removeFromCart(productId) {
    let cart = JSON.parse(localStorage.getItem('tamCart')) || [];
    cart = cart.filter(item => item.id !== productId);
    localStorage.setItem('tamCart', JSON.stringify(cart));
    updateCartCount();
    renderCartItems();
    renderProducts();
    showToast('Producto eliminado del carrito', 'info');
}

function clearCart() {
    if (confirm('¿Estás seguro de que quieres vaciar el carrito?')) {
        localStorage.setItem('tamCart', JSON.stringify([]));
        updateCartCount();
        renderCartItems();
        renderProducts();
        showToast('Carrito vaciado', 'info');
    }
}

function addToCart(productId) {
    const product = products.find(p => p.id === productId);
    if (!product) return;
    
    const cart = JSON.parse(localStorage.getItem('tamCart')) || [];
    const existing = cart.find(item => item.id === productId);
    
    if (existing) {
        existing.quantity += 1;
        showToast(`Otra unidad de ${product.name} agregada`, 'success');
    } else {
        cart.push({
            ...product,
            quantity: 1,
            addedAt: new Date().toISOString()
        });
        showToast(`${product.name} agregado al carrito`, 'success');
    }
    
    localStorage.setItem('tamCart', JSON.stringify(cart));
    updateCartCount();
    renderProducts();
}

function isProductInCart(productId) {
    const cart = JSON.parse(localStorage.getItem('tamCart')) || [];
    return cart.some(item => item.id === productId);
}

function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem('tamCart')) || [];
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    const cartCount = document.getElementById('navCartCount');
    if (cartCount) cartCount.textContent = totalItems;
}

// ======================================================
// FUNCIONES DE USUARIO Y AUTENTICACIÓN
// ======================================================
function handleUserIconClick(e) {
    e.stopPropagation();
    
    if (currentUser) {
        toggleUserDropdown();
    } else {
        openAuthModal();
    }
}

function toggleUserDropdown() {
    const existingDropdown = document.querySelector('.user-dropdown');
    if (existingDropdown) {
        existingDropdown.remove();
        return;
    }

    const dropdown = document.createElement('div');
    dropdown.className = 'user-dropdown';
    dropdown.innerHTML = `
        <div style="padding: 15px; border-bottom: 1px solid #eee;">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div style="width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, #0d47a1 0%, #5472d3 100%); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                    ${currentUser.avatar}
                </div>
                <div>
                    <div style="font-weight: 600; color: #333;">${currentUser.name}</div>
                    <div style="font-size: 0.8rem; color: #666;">${currentUser.email}</div>
                </div>
            </div>
        </div>
        <div style="padding: 5px;">
            <button class="dropdown-item" id="user-profile-btn">
                <i class="fas fa-user-circle"></i> Mi perfil
            </button>
            <button class="dropdown-item" id="user-orders-btn">
                <i class="fas fa-shopping-bag"></i> Mis compras
            </button>
            <button class="dropdown-item" id="user-favorites-btn">
                <i class="fas fa-heart"></i> Favoritos
            </button>
            <button class="dropdown-item" id="user-reviews-btn">
                <i class="fas fa-star"></i> Mis reseñas
            </button>
            <div style="border-top: 1px solid #eee; margin: 5px 0;"></div>
            <button class="dropdown-item" id="logout-btn" style="color: #f44336;">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </button>
        </div>
    `;

    const userIcon = document.getElementById('userIcon');
    userIcon.parentNode.appendChild(dropdown);

    document.getElementById('logout-btn').addEventListener('click', handleLogout);
    document.getElementById('user-profile-btn').addEventListener('click', () => {
        window.location.href = 'user/perfil.html';
        dropdown.remove();
    });
    document.getElementById('user-orders-btn').addEventListener('click', () => {
        window.location.href = 'user/historial.html';
        dropdown.remove();
    });
    document.getElementById('user-favorites-btn').addEventListener('click', () => {
        window.location.href = 'user/favoritos.html';
        dropdown.remove();
    });
    document.getElementById('user-reviews-btn').addEventListener('click', () => {
        showUserReviews();
        dropdown.remove();
    });

    setTimeout(() => {
        document.addEventListener('click', function closeDropdown(e) {
            if (!dropdown.contains(e.target) && !e.target.closest('#userIcon')) {
                dropdown.remove();
                document.removeEventListener('click', closeDropdown);
            }
        });
    }, 10);
}

function openAuthModal() {
    const modal = document.getElementById('auth-modal');
    if (!modal) return;
    
    document.getElementById('auth-error').style.display = 'none';
    document.getElementById('auth-email').value = '';
    document.getElementById('auth-password').value = '';
    
    // Resetear tabs a login
    const loginTab = document.getElementById('login-tab');
    const registerTab = document.getElementById('register-tab');
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    
    if (loginTab && registerTab) {
        loginTab.classList.add('active');
        registerTab.classList.remove('active');
        loginForm.style.display = 'block';
        registerForm.style.display = 'none';
    }
    
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
    document.getElementById('auth-email').focus();
}

function closeAuthModal() {
    const modal = document.getElementById('auth-modal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }
}

function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function updateUserUI() {
    const userIcon = document.getElementById('userIcon');
    if (!userIcon) return;
    
    if (currentUser) {
        userIcon.classList.add('logged-in');
        userIcon.setAttribute('title', `Cuenta: ${currentUser.name}`);
        
        const guestBadge = document.querySelector('.guest-badge');
        if (currentUser.isGuest && !guestBadge) {
            const badge = document.createElement('span');
            badge.className = 'guest-badge';
            badge.textContent = 'G';
            userIcon.parentNode.appendChild(badge);
        } else if (!currentUser.isGuest && guestBadge) {
            guestBadge.remove();
        }
    } else {
        userIcon.classList.remove('logged-in');
        userIcon.setAttribute('title', 'Mi cuenta');
        const guestBadge = document.querySelector('.guest-badge');
        if (guestBadge) guestBadge.remove();
    }
}

// ======================================================
// FUNCIONES DE RESEÑAS CON IMÁGENES
// ======================================================
function setupImageUpload() {
    const imageInput = document.getElementById('review-images');
    if (!imageInput) return;
    
    imageInput.addEventListener('change', handleImageUpload);
}

function handleImageUpload(e) {
    const files = Array.from(e.target.files);
    const preview = document.getElementById('image-preview');
    
    preview.innerHTML = '';
    reviewImages = [];
    
    files.forEach((file, index) => {
        if (file.size > 5 * 1024 * 1024) { // 5MB max
            showToast('La imagen no puede superar los 5MB', 'error');
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            reviewImages.push(e.target.result);
            
            const imgContainer = document.createElement('div');
            imgContainer.className = 'preview-image';
            imgContainer.innerHTML = `
                <img src="${e.target.result}" alt="Preview ${index + 1}">
                <button class="remove-image" data-index="${index}">
                    <i class="fas fa-times"></i>
                </button>
            `;
            preview.appendChild(imgContainer);
            
            imgContainer.querySelector('.remove-image').addEventListener('click', function() {
                const idx = parseInt(this.dataset.index);
                reviewImages.splice(idx, 1);
                this.parentElement.remove();
            });
        };
        reader.readAsDataURL(file);
    });
}

function initReviews() {
    const storedReviews = localStorage.getItem('tamProductReviews');
    if (storedReviews) {
        reviews = JSON.parse(storedReviews);
    } else {
        reviews = [
            {
                id: 1,
                productId: "nintendo-switch-2",
                rating: 5,
                title: "¡Excelente consola!",
                comment: "La Nintendo Switch 2 superó mis expectativas. Los gráficos son increíbles y la batería dura mucho más que la versión anterior. Mario Kart se ve espectacular.",
                reviewer: "Carlos Gómez",
                userId: "guest_1",
                userAvatar: "C",
                date: "2026-02-10T15:30:00.000Z",
                helpful: 12,
                images: []
            },
            {
                id: 2,
                productId: "ps5-digital-slim",
                rating: 5,
                title: "La mejor consola de esta generación",
                comment: "El SSD es increíblemente rápido, los juegos cargan en segundos. Totalmente recomendada para quienes buscan la mejor experiencia gaming.",
                reviewer: "Ana Martínez",
                userId: "guest_2",
                userAvatar: "A",
                date: "2026-02-09T10:15:00.000Z",
                helpful: 8,
                images: []
            },
            {
                id: 3,
                productId: "samsung-galaxy-s24",
                rating: 4,
                title: "Muy buen teléfono",
                comment: "La cámara es espectacular, especialmente con zoom. La batería dura todo el día con uso intensivo. El S Pen es muy útil.",
                reviewer: "Laura Sánchez",
                userId: "guest_3",
                userAvatar: "L",
                date: "2026-02-08T18:45:00.000Z",
                helpful: 5,
                images: []
            },
            {
                id: 4,
                productId: "iphone-15-pro",
                rating: 5,
                title: "El mejor iPhone hasta ahora",
                comment: "El titanio lo hace increíblemente ligero, la cámara es brutal y el USB-C era lo que estábamos esperando. 10/10",
                reviewer: "Miguel Rodríguez",
                userId: "guest_4",
                userAvatar: "M",
                date: "2026-02-07T09:20:00.000Z",
                helpful: 15,
                images: []
            }
        ];
        localStorage.setItem('tamProductReviews', JSON.stringify(reviews));
    }
}

function setupReviewsModalEvents() {
    const modal = document.getElementById('reviews-modal');
    const closeBtn = document.getElementById('close-reviews-modal');
    const cancelBtn = document.getElementById('cancel-review');
    const submitBtn = document.getElementById('submit-review');
    const starInputs = document.querySelectorAll('.star-rating-input .star');
    const commentTextarea = document.getElementById('review-comment');
    const sortSelect = document.getElementById('sort-reviews');

    if (closeBtn) closeBtn.addEventListener('click', closeReviewsModal);
    if (cancelBtn) cancelBtn.addEventListener('click', closeReviewsModal);
    
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) closeReviewsModal();
        });
    }

    starInputs.forEach(star => {
        star.addEventListener('click', function() {
            selectedStarRating = parseInt(this.dataset.value);
            updateStarDisplay(selectedStarRating);
            validateReviewForm();
        });
        
        star.addEventListener('mouseover', function() {
            const value = parseInt(this.dataset.value);
            highlightStars(value);
        });
        
        star.addEventListener('mouseout', function() {
            highlightStars(selectedStarRating);
        });
    });
    
    if (commentTextarea) {
        commentTextarea.addEventListener('input', function() {
            const count = this.value.length;
            const charCount = document.getElementById('char-count');
            if (charCount) {
                charCount.textContent = count;
                charCount.classList.toggle('warning', count > 450);
            }
            validateReviewForm();
        });
    }
    
    if (submitBtn) submitBtn.addEventListener('click', submitReview);
    
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            if (currentProductForReview) {
                loadProductReviews(currentProductForReview, this.value);
            }
        });
    }
}

function openReviewsModal(productId) {
    const product = products.find(p => p.id === productId);
    if (!product) return;
    
    if (!currentUser) {
        window.pendingReviewProductId = productId;
        openAuthModal();
        return;
    }
    
    currentProductForReview = productId;
    selectedStarRating = 0;
    reviewImages = [];
    
    const productImage = document.getElementById('reviews-product-image');
    const productName = document.getElementById('reviews-product-name');
    
    if (productImage) {
        productImage.src = product.image;
        productImage.alt = product.name;
    }
    if (productName) productName.textContent = product.name;
    
    updateProductRatingDisplay(productId);
    resetReviewForm();
    loadProductReviews(productId);
    
    const modal = document.getElementById('reviews-modal');
    if (modal) {
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
}

function closeReviewsModal() {
    const modal = document.getElementById('reviews-modal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }
    currentProductForReview = null;
    selectedStarRating = 0;
    reviewImages = [];
}

function resetReviewForm() {
    selectedStarRating = 0;
    updateStarDisplay(0);
    
    const titleInput = document.getElementById('review-title');
    const commentInput = document.getElementById('review-comment');
    const nameInput = document.getElementById('reviewer-name');
    const charCount = document.getElementById('char-count');
    const imagePreview = document.getElementById('image-preview');
    
    if (titleInput) titleInput.value = '';
    if (commentInput) commentInput.value = '';
    if (nameInput) nameInput.value = '';
    if (charCount) {
        charCount.textContent = '0';
        charCount.classList.remove('warning');
    }
    if (imagePreview) imagePreview.innerHTML = '';
    
    validateReviewForm();
}

function validateReviewForm() {
    const comment = document.getElementById('review-comment');
    const submitBtn = document.getElementById('submit-review');
    
    if (!comment || !submitBtn) return false;
    
    const commentValue = comment.value.trim();
    const isValid = selectedStarRating > 0 && commentValue.length >= 10 && commentValue.length <= 500;
    
    submitBtn.disabled = !isValid;
    return isValid;
}

function submitReview() {
    if (!validateReviewForm() || !currentProductForReview || !currentUser) {
        showToast('Debes iniciar sesión y completar todos los campos', 'error');
        return;
    }
    
    const product = products.find(p => p.id === currentProductForReview);
    if (!product) {
        showToast('Error: Producto no encontrado', 'error');
        return;
    }

    let puntuacion = selectedStarRating;
    let comentario = document.getElementById("review-comment").value;

    let formData = new FormData();
    formData.append("producto_id", currentProductForReview);
    formData.append("product_name", product.name); // Enviar el nombre del producto
    formData.append("usuario_id", currentUser.id);
    formData.append("user_email", currentUser.email); // Enviar el email del usuario
    formData.append("puntuacion", puntuacion);
    formData.append("comentario", comentario);
    
    // Capturar archivos de imágenes
    const fileInput = document.getElementById("review-images");
    if (fileInput && fileInput.files.length > 0) {
        for (let i = 0; i < fileInput.files.length; i++) {
            formData.append("imagenes[]", fileInput.files[i]);
        }
    }

    fetch("guardar_rewiew.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log("Respuesta del servidor:", data);
        if(data.trim() == "ok"){
            showToast("Reseña publicada correctamente", 'success');
            // Simulación de actualización local
            const newReview = {
                id: Date.now(),
                productId: currentProductForReview,
                rating: puntuacion,
                title: 'Reseña agregada',
                comment: comentario,
                reviewer: currentUser.name,
                userId: currentUser.id,
                userAvatar: currentUser.avatar,
                date: new Date().toISOString(),
                helpful: 0,
                images: []
            };
            reviews.push(newReview);
            localStorage.setItem('tamProductReviews', JSON.stringify(reviews));
            
            updateProductRatingDisplay(currentProductForReview);
            loadProductReviews(currentProductForReview);
            resetReviewForm();
            renderProducts();
        } else {
            showToast("Error al guardar la reseña: " + data, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast("Error en la conexión con el servidor.", 'error');
    });
}

function loadProductReviews(productId, sortBy = 'newest') {
    const productReviews = reviews.filter(r => r.productId === productId);
    const reviewsList = document.getElementById('reviews-list');
    
    if (!reviewsList) return;
    
    if (productReviews.length === 0) {
        reviewsList.innerHTML = `
            <div class="no-reviews-yet">
                <i class="fas fa-comment-slash"></i>
                <p>¡Sé el primero en dejar una reseña!</p>
            </div>
        `;
        return;
    }
    
    let sortedReviews = [...productReviews];
    switch(sortBy) {
        case 'newest':
            sortedReviews.sort((a, b) => new Date(b.date) - new Date(a.date));
            break;
        case 'highest':
            sortedReviews.sort((a, b) => b.rating - a.rating);
            break;
        case 'lowest':
            sortedReviews.sort((a, b) => a.rating - b.rating);
            break;
    }
    
    reviewsList.innerHTML = sortedReviews.map(review => createReviewHTML(review)).join('');
}

function createReviewHTML(review) {
    const date = new Date(review.date);
    const formattedDate = date.toLocaleDateString('es-ES', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    });
    
    const timeAgo = getTimeAgo(date);
    
    // Generar HTML para las imágenes si existen
    const imagesHTML = review.images && review.images.length > 0 ? `
        <div class="review-images" style="display: flex; gap: 10px; margin-top: 15px; flex-wrap: wrap;">
            ${review.images.map(img => `
                <img src="${img}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px; border: 1px solid var(--border); cursor: pointer;" onclick="window.open(this.src)">
            `).join('')}
        </div>
    ` : '';
    
    return `
        <div class="review-item">
            <div class="review-header">
                <div class="reviewer-info">
                    <div class="reviewer-avatar">
                        ${review.userAvatar || review.reviewer.charAt(0).toUpperCase()}
                    </div>
                    <div>
                        <h5 class="reviewer-name">${review.reviewer}</h5>
                        <span class="review-date" title="${formattedDate}">${timeAgo}</span>
                    </div>
                </div>
                <div class="review-rating">
                    ${generateStarsHTML(review.rating)}
                    <span class="rating-value">${review.rating}/5</span>
                </div>
            </div>
            <h6 class="review-title">${review.title}</h6>
            <div class="review-content">
                <p>${review.comment}</p>
            </div>
            ${imagesHTML}
        </div>
    `;
}

function showUserReviews() {
    if (!currentUser) return;
    
    const userReviews = reviews.filter(review => review.userId === currentUser.id);
    
    if (userReviews.length === 0) {
        showToast('No has escrito ninguna reseña aún', 'info');
        return;
    }
    
    const modalHTML = `
    <div id="user-reviews-modal" class="reviews-modal" style="display: flex;">
        <div class="reviews-modal-content" style="max-width: 800px;">
            <button id="close-user-reviews" class="close-reviews-modal">
                <i class="fas fa-times"></i>
            </button>
            <div class="reviews-modal-header">
                <h3><i class="fas fa-star"></i> Mis Reseñas</h3>
                <p style="margin: 10px 0 0 0; opacity: 0.9; font-size: 0.95rem;">
                    Has escrito ${userReviews.length} ${userReviews.length === 1 ? 'reseña' : 'reseñas'}
                </p>
            </div>
            <div class="reviews-modal-body" style="max-height: 60vh;">
                <div id="user-reviews-list" class="reviews-list" style="max-height: none; padding: 0;">
                    ${userReviews.map(review => {
                        const product = products.find(p => p.id === review.productId);
                        return `
                        <div class="review-item" style="margin-bottom: 20px;">
                            <div class="review-header">
                                <div class="reviewer-info">
                                    <div style="display: flex; align-items: center; gap: 15px;">
                                        <img src="${product?.image}" style="width: 60px; height: 60px; object-fit: contain; border-radius: 8px; background: #f5f5f5;" loading="lazy">
                                        <div>
                                            <h5 style="margin: 0 0 5px 0; color: #333;">${product?.name || 'Producto no encontrado'}</h5>
                                            <div style="font-size: 0.85rem; color: #666;">${new Date(review.date).toLocaleDateString('es-ES')}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-rating">
                                    ${generateStarsHTML(review.rating)}
                                    <span class="rating-value">${review.rating}/5</span>
                                </div>
                            </div>
                            <h6 class="review-title">${review.title}</h6>
                            <div class="review-content">
                                <p>${review.comment}</p>
                            </div>
                        </div>
                        `;
                    }).join('')}
                </div>
            </div>
        </div>
    </div>
    `;
    
    const existingModal = document.getElementById('user-reviews-modal');
    if (existingModal) existingModal.remove();
    
    document.body.insertAdjacentHTML('beforeend', modalHTML);
    document.body.style.overflow = 'hidden';
    
    document.getElementById('close-user-reviews').addEventListener('click', function() {
        document.getElementById('user-reviews-modal').remove();
        document.body.style.overflow = '';
    });
    
    document.getElementById('user-reviews-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            this.remove();
            document.body.style.overflow = '';
        }
    });
}

function updateProductRatingDisplay(productId) {
    const productReviews = reviews.filter(r => r.productId === productId);
    const total = productReviews.length;
    
    const avgRating = document.querySelector('.average-rating');
    const totalRev = document.querySelector('.total-reviews');
    const stars = document.querySelector('.current-rating .stars');
    
    if (total === 0) {
        if (avgRating) avgRating.textContent = '0.0';
        if (totalRev) totalRev.textContent = '(0 reseñas)';
        if (stars) stars.innerHTML = generateStarsHTML(0);
        return;
    }
    
    const average = productReviews.reduce((sum, r) => sum + r.rating, 0) / total;
    
    if (avgRating) avgRating.textContent = average.toFixed(1);
    if (totalRev) totalRev.textContent = `(${total} ${total === 1 ? 'reseña' : 'reseñas'})`;
    if (stars) stars.innerHTML = generateStarsHTML(average);
}

// ======================================================
// FUNCIONES DE VISTA RÁPIDA
// ======================================================
function showQuickView(productId) {
    const product = products.find(p => p.id === productId);
    if (!product) return;
    
    const modal = document.getElementById('quick-view-modal');
    const body = modal.querySelector('.quick-view-body');
    
    const rating = getProductRating(productId);
    const reviewCount = getReviewCount(productId);
    
    body.innerHTML = `
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
            <div style="display: flex; flex-direction: column; gap: 20px;">
                <img src="${product.image}" alt="${product.name}" style="width: 100%; height: 300px; object-fit: contain; background: #f5f5f5; border-radius: 12px; padding: 20px;">
                <div style="display: flex; gap: 10px;">
                    <button class="action-btn cart-btn" id="quick-add-to-cart" style="flex: 2; background: #f44336; color: white;">
                        <i class="fas fa-cart-plus"></i> AGREGAR AL CARRITO
                    </button>
                    <button class="action-btn reviews-btn" id="quick-view-reviews" style="flex: 1;">
                        <i class="fas fa-star"></i> RESEÑAS
                    </button>
                </div>
            </div>
            <div style="display: flex; flex-direction: column; gap: 20px;">
                <div>
                    <span style="color: #666; font-size: 0.9rem;">${product.category} | ${product.brand}</span>
                    <h2 style="margin: 10px 0; color: #0d47a1;">${product.name}</h2>
                </div>
                
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div class="stars" style="color: #ffd700; font-size: 1.2rem;">
                        ${generateStarsHTML(rating)}
                    </div>
                    <span style="color: #666;">${rating.toFixed(1)} (${reviewCount} reseñas)</span>
                </div>
                
                <div style="border-top: 1px solid #eee; padding-top: 20px;">
                    <div style="display: flex; align-items: baseline; gap: 15px; margin-bottom: 15px;">
                        <span style="font-size: 2rem; font-weight: 800; color: #f44336;">${product.priceNow}</span>
                        ${product.priceBefore ? `<span style="color: #999; text-decoration: line-through;">${product.priceBefore}</span>` : ''}
                    </div>
                    <p style="color: #333; line-height: 1.6;">${product.description}</p>
                </div>
                
                <div style="background: #f9f9f9; padding: 15px; border-radius: 8px;">
                    <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                        <div>
                            <i class="fas fa-box" style="color: #0d47a1;"></i>
                            <span style="margin-left: 8px; font-weight: 500;">Stock: ${product.stock} unidades</span>
                        </div>
                        ${product.freeShipping ? `
                            <div>
                                <i class="fas fa-truck" style="color: #4CAF50;"></i>
                                <span style="margin-left: 8px; font-weight: 500;">Envío gratis</span>
                            </div>
                        ` : ''}
                    </div>
                </div>
            </div>
        </div>
    `;
    
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
    
    document.getElementById('quick-add-to-cart').addEventListener('click', () => {
        addToCart(productId);
        modal.style.display = 'none';
        document.body.style.overflow = '';
    });
    
    document.getElementById('quick-view-reviews').addEventListener('click', () => {
        modal.style.display = 'none';
        document.body.style.overflow = '';
        openReviewsModal(productId);
    });
}

function showProductDetails(productId) {
    // Redirigir a la página de detalles del producto
    const baseUrl = window.location.pathname.includes('PROJECT') ? '../../' : '';
    window.location.href = baseUrl + 'vistas_pedidos/ver_producto.php?id=' + encodeURIComponent(productId);
}

// ======================================================
// INTEGRACIÓN CON MERCADOPAGO
// ======================================================
function initMercadoPago() {
    // Cargar SDK de MercadoPago
    const script = document.createElement('script');
    script.src = "https://sdk.mercadopago.com/js/v2";
    script.onload = function() {
        // En producción, reemplazar con tu Public Key real
        // window.mp = new MercadoPago('TEST-00000000-0000-0000-0000-000000000000');
        console.log('MercadoPago SDK cargado');
    };
    document.head.appendChild(script);
}

async function processMercadoPagoPayment() {
    const cart = JSON.parse(localStorage.getItem('tamCart')) || [];
    if (cart.length === 0) {
        showToast('Tu carrito está vacío', 'error');
        return;
    }
    
    if (!currentUser) {
        showToast('Inicia sesión para pagar', 'info');
        openAuthModal();
        return;
    }
    
    showToast('Procesando pago con MercadoPago...', 'info');
    
    // Simular proceso de pago (en producción, esto llamaría a la API real)
    setTimeout(() => {
        // Crear orden después del pago exitoso
        processCheckout();
        showToast('Pago procesado exitosamente', 'success');
    }, 2000);
}

// ======================================================
// FUNCIONES AUXILIARES
// ======================================================
function initCart() {
    if (!localStorage.getItem('tamCart')) {
        localStorage.setItem('tamCart', JSON.stringify([]));
    }
}

function formatCurrency(amount) {
    if (amount >= 1000000) {
        const millones = (amount / 1000000).toFixed(1);
        return `$ ${millones}M`;
    }
    if (amount >= 1000) {
        const miles = (amount / 1000).toFixed(1);
        return `$ ${miles}K`;
    }
    
    return new Intl.NumberFormat('es-CO', { 
        style: 'currency', 
        currency: 'COP', 
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    }).format(amount).replace('COP', '').trim();
}

function getPriceValue(priceString) {
    if (!priceString) return 0;
    return parseInt(priceString.replace(/[^0-9]/g, '')) || 0;
}

function getProductPriceValue(product) {
    return getPriceValue(product.priceNow || product.price);
}

function getProductRating(productId) {
    const productReviews = reviews.filter(r => r.productId === productId);
    if (productReviews.length === 0) return 0;
    return productReviews.reduce((sum, r) => sum + r.rating, 0) / productReviews.length;
}

function getReviewCount(productId) {
    return reviews.filter(r => r.productId === productId).length;
}

function generateStarsHTML(rating) {
    const fullStars = Math.floor(rating);
    const hasHalfStar = rating % 1 >= 0.5;
    let stars = '';
    
    for (let i = 0; i < fullStars; i++) stars += '<i class="fas fa-star"></i>';
    if (hasHalfStar) stars += '<i class="fas fa-star-half-alt"></i>';
    for (let i = 0; i < 5 - fullStars - (hasHalfStar ? 1 : 0); i++) stars += '<i class="far fa-star"></i>';
    
    return stars;
}

function updateStarDisplay(rating) {
    const stars = document.querySelectorAll('.star-rating-input .star i');
    const ratingText = document.getElementById('selected-rating-text');
    const ratingValue = document.getElementById('selected-rating-value');
    
    const messages = { 1: 'Malo', 2: 'Regular', 3: 'Bueno', 4: 'Muy bueno', 5: 'Excelente' };
    
    stars.forEach((star, index) => {
        star.className = index < rating ? 'fas fa-star' : 'far fa-star';
        star.parentElement.classList.toggle('active', index < rating);
        star.style.color = index < rating ? '#ffc107' : '#ddd';
    });
    
    if (rating > 0) {
        if (ratingText) ratingText.textContent = messages[rating];
        if (ratingValue) {
            ratingValue.textContent = `(${rating}/5)`;
            ratingValue.style.display = 'inline';
        }
    } else {
        if (ratingText) ratingText.textContent = 'Selecciona una calificación';
        if (ratingValue) ratingValue.style.display = 'none';
    }
}

function highlightStars(rating) {
    const stars = document.querySelectorAll('.star-rating-input .star i');
    stars.forEach((star, index) => {
        star.style.color = index < rating ? '#ffc107' : '#ddd';
    });
}

function getTimeAgo(date) {
    const now = new Date();
    const diffMs = now - date;
    const diffMin = Math.floor(diffMs / 60000);
    const diffHour = Math.floor(diffMin / 60);
    const diffDay = Math.floor(diffHour / 24);
    const diffMonth = Math.floor(diffDay / 30);
    const diffYear = Math.floor(diffDay / 365);
    
    if (diffYear > 0) return `hace ${diffYear} ${diffYear === 1 ? 'año' : 'años'}`;
    if (diffMonth > 0) return `hace ${diffMonth} ${diffMonth === 1 ? 'mes' : 'meses'}`;
    if (diffDay > 0) return `hace ${diffDay} ${diffDay === 1 ? 'día' : 'días'}`;
    if (diffHour > 0) return `hace ${diffHour} ${diffHour === 1 ? 'hora' : 'horas'}`;
    if (diffMin > 0) return `hace ${diffMin} ${diffMin === 1 ? 'minuto' : 'minutos'}`;
    return 'hace unos momentos';
}

function showToast(message, type = 'info') {
    const toast = document.getElementById('toast-notification');
    if (!toast) return;
    
    const icons = { success: 'check-circle', error: 'exclamation-circle', info: 'info-circle' };
    toast.innerHTML = `<i class="fas fa-${icons[type]}"></i> ${message}`;
    toast.className = `toast-notification ${type}`;
    toast.classList.add('show');
    
    setTimeout(() => toast.classList.remove('show'), 4000);
}

function toggleMobileMenu() {
    const categoryNav = document.getElementById('categoryNav');
    const menuToggle = document.getElementById('menuToggle');
    
    categoryNav.classList.toggle('show-mobile');
    
    if (categoryNav.classList.contains('show-mobile')) {
        menuToggle.innerHTML = '<i class="fas fa-times"></i><span>CERRAR</span>';
    } else {
        menuToggle.innerHTML = '<i class="fas fa-bars"></i><span>MENÚ</span>';
    }
}

function handleCategoryClick(e) {
    e.preventDefault();
    
    document.querySelectorAll('.category-nav a').forEach(a => a.classList.remove('active'));
    this.classList.add('active');
    
    const category = this.dataset.category;
    
    if (category === 'todos') {
        resetFilters();
    } else {
        let filterCategory = '';
        switch(category) {
            case 'consolas': filterCategory = 'Consolas'; break;
            case 'portatiles': filterCategory = 'Portátiles'; break;
            case 'celulares': filterCategory = 'Celulares'; break;
            case 'accesorios': filterCategory = 'Accesorios'; break;
            default: filterCategory = category;
        }
        
        catalogState.selectedCategories = [filterCategory];
        updateFilterControls();
        applyFilters();
        showToast(`Mostrando productos de ${filterCategory}`, 'info');
    }
    
    const categoryNav = document.getElementById('categoryNav');
    if (categoryNav.classList.contains('show-mobile')) {
        categoryNav.classList.remove('show-mobile');
        document.getElementById('menuToggle').innerHTML = '<i class="fas fa-bars"></i><span>MENÚ</span>';
    }
}

function closeAllModals() {
    closeReviewsModal();
    closeAuthModal();
    
    const quickViewModal = document.getElementById('quick-view-modal');
    if (quickViewModal.style.display === 'flex') {
        quickViewModal.style.display = 'none';
        document.body.style.overflow = '';
    }
    
    const userReviewsModal = document.getElementById('user-reviews-modal');
    if (userReviewsModal) {
        userReviewsModal.remove();
        document.body.style.overflow = '';
    }
    
    const checkoutModal = document.getElementById('checkout-modal');
    if (checkoutModal.style.display === 'flex') {
        checkoutModal.style.display = 'none';
        document.body.style.overflow = '';
    }
}